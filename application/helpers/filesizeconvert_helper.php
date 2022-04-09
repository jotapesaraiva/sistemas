<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Converts bytes into human readable file size.
*
//* @param string $bytes
//* @return string human readable file size (2,87 Мб)
//* @author Mogilev Arseny
//* @url http://php.net/manual/pt_BR/function.filesize.php
*/
if ( ! function_exists('FileSizeConvert'))
{
    function FileSizeConvert($bytes) {
        $bytes = floatval($bytes);
            $arBytes = array(
                0 => array(
                    "UNIT"  => "TB",
                    "VALUE" => pow(1024, 4)
                ),
                1 => array(
                    "UNIT"  => "GB",
                    "VALUE" => pow(1024, 3)
                ),
                2 => array(
                    "UNIT"  => "MB",
                    "VALUE" => pow(1024, 2)
                ),
                3 => array(
                    "UNIT"  => "KB",
                    "VALUE" => 1024
                ),
                4 => array(
                    "UNIT"  => "B",
                    "VALUE" => 1
                ),
            );

        foreach($arBytes as $arItem) {
            if($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                break;
            }
        }
        return $result;
    }
}


 /* End of file filesizeconvert_helper.php */
/* Location: ./application/helpers/filesizeconvert_helper.php */