<?php
namespace SlackQrcode;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QRCodeException;
use chillerlan\QRCode\QROptions;

class QRImageRenderer
{
    use Logger;

    public function render(string $text)
    {
        $options = new QROptions([
            'outputType'        => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'          => QRCode::ECC_L,
            'imageBase64'       => false,
            'imageTransparent'  => false,
        ]);

        $qrcode = new QRCode($options);

        $decoded = base64_decode($text);
        $this->log()->debug('[text] ' . $decoded);

        try {
            // No cache
            $img = $qrcode->render($decoded);
        } catch (QRCodeException $e) {
            $img = $this->getErrorImage();
        }

        header('Content-Type: image/png');
        header('Content-Length: ' . strlen($img));
        echo $img;
    }

    public function getErrorImage()
    {
        return file_get_contents('../web/images/error.png');
    }
}
