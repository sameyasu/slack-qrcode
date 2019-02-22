<?php
namespace SlackQrcode;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class SlashCommand
{
    use Logger;

    public function qrcode(array $params)
    {
        $token = $params['token'] ?? '';
        if (!$this->isValidToken($token)) {
            $this->log('Invalid token: ' . $token);
            $this->respondError('Invalid Request');
            return;
        }

        echo $this->getQrcodeRenderURL($params['text']);
    }

    protected function getQrcodeRenderURL(string $text) : string
    {
        return sprintf('https://%s/img/%s', $_SERVER['HTTP_HOST'], urlencode($text));
    }

    protected function isValidToken(string $token) : bool
    {
        $valid = getenv('SLASH_COMMAND_TOKEN');
        if (empty($valid)) {
            $this->log()->error('Not set Variable... SLASH_COMMAND_TOKEN');

            return false;
        }

        return ($token === $valid);
    }

    protected function respondError(string $message)
    {
        header('Content-Type: text/plain; charset=UTF-8');
        echo $message;
    }
}
