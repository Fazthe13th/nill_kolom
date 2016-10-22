<?php
$err='This is some problem with database. Come again later';
$mysql_host = "mysql4.000webhost.com";
$mysql_database = "a8314948_nill";
$mysql_user = "a8314948_faz13";
$mysql_password = "faz131314725";
mysql_connect($mysql_host,$mysql_user,$mysql_password) or die($err);
mysql_select_db($mysql_database) or die($err);
?>