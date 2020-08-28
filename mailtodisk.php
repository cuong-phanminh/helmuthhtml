<?php
$input = file_get_contents('php://stdin');
$filename = '/xampp/mailoutput/mail-' . gmdate('Ymd-Hi-s') . '.txt';
$retry = 0;
while(is_file($filename))
{
    $filename = '/xampp/mailoutput/mail-' . gmdate('Ymd-Hi-s') . '-' . ++$retry . '.txt';
}
file_put_contents($filename, $input);
?>