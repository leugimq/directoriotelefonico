<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.7/docs/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->








 

<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
<title>listado de Trabajadores de la Secretaria de Innovación</title>
</head>
<body>
<h1 align="left"><a href="menu.html"><img src="img/innovacion.jpg" width="256" height="109" border="0"></a></h1>
<h3 align="center"><em><strong>Directorio Telefónico de Sria. de Innovación</strong></em></h3>
<h3 align="center"><em><strong>Busqueda por Apellidos</strong></em></h3>
<h2 align="left">
<ol class="breadcrumb">
  <li><h3><a href="menu.html">Regresar al Menú</a></h3></li>
 </ol>


  <em><strong><a href="menu.html"></a></strong></em></h2>
<form method="GET" action="listado.php">
	<input name="apellidos" type="text" id="apellidos" style="height:80" value="">
    <input type="submit" id="btn_enviar" name="btn_enviar" value="Buscar" />
</form>
<div align="justify">
<p></p>

  <?php
  
 
 FileName="Connection_php_mysql.htm"
 Type="MYSQL"
 HTTP="true"
$hostname_base = "localhost";
$database_base = "pruebas";
$username_base = "root";
$password_base = "";
$base = mysql_pconnect($hostname_base, $username_base, $password_base) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_pconnect($hostname_base, $username_base, $password_base) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_base) or die (mysql_error());

if (isset($_REQUEST['apellidos'])) {
$apellidos = $_REQUEST['apellidos'];
} else {
$apellidos = "";
}
//$apellidos =""; // $_GET['apellidos'];


$strsql = "SELECT trabajadores.id_usuario, trabajadores.nombre, trabajadores.apellidos, trabajadores.cel, trabajadores.extencion FROM trabajadores WHERE trabajadores.apellidos LIKE '%$apellidos%' order by apellidos" ;
$rs = mysql_query($strsql);
$row = mysql_fetch_assoc($rs);
$total_rows = mysql_num_rows($rs);
?>
   <?php do{ ?>
  <div style="float:left; padding:20px; width: 280px; border: 1px solid #333;">
  Apellidos: <?php echo($row['apellidos']);?> <br/>
  Nombre: <?php echo($row['nombre']);?> <br/>
  <strong>Extencion: <?php echo($row['extencion']);?></strong><br/>
  Celular: <?php echo($row['cel']);?> <br/>
  <br/>
  <hr/>
  </div>
  <div align="left">
    <?php } while($row = mysql_fetch_assoc($rs)); ?><br/>
    <br/>
  </div>
</body>
</html>
