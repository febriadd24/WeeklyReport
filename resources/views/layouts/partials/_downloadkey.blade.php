<?php
$SN=$model['SN_Device'];
$PCID=$model['PCID'];
$CONFIG=$model['CONFIG'];
$oldMessage="pciddata";
$deletedFormat=$PCID;
$boldMessage="condata";
$bdeletedFormat=$CONFIG;
$str=file_get_contents('key.bat');
//replace something in the file string - this is a VERY simple example
$str=str_replace("$oldMessage", "$deletedFormat",$str);
$str=str_replace("$boldMessage", "$bdeletedFormat",$str);
//write the entire string
file_put_contents('key\Aktivasikey_'.$SN.'.bat', $str);

$file = 'key\Aktivasikey_'.$SN.'.bat';
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
