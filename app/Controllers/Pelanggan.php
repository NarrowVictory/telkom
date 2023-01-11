<?php

namespace App\Controllers;

function guidv4($data = null)
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

class Pelanggan extends BaseController
{
    public function index()
    {
        $id = $this->session->get('id_users');
        $builder = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_keluhan.id_pelanggan')->join('tb_perbaikan', 'tb_perbaikan.id_tickets=tb_keluhan.id_tickets')->where(['tb_pelanggan.id_users' => $id]);
        $query   = $builder->get()->getResult();
        $data['gangguan'] = $query;

        return view('pelanggan/v_dashboard', $data);
    }

    public function gangguan()
    {
        $id = $this->session->get('id_users');
        $query = $this->db->table('tb_pelanggan')->getWhere(['id_users' => $id]);
        $data['pelanggan'] = $query->getRow();
        return view('pelanggan/v_gangguan', $data);
    }

    public function editkeluhan($id)
    {
        $builder = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_keluhan.id_pelanggan')->getWhere(['id_tickets' => $id]);
        $query = $builder->getRow();
        $data['keluhan'] = $query;
        return view('pelanggan/v_editgangguan', $data);
    }

    public function updatekeluhan($id)
    {
        $data = [
            'no_hp'         =>  $this->request->getPost('no_hp'),
            'topik_keluhan' =>  $this->request->getPost('topik_keluhan'),
            'detail_keluhan' =>  $this->request->getPost('detail_keluhan'),
            'alamat' =>  $this->request->getPost('alamat'),
            'tgl_keluhan' =>  date("Y-m-d H:i:s")
        ];

        unset($data['_method']);
        $this->db->table('tb_keluhan')->where(['id_tickets' => $id])->update($data);

        return redirect()->to(site_url('pelanggan/dashboard'))->with('success', 'Data Berhasil Diupdate');
    }

    public function hapuskeluhan($id)
    {
        $this->db->table('tb_keluhan')->where(['tb_keluhan.id_tickets' => $id])->delete();
        return redirect()->to(site_url('pelanggan/dashboard'))->with('success', 'Data Berhasil Dihapus');
    }

    public function storelaporan()
    {
        $random = substr(str_shuffle("0123456789"), 0, 8);
        $tickets = "IN" . $random;

        $data = array(
            'id_tickets'        =>  $tickets,
            'id_pelanggan'      =>  $this->request->getPost('id_pelanggan'),
            'no_hp'             =>  $this->request->getPost('no_hp'),
            'topik_keluhan'     =>  $this->request->getPost('topik_keluhan'),
            'detail_keluhan'    =>  $this->request->getPost('detail_keluhan'),
            'alamat'            =>  $this->request->getPost('alamat'),
            'tgl_keluhan'       =>  date("Y-m-d H:i:s")
        );
        $this->db->table('tb_keluhan')->insert($data);

        $data_perbaikan = [
            'id_perbaikan'  =>  guidv4(),
            'id_tickets'    =>  $tickets,
            'status_keluhan' =>  'Pending',
            'tgl_proses'    =>  NULL,
            'tgl_selesai'   =>  NULL,
            'keterangan'    =>  NULL
        ];
        $this->db->table('tb_perbaikan')->insert($data_perbaikan);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('pelanggan/dashboard'))->with('success', 'Laporan Berhasil Dikirimkan');
        }
    }
}
