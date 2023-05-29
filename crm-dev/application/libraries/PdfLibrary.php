<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpexcel/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend as ChartLegend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PdfLibrary {
 
 
    /**
    * Create excel by from direct request
    */
    private $objPHPExcel;


    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->helper('download');
        $this->CI->load->database();
        $this->CI->load->model('Common_model');
         $this->objPHPExcel = new Spreadsheet();


    }

    public function classwise_report($data = null) {

        try {

               
$filename = time().'_classwise_write.xls';
$htmlString = '<table>
                  <tr>
                      <td>Hello World</td>
                  </tr>
                  <tr>
                      <td>Hello<br />World</td>
                  </tr>
                  <tr>
                      <td>Hello<br>World</td>
                  </tr>
              </table>';

// $data['year']=$this->input->get('year');
// $data['class']=$this->input->get('class');
// $data['term']=$this->input->get('term');
// $data['subject']=$this->input->get('subject');
$observations = $this->CI->Common_model->getAll('observations');

$reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
$msg = $this->CI->load->view('institutional-activity-report/classwise-report',$data, true);
//print_r($msg);
//die(); 

$spreadsheet = $reader->loadFromString($msg);
$spreadsheet->getActiveSheet()->getStyle('E6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('G6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('H6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('I6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('J6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('K6')->getAlignment()->setTextRotation(90)->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('L6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('M6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('N6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('O6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('P6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('Q6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('R6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('S6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('T6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('U6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('V6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('W6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('X6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('Y6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('Z6')->getAlignment()->setTextRotation(90)->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('AA6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AB6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AC6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AD6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AE6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AF6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AG6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AH6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AI6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AJ6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AK6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AL6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AM6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AN6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AO6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AP6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AQ6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AR6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AS6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AT6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AU6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AV6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AW6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AX6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AY6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('AZ6')->getAlignment()->setTextRotation(90)->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('BA6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BB6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BC6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BD6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BE6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BF6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BG6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BH6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BI6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BJ6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BK6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BL6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BM6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BN6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BO6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BP6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BQ6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BR6')->getAlignment()->setTextRotation(90)->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('BS6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BT6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BU6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BV6')->getAlignment()->setTextRotation(90)->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('BW6')->getAlignment()->setTextRotation(90)->setWrapText(true);

$i = 66;

/* $sql = $this->CI->db->query("select r.* from report r,o.name from observations o where r.observation_id = o.id");
             
        $query = $sql->result(); */

        $sql =    $this->CI->db->query('r.student_id, o.name')
     ->from('observations as o')
     ->from('report as r')
     ->where('o.id', 'r.observation_id')
     ->get();


       echo "<pre>"; print_r($sql);die();

if(!empty($observations)){
    foreach($observations as $observation){
        $alpha = 'C'.chr($i).'6';
        $spreadsheet->getActiveSheet()->getStyle($alpha)->getAlignment()->setTextRotation(90)->setWrapText(true);
        $i++;
    }
}




//$spreadsheet->getActiveSheet()->getStyle('BR6')->getAlignment()->setTextRotation(90)->setWrapText(true);
//$reader->load($this->CI->load->view('institutional-activity-report/classwise-report',TRUE));

//$reader->load(FCPATH."application/libraries/index.html");//$reader->loadFromString($htmlString);

$writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save($filename); 


$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($filename);
$phpWord = $reader->load($filename);
// use \PhpOffice\PhpSpreadsheet\Style\Border;

// $phpWord ->getDefaultStyle()->applyFromArray(
//             [
//                 'borders' => [
//                     'allBorders' => [
//                         'borderStyle' => Border::BORDER_THIN,
//                         'color' => ['rgb' => '000000'],
//                     ],
//                 ]
//             ]
//         );

$xmlWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($phpWord,'Mpdf');

$xmlWriter->writeAllSheets();
//$xmlWriter->setFooter("Sdfsdf");
$num = rand(00, 99);
//create folder named files
$xmlWriter->save("helloWorld$num.pdf");

        } catch(Exception $e) {
            exit($e->getMessage());
        }

       // force_download($filename, NULL);

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);
        

        //header("Content-Disposition: attachment; filename=".$filename);
       // unlink($filename);
        exit();

    }


  public function skillwise_report($data = null) {
    //$skillArray = [];            		
    

        //print_r($data);

        $worksheet = $this->objPHPExcel->getActiveSheet();
        $school_details=$this->CI->NewInstituteModel->get_school_id($data['school']);


        if(!empty($data['students'])){
            $allStudentIdNew = [];
            $k = 0;
            foreach($data['students'] as $allNewS ){
                $allStudentIdNew[$k] = $allNewS->id;
                $k++;

            }
                
                $sql = $this->CI->db->query("select * from  report  where student_id IN (".implode(',',$allStudentIdNew).") AND  term='".$data['term']."'  and subject='".$data['subject']."'");
                    //echo "select * from  report  where student_id IN (".implode(',',$allStudentIdNew).") AND  term='".$data['term']."' and year='".$data['year']."' and subject='".$data['subject']."'";
                    // die();
                $query = $sql->result();
                $allStudentId = [];
                $reportid = [];
                if(!empty($query)){
                    $i = 0;
                    foreach($query as $student){
                        $allStudentId[$i][] =  $student->student_id;
                        $reportid[$i] =  $student->id;
                        $i++;
                    }
                }
        }

       

     



$skilDataArray = array(['Name of School', $data['school'],'','','Assessment Report','Baseline'],
                            ['Address', $school_details['address'],'','','Subject',$data['subject']],
                            ['Date of Assessment',$data['year'],'','','Class',$data['class']],
                            [''],
                            [''],
                            [''],
                            [''],
                            ['','','','','','Independent','Cue','Verbal Prompt','Dependent']);


if(!empty($data['skill_level'])){
        $i = 0;
        $j = 9;
        foreach($data['skill_level'] as $level ){
            $skills = $this->CI->Common_model->getAllData('institutional_programme_skills', 
            array('subject_id' => $data['subject_id'],'class_id' => $level->id ));
            //print_r($skills);
            if(!empty($skills)){
                
                foreach($skills as $skill){
                    //echo "A".$j.":E".$j;
                    $this->objPHPExcel->getActiveSheet()->mergeCells("A".$j.":E".$j);
                    //$this->objPHPExcel->getActiveSheet()->mergeCells("A9:E9");

                    if(!empty($reportid)){
                        $Independent = $this->CI->Common_model->dbQuerynumrows("select id from report_math where report_id IN (".implode(',',$reportid).") AND skill_id = '".$skill->id."' AND score = 4 ");
                        $Cue = $this->CI->Common_model->dbQuerynumrows("select id from report_math where report_id IN (".implode(',',$reportid).") AND  skill_id = '".$skill->id."' AND score = 3 ");
                        $Verbal = $this->CI->Common_model->dbQuerynumrows("select id from report_math where report_id IN (".implode(',',$reportid).") AND skill_id IN( '".$skill->id."') AND score = 2 ");
                        $Dependent = $this->CI->Common_model->dbQuerynumrows("select id from report_math where report_id IN (".implode(',',$reportid).") AND skill_id IN( '".$skill->id."') AND score = 1 ");
                        $skillArray = array($skill->name,'','','','',$Independent,$Cue,$Verbal,$Dependent);
                        array_push($skilDataArray,$skillArray);
                    }
                    else{
                        $skillArray = array($skill->name);
                        array_push($skilDataArray,$skillArray);
                    }
                    
                    $j++;
                    $i++;

                }
            }
            
        } 
    }


$worksheet->fromArray($skilDataArray);



// Set the Labels for each data series we want to plot
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$dataSeriesLabels2 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$F$8', null, 1), // 2010
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$G$8', null, 1), // 2011
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$H$8', null, 1), // 2012
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$I$8', null, 1), // 2012
];
// Set the X-Axis Labels
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$xAxisTickValues2 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$A$9:$A$79', null, 70), // Q1 to Q4
];
// Set the Data values for each data series we want to plot
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$dataSeriesValues2 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$F$9:$F$79', null, 70),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$G$9:$G$79', null, 70),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$H$9:$H$79', null, 70),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$I$9:$I$79', null, 70),
];

// Build the dataseries
$series2 = new DataSeries(
    DataSeries::TYPE_BARCHART, // plotType
    DataSeries::GROUPING_STANDARD, // plotGrouping
    range(0, count($dataSeriesValues2) - 1), // plotOrder
    $dataSeriesLabels2, // plotLabel
    $xAxisTickValues2, // plotCategory
    $dataSeriesValues2        // plotValues
);
// Set additional dataseries parameters
//     Make it a vertical column rather than a horizontal bar graph
$series2->setPlotDirection(DataSeries::DIRECTION_COL);

// Set the series in the plot area
$plotArea2 = new PlotArea(null, [$series2]);
// Set the chart legend
$legend2 = new ChartLegend(ChartLegend::POSITION_RIGHT, null, false);

$title2 = new Title('SKILLWISE ACHIEVEMENT OF THE CLASS');
$yAxisLabel2 = new Title('');

// Create the chart
$chart2 = new Chart(
    'chart2', // name
    $title2, // title
    $legend2, // legend
    $plotArea2, // plotArea
    true, // plotVisibleOnly
    DataSeries::EMPTY_AS_GAP, // displayBlanksAs
    null, // xAxisLabel
    $yAxisLabel2 // yAxisLabel
);

// Set the position where the chart should appear in the worksheet
$chart2->setTopLeftPosition('L7');
$chart2->setBottomRightPosition('Z50');

// Add the chart to the worksheet
$worksheet->addChart($chart2);

// Save Excel 2007 file
//$filename = $helper->getFilename(__FILE__);
$filename = time().'skill_wise.xls';
$writer = IOFactory::createWriter($this->objPHPExcel, 'Xlsx');
$writer->setIncludeCharts(true);
$callStartTime = microtime(true);
$writer->save($filename);
force_download($filename, NULL);


        
        exit();

}


    public function xlscreation_direct() {

        $reportdetails = $this->report_details();        
        $this->objPHPExcel->getProperties()
                ->setCreator("user")
                ->setLastModifiedBy("user")
                ->setTitle("Office 2007 XLSX Test Document")
                ->setSubject("Office 2007 XLSX Test Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Test result file");

        // Set the active Excel worksheet to sheet 0
        $this->objPHPExcel->setActiveSheetIndex(0);

        // Initialise the Excel row number
        $rowCount = 0;

        // Sheet cells
        $cell_definition = array(
            'A' => 'BrandIcon',
            'B' => 'Comapany',
            'C' => 'Rank',
            'D' => 'Link'
        );

        // Build headers
        foreach( $cell_definition as $column => $value )
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->setCellValue( "{$column}1", $value );
        }

        // Build cells
        while( $rowCount < count($reportdetails) ){
            $cell = $rowCount + 2;
            foreach( $cell_definition as $column => $value ) {

                $objPHPExcel->getActiveSheet()->getRowDimension($rowCount + 2)->setRowHeight(35);
                
                switch ($value) {
                    case 'BrandIcon':
                        if (file_exists($reportdetails[$rowCount][$value])) {
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setName('Customer Signature');
                            $objDrawing->setDescription('Customer Signature');
                            //Path to signature .jpg file
                            $signature = $reportdetails[$rowCount][$value];    
                            $objDrawing->setPath($signature);
                            $objDrawing->setOffsetX(25);                     //setOffsetX works properly
                            $objDrawing->setOffsetY(10);                     //setOffsetY works properly
                            $objDrawing->setCoordinates($column.$cell);             //set image to cell
                            $objDrawing->setWidth(32);  
                            $objDrawing->setHeight(32);                     //signature height  
                            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save
                        } else {
                            $objPHPExcel->getActiveSheet()->setCellValue($column.$cell, "Image not found" );
                        }
                        break;
                    case 'Link':
                        //set the value of the cell
                        $objPHPExcel->getActiveSheet()->SetCellValue($column.$cell, $reportdetails[$rowCount][$value]);
                        //change the data type of the cell
                        $objPHPExcel->getActiveSheet()->getCell($column.$cell)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);
                        ///now set the link
                        $objPHPExcel->getActiveSheet()->getCell($column.$cell)->getHyperlink()->setUrl(strip_tags($reportdetails[$rowCount][$value]));
                        break;

                    default:
                        $objPHPExcel->getActiveSheet()->setCellValue($column.$cell, $reportdetails[$rowCount][$value] );
                        break;
                }

            }
                
            $rowCount++;
        }

        $rand = rand(1234, 9898);
  
        $fileName = "" . $rand . "_" .time() . ".xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        die();
    }

    public function assessmentDoneReport($data = null) {

        $filename = time().'check.xls';
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('functional-academic/assessment-done-report',$data, true);
        $spreadsheet = $reader->loadFromString($msg);
        $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save($filename); 
         $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);
        // force_download($filename, NULL);
        // unlink($filename);


    }

    public function iepGeneratedReport($data = null) {

        $filename = time().'check.xls';
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('functional-academic/iep-generated-report',$data, true);
        $spreadsheet = $reader->loadFromString($msg);
        $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save($filename); 

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);
    
    }

    public function assessmentDoneReportRemedial($data = null) {

        $filename = time().'_assessment-done.xls';
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('academic-programme/assessment-done-report',$data, true);
        $spreadsheet = $reader->loadFromString($msg);
        $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save($filename); 
         $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);
        // force_download($filename, NULL);
        // unlink($filename);


    }

    public function iepGeneratedReportRemedial($data = null) {

        $filename = time().'_iep-generated.xls';
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('academic-programme/iep-generated-report',$data, true);
        $spreadsheet = $reader->loadFromString($msg);
        $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save($filename); 

         $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);

        // force_download($filename, NULL);
        // unlink($filename);


    }

    

    public function progressChart($data = null) {

        // echo "<pre>";
        // print_r($data );die();
        //echo count($data['term_year']); die();
        
       $spreadsheet = new Spreadsheet();
       
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('functional-academic/progress-chart-report',$data, true);
        $spreadsheet = $reader->loadFromString($msg);

        $worksheet = $spreadsheet->getActiveSheet();
        // Set the Labels for each data series we want to plot
        //     Datatype
        //     Cell reference for data
        //     Format Code
        //     Number of datapoints in series
        //     Data values
        //     Data Marker
        if(count($data['term_year']) == 1){
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            
        ];
        }
        elseif(count($data['term_year']) == 2){
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$10', null, 1), // 2010
            
        ];
        }
        elseif(count($data['term_year']) == 3){
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$D$10', null, 1), // 2010
        ];
        }
        else{
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$D$10', null, 1), // 2010
        ];
        }
        
        // Set the X-Axis Labels
        //     Datatype
        //     Cell reference for data
        //     Format Code
        //     Number of datapoints in series
        //     Data values
        //     Data Marker
        $xAxisTickValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$A$11:$A$17', null, 7), // Q1 to Q4
        ];
        // Set the Data values for each data series we want to plot
        //     Datatype
        //     Cell reference for data
        //     Format Code
        //     Number of datapoints in series
        //     Data values
        //     Data Marker

         if(count($data['term_year']) == 1){
            $dataSeriesValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$17', null, 7),
               
                
            ];
        }
        elseif(count($data['term_year']) == 2){
            $dataSeriesValues = [
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$17', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$11:$C$17', null, 7),
                
                
            ];
        }
        elseif(count($data['term_year']) == 3){
           $dataSeriesValues = [
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$17', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$11:$C$17', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$D$11:$D$17', null, 7),
                
            ];
        }
        else{
            $dataSeriesValues = [
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$17', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$11:$C$17', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$D$11:$D$17', null, 7),
                
            ];
        }

        

        // Build the dataseries
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART, // plotType
            DataSeries::GROUPING_STANDARD, // plotGrouping
            range(0, count($dataSeriesValues) - 1), // plotOrder
            $dataSeriesLabels, // plotLabel
            $xAxisTickValues, // plotCategory
            $dataSeriesValues        // plotValues
        );
        // Set additional dataseries parameters
        //     Make it a horizontal bar rather than a vertical column graph
        $series->setPlotDirection(DataSeries::DIRECTION_COL);

        // Set the series in the plot area
        $plotArea = new PlotArea(null, [$series]);
        // Set the chart legend
        $legend = new ChartLegend(ChartLegend::POSITION_BOTTOM, null, false);

        $title = new Title('Comparitive Analysis ');
        $yAxisLabel = new Title('');

        // Create the chart
        $chart = new Chart(
            'chart1', // name
            $title, // title
            $legend, // legend
            $plotArea, // plotArea
            true, // plotVisibleOnly
            DataSeries::EMPTY_AS_GAP, // displayBlanksAs
            null, // xAxisLabel
            $yAxisLabel  // yAxisLabel
        );

        // Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('H10');
        $chart->setBottomRightPosition('N30');
        // Add the chart to the worksheet
        $worksheet->addChart($chart);
        // Save Excel 2007 file
        $filename = time().'progess_chart.xls';
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->setIncludeCharts(true);
        $callStartTime = microtime(true);
        $writer->save($filename);

         $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);

        //force_download($filename, NULL);


    }

    public function baseLinePdfReport($data = null){

        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('academic-programme/baseline_assessments_summary_report_pdf',$data, true);
        $spreadsheet = $reader->loadFromString($msg);

        $xmlWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Mpdf');
        
        //$xmlWriter->setFooter("Sdfsdf");
        $num = rand(00, 99);
        //create folder named files
        $xmlWriter->save("helloWorld$num.pdf");
    }

    public function academicProgrammeProgressChart($data = null) {

        // echo "<pre>";
        // print_r($data );die();
        //echo count($data['term_year']); die();
        
       $spreadsheet = new Spreadsheet();
       
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        $msg = $this->CI->load->view('academic-programme/progress-chart-report',$data, true);
        $spreadsheet = $reader->loadFromString($msg);

        $worksheet = $spreadsheet->getActiveSheet();
        // Set the Labels for each data series we want to plot
        //     Datatype
        //     Cell reference for data
        //     Format Code
        //     Number of datapoints in series
        //     Data values
        //     Data Marker
        if(count($data['term_year']) == 1){
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            
        ];
        }
        elseif(count($data['term_year']) == 2){
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$10', null, 1), // 2010
            
        ];
        }
        elseif(count($data['term_year']) == 3){
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$D$10', null, 1), // 2010
        ];
        }
        else{
            $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$10', null, 1), // 2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$D$10', null, 1), // 2010
        ];
        }
        
        // Set the X-Axis Labels
        //     Datatype
        //     Cell reference for data
        //     Format Code
        //     Number of datapoints in series
        //     Data values
        //     Data Marker
        $xAxisTickValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$A$11:$A$18', null, 7), // Q1 to Q4
        ];
        // Set the Data values for each data series we want to plot
        //     Datatype
        //     Cell reference for data
        //     Format Code
        //     Number of datapoints in series
        //     Data values
        //     Data Marker

         if(count($data['term_year']) == 1){
            $dataSeriesValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$18', null, 7),
               
                
            ];
        }
        elseif(count($data['term_year']) == 2){
            $dataSeriesValues = [
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$18', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$11:$C$18', null, 7),
                
                
            ];
        }
        elseif(count($data['term_year']) == 3){
           $dataSeriesValues = [
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$18', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$11:$C$18', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$D$11:$D$18', null, 7),
                
            ];
        }
        else{
            $dataSeriesValues = [
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$11:$B$18', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$11:$C$18', null, 7),
                new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$D$11:$D$18', null, 7),
                
            ];
        }

        

        // Build the dataseries
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART, // plotType
            DataSeries::GROUPING_STANDARD, // plotGrouping
            range(0, count($dataSeriesValues) - 1), // plotOrder
            $dataSeriesLabels, // plotLabel
            $xAxisTickValues, // plotCategory
            $dataSeriesValues        // plotValues
        );
        // Set additional dataseries parameters
        //     Make it a horizontal bar rather than a vertical column graph
        $series->setPlotDirection(DataSeries::DIRECTION_COL);

        // Set the series in the plot area
        $plotArea = new PlotArea(null, [$series]);
        // Set the chart legend
        $legend = new ChartLegend(ChartLegend::POSITION_BOTTOM, null, false);

        $title = new Title('COMPREHENSIVE ACADEMIC DEVELOPMENT');
        $yAxisLabel = new Title('');

        // Create the chart
        $chart = new Chart(
            'chart1', // name
            $title, // title
            $legend, // legend
            $plotArea, // plotArea
            true, // plotVisibleOnly
            DataSeries::EMPTY_AS_GAP, // displayBlanksAs
            null, // xAxisLabel
            $yAxisLabel  // yAxisLabel
        );

        // Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('H10');
        $chart->setBottomRightPosition('N30');
        // Add the chart to the worksheet
        $worksheet->addChart($chart);
        // Save Excel 2007 file
        $filename = time().'progess_chart.xls';
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->setIncludeCharts(true);
        $callStartTime = microtime(true);
        $writer->save($filename);

         $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);

        //force_download($filename, NULL);


    }


