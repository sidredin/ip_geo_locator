<?php

namespace Services;

class Logger implements LoggerInterface
{

    /**
     * @inheritDoc
     */
    public function emergency($message, array $context = array())
    {
        // TODO: Implement emergency() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function alert($message, array $context = array())
    {
        // TODO: Implement alert() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function critical($message, array $context = array())
    {
        // TODO: Implement critical() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function error($message, array $context = array())
    {
        // TODO: Implement error() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function warning($message, array $context = array())
    {
        // TODO: Implement warning() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function notice($message, array $context = array())
    {
        // TODO: Implement notice() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function info($message, array $context = array())
    {
        // TODO: Implement info() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = array())
    {
        // TODO: Implement debug() method.
        echo "$message<br>";
    }

    /**
     * @inheritDoc
     */
    public function log($level, $message, array $context = array())
    {
        // TODO: Implement log() method.
        echo "$message<br>";
    }
}