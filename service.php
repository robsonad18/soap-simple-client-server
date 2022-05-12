<?php 

require __DIR__."/client.php";

$obClient = new Client();
echo $obClient->getName(1);