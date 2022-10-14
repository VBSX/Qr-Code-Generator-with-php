<?php
// coloque o comando no terminal:
//mkdir php-qr-code-generator
// mkdir php-qr-code-generator/src/QR/Image
// mkdir php-qr-code-generator/src/QR/Options
// mkdir php-qr-code-generator/public/img

// cd php-qr-code-generator


//depois use o composer para baixar a biblioteca:
//composer require chillerlan/php-qrcode

// tambem é necessário colocar o autoload no require do composer.json

declare(strict_types=1);
require __DIR__ . './../vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 5,
  ]
);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Create QR Codes in PHP</title>
  <link rel="stylesheet" href="/css/styles.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <form method="post" id= "formulario">
        Text for Qrcode: <input type="text" name="input_user" id="texto"><br>
        <input type="submit" id="submit">
        <div>
            <?php 
            if(array_key_exists("input_user", $_POST)) 
            {
              $user_insert =  $_POST["input_user"];
              if(empty($user_insert))
              {
                echo "Cannot be empty!";
              }
            else
            {
              $qrcode = (new QRCode($options))->render($user_insert);
              echo'<img src="'.$qrcode.'" alt="QR Code" width="30%" height="30%">';
            }}?>
        </div> 
    </div>
</form>
</div>
</body>
</html>