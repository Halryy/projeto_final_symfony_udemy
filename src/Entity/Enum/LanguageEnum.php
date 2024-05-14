<?php

namespace App\Entity\Enum;

enum LanguageEnum: int
{
    case PORTUGUESE = 1;
    case SPANISH = 2;
    case ENGLISH = 3;

    public static function getOptions(): array
    {
        return [
            "Português" => self::PORTUGUESE->value,
            "Espanhol" => self::SPANISH->value,
            "Inglês" => self::ENGLISH->value,
        ];
    }

    public static function getDescription($languageId): string
    {
        $languages = [
            self::PORTUGUESE->value => "Português",
            self::SPANISH->value => "Espanhol",
            self::ENGLISH->value => "Inglês",
            "" => ""
        ];

        return $languages[$languageId];
    }

    public static function getAbbreviations():array
    {
        return [
            'pt' => self::PORTUGUESE->value,
            'es' => self::SPANISH->value,
            'en' => self::ENGLISH->value
        ];
    }

    public static function getId($abbreviation):string
    {
        $languages = [
            "pt" => self::PORTUGUESE->value,
            "es" => self::SPANISH->value,
            "en" => self::ENGLISH->value,
            "" => ""
        ];

        return $languages[$abbreviation];
    }

    public static function getFlag($languageId): string
    {
        // assets/images/flags/Flag_of_Brazil.svg
        // assets/images/flags/Flag_of_Spain.svg
        // assets/images/flags/Flag_of_the_United_Kingdom.svg
        
        $flags = [
            self::PORTUGUESE->value => '<img width="20" src="/assets/images/flags/Flag_of_Brazil.svg"> Português',
            self::SPANISH->value =>    '<img width="20" src="/assets/images/flags/Flag_of_Spain.svg"> Espanhol',
            self::ENGLISH->value =>    '<img width="20" src="/assets/images/flags/Flag_of_the_United_Kingdom.svg"> Inglês',
            "" => ""
        ];

        return $flags[$languageId];
    }
}