<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class InnCacheRepository
{
    /**
     * @param $inn - inn user
     * @param $requestTime - request time
     * @return void
     */
    function addInnInfo($inn, $requestTime) {
        Cache::put($inn, $requestTime);
    }


    /**
     * @param $inn
     * @return string - request time
     */
    function getInnInfo($inn): string {
        return Cache::get($inn);
    }

}
