<?php
header('Content-Type: charset=UTF-8');

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Get form variables
$title = $_POST['title'];
$fields = explode(',', $_POST['fields']);
$data = explode(',', $_POST['data']);

// Set document properties
$objPHPExcel->getProperties()->setCreator("Kolay Kolej")
							 ->setLastModifiedBy("Kolay Kolej")
							 ->setTitle("Kolay Kolej")
							 ->setSubject("Kolay Kolej")
							 ->setDescription("http://www.kolaykolej.com/")
							 ->setKeywords("kolay kolej rapor")
							 ->setCategory("Rapor");

// Add some data
$letters = range('A','Z');
$i = 0;
$cell = NULL;

foreach ($fields as $key => $value) {
	$cell = $letters[$i].'1';
	$objPHPExcel->getActiveSheet(0)->SetCellValue($cell, $value);
	$objPHPExcel->getActiveSheet(0)->getStyle($cell)->getFont()->setBold(true);
	$i++;
}

$i = 0;
$j = 2;	
	
foreach ($data as $key => $value) {
	if ($i >= count($fields)) {
		$i = 0;
		$j++;
	}
	
	$cell = $letters[$i].$j;
	$objPHPExcel->getActiveSheet(0)->SetCellValue($cell, $value);
	$i++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet(0)->setTitle($title);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rapor.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
