<?php require_once('Connections/base.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_RsTrabajadores = 10;
$pageNum_RsTrabajadores = 0;
if (isset($_GET['pageNum_RsTrabajadores'])) {
  $pageNum_RsTrabajadores = $_GET['pageNum_RsTrabajadores'];
}
$startRow_RsTrabajadores = $pageNum_RsTrabajadores * $maxRows_RsTrabajadores;

mysql_select_db($database_base, $base);
/*$query_RsTrabajadores = "SELECT * FROM trabajadores ORDER BY id_usuario ASC";*/

/*<td width="178"><div align="center"><strong>id usuario </strong></div></td>*/
/*<td height="61"><div align="center"><?php echo $row_RsTrabajadores['id_usuario']; ?></div></td>*/
/* Este programa fue echo por MQM*/

$query_RsTrabajadores = "SELECT * FROM trabajadores ORDER BY Nombre ASC";

$query_limit_RsTrabajadores = sprintf("%s LIMIT %d, %d", $query_RsTrabajadores, $startRow_RsTrabajadores, $maxRows_RsTrabajadores);
$RsTrabajadores = mysql_query($query_limit_RsTrabajadores, $base) or die(mysql_error());
$row_RsTrabajadores = mysql_fetch_assoc($RsTrabajadores);

if (isset($_GET['totalRows_RsTrabajadores'])) {
  $totalRows_RsTrabajadores = $_GET['totalRows_RsTrabajadores'];
} else {
  $all_RsTrabajadores = mysql_query($query_RsTrabajadores);
  $totalRows_RsTrabajadores = mysql_num_rows($all_RsTrabajadores);
}
$totalPages_RsTrabajadores = ceil($totalRows_RsTrabajadores/$maxRows_RsTrabajadores)-1;

$queryString_RsTrabajadores = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsTrabajadores") == false && 
        stristr($param, "totalRows_RsTrabajadores") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsTrabajadores = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsTrabajadores = sprintf("&totalRows_RsTrabajadores=%d%s", $totalRows_RsTrabajadores, $queryString_RsTrabajadores);
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
<style type="text/css">
<!--
.Estilo1 {
	font-size: 12px;
	font-weight: bold;
}
.Estilo2 {font-size: 18px}
-->
</style>
<h1 align="left"><img src="img/innovacion.jpg" width="275" height="110" /></h1>
<h2 align="center">Directorio de Trabajadores</h2>
<a href="menu.php">
<Regresar></a><br/><br/>

<ol class="breadcrumb">
  <li class="Estilo1"><a href="menu.html" class="Estilo2">Regresar al Menú</a></li>
  
 <li class="Estilo2"><a href="creartrabajadores.php"><strong>Añadir otro Trabajador</strong></a></li>
</ol>

<table width="1196" border="1" align="center" cellspacing="0""> 
  <tr bgcolor="#CCCCCC">
    
    <td width="326" bgcolor="#CCCCCC"><div align="center"><strong>Nombre</strong></div></td>
    <td width="378" bgcolor="#CCCCCC"><div align="center"><strong>Apellidos</strong></div></td>
    <td width="164" bgcolor="#CCCCCC"><div align="center"><strong>Celular</strong></div></td>
    <td width="173" bgcolor="#CCCCCC"><div align="center"><strong>Extenci&oacute;n</strong></div></td>
    <td width="133" bgcolor="#CCCCCC"><div align="center"><strong>Acci&oacute;n</strong></div></td>
  </tr>
  
     <?php do { ?>
	<tr>
	
      
      <td><div align="center"><?php echo $row_RsTrabajadores['nombre']; ?></div></td>
      <td><div align="center"><?php echo $row_RsTrabajadores['apellidos']; ?></div></td>
      <td><div align="center"><?php echo $row_RsTrabajadores['cel']; ?></div></td>
      <td><div align="center"><?php echo $row_RsTrabajadores['extencion']; ?></div></td>
      <td><p align="center"><a href="Editartrabajadores.php?recordID=<?php echo $row_RsTrabajadores['id_usuario']; ?>">Editar</a></p>
      <p align="center"><a href="Borrartrab.php?recordID=<?php echo $row_RsTrabajadores['id_usuario']; ?>">Borrar</a></p></td>
  </tr>
  <?php } while ($row_RsTrabajadores = mysql_fetch_assoc($RsTrabajadores)); ?>
</table>
<p>
  <?php
mysql_free_result($RsTrabajadores);
?>
</p>
<p></p>
<p></p>
<p></p>
<p></p>
<h3 align="center">  
  <strong><a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, 0, $queryString_RsTrabajadores); ?>" class="Estilo2">Comienzo</a> - <a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, max(0, $pageNum_RsTrabajadores - 1), $queryString_RsTrabajadores); ?>" class="Estilo2">Anterior</a> - <a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, min($totalPages_RsTrabajadores, $pageNum_RsTrabajadores + 1), $queryString_RsTrabajadores); ?>" class="Estilo2">Próximo</a> - <a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, $totalPages_RsTrabajadores, $queryString_RsTrabajadores); ?>" class="Estilo2">Final</a></strong></h3>
