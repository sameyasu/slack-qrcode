<?php
require('../vendor/autoload.php');

use \SlackQrcode\QRImageRenderer;

$text = $_GET['t'] ?? '';

$qr = new QRImageRenderer();
$qr->render($text);
