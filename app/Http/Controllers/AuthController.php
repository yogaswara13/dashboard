<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->url = getUrl();
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function _register(Request $request){

        if($request){
            $validator = Validator::make($request->all(),
            [
                'email' => 'required|email:dns|unique:users',
                'password' => 'required'
            ],
            [
                'email.required' => 'Kolom :attribute kosong.',
                'email.email' => 'Format :attribute tidak sesuai',
                'email.unique' => ':attribute sudah terdaftar.',
                'password.required' => 'Kolom :attribute kosong',
            ]);

            if(!$validator->fails()){
                $data = User::create([
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_role_id' => 2
                ]);
                if($data){
                    return redirect(URL::to('/login'))->with('success', 'Berhasil melakukan registrasi');
                }else{
                    return redirect(URL::to('/register'))->with('error', 'Gagal melakukan registrasi');
                }

            }else{
                return redirect()->back()->with('error', 'Gagal validasi data');
            }
        }else{
            return redirect()->back()->with('error', 'Gagal request');
        }
    }

    public function _login(Request $request){
        // if ($request->except('_token')) {
        //     $data = [
        //         'email' => $request->email,
        //         'password' => $request->password,
        //     ];

        //     if (Auth::attempt($data)) {
        //         return redirect(URL::to('/home'))->with('success', 'Selamat datang!');
        //     }else{
        //         return redirect()->intended(URL::to('/login'))->with('error', 'Email/Password salah');
        //     }

        // }else{
        //     return redirect()->intended(URL::to('/login'))->with('error', 'Masukan Email/Password');
        // }
    }

    public function logout(Request $request){
        // if(Auth::logout()){
        //     return redirect(URL::to('/login'))->with('success', 'Berhasil logout');
        // }else{
        //     return redirect(URL::to('/home'))->with('error', 'Gagal melakukan logout');
        // }
        session()->flush();
        return redirect('login');
    }

    public function authentication(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username wajib di isi.',
                'password.required' => 'Password wajib di isi.'
            ]
        );

        // return $request;

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            session()->put('username', $request->username);
            initTokenKlien($request->username, $request->password);
            initTokenPengguna($request->username, $request->password);
            initUser();
        }

        if( session('token_pengguna') ){
            return redirect('/home');
        }

        return back()->with('error', "Login gagal");

    }

}
