<?php

namespace App\Services\InnServices;

class InnAlgorithmServices
{
    /**
     * @var int[]
     */
    private $coefTenSymbol = [2,4,10,3,5,9,4,6,8,0];
    /**
     * @var int[]
     */
    private $coefTwelveSymbolOne = [7,2,4,10,3,5,9,4,6,8,0];
    /**
     * @var int[]
     */
    private $coefTwelveSymbolTwo = [3,7,2,4,10,3,5,9,4,6,8,0];


    /**
     * @param $inn
     * @return bool
     */
    public function validate($inn): bool
    {
        if (strlen($inn) == 10) {
            return $this->validateTenSymbols($inn);
        } else if (strlen($inn) == 12) {
            return $this->validateTwelveSymbols($inn);
        }
        return false;
    }

    /**
     * @param $inn
     * @return bool
     */
    private function validateTenSymbols($inn): bool
    {
        $controlSum = $this->getControlSum($inn, $this->coefTenSymbol);
        $controlNum = $controlSum % 11;
        if ($controlNum > 9) {
            $controlNum = $controlSum % 10;
        }
        if ($controlNum == $inn[9]) {
            return true;
        }
        return false;
    }

    /**
     * @param $inn
     * @return bool
     */
    private function validateTwelveSymbols($inn): bool
    {
        $controlSumOne = $this->getControlSum($inn, $this->coefTwelveSymbolOne);
        $controlNumOne = $controlSumOne % 11;
        if ($controlNumOne > 9) {
            $controlNumOne = $controlSumOne % 10;
        }


        $controlSumTwo = $this->getControlSum($inn, $this->coefTwelveSymbolTwo);
        $controlNumTwo = $controlSumTwo % 11;
        if ($controlNumTwo > 9) {
            $controlNumTwo = $controlSumTwo % 10;
        }

        if ($controlNumOne == $inn[10] && $controlNumTwo == $inn[11]) {
            return true;
        }
        return false;
    }

    /**
     * @param $inn
     * @param $coefArr
     * @return int
     */
    private function getControlSum($inn, $coefArr): int {
        $controlSum = 0;
        for ($i = 0; $i < (strlen($inn) - 1); $i++) {
            $coef = 1;
            if (count($coefArr) >= $i) {
                $coef = $coefArr[$i] == 0 ? 1 : $coefArr[$i];
            }
            $controlSum += $inn[$i] * $coef;
        }
        return $controlSum;
    }
}
