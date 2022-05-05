<?php 

require_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

class Pdf extends Dompdf {
    public function __construct() {
        parent::__construct();
    }
}


if (isset($_POST['report-content']) && $_POST['report-content'] != "") {
    $file_name = "report.pdf";
    $html = '<link rel="stylesheet" href="styles/reset.css" /> <link rel="stylesheet" href="styles/admin.css" />';
    $html .= $_POST['report-content'];

    $pdf = new Pdf();
    $pdf->load_html($html);
    $pdf->render();
    $pdf->stream($file_name, array("Attachment" => false));
}
?>