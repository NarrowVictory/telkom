<?php

namespace App\Controllers;

use Michalsn\Uuid\Uuid;
use Dompdf\Dompdf;
use Carbon\Carbon;

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

class Admin extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('tb_pelanggan')->getWhere(['status' => 'Active']);
        $query   = $builder->getResult();
        $pelanggan = count($query);

        $builder1 = $this->db->table('tb_teknisi');
        $query1 = $builder1->get()->getResult();
        $teknisi = count($query1);

        $builder2 = $this->db->table('tb_paket');
        $query2 = $builder2->get()->getResult();
        $paket = count($query2);

        $builder3 = $this->db->table('tb_perbaikan');
        $query3 = $builder3->get()->getResult();
        $keluhan = count($query3);

        return view('admin/v_dashboard', [
            'pelanggan' => $pelanggan,
            'teknisi' => $teknisi,
            'paket' => $paket,
            'keluhan' => $keluhan,
            'title' => 'Halaman Admin'
        ]);
    }

    public function pelanggan()
    {
        $builder = $this->db->table('tb_pelanggan')->join('tb_paket', 'tb_paket.id_paket=tb_pelanggan.id_paket');
        $query   = $builder->get()->getResult();
        $data['pelanggan'] = $query;

        return view('admin/pelanggan/v_pelanggan', [
            'pelanggan' => $data['pelanggan'],
            'title'     => 'Data Pelanggan'
        ]);
    }

    public function tambahpelanggan()
    {
        return view('admin/pelanggan/v_add', [
            'title'     =>  'Tambah Data Pelanggan'
        ]);
    }

    public function storepelanggan()
    {
        $id = guidv4();
        $data_login = [
            'id_users'          =>  $id,
            'email_users'       => $this->request->getPost('email'),
            'username'          =>  $this->request->getPost('nomor_internet'),
            'password'          =>  md5($this->request->getPost('nomor_internet')),
            'level'             =>  3
        ];
        $this->db->table('tb_users')->insert($data_login);

        $data = [
            'id_pelanggan'      => guidv4(),
            'id_users'          => $id,
            'nomor_internet'    => $this->request->getPost('nomor_internet'),
            'id_paket'          => $this->request->getPost('id_paket'),
            'nama_pelanggan'    => $this->request->getPost('nama_pelanggan'),
            'alamat'            => $this->request->getPost('alamat'),
            'no_hp'             => $this->request->getPost('no_hp'),
            'status'            => $this->request->getPost('status')
        ];
        $this->db->table('tb_pelanggan')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('admin/pelanggan'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function editpelanggan($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('tb_pelanggan')->getWhere(['id_pelanggan' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['pelanggan'] = $query->getRow();
                return view('admin/pelanggan/v_edit', [
                    'pelanggan'     =>  $data['pelanggan'],
                    'title'         =>  'Edit Data Pelanggan'
                ]);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function updatepelanggan($id)
    {
        $idpel = $this->request->getPost('id_users');
        $data_pelanggan = [
            'username'  =>  $this->request->getPost('nomor_internet'),
            'password'  =>  md5($this->request->getPost('nomor_internet'))
        ];
        $this->db->table('tb_users')->where(['id_users' => $idpel])->update($data_pelanggan);

        $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('tb_pelanggan')->where(['id_pelanggan' => $id])->update($data);

        return redirect()->to(site_url('admin/pelanggan'))->with('success', 'Data Berhasil Diupdate');
    }

    public function hapuspelanggan($id)
    {
        $this->db->table('tb_pelanggan')->where(['id_pelanggan' => $id])->delete();
        return redirect()->to(site_url('admin/pelanggan'))->with('success', 'Data Berhasil Dihapus');
    }

    // GANGGUAN -------------------------
    public function gangguan()
    {
        $builder = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->join('tb_perbaikan', 'tb_keluhan.id_tickets = tb_perbaikan.id_tickets');
        $query   = $builder->get()->getResult();
        $data['gangguan'] = $query;

        return view('admin/gangguan/v_gangguan', [
            'gangguan'  => $data['gangguan'],
            'title'     => 'Data Pengaduan Gangguan'
        ]);
    }

    public function editgangguan($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->join('tb_perbaikan', 'tb_keluhan.id_tickets = tb_perbaikan.id_tickets')->getWhere(['tb_keluhan.id_tickets' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['gangguan'] = $query->getRow();
                return view('admin/gangguan/v_editgangguan', [
                    'gangguan'  => $data['gangguan'],
                    'title'     => 'Edit Data Gangguan'
                ]);
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

        $query = $this->db->table('tb_keluhan')->getWhere(['id_tickets' => $id]);

        if ($query->resultID->num_rows > 0) {
            $query = $query->getRow();
            $status_keluhan = $query->status_keluhan;
            print_r($status_keluhan);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        $status = $this->request->getPost('status_keluhan');

        if ($status_keluhan == 'Pending' && $status == 'On Proccess') {
            $data = array(
                'status_keluhan' => $status,
                'tgl_proses' => date("Y-m-d H:i:s")
            );
            $this->db->table('tb_keluhan')->where(['id_tickets' => $id])->update($data);
            return redirect()->to(site_url('admin/gangguan'))->with('success', 'Data Berhasil Diupdate');
        } else if ($status_keluhan == 'On Proccess' && $status == 'Done') {
            //Set tgl selesai
            $data = array(
                'status_keluhan' => $status,
                'tgl_selesai' => date("Y-m-d H:i:s")
            );
            $this->db->table('tb_keluhan')->where(['id_tickets' => $id])->update($data);
            return redirect()->to(site_url('admin/gangguan'))->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->to(site_url('admin/gangguan'))->with('success', 'Anda Sudah Menginputkan Sebelumnya');
        }
    }

    public function teknisi()
    {
        $builder = $this->db->table('tb_teknisi')->join('tb_users', 'tb_users.id_users = tb_teknisi.id_users');
        $query   = $builder->get()->getResult();
        $data['teknisi'] = $query;
        return view('admin/teknisi/v_teknisi', [
            'teknisi'   =>  $data['teknisi'],
            'title'     =>  'Data Teknisi'
        ]);
    }

    public function editteknisi($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('tb_teknisi')->getWhere(['id_teknisi' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['teknisi'] = $query->getRow();
                return view('admin/teknisi/v_edit', [
                    'teknisi'   =>  $data['teknisi'],
                    'title'     =>  'Edit Data Teknisi'
                ]);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function tambahteknisi()
    {
        return view('admin/teknisi/v_add', [
            'title' => 'Tambah Teknisi'
        ]);
    }

    public function storeteknisi()
    {
        $id = guidv4();
        $data_login = [
            'id_users'          =>  $id,
            'username'          =>  $this->request->getPost('username'),
            'password'          =>  md5($this->request->getPost('password')),
            'level'             =>  2
        ];
        $this->db->table('tb_users')->insert($data_login);

        $data = [
            'id_teknisi'    =>  guidv4(),
            'id_users'      =>  $id,
            'nm_teknisi'    =>  $this->request->getPost('nm_teknisi'),
            'email'         =>  $this->request->getPost('email'),
            'no_hp'         =>  $this->request->getPost('no_hp'),
            'alamat'        =>  $this->request->getPost('alamat')
        ];
        $this->db->table('tb_teknisi')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('admin/teknisi'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function updateteknisi($id)
    {
        $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('tb_teknisi')->where(['id_teknisi' => $id])->update($data);

        return redirect()->to(site_url('admin/teknisi'))->with('success', 'Data Berhasil Diupdate');
    }

    public function hapusteknisi($id)
    {
        $this->db->table('tb_teknisi')->where(['id_teknisi' => $id])->delete();
        return redirect()->to(site_url('admin/teknisi'))->with('success', 'Data Berhasil Dihapus');
    }

    public function product()
    {
        $builder = $this->db->table('tb_paket');
        $query   = $builder->get()->getResult();
        $data['paket'] = $query;
        return view('admin/paket/v_paket', [
            'paket' =>  $data['paket'],
            'title' =>  'Data Produk'
        ]);
    }

    public function tambahpaket()
    {
        return view('admin/paket/v_add', [
            'title' =>  'Tambah Data Produk'
        ]);
    }

    public function storepaket()
    {
        $id = guidv4();
        $data = [
            'id_paket'      =>  $id,
            'nm_paket'      =>  $this->request->getPost('nm_paket'),
            'spesifikasi'   =>  $this->request->getPost('spesifikasi'),
            'harga'         =>  $this->request->getPost('harga')
        ];
        $this->db->table('tb_paket')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('admin/product'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function editpaket($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('tb_paket')->getWhere(['id_paket' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['paket'] = $query->getRow();
                return view('admin/paket/v_edit', [
                    'paket' =>  $data['paket'],
                    'title' =>  'Edit Data Produk'
                ]);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function updatepaket($id)
    {
        $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('tb_paket')->where(['id_paket' => $id])->update($data);

        return redirect()->to(site_url('admin/product'))->with('success', 'Data Berhasil Diupdate');
    }

    public function hapuspaket($id)
    {
        $this->db->table('tb_paket')->where(['id_paket' => $id])->delete();
        return redirect()->to(site_url('admin/product'))->with('success', 'Data Berhasil Dihapus');
    }

    public function formrange()
    {
        return view('admin/laporan/formrange', [
            'title'  =>  'Report Date Range'
        ]);
    }
    public function formminggu()
    {
        return view('admin/laporan/formminggu', [
            'title' => 'Report Mingguan'
        ]);
    }
    public function formbulan()
    {
        return view('admin/laporan/formbulan', [
            'title' =>  'Report Bulanan'
        ]);
    }


    // Cetak Laporan
    public function cetakrange($start, $end)
    {
        $query = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->where("tgl_keluhan BETWEEN '{$start}' AND '{$end}'");
        $data['datas'] = $query->get()->getResult();
        return view('admin/laporan/cetaklaporan', $data);
    }
    public function cetakminggu($tgl)
    {
        $start = Carbon::createFromFormat('Y-m-d', $tgl)->startOfWeek()->format('Y-m-d');

        $end = Carbon::createFromFormat('Y-m-d', $tgl)->endOfWeek()->format('Y-m-d');
        $query = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->where("tgl_keluhan BETWEEN '{$start}' AND '{$end}'");
        $data['datas'] = $query->get()->getResult();
        return view('admin/laporan/cetaklaporan', $data);
    }
    public function cetakbulan($tgl)
    {
        $day = $tgl . "-08";
        $start = Carbon::createFromFormat('Y-m-d', $day)->startOfMonth()->format('Y-m-d');

        $end = Carbon::createFromFormat('Y-m-d', $day)->endOfMonth()->format('Y-m-d');

        $query = $this->db->table('tb_keluhan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_keluhan.id_pelanggan')->where("tgl_keluhan BETWEEN '{$start}' AND '{$end}'");
        $data['datas'] = $query->get()->getResult();
        return view('admin/laporan/cetaklaporan', $data);
    }
}
