<?php

namespace App\Controllers;

class Teknisi extends BaseController
{
    public function index()
    {
        $builder1 = $this->db->table('tb_perbaikan');
        $query1 = $builder1->get()->getResult();
        $total = count($query1);

        $builder2 = $this->db->table('tb_perbaikan');
        $query2 = $builder2->getWhere(['status_keluhan' => 'Pending'])->getResult();
        $pending = count($query2);

        $builder3 = $this->db->table('tb_perbaikan');
        $query3 = $builder3->getWhere(['status_keluhan' => 'On Proccess'])->getResult();
        $onproccess = count($query3);

        $builder4 = $this->db->table('tb_perbaikan');
        $query4 = $builder4->getWhere(['status_keluhan' => 'Done'])->getResult();
        $done = count($query4);

        return view('teknisi/v_dashboard', [
            'total' => $total,
            'pending' => $pending,
            'onproccess' => $onproccess,
            'done' => $done
        ]);
    }

    public function datagangguan()
    {
        $id = $this->session->get('id_users');
        $query1 = $this->db->table('tb_teknisi')->getWhere(['id_teknisi' => 'd558bfc0-18cf-4fc0-8fa3-0e3d1abfa629']);
        $data['teknisi'] = $query1->getRow();

        $builder = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->join('tb_perbaikan', 'tb_keluhan.id_tickets = tb_perbaikan.id_tickets');
        $query   = $builder->get()->getResult();
        $data['gangguan'] = $query;

        return view('teknisi/v_lihatgangguan', $data);
    }

    public function editgangguan($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->join('tb_perbaikan', 'tb_keluhan.id_tickets = tb_perbaikan.id_tickets')->getWhere(['tb_keluhan.id_tickets' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['gangguan'] = $query->getRow();
                return view('teknisi/v_editgangguan', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function updategangguan($id)
    {
        $data = $this->request->getPost();
        unset($data['_method']);

        $query = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->join('tb_perbaikan', 'tb_keluhan.id_tickets = tb_perbaikan.id_tickets')->getWhere(['tb_keluhan.id_tickets' => $id]);

        if ($query->resultID->num_rows > 0) {
            $query = $query->getRow();
            $status_keluhan = $query->status_keluhan;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $status = $this->request->getPost('status_keluhan');

        if ($status_keluhan == 'Pending' && $status == 'On Proccess') {
            $data = array(
                'status_keluhan' => $status,
                'tgl_proses' => date("Y-m-d H:i:s")
            );
            $this->db->table('tb_perbaikan')->where(['id_tickets' => $id])->update($data);
            return redirect()->to(site_url('teknisi/lihatgangguan'))->with('success', 'Data Berhasil Diupdate');
        } else if ($status_keluhan == 'On Proccess' && $status == 'Done') {
            $data = array(
                'status_keluhan'    => $status,
                'tgl_selesai'       => date("Y-m-d H:i:s"),
                'id_teknisi'        => $this->session->get('id_users')
            );
            $this->db->table('tb_perbaikan')->where(['id_tickets' => $id])->update($data);
            return redirect()->to(site_url('teknisi/lihatgangguan'))->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->to(site_url('teknisi/lihatgangguan'))->with('success', 'Anda Sudah Menginputkan Sebelumnya');
        }
    }
}
