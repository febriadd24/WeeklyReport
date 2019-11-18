<?php
$myFile = "key.bat";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "@Echo Off
Set "out=C:\KTP"
(
  Echo;[Setting]
  Echo;PC=
  Echo;CON=
) > "%out%\config.ini" ";

fwrite($fh, $stringData);
fclose($fh);
?>