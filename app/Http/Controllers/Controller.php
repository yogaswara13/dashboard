<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.unpas.ac.id'
        ]);
    }

    public function getRequest($endpoint, $query = null)
    {
        // dd(session()->get('token_pengguna'));
        $finalQuery = '';

        if($query) {
            foreach ($query as $key => $value) {
                // dd(date('Y') - 6 . '1');
                $finalQuery .= $key . '=' . $value;
                
                if ($key != array_key_last($query)) {
                    $finalQuery .= '&';
                }
            }

        }

        // dd($endpoint . '?user_token=' . session()->get('token_pengguna') . '&' . $finalQuery);

        $request = $this->client->get(
            $endpoint . '?user_token=' . session()->get('token_pengguna') . '&' . $finalQuery
        );

        return json_decode($request->getBody());
    }

    public function postRequest($endpoint, $payload)
    {
        // dd(session()->get('token_pengguna'));

        $request = $this->client->post(
            $endpoint,
            [
                'form_params' => array_merge(
                    $payload,
                    [
                        'user_token' => session()->get('token_pengguna')
                    ]
                )
            ]
        );

        return json_decode($request->getBody());
    }
}
