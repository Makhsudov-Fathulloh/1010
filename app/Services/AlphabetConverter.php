<?php

namespace App\Services;

class AlphabetConverter
{
    public static function convert($text)
    {
        $text = mb_strtolower($text, 'UTF-8');

        $cyr = [
            'ш',
            'щ',
            'ч',
            'ё',
            'ю',
            'я',
            'ў',
            'ғ',
            'қ',
            'ҳ',
            'а',
            'б',
            'v',
            'г',
            'д',
            'е',
            'ж',
            'з',
            'и',
            'й',
            'к',
            'л',
            'м',
            'н',
            'о',
            'п',
            'р',
            'с',
            'т',
            'у',
            'ф',
            'х',
            'ц',
            'э',
            'ы',
            'ъ',
            'ь'
        ];
        $lat = [
            'sh',
            'sh',
            'ch',
            'yo',
            'yu',
            'ya',
            'o\'',
            'g\'',
            'q',
            'h',
            'a',
            'b',
            'v',
            'g',
            'd',
            'e',
            'j',
            'z',
            'i',
            'y',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'r',
            's',
            't',
            'u',
            'f',
            'x',
            'ts',
            'e',
            'y',
            '',
            ''
        ];

        // 1. Kirilldan Lotinga o'girish
        $latinVariant = str_replace($cyr, $lat, $text);

        // 2. Lotindan Kirillga o'girish (murakkabroq birikmalar bilan)
        $latToCyr = [
            'sh' => 'ш',
            'ch' => 'ч',
            'yo' => 'ё',
            'yu' => 'ю',
            'ya' => 'я',
            'o\'' => 'ў',
            'g\'' => 'ғ',
            'a' => 'а',
            'b' => 'б',
            'v' => 'в',
            'g' => 'г',
            'd' => 'д',
            'e' => 'е',
            'j' => 'ж',
            'z' => 'з',
            'i' => 'и',
            'y' => 'й',
            'k' => 'к',
            'l' => 'л',
            'm' => 'м',
            'n' => 'н',
            'o' => 'о',
            'p' => 'п',
            'r' => 'р',
            's' => 'с',
            't' => 'т',
            'u' => 'у',
            'f' => 'ф',
            'x' => 'х',
            'q' => 'қ',
            'h' => 'ҳ',
            'ts' => 'ц'
        ];
        $cyrillicVariant = str_replace(array_keys($latToCyr), array_values($latToCyr), $text);

        return [
            'latin' => $latinVariant,
            'cyrillic' => $cyrillicVariant
        ];
    }
}
