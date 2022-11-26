<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function detailProdi(Request $request){
        $select_data = "kode_hash, kode, kode_fakultas, fakultas, singkatan_fakultas, kode_unit_kerja, nama, prodi, singkatan_prodi, stat_prodi";

        $data['detail_prodi'] = $this->getRequest(
            '/master/prodi',
            [
                'select' => $select_data,
                'where' => 'kode=' . $request->kode
            ]
            )->result[0];

        $data['jml_mahasiswa'] = $this->getRequest(
            '/mahasiswa/count',
            [
                'where' => 'mulai_smt BETWEEN "2016" AND "2022" AND kode_prodi = ' . $request->kode
            ]
            )->jumlah_data;

        $data['jml_dosen'] = $this->getRequest(
            '/dosen/count',
            [
                'where' => 'kode_hash_prodi = "' . $request->id . '"'
            ]
            )->jumlah_data;

        $alumni = $this->getRequest(
            '/mahasiswa/wisuda',
            [
                'where' => 'statusMahasiswa="Lulus" AND ProdiID=' . $request->kode
            ]
            );
        $data['jml_alumni'] = $alumni->jumlah_data;

        $tahun = date('n') >= 8 ? date("Y") : date("Y") - 1;

        $data['jml_dpp'] = $this->getRequest(
            '/mahasiswa/dpp',
            [
                'where' => 'kode_prodi=' . $request->kode . ' AND kode_tahun=' . $tahun
            ]
            )->jumlah_data;

        $data['avg_ipk'] = $this->getRequest(
            '/mahasiswa/rerataIpk',
            [
                'where' => 'kode_prodi=' . $request->kode
            ]
            )->result[0]->rerata_ipk;

        $data['ams_mhs'] = $this->getRequest(
            '/mahasiswa/count',
            [
                'where' => 'kode_prodi=' . $request->kode . ' AND mulai_smt=' . strval(date('Y') - 6) . '1 AND tgl_keluar IS NOT NULL'
            ]
            )->jumlah_data;

        $data['menu'] = "dashboard";
        $data['subMenu'] = "Detail Prodi";

        return view('pages.detail.jurusan.detail-prodi', $data);
    }

    public function detailDataMahasiswa(Request $request){
        $data['menu'] = "dashboard";
        $data['subMenu'] = "Detail Prodi";
        $select_data_prodi = "kode_hash, kode, kode_fakultas, fakultas, singkatan_fakultas, kode_unit_kerja, nama, prodi, singkatan_prodi, stat_prodi";
        $data['detail_prodi'] = getData('/master/prodi', "where=kode_hash='$request->id'", 0, $select_data_prodi, '')->result[0];
        $select_data_mhs = "kode, nama, tgl_keluar, tgl_create, mulai_smt, id_jenis_kelamin, email, kewarganegaraan";
        $angkatan = session('angkatan_query');
        $jml_mhs = getTotalData('/mahasiswa/count', "where=kode_fakultas='UNPAS3' AND kode_prodi='$request->kode' AND mulai_smt BETWEEN '2016' AND '2022'", NULL);
        $data['data_mahasiswa'] = collect(getData('/mahasiswa', "where=kode_fakultas='UNPAS3' AND kode_prodi='$request->kode' AND mulai_smt BETWEEN '2016' AND '2022'", $jml_mhs, $select_data_mhs, 'KODE')->result);

        return view('pages.detail.jurusan.detail.data-mahasiswa', $data);
    }

    public function detailDataDosen(Request $request){
        $data['menu'] = "dashboard";
        $data['subMenu'] = "Detail Prodi";
        $select_data = "kode, kode_dosen, nidn, nama, nidn_nama, id_status_dosen, status_dosen, id_jabatan_fungsional, jabatan_fungsional, dosen, gelar_depan, gelar_belakang, sebutan, id_kelamin, kelamin, id_status_kerja, umur, email, path_to_foto, pengawas";
        $jml_data = getTotalData('/dosen/profil', "where=kode_prodi_homebase=$request->kode");
        $data['data_dosen'] = collect(getData('/dosen/profil', "where=kode_prodi_homebase=$request->kode", $jml_data, $select_data , NULL)->result);

        return view('pages.detail.jurusan.detail.data-dosen', $data);
    }

    public function detailDataAlumni(Request $request){
        $data['menu'] = "dashboard";
        $data['subMenu'] = "Detail Prodi";
        $select_data_prodi = "kode_hash, kode, kode_fakultas, fakultas, singkatan_fakultas, kode_unit_kerja, nama, prodi, singkatan_prodi, stat_prodi";
        $data['detail_prodi'] = getData('/master/prodi', "where=kode_hash='$request->id'", 0, $select_data_prodi, '')->result[0];
        $select_data_alumni = "MhswID, nama, StatusMahasiswa, NamaProgram, Kelamin, WaktuWisuda, Verifikasi";
        $angkatan = session('angkatan_query');
        $jml_alumni = getTotalData('/mahasiswa/wisuda', "where=FakultasID=3 AND statusMahasiswa='Lulus' AND ProdiID='$request->kode'");
        // return $jml_alumni;
        $data['data_alumni'] = collect(getData('/mahasiswa/wisuda', "where=FakultasID=3 AND statusMahasiswa='Lulus' AND ProdiID='$request->kode'", 700, $select_data_alumni, '')->result);
        // Tidak bisa get data alumni jika > 800 data

        $data['data_alumni_by_verifikasi'] = [];
        foreach ($data['data_alumni']->groupBy('Verifikasi') as $key => $value) {
            if ($key == "Y") {
                $title = "Terverifikasi";
                $color_code = "#3b8bba";
            }else if($key == "N"){
                $title = "Belum Terverifikasi";
                $color_code = "#D81B60";
            }
            $data['data_alumni_by_verifikasi'][] = [
                'title' => $title,
                'color_code' => $color_code,
                'total_data' => count($value)
            ];
        }

        return view('pages.detail.jurusan.detail.data-alumni', $data);
    }

    public function detailDataIpk(Request $request){

        return view('pages.detail.jurusan.detail.data-ipk');
    }

    public function detailDataAms(Request $request){

        $data['menu'] = "dashboard";
        $data['subMenu'] = "Detail Prodi";
        $select_data_prodi = "kode_hash, kode, kode_fakultas, fakultas, singkatan_fakultas, kode_unit_kerja, nama, prodi, singkatan_prodi, stat_prodi";
        $data['detail_prodi'] = getData('/master/prodi', "where=kode_hash='$request->id'", 0, $select_data_prodi, '')->result[0];
        $select_data_ams = "kode, nama, tgl_keluar, tgl_create, mulai_smt, id_jenis_kelamin, email, kewarganegaraan";
        $angkatan_ams = angkatanAms();
        $jml_ams = getTotalData('/mahasiswa/count', "where=kode_fakultas='UNPAS3' AND kode_prodi='$request->kode' AND mulai_smt=$angkatan_ams AND tgl_keluar IS NOT NULL", 0, NULL, 'KODE');
        $data['data_mhs_ams'] = collect(getData('/mahasiswa', "where=kode_fakultas='UNPAS3' AND kode_prodi='$request->kode' AND mulai_smt=$angkatan_ams AND tgl_keluar IS NOT NULL", $jml_ams, $select_data_ams, 'KODE')->result);

        $data['data_ams_by_kelamin'] = [];
        foreach ($data['data_mhs_ams']->groupBy('id_jenis_kelamin') as $key => $value) {
            if ($key == "L") {
                $jk = "Pria";
                $color_code = "#3b8bba";
            }else if($key == "P"){
                $jk = "Wanita";
                $color_code = "#D81B60";
            }
            $data['data_ams_by_kelamin'][] = [
                'jenis_kelamin' => $jk,
                'color_code' => $color_code,
                'total_data' => count($value)
            ];
        }
        return view('pages.detail.jurusan.detail.data-ams', $data);
    }

    public function detailDataDpp(Request $request){
        $data['menu'] = "dashboard";
        $data['subMenu'] = "Detail Prodi";

        if (date('n') >= 8) {
            $kode_tahun = date("Y");
        }else{
            $kode_tahun = date("Y") - 1;
        }
        $jml_dpp = getTotalData('/mahasiswa/dpp', "where=kode_prodi='$request->kode' AND kode_tahun='$kode_tahun'");
        $data['data_dpp'] = collect(getData('/mahasiswa/dpp', "where=kode_prodi='$request->kode' AND kode_tahun='$kode_tahun'", $jml_dpp, NULL, '')->result);

        $data['dpp_25'] = collect(getData('/mahasiswa/dpp', "where=kode_prodi='$request->kode' AND kode_tahun='$kode_tahun' AND persen<=25", $jml_dpp, NULL, '')->result);

        $data['dpp_50'] = collect(getData('/mahasiswa/dpp', "where=kode_prodi='$request->kode' AND kode_tahun='$kode_tahun' AND persen>25 AND persen <=50", $jml_dpp, NULL, '')->result);

        $data['dpp_75'] = collect(getData('/mahasiswa/dpp', "where=kode_prodi='$request->kode' AND kode_tahun='$kode_tahun' AND persen>50 AND persen <=75", $jml_dpp, NULL, '')->result);

        $data['dpp_100'] = collect(getData('/mahasiswa/dpp', "where=kode_prodi='$request->kode' AND kode_tahun='$kode_tahun' AND persen=100", $jml_dpp, NULL, '')->result);


        // return $data;

        return view('pages.detail.jurusan.detail.data-dpp', $data);
    }

}
