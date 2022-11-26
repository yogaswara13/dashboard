<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function detailMahasiswa(){
        $data['mahasiswa'] = [];
        $data['mahasiswa']['mhs_aktif'] = [];

        $tahun_angkatan = [];

        for ($i=0; $i < 7; $i++) { 
            array_push($tahun_angkatan, date('Y') - $i . '1', date('Y') - $i . '2', date('Y') - $i . '3');
            array_push($data['mahasiswa']['mhs_aktif'], 
            [
                'angkatan' => strval(date('Y') - $i),
                'jumlah' => 0,
                'jml_mhs_pria' => 0,
                'jml_mhs_wanita' => 0,
            ]
            );
        }

        $mahasiswa_aktif = $this->postRequest(
            '/mahasiswa',
            [
                'select' => 'count(*) as jumlah, mulai_smt as angkatan',
                'group' => 'mulai_smt', 'id_jenis_kelamin',
                'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL'
            ]
            )->result;

        $mahasiswa_laki_laki_aktif = $this->postRequest(
            '/mahasiswa',
            [
                'select' => 'count(*) as jumlah, mulai_smt as angkatan',
                'group' => 'mulai_smt', 'id_jenis_kelamin',
                'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL AND id_jenis_kelamin="L"'
            ]
            )->result;

        $mahasiswa_perempuan_aktif = $this->postRequest(
            '/mahasiswa',
            [
                'select' => 'count(*) as jumlah, mulai_smt as angkatan',
                'group' => 'mulai_smt', 'id_jenis_kelamin',
                'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL AND id_jenis_kelamin="P"'
            ]
            )->result;

        $mahasiswa_prodi = $this->postRequest(
            '/mahasiswa',
            [
                'select' => 'count(*) as jumlah, kode_prodi as prodi',
                'group' => 'kode_prodi',
                'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL'
            ]
            )->result;

        $mahasiswa_laki_laki_prodi = $this->postRequest(
            '/mahasiswa',
            [
                'select' => 'count(*) as jumlah, kode_prodi as prodi',
                'group' => 'kode_prodi',
                'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL AND id_jenis_kelamin="L"'
            ]
            )->result;

        $mahasiswa_perempuan_prodi = $this->postRequest(
            '/mahasiswa',
            [
                'select' => 'count(*) as jumlah, kode_prodi as prodi',
                'group' => 'kode_prodi',
                'where' => 'kode_fakultas="UNPAS3" AND mulai_smt IN (' . implode(',', $tahun_angkatan) . ') AND tgl_keluar IS NOT NULL AND id_jenis_kelamin="P"'
            ]
            )->result;

        foreach ($mahasiswa_prodi as $key => $value) {
            $value->jumlah_pria = $value->prodi == $mahasiswa_laki_laki_prodi[$key]->prodi ? $mahasiswa_laki_laki_prodi[$key]->jumlah : 0;
            $value->jumlah_wanita = $value->prodi == $mahasiswa_perempuan_prodi[$key]->prodi ? $mahasiswa_perempuan_prodi[$key]->jumlah : 0;
        }

        $data['mahasiswa']['prodi'] = $mahasiswa_prodi;

        foreach ($mahasiswa_aktif as $value) {
            foreach ($mahasiswa_laki_laki_aktif as $valueLaki) {
                if($valueLaki->angkatan == $value->angkatan) {
                    $value->jml_mhs_pria = $valueLaki->jumlah;
                    break;
                } else {
                    $value->jml_mhs_pria = 0;
                }
            }

            foreach ($mahasiswa_perempuan_aktif as $valuePerempuan) {
                if($valuePerempuan->angkatan == $value->angkatan) {
                    $value->jml_mhs_wanita = $valuePerempuan->jumlah;
                    break;
                } else {
                    $value->jml_mhs_wanita = 0;
                }
            }
        }

        foreach ($data['mahasiswa']['mhs_aktif'] as $key => $value) {
            foreach ($mahasiswa_aktif as $value_mahasiswa) {
                if(strpos($value_mahasiswa->angkatan, $value['angkatan']) !== false) {
                    $value['jumlah'] += $value_mahasiswa->jumlah;
                    $value['jml_mhs_pria'] += $value_mahasiswa->jml_mhs_pria;
                    $value['jml_mhs_wanita'] += $value_mahasiswa->jml_mhs_wanita;
                }
            }
            $data['mahasiswa']['mhs_aktif'][$key] = $value;
        }

        $data['mahasiswa']['mhs_aktif'] = array_reverse($data['mahasiswa']['mhs_aktif']);
        
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
