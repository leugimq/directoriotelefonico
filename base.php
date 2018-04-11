<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_base = "localhost";
$database_base = "pruebas";
$username_base = "root";
$password_base = "";
$base = mysql_pconnect($hostname_base, $username_base, $password_base) or trigger_error(mysql_error(),E_USER_ERROR);
?>
