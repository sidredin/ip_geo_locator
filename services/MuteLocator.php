<?php

namespace Services;

class MuteLocator implements Locator
{
    private Locator $next;
    private ErrorHandler $handler;

    public function __construct(Locator $next, ErrorHandler $handler)
    {
        $this->next = $next;
        $this->handler = $handler;
    }

    public function locate(Ip $ip): ?Location
    {
        try {
            return $this->next->locate($ip);
        } catch (\RuntimeException $exception) {
            $this->handler->handle($exception);
            return null;
        }
    }
}