<?php
require_once dirname(__FILE__) . '/../../vendor/autoload.php';
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog');
        $this->load->model('Html2pdf_model');
    }

    public function index()
    {
        try {
            ob_start();
            $this->load->view('html2pdf');
            $content = ob_get_clean();
            $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', 0);
            $html2pdf->setDefaultFont("times");
            $html2pdf->writeHTML($content);
            $html2pdf->output('example06.pdf');
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
    }

    public function graphtoimg(){
        require_once dirname(__FILE__) . '/../../assets/jpgraph/jpgraph.php';
        require_once dirname(__FILE__) . '/../../assets/jpgraph/jpgraph_bar.php';

        $datay=array(100,105,85,50);
        // Create the graph. These two calls are always required
        $graph = new Graph(350,220,'auto');
        $graph->SetScale("textlin");

        // set major and minor tick positions manually
        $graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
        $graph->SetBox(false);

        //$graph->ygrid->SetColor('gray');
        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels(array('Product 1','Product 2','Product 3','Proposed product'));
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);

        // Create the bar plots
        $b1plot = new BarPlot($datay);

        // ...and add it to the graPH
        $graph->Add($b1plot);
        $b1plot->SetColor("white");
        
        // The bars will haev individual colors 
        $b1plot->SetFillColor(array('red','blue','green')); 
        // $b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
        $b1plot->SetWidth(45);
        $graph->title->Set("Vol Saving XXXX LTRS YY%");
        $graph->Stroke(dirname(__FILE__).'/../../assets/pieChart.png');
    } 

    public function GroupedBarGraphs(){
        require_once dirname(__FILE__) . '/../../assets/jpgraph/jpgraph.php';
        require_once dirname(__FILE__) . '/../../assets/jpgraph/jpgraph_bar.php';

        $data1y=array(12,19);
        $data2y=array(8,11);
        
        // Create the graph. These two calls are always required
        $graph = new Graph(350,220,'auto');
        $graph->SetScale("textlin");
        
        $graph->SetShadow();
        $graph->img->SetMargin(40,30,20,40);
        
        // Create the bar plots
        $b1plot = new BarPlot($data1y);
        // $b1plot->SetFillColor('black');
        $b1plot->SetFillColor('#E234A9'); 
        $b2plot = new BarPlot($data2y);
        // $b2plot->SetFillColor("blue");
        
        // Create the grouped bar plot
        $gbplot = new GroupBarPlot(array($b1plot,$b2plot));
        
        // ...and add it to the graPH
        $graph->Add($gbplot);
        
        // $graph->title->Set("Example 21");
        $graph->xaxis->SetTickLabels(array('Product 1','Product 2'));
        // $graph->yaxis->title->Set("Y-title");
        
        $graph->title->SetFont(FF_FONT1,FS_BOLD);
        $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
        $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
        $graph->Stroke(dirname(__FILE__).'/../../assets/gbgraph.png');
    } 
}
