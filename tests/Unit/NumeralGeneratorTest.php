<?php

declare(strict_types=1);

namespace Tests\Unit\Numerals;

use App\NumeralGenerator;
use PHPUnit\Framework\TestCase;

class NumeralGeneratorTest extends TestCase
{
    /**
     * @var NumeralGenerator
     */
    public $converter;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->converter = new NumeralGenerator;
    }

    /**
     * @dataProvider numbersProvider
     * @param  int    $number
     * @param  string $numeral
     * @return void
     */
    public function testItCanConvertNumberToNumerals(int $number, string $numeral)
    {
        $this->assertEquals($numeral, $this->converter->generate($number));
    }

    /**
     * @return array
     */
    public function numbersProvider()
    {
        return require __DIR__ . '/../_support/numerals.php';
    }
}
