<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
        $data['menu'] = "profile";
        $data['subMenu'] = null;
        $username = session('username');

        $data['pengguna'] = getData('/pengguna', "where=kode='$username'", 0, NULL, '')->result[0];

        // return $data;

        return view('pages.profile', $data);
    }

    public function changePassword(Request $request){
        $validator = Validator::make( $request->except(['_token', '_method']),
            [
                'username' => 'required|string',
                'old_password' => 'required|required_with:new_password',
                'new_password' => 'required|required_with:old_password'
            ],
            [
                'username.required' => 'Field username kosong.',
                'username.string' => 'Field username harus berupa huruf.',
                'old_password.required' => 'Field Password Lama kosong.',
                'old_password.required_with' => 'Untuk mengubah password harus mengisikan Password Lama.',
                'new_password.required' => 'Field Password Baru kosong.',
                'new_password.required_with' => 'Untuk mengubah password harus mengisikan Password Lama.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with("error", "Periksa kembali form.")->withErrors($validator);
        }else{
            $res = Http::asForm()->patch( getUrl() . '/klien/password', [
                'token' => session('token_klien'),
                'kode' => $request->username,
                'old_password' => $request->old_password,
                'new_password' => $request->new_password
            ]);

            $dres = json_decode($res->getBody()->getContents());
            if ($dres->code == 200) {
                return redirect()->back()->with("success", "Berhasil mengubah password!");
            }else{
                return redirect()->back()->with("error", "Terjadi kesalahan! Gagal merubah password");
            }
        }
    }

    public function getAllUser(){
        $data['menu'] = "Kelola User";
        $data['subMenu'] = null;
        $data['users'] = getData('/klien/pengguna', "", 0, "", "")->result;

        return view('pages.admin.users', $data);
    }
}
