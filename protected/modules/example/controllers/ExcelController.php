<?php

class ExcelController extends Controller
{
	public function actionDownload()
	{
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        // Import PHPExcel and resolve problem with autoloader conflict
        /*
        spl_autoload_unregister(array('YiiBase','autoload'));
        require_once Yii::getPathOfAlias('webroot.vendor.codeplex.phpexcel') . DIRECTORY_SEPARATOR . "PHPExcel.php";
        spl_autoload_register(array('PHPExcel_Autoloader', 'Load'), true, true);
        spl_autoload_register(array('YiiBase','autoload')); 
        */
        
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                     ->setLastModifiedBy("Maarten Balliauw")
                                     ->setTitle("PHPExcel Test Document")
                                     ->setSubject("PHPExcel Test Document")
                                     ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                                     ->setKeywords("office PHPExcel php")
                                     ->setCategory("Test result file");


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Hello')
                    ->setCellValue('B2', 'world!')
                    ->setCellValue('C1', 'Hello')
                    ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A4', 'Miscellaneous glyphs')
                    ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');


        $objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
        $objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
        $objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);


        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Save Excel 2007 file
        $callStartTime = microtime(true);

        $filename = "Example1.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save("php://output");
        Yii::app()->end();
        
    }

}