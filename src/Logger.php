<?php
namespace SlackQrcode;

use \Monolog\Handler\StreamHandler;

trait Logger
{
    private $logger = null;

    protected function log($msg = null)
    {
        if ($this->logger === null) {
            $this->logger = new \Monolog\Logger(__CLASS__);
            $this->logger->pushHandler(
                new StreamHandler('php://stderr', \Monolog\Logger::DEBUG)
            );
        }

        if ($msg !== null) {
            $this->logger->info($msg);
        }
        return $this->logger;
    }
}
