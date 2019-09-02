<?php

declare(strict_types=1);

namespace App;

interface Generatable
{
    public function generate(int $number): string;
}
