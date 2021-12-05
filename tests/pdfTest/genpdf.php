<?php
use Dompdf\Dompdf;

require_once 'includes/dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml('Brouette');

$dompdf->render();

//$dompdf->stream();