@Echo Off
Set "out=C:\KTP"
(
  Echo;[Setting]
  Echo;PC=pciddata
  Echo;CON=condata
) > "%out%\config.ini"