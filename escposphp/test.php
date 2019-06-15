<?php 

include'vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

/*
\\ =  \
\\\\ = \\
*/

$connector = new FilePrintConnector("\\\\192.168.1.6\\bixolon");
$printer   = new Printer($connector);
$printer -> text("PHP 7 :v\n");
$printer -> cut();
$printer -> close();




 ?>