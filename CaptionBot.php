<?php

/* CaptionBot
 * 
 * Automatically Picture Caption generator
 *
 * https://github.com/kihanb/CaptionBot
 *
*/ 

function CaptionBot($image_url)
{
    $ch = curl_init('https://captionbot.azurewebsites.net/api/messages');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['Type' => 'CaptionRequest', 'Content' => $image_url]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response);

    return $response;
}

?>
