<?php
namespace SlackQrcode;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class SlashCommand
{
    use Logger;

    public function qrcode()
    {
        $options = new QROptions([
            'outputType'        => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'          => QRCode::ECC_L,
            'imageBase64'       => false,
            'imageTransparent'  => false,
        ]);

        $qrcode = new QRCode($options);

        $data = 'https://github.com/';
        $this->log()->debug('[data] ' . $data);

        header('Content-Type: image/png');
        echo $qrcode->render($data);
    }
}
