<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Lectures;
use App\Models\Student;
use App\Models\Students;
use App\Models\Study_program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $tahun_angkatan = [];

        for ($i=0; $i < 7; $i++) { 
            array_push($tahun_angkatan, date('Y') - $i . '1', date('Y') - $i . '2', date('Y') - $i . '3');
        }

        $mahasiswaResult = $this->postRequest('/mahasiswa', [
            'select' => 'count(*) as total_mhs, kode_prodi',
            'group' => 'kode_prodi',
            'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL'
        ])->result;

        $dosenResult = $this->postRequest('/dosen', [
            'select' => 'count(*) as total_dosen, prodi',
            'group' => 'kode_prodi',
            'where' => 'kode_fakultas="UNPAS3"'
        ])->result;

        $alumniResult = $this->postRequest('/mahasiswa/wisuda', [
            'select' => 'count(*) as total_alumni, ProdiID',
            'group' => 'ProdiID',
            'where' => 'FakultasID = "3" AND statusMahasiswa="Lulus"'
        ])->result;

        $select_data_prodi = 'kode_hash, kode, kode_fakultas, kode_hash_fakultas, singkatan_fakultas, unit_kerja, singkatan, stat_prodi, nama, prodi';

        $data['prodi'] = $this->postRequest('/master/prodi', [
            'select' => $select_data_prodi,
            'where' => 'kode_fakultas="UNPAS3"'
        ])->result;

        $data['jml_mahasiswa'] = array_sum(array_column($mahasiswaResult, 'total_mhs'));
        $data['jml_dosen'] = array_sum(array_column($dosenResult, 'total_dosen'));
        $data['jml_alumni'] = array_sum(array_column($alumniResult, 'total_alumni'));

        foreach ($data['prodi'] as $key => $value) {
            $value->total_mhs = $mahasiswaResult[$key]->total_mhs;
            $value->total_dosen = $dosenResult[$key]->total_dosen;
            $value->total_alumni = $alumniResult[$key]->total_alumni;
        };

        $data['menu'] = "Home";
        $data['subMenu'] = null;

        return view('pages.home', $data);
    }

    public function users()
    {
        $menu = "Kelola User";
        $subMenu = null;
        $users = User::with(['user_roles'])->where('id', '!=' , Auth::user()->id)->get();

        return view('pages.admin.users', compact('users', 'menu','subMenu'));
    }
    public function ubahUser(Request $request)
    {
        $menu = "Kelola User";
        $subMenu = "Ubah Data User";
        $users = User::with(['user_roles'])->where('id', $request->id)->first();

        return view('pages.admin.edit', compact('users', 'menu','subMenu'));
    }



    public function tambahKonten()
    {
        $menu = "Kelola Konten";
        $subMenu = "Tambah Konten";
        return view('pages.tambah-konten',compact('menu','subMenu'));
    }
    public function ubahKonten()
    {
        $menu = "Kelola Konten";
        $subMenu = "Ubah Konten";
        return view('pages.ubah-konten',compact('menu','subMenu'));
    }

    public function dashboardJurusan(Request $request){

        $menu = "Dashboard Jurusan";
        if($request->id == 301){
            $nama_prodi = "Teknik Industri";
            $subMenu = $nama_prodi;
            return view('pages.detail.dashboard-jurusan', compact('nama_prodi','menu','subMenu' ));
        }
        else if($request->id == 302){
            $nama_prodi = "Teknologi Pangan";
            $subMenu = $nama_prodi;
            return view('pages.detail.dashboard-jurusan', compact('nama_prodi','menu','subMenu'));
        }
        else if($request->id == 303){
            $nama_prodi = "Teknik Mesin";
            $subMenu = $nama_prodi;
            return view('pages.detail.dashboard-jurusan', compact('nama_prodi','menu','subMenu'));
        }
        else if($request->id == 304){
            $nama_prodi = "Teknik Informatika";
            $subMenu = $nama_prodi;
            return view('pages.detail.dashboard-jurusan', compact('nama_prodi','menu','subMenu'));
        }
        else if($request->id == 305){
            $nama_prodi = "Teknik Lingkungan";
            $subMenu = $nama_prodi;
            return view('pages.detail.dashboard-jurusan', compact('nama_prodi','menu','subMenu'));
        }
        else if($request->id == 306){
            $nama_prodi = "Teknik PWK";
            $subMenu = $nama_prodi;
            return view('pages.detail.dashboard-jurusan', compact('nama_prodi','menu','subMenu'));
        }


    }
    public function listKonten()
    {
        $menu = "Kelola Konten";
        $subMenu = "List Konten";

        $users = User::with(['user_roles'])->where('id', '!=' , Auth::user()->id)->get();

        return view('pages.list-konten', compact('users','menu','subMenu'));
    }

    public function detailDataJurusan(Request $request){
        $menu = "Detail Program Studi";
        $data = json_decode('[{
            "id": 30,
            "nama_data": "Mahasiswa"
        },{
            "id": 10,
            "nama_data": "Dosen"
        },{
            "id": 40,
            "nama_data": "Wisudawan"
        },{
            "id": 41,
            "nama_data": "Wisudawati"
        },{
            "id": 42,
            "nama_data": "Alumni"
        },{
            "id": 43,
            "nama_data": "Rata-Rata IPK"
        },{
            "id": 44,
            "nama_data": "Akhir Masa Studi"
        },{
            "id": 45,
            "nama_data": "Rata-Rata Masa Studi"
        },{
            "id": 46,
            "nama_data": "Raihan DPP"
        }]');
        $kategoriData = "";
        $students = Student::all()->count();
        if($request->id == '30'){
            $id = $request->id;
            $namaData = $data[0]->nama_data;
            $subMenu = $namaData;
            $all_data = Study_program::with(['students'])->get();
            // return $all_data;
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData', 'all_data','menu','subMenu', 'students'));
        }
        else if($request->id == '10'){
            $id = $request->id;
            $namaData = $data[1]->nama_data;
            $subMenu = $namaData;
            $all_data = Courses::with(['lectures'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData', 'all_data','menu','subMenu', 'students'));
        }
        else if($request->id == '40'){
           $id = $request->id;
           $namaData = $data[2]->nama_data;
           $subMenu = $namaData;
           $all_data = Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }
        else if($request->id == '41'){
            $id = $request->id;
            $namaData = $data[3]->nama_data;
            $subMenu = $namaData;
            $all_data =Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }
        else if($request->id == '42'){
            $id = $request->id;
            $namaData = $data[4]->nama_data;
            $subMenu = $namaData;
            $all_data =Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }
        else if($request->id == '43'){
            $id = $request->id;
            $namaData = $data[5]->nama_data;
            $subMenu = $namaData;
            $all_data =Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }else if($request->id == '44'){
            $id = $request->id;
            $namaData = $data[6]->nama_data;
            $subMenu = $namaData;
            $all_data =Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }else if($request->id == '45'){
            $id = $request->id;
            $namaData = $data[7]->nama_data;
            $subMenu = $namaData;
            $all_data =Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }else if($request->id == '46'){
            $id = $request->id;
            $namaData = $data[8]->nama_data;
            $subMenu = $namaData;
            $all_data =Study_program::with(['students'])->get();
            return view('pages.detail.detail-jurusan', compact('data', 'id', 'namaData','all_data','menu','subMenu', 'students'));
        }
        else{
            abort(404, 'Data not Found!');
        }

    }

}
