<?php

namespace App\Services\InnServices;

use App\DTO\Inn\InnDTO;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InnApiServices
{
    private $httpApi = 'https://statusnpd.nalog.ru/api/v1/tracker/taxpayer_status';

    /**
     * @param $inn
     * @return InnDTO
     */
    function requestApi($inn): InnDTO {
        $innDTO = new InnDTO();
        try {
            $response = Http::timeout(60)->post($this->httpApi, [
                'inn' => $inn,
                'requestDate' => date('Y-m-d'),
            ]);
            $date = date('Y-m-d H:i:s');
            $innDTO = InnDTO::createInnDTO($response->json());
            $innDTO->setRequestDate($date);
            $innDTO->setinn($inn);
        } catch (Exception $e) {
            Log::error($e);
        }
        return $innDTO;
    }
}
