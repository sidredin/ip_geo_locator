<?php

class Sorter
{
    static function sortAlphabet($str)
    {
        $strExploded = explode(' ', $str);

        $strResultArr = [];

        foreach ($strExploded as $word) {
            $wordExploded = [];
            do {
                $wordExploded[] = mb_substr($word, 0, 1, 'utf-8');
            } while ( $word = mb_substr($word, 1, mb_strlen( $word ), 'utf-8'));
            sort ($wordExploded, SORT_STRING);
            $strResultArr[] = implode('', $wordExploded);
        }

        $strResult = implode(' ', $strResultArr);

        return $strResult;
    }
}