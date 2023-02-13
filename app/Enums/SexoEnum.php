<?php

namespace App\Enums;

enum SexoEnum:string {
    case Feminino = "Feminino";
    case Masculino = "Masculino";

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
