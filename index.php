<?php

require './vendor/autoload.php';

$mySpreadsheet = new PHPExcel();

$mySpreadsheet->getProperties()
    ->setCreator('Hathi')
    ->setTitle('My first spreadsheet')
    ->setKeywords('phpexcel sitepoint premium screencast')
    ->setCompany('My little company');

$myWorksheet = $mySpreadsheet->getSheet(0);
$myWorksheet->setTitle('My WS');

$myWorksheet->setCellValue('A1', 'Norway');
$myWorksheet->setCellValue('C1', 'Oslo');

$myWorksheet->setCellValue('A2', 'Russia');
$myWorksheet->setCellValue('C2', 'Moscow');

$myWorksheet->setCellValue('A3', 'Canada');
$myWorksheet->setCellValue('C3', 'Ottawa');

$myWorksheet->insertNewRowBefore(1, 2);

$myWorksheet->setCellValue('A1', 'Country');
$myWorksheet->getStyle('A1')->getFont()->setBold(true);

$myWorksheet->setCellValue('C1', 'Capital');
$myWorksheet->getStyle('C1')->getFont()->setBold(true);

$writer = PHPExcel_IOFactory::createWriter($mySpreadsheet, 'Excel2007');
$writer->save('countries.xlsx');
