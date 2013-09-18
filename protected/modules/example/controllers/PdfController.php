<?php

class PdfController extends Controller
{
	public function actionDownload()
	{
        $this->layout = '//layouts/pdfcolumn1';
        $html = $this->render('download', array(), true);
        // echo $html; Yii::app()->end();        

        require_once Yii::getPathOfAlias('webroot.vendor.mpdf.mpdf') . "/mpdf.php";

        $mpdf = new mPDF('c',    // mode - default ''
            array(210, 297),    // format - A4, for example, default ''
            0,     // font size - default 0
            '',    // default font family
            15,    // margin_left
            15,    // margin right
            15,     // margin top
            15,    // margin bottom
            9,     // margin header
            9,     // margin footer
            'P');  // L - landscape, P - portrait

        $mpdf->WriteHTML($html);
        $mpdf->Output('pdftest.pdf', 'D');
        Yii::app()->end();
    }

}