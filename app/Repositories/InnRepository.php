<?php

namespace App\Repositories;

use App\DTO\Inn\InnDTO;
use App\Services\InnServices\InnApiServices;
use Cache;

class InnRepository
{
    protected InnApiServices $innApiServices;

    /**
     * @param InnApiServices $innApiServices
     */
    public function __construct(InnApiServices $innApiServices)
    {
        $this->innApiServices = $innApiServices;
    }


    /**
     * @param $inn
     * @return InnDTO
     */
    function getInnInfo($inn): InnDTO
    {
        if (Cache::get($inn) == null) {
            $innObj = $this->innApiServices->requestApi($inn);
            Cache::put($inn, serialize($innObj), now()->hours(24));
            return $innObj;
        } else
            return unserialize(Cache::get($inn));
    }
}
