<?php

require('../vendor/autoload.php');

use \SlackQrcode\SlashCommand;

$params = (isset($_GET['token']) ? $_GET : $_POST);

$SlashCommand = new SlashCommand();
$SlashCommand->qrcode($params);
