<?php

namespace App\Contracts;

interface EnumUtilityContract
{
    public function is(int|string $value): bool;

    /**
     * @return array<string>
     */
    public static function getValues(): array;
}
