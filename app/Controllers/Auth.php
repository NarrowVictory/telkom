<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function loginProccess()
    {
        $post = array(
            'username'  => $this->request->getPost('username'),
            'password'   => $this->request->getPost('password')
        );
        $query = $this->db->table('tb_users')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();

        if ($user) {
            if (md5($post['password'], $user->password)) {
                if ($user->level == 1) {
                    $params = ['id_users' => $user->id_users];
                    session()->set($params);
                    return redirect()->to(site_url('admin/dashboard'));
                } else if ($user->level == 2) {
                    $params = ['id_users' => $user->id_users];
                    session()->set($params);
                    return redirect()->to(site_url('teknisi/dashboard'));
                } else if ($user->level == 3) {
                    $params = [
                        'id_users' => $user->id_users
                    ];
                    session()->set($params);
                    return redirect()->to(site_url('pelanggan/dashboard'));
                } else {
                    return redirect()->back()->with('error', 'Data Login tidak Ditemukan');
                }
                return redirect()->to(site_url('pelanggan/dashboard'));
            } else {
                return redirect()->back()->with('error', 'Password Salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username Tidak Ditemukan');
        }
    }
}
