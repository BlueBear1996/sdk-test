<?php

namespace App\Services\InnServices;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InnApiServices
{
    private $httpApi = 'https://statusnpd.nalog.ru/api/v1/tracker/taxpayer_status';

    public function requestApi($inn) {
        $result = null;
        try {
            $response = Http::timeout(60)->post($this->httpApi, [
                'inn' => $inn,
                'requestDate' => date('Y-m-d'),
            ]);
            $result = $response->json();
        } catch (Exception $e) {
            Log::error($e);
        }
        return $result;
    }
}
