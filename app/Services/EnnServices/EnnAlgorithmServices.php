<?php

namespace App\Services\EnnServices;

class EnnAlgorithmServices
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
     * @param $enn
     * @return bool
     */
    public function validate($enn): bool
    {
        if (strlen($enn) == 10) {
            return $this->validateTenSymbols($enn);
        } else if (strlen($enn) == 12) {
            return $this->validateTwelveSymbols($enn);
        }
        return false;
    }

    /**
     * @param $enn
     * @return bool
     */
    private function validateTenSymbols($enn): bool
    {
        $controlSum = $this->getControlSum($enn, $this->coefTenSymbol);
        $controlNum = $controlSum % 11;
        if ($controlNum > 9) {
            $controlNum = $controlSum % 10;
        }
        if ($controlNum == $enn[9]) {
            return true;
        }
        return false;
    }

    /**
     * @param $enn
     * @return bool
     */
    private function validateTwelveSymbols($enn): bool
    {
        $controlSumOne = $this->getControlSum($enn, $this->coefTwelveSymbolOne);
        $controlNumOne = $controlSumOne % 11;
        if ($controlNumOne > 9) {
            $controlNumOne = $controlSumOne % 10;
        }


        $controlSumTwo = $this->getControlSum($enn, $this->coefTwelveSymbolTwo);
        $controlNumTwo = $controlSumTwo % 11;
        if ($controlNumTwo > 9) {
            $controlNumTwo = $controlSumTwo % 10;
        }

        if ($controlNumOne == $enn[10] && $controlNumTwo == $enn[11]) {
            return true;
        }
        return false;
    }

    /**
     * @param $enn
     * @param $coefArr
     * @return int
     */
    private function getControlSum($enn, $coefArr): int {
        $controlSum = 0;
        for ($i = 0; $i < (strlen($enn) - 1); $i++) {
            $coef = 1;
            if (count($coefArr) >= $i) {
                $coef = $coefArr[$i] == 0 ? 1 : $coefArr[$i];
            }
            $controlSum += $enn[$i] * $coef;
        }
        return $controlSum;
    }
}
