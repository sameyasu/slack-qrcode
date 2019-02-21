<?php

require('../vendor/autoload.php');

use \SlackQrcode\SlashCommand;

$SlashCommand = new SlashCommand();
$SlashCommand->qrcode();
