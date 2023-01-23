<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

function getToken($value){
    return $value;
}

function getUrl(){
    $url = "https://api.unpas.ac.id";
    return $url;
}

function initTokenKlien($username, $password){

    $res = Http::asForm()->post( getUrl() . '/klien/login', [
        'kode' => $username,
        'password' => $password
    ]);

    $dres = json_decode($res->getBody()->getContents());

    return $dres;
}

function initTokenPengguna($username, $password){
    $res = Http::asForm()->post( getUrl() . '/pengguna/otorisasi', [
        'username' => $username,
        'password' => $password,
        'token' => session('token_klien')
    ]);

    $dres = json_decode($res->getBody()->getContents());

    dd($dres);

    if($dres->code == 200){
        session()->put('token_pengguna', $dres->result->user_token);
        session()->put('user_role', $dres->result->kelompok);
    }else{
        return false;
    }
}

function initUser(){
    $username = session('username');
    $token = session('token_klien');
    $client = new Client();
    $req = $client->get( getUrl() . "/pengguna?token=$token&where=kode='$username'", ['verify' => false]);

    $res = json_decode($req->getBody()->getContents());

    dd($res);

    if($res->code == 200){
        session()->put('users', $res->result[0]);
    }else{
        return false;
    }
}

function getData($url, $query, $limit, $select, $order){

    $token = "?user_token=".session()->get('token_pengguna');
    $query = "&".$query;
    $limit = "&limit=".$limit;
    $order = "&order=".$order;
    $select = "&select=".$select;
    // return $url.$token.$query.$limit.$order;

    $client = new Client();
    $request = $client->get(getUrl().$url.$token.$query.$select.$limit.$order, ['verify' => false]);

    $response = json_decode($request->getBody()->getContents());
    return $response;
}

function getTotalData($url, $query){
    $token = "?user_token=".session()->get('token_pengguna');
    $query = "&".$query;
    // return $url.$token.$query.$limit.$order;

    $client = new Client();
    $request = $client->get(getUrl().$url.$token.$query, ['verify' => false]);

    $response = json_decode($request->getBody()->getContents());
    return $response->jumlah_data;
}


function angkatanAms(){
    $now_year = date("Y");

    $ams = $now_year - 6;

    $ams .= "1";

    return "'$ams'";
}

function getDataProdi(){
    $select = "kode_hash, kode, kode_fakultas, fakultas, singkatan_fakultas, kode_unit_kerja, nama, prodi, singkatan_prodi, stat_prodi";
    $prodi = getData('/master/prodi', "where=kode_fakultas='UNPAS3'", 0, $select, "")->result;

    session()->put('data_prodi', $prodi);
}



