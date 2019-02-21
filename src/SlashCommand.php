<?php
namespace SlackQrcode;

class SlashCommand
{
    use Logger;

    public function qrcode()
    {
        $this->log('this is a test');
        $this->log()->info('this is a test');
        $this->log()->warning('this is a warning');
    }
}
