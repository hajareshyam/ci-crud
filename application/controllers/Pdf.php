<?php
require_once dirname(__FILE__).'/../../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('blog');
		// $this->load->library('Html2Pdf/Html2Pdf');
		$this->load->model('Html2pdf_model');
	}

	public function index(){
		
try {
    ob_start();
	$this->load->view('html2pdf');
    $content = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example06.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
	}
}