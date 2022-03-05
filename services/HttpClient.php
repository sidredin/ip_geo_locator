<?php

namespace Services;

class HttpClient
{
    public function get(string $url): ?string
    {
        $response = @file_get_contents($url);
        if ($response === false) {
            $lastError = error_get_last();
            if (!empty($lastError)) {
                throw new \RuntimeException($lastError['message']);
            }
            throw new \RuntimeException('Неизвестная ошибка');
        }
        return $response;
    }
}