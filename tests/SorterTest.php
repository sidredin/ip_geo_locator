<?php

use PHPUnit\Framework\TestCase;

final class SorterTest extends TestCase
{
    public function testSortAlphabet()
    {
        $this->assertEquals(
            [
                'elmno aegnor aaabnn aelpp',
                'илмно аеилнпсь аабнн бклооя',
                'ααββγγ αααβββγγγ',
            ],
            [
                \Sorter::sortAlphabet('lemon orange banana apple'),
                \Sorter::sortAlphabet('лимон апельсин банан яблоко'),
                \Sorter::sortAlphabet('αβγαβγ αβγαβγαβγ')
            ]
        );
    }
}