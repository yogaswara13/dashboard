<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function detailMahasiswa(){
        $data['mahasiswa'] = [];

        for ($i=0; $i < 7 ; $i++) {
            $angkatan = date("Y") - $i . 1;
            $query = "where=kode_fakultas='UNPAS3' AND mulai_smt=$angkatan";

            $mahasiswa_aktif[] = [
                "angkatan" => (date("Y")-$i),
                "jumlah" => getTotalData('/mahasiswa', $query),
                "jml_mhs_pria" => getTotalData('/mahasiswa', $query." AND id_jenis_kelamin='L'"),
                "jml_mhs_wanita" => getTotalData('/mahasiswa', $query." AND id_jenis_kelamin='P'")
            ];
        }
        for ($i=1; $i < 6; $i++) {
            $query_prodi = "where=kode_fakultas='UNPAS3' AND kode_prodi='30$i' AND mulai_smt BETWEEN 2016 AND 2021";
            $mahasiswa_aktif_prodi[] =[
                "prodi" => "30$i",
                "jumlah" => getTotalData('/mahasiswa', $query_prodi),
                "jumlah_pria" => getTotalData('/mahasiswa', $query_prodi." AND id_jenis_kelamin='L'"),
                "jumlah_wanita" => getTotalData('/mahasiswa', $query_prodi." AND id_jenis_kelamin='P'"),
            ];
        }
        $data['mahasiswa']['prodi'] = $mahasiswa_aktif_prodi;
        $data['mahasiswa']['mhs_aktif'] = array_reverse($mahasiswa_aktif);

        $data['namaData'] = "Mahasiswa";
        $data['subMenu'] = "Mahasiswa";
        $data['menu'] = "Detail Data Fakultas";

        // return $data;

        return view('pages.detail.fakultas.detail-mahasiswa', $data);
    }

    public function detailDosen(){
        $data['namaData'] = "Mahasiswa";
        $data['subMenu'] = "Mahasiswa";
        $data['menu'] = "Detail Data Fakultas";

        $jml_dosen = getTotalData('/dosen', "where=kode_fakultas='UNPAS3'");
        $select = "kode, nama, kewarganegaraan, tgl_lahir, email, nira, id_stat_aktif, id_agama, id_pangkat_gol, nidn, prodi, id_jenjang, id_jabatan_fungsional";
        $data['dosen'] = collect(getData('/dosen', "where=kode_fakultas='UNPAS3'", $jml_dosen, $select, "")->result);

        return view('pages.detail.fakultas.detail-dosen', $data);
    }

    public function detailAlumni(){

        $data_alumni = getData('/mahasiswa/wisuda', "where=FakultasID=3 AND statusMahasiswa='Lulus'", 774, null, '')->result;

        $data['alumni'] = collect($data_alumni);

        $data['namaData'] = "Mahasiswa";
        $data['subMenu'] = "Mahasiswa";
        $data['menu'] = "Detail Data Fakultas";


        return view('pages.detail.fakultas.detail-alumni', $data);
    }
}
