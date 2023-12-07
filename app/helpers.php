<?php

use App\Models\ApkBo;
use Illuminate\Support\Facades\Http;

function getDataBo()
{
    return ApkBo::all();
}

function getDataBo2()
{
    $session_id = session('id_bo');
    $bonama = '';
    if ($session_id != '') {
        $bo = ApkBo::where('id', $session_id)->first();
        $bonama = $bo->nama;
    } else {
        $bonama = 'arwana';
    }
    return $bonama;
}


function backToDashboard()
{
    return redirect()->route('dashboard');
}

function getDataBo3()
{
    return ApkBo::orderBy('id', 'ASC')->first();
}

function getUrlApi()
{
    $response = Http::get('https://lotto21top.com/api/apil21');

    if ($response->successful()) { // Perbaiki penulisan dari "f" menjadi "if"

        $url = $response->json()[0]["url"];
        return $url;
    } else {
        // dd($response->status());
        $errorMessage = "Gagal mendapatkan data. Kode status: " . $response->status();
        return $errorMessage;
    }
}

function getDataWebsite()
{
    $url = getUrlApi() . '/api/datawebsite';

    $bearerToken = 'youk1llmyfvcking3x';

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
    ])->get($url);

    if ($response->successful()) {
        $data = $response->json()["data"];
        $websites = array_map(function ($item) {
            return $item['website'];
        }, $data);
        return $websites;
    } else {
        // Tampilkan respon status jika permintaan gagal
        dd($response->status());
    }
}