public function classwise_report_new($htmlData = null,$data = null) {

        $filename = time().'check.xls';
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Html();
        //$msg = $this->CI->load->view('functional-academic/iep-generated-report',$data, true);
        $spreadsheet = $reader->loadFromString($htmlData);
        //$spreadsheet->getActiveSheet()->getStyle('A5')->getAlignment()->setTextRotation(90)->setWrapText(true);
        
    //    echo  $alpha = 'C'.chr(65+25).'6';die();
    //     if(!empty($skill_level)){                                            
    //         foreach($skill_level as $level ){
    //         $skills = $this->Common_model->getAllData('institutional_programme_skills', 
    //         array('subject_id' => $subject_id,'class_id' => $level->id ));
    //             if(!empty($skills)){
    //                 foreach($skills as $skill){

    //                 }
    //             }
    //         }
    //     }

        // for($x = 'A'; $x < 'CI'; $x++){
        //     echo $x, '<br>';
        // }

        $observationsLetter = $this->columnLetter($data['skill_count'] + 4+1+count($data['observations']));
    
       $foundLetter =  $this->columnLetter($data['skill_count'] + 5);
        for($x = 'A'; $x < 'ZZ'; $x++){
             //$alpha = "$x"."5";
            
            if($observationsLetter == $x){
               // echo $x, ' ';
              // echo  $alpha = 'C'.chr(65+25).'6';
                $spreadsheet->getActiveSheet()->getStyle($x.'5')->getAlignment()->setTextRotation(90)->setWrapText(true);
                break;
            }
            elseif($foundLetter == $x ){

            }
            else{
                $spreadsheet->getActiveSheet()->getStyle($x.'5')->getAlignment()->setTextRotation(90)->setWrapText(true);
            }
            
        }

        $spreadsheet->getActiveSheet()->getStyle('A:ZZ')->getAlignment()->setHorizontal('center');
    
        
    
        


        $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save($filename); 

        //print_r($data);
        
        

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header('Content-Type: '.finfo_file($finfo, $filename));

        $finfo = finfo_open(FILEINFO_MIME_ENCODING);
        header('Content-Transfer-Encoding: '.finfo_file($finfo, $filename)); 

        header('Content-disposition: attachment; filename="'.basename($filename).'"'); 
        readfile($filename); // do the double-download-dance (dirty but worky)
        unlink($filename);
    
    }

    public function columnLetter($c){

        $c = intval($c);
       

        $letter = '';
                
        while($c != 0){
        $p = ($c - 1) % 26;
        $c = intval(($c - $p) / 26);
        $letter = chr(65 + $p) . $letter;
        }
        
        return $letter;
        
}

    
    

    

    



}