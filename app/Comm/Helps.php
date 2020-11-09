<?php
/**
 * Created by IntelliJ IDEA.
 * User: LHC
 * Date: 2020/11/9
 * Time: 13:59
 */

namespace App\Comm;





function exportExcel($fileName = '', $headArr = [], $data = [])
{
    $basePath = config('conf.comm.export');
    $path = ROOT_PATH.$basePath;
    if(!file_exists($path)){
        @mkdir($path, 0777, true);
    }
    $objPHPExcel = new \PHPExcel();
    $objPHPExcel->getProperties();
    $key = ord("A"); // 设置表头
    foreach ($headArr as $v) {
        $col = chr($key);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($col . '1', $v);
        $key += 1;
    }
    $column      = 2;
    $objActSheet = $objPHPExcel->getActiveSheet();
    foreach ($data as $key => $rows) { // 行写入
        $span = ord("A");
        foreach ($rows as $keyName => $value) { // 列写入
            if ($keyName == 'idCode') {
                $objActSheet->setCellValueExplicit(chr($span) . $column, $value, \PHPExcel_Cell_DataType::TYPE_STRING);
            } else {
                $objActSheet->setCellValue(chr($span) . $column, $value);
            }
            $span++;
        }
        $column++;
    }
    $objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save($path.$fileName);
    return $basePath.$fileName;
}
