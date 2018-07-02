<?php
    
            
          

// Include the main TCPDF library (search for installation path).
    require_once('tcpdf/tcpdf.php');

// create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,TRUE,'UTF-8',FALSE);

// set document information
//    $pdf->SetCreator(PDF_CREATOR);
//    $pdf->SetAuthor('Nicola Asuni');
//    $pdf->SetTitle('TCPDF Example 001');
//    $pdf->SetSubject('TCPDF Tutorial');
//    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE . ' 001',PDF_HEADER_STRING,array(0,64,255),array(0,64,128));
    //$pdf->setFooterData(array(0,64,0),array(0,64,128));

// set header and footer fonts
    // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
    {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

// ---------------------------------------------------------

// set default font subsetting mode
    $pdf->setFontSubsetting(TRUE);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans','',14,'',TRUE);

// Add a page
// This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

// set text shadow effect
    $pdf->setTextShadow(array('enabled' => TRUE,'depth_w' => 0.2,'depth_h' => 0.2,'color' => array(196,196,196),'opacity' => 1,'blend_mode' => 'Normal'));

// Set some content to print
    
    // $hey = 'Test 1 2 3';
    session_start();
    require('../authorize.php');

$code=Null;
$name=Null;
$hours=Null;
$mark =Null;
$value=Null;
   $student_username = $_SESSION['user'];

            include '../Database.php';
            $con=new Database();
            
   $sql="SELECT course.course_name,course.course_day,course.course_time,course.course_place from studentcourse,semesterdetails,course,student where studentcourse.student_id = student.student_id and student.student_username=$student_username and  semesterdetails.semester_year='Fall 2018-2019' and studentcourse.course_id=course.course_id and semesterdetails.course_id=course.course_id";
            $data=mysqli_query($con->conn,$sql);
        

          $table='  
                <table style="border: 2px solid #ddd;
     text-align:center;border-collapse: collapse;
    width: 100%;">
                <thead>
                 <tr>
                  
                   <th style="border: 2px solid #ddd;
     text-align:center;padding: 15px;font-weight:bold;">Subject</th>                                                      
                   <th style="border: 2px solid #ddd;
     text-align:center;padding: 15px;font-weight:bold;">Day</th>
                   <th style="border: 2px solid #ddd;
     text-align:center;padding: 15px;font-weight:bold;">Time</th>
                   <th style="border: 2px solid #ddd;
     text-align:center;padding: 15px;font-weight:bold;">Place</th> 
                                    
                  
                 </tr>
            </thead>
                <tbody>
                ';
                while($row=mysqli_fetch_assoc($data))
            {  
  
  $table.='     <tr>                   <td style="border: 2px solid #ddd;
    text-align:center;padding: 15px;">'.$row["course_name"].'</td>                       
                          <td style="border: 2px solid #ddd;
    text-align:center;padding: 15px;">'.$row["course_day"] .'</td> 
                          <td style="border: 2px solid #ddd;
    text-align:center;padding: 15px;">'.$row["course_time"].'</td>
                          <td style="border: 2px solid #ddd;
    text-align:center;padding: 15px;">'.$row["course_place"].'</td>
                          
                      </tr>';}
            
                      
     
$table.= '</tbody> </table>';


// Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0,0,'','',$table,0,1,0,TRUE,'',TRUE);
  
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
    $pdf->Output('Transcript.pdf','I');
    
    //============================================================+
    // END OF FILE
    //============================================================+﻿



