<?php

namespace Tests\Services\InnServices;

use App\Services\InnServices\InnAlgorithmServices;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class InnAlgorithmServicesTest extends TestCase
{

    public function testValidateTenSymbols()
    {
        $innExisting = '7736509061';
        $innNotExisting = '3256412589';
        $class = new ReflectionClass(InnAlgorithmServices::class);
        $method = $class->getMethod('validateTenSymbols');
        $method->setAccessible(true);

        $obj = new InnAlgorithmServices();

        $result = $method->invoke($obj, $innExisting);
        $this->assertTrue($result);

        $result = $method->invoke($obj, $innNotExisting);
        $this->assertFalse($result);
    }

    public function testValidateTwelveSymbols()
    {
        $innExisting = '505101528209';
        $innNotExisting = '458214567452';
        $class = new ReflectionClass(InnAlgorithmServices::class);
        $method = $class->getMethod('validateTwelveSymbols');
        $method->setAccessible(true);

        $obj = new InnAlgorithmServices();

        $result = $method->invoke($obj, $innExisting);
        $this->assertTrue($result);

        $result = $method->invoke($obj, $innNotExisting);
        $this->assertFalse($result);
    }
}
