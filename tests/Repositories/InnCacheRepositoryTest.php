<?php

namespace Tests\Repositories;

use App\Repositories\InnCacheRepository;
use Tests\TestCase;


class InnCacheRepositoryTest extends TestCase
{
    protected InnCacheRepository $innCacheRepository;

    public function testPutAndGetInnInfo()
    {
        $this->innCacheRepository = new InnCacheRepository();

        $testInn = '111111111111';
        $date = strtotime(date('Y-m-d H:i:s'));

        $this->innCacheRepository->addInnInfo($testInn, $date);

        $this->assertNotNull($this->innCacheRepository->getInnInfo($testInn));
    }


}
