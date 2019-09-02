<?php

declare(strict_types=1);

namespace App;

class NumeralGenerator implements Generatable
{
    /**
     * @var array
     */
    private $numerals = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    /**
     * Converts a number into a string
     *
     * @param  int    $number
     * @return string
     */
    public function generate(int $number): string
    {
        return $this->compositionToString(
            $this->numberToComposition($number)
        );
    }

    /**
     * Breaks a number down into composing numerals
     *
     * @param  int    $number
     * @return array
     */
    private function numberToComposition(int $number)
    {
        $composition = [];

        foreach ($this->numerals as $numeral => $value) {
            $count = floor($number / $value);

            if ($count) {
                $number -= $value * $count;

                $composition[$numeral] = $composition[$numeral] ?? 0 + $count;
            }
        }

        return $composition;
    }

    /**
     * Turns an array of composing numeral parts into a string
     *
     * @param  array  $composition
     * @return string
     */
    private function compositionToString(array $composition): string
    {
        return implode(
            array_map(function (string $numeral, int $value) {
                return str_repeat($numeral, $value);
            }, array_keys($composition), $composition)
        );
    }
}
