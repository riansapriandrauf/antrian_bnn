<?php
$page = $_GET['page'];
require_once '../lib/dompdf/autoload.inc.php';
// mengacu ke namespace DOMPDF
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('chroot', realpath(''));
$dompdf = new Dompdf($options);
// menggunakan class dompdf
// $dompdf = new Dompdf();

ob_start();
switch ($page) {
    case 'skhpn':
        include '../view/pdf/skhpn.php';
        break;
}
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Codingan",array("Attachment"=>0));