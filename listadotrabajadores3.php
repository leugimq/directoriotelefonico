<!-- First include jquery js -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Then include bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<html>
<head>
<body>
<script type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
<script> 
 function preguntar($id_usuario,nombres,apellido){
 
     if(confirm('¿Realmente desea borrar este trabajador?'+"  "+nombres+" "+apellido)){ 
  alert('Operación iniciada');
  window.location.href="Borrartrab2.php?recordID="+$id_usuario;
  }
else{ 
alert('Operación cancelada');
}
}
</script>
</body>
</head>
</html>


<?php require_once('Connections/base.php'); ?>
<?php

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_RsTrabajadores = 5;
$pageNum_RsTrabajadores = 0;
if (isset($_GET['pageNum_RsTrabajadores'])) {
  $pageNum_RsTrabajadores = $_GET['pageNum_RsTrabajadores'];
}
$startRow_RsTrabajadores = $pageNum_RsTrabajadores * $maxRows_RsTrabajadores;

mysql_select_db($database_base, $base);

?>
<div align="justify">
<p></p>

<?php require_once('Connections/base.php'); ?>

<?php

if (isset($_REQUEST['$nombre'])) {
$nombre = $_REQUEST['$nombre'];
} else {
$nombre= "";
}



//$query_RsTrabajadores="SELECT trabajadores.id_usuario, trabajadores.nombre, trabajadores.apellidos, trabajadores.cel, trabajadores.extencion  FROM trabajadores WHERE trabajadores.nombre LIKE '%$nombre%'";

$query_RsTrabajadores = "SELECT trabajadores.id_usuario, trabajadores.nombre, trabajadores.apellidos, trabajadores.cel, trabajadores.extencion, trabajadores.puesto, trabajadores.dependencia from trabajadores where concat(replace(trabajadores.nombre,' ', '') , replace(trabajadores.apellidos,' ', '')) like replace('%$nombre%',' ','') order by nombre";




/*<td width="178"><div align="center"><strong>id usuario </strong></div></td>*/
/*<td height="61"><div align="center"><?php echo $row_RsTrabajadores['id_usuario']; ?></div></td>*/
/* Este programa fue echo por MQM*/


//$query_RsTrabajadores = "SELECT trabajadores.nombre FROM trabajadores where ORDER BY Nombre ASC";




//$query_RsTrabajadores ="SELECT trabajadores.id_usuario, trabajadores.nombre, trabajadores.apellidos, trabajadores.cel, trabajadores.extencion FROM trabajadores WHERE trabajadores.nombre LIKE '%$nombre%'";

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
<h2 align="center">Directorio de trabajadores</h2>
<a href="menu.php">

<Regresar></a>
<form action="/listadotrabajadores3.php" method="post"  align="left">
  <input name="$nombre" type="text" id="nombre" style="height:25" value="" width:"200px" />
  <input type="submit" id="btn_enviar" name="btn_enviar" value="Buscar" />
</form>
<br/><br/>

<ol class="breadcrumb" style="background-color:#9d1b30; color:#FFFFFF ">
  <li class="Estilo1"><a href="menu.html" class="Estilo2" style="color:#FFFFFF">Regresar al menú</a></li>
  
 <li class="Estilo2"><a href="creartrabajadores.php" class="Estilo2" style="color:#FFFFFF"><strong>Añadir otro trabajador</strong></a></li>
</ol>
 
 <?php
if ($totalRows_RsTrabajadores >= 1){
?>

<table width="1196" border="2" align="center" cellspacing="0"" > 
  <tr bgcolor="#CCCCCC">
    
    <td width="326" bgcolor="#CCCCCC"><div align="center"><strong>Nombre</strong></div></td>
    <td width="378" bgcolor="#CCCCCC"><div align="center"><strong>Apellidos</strong></div></td>
    <td width="164" bgcolor="#CCCCCC"><div align="center"><strong>Celular</strong></div></td>
    <td width="173" bgcolor="#CCCCCC"><div align="center"><strong>Extensi&oacute;n</strong></div></td>
	<td width="330" bgcolor="#CCCCCC"><div align="center"><strong>Puesto</strong></div></td>
	<td width="330" bgcolor="#CCCCCC"><div align="center"><strong>Dependencia</strong></div></td>
    <td width="133" bgcolor="#CCCCCC"><div align="center"><strong>Acci&oacute;n</strong></div></td>
  </tr>
  
     <?php do { ?>
	<tr>
	
      <td><div align="center"><?php echo $row_RsTrabajadores['nombre']; ?></div></td>
      <td><div align="center"><?php echo $row_RsTrabajadores['apellidos']; ?></div></td>
      <td><div align="center"><?php echo $row_RsTrabajadores['cel']; ?></div></td>
      <td><div align="center"><?php echo $row_RsTrabajadores['extencion']; ?></div></td>
	  <td><div align="center"><?php echo $row_RsTrabajadores['puesto']; ?></div></td>
	  <td><div align="center"><?php echo $row_RsTrabajadores['dependencia']; ?></div></td>
      <td><p align="center"><a class="btn btn-success" href="Editartrabajadores.php?recordID=<?php echo $row_RsTrabajadores['id_usuario']; ?>">Editar</a></p>
	    <div align="center">
		 <?php /*?><p align="center"><a class="btn btn-danger" href="otra2.php?recordID=<?php echo $row_RsTrabajadores['id_usuario']; ?>">Borrar</a></p><?php */?>
		  <a class="btn btn-danger" onClick="preguntar(<?php echo $row_RsTrabajadores['id_usuario'];?>,'<?php echo $row_RsTrabajadores['nombre']; ?>','<?php echo $row_RsTrabajadores['apellidos'];?>')">Borrar</a></p>
   
        </div>
  </tr>
  <?php } while ($row_RsTrabajadores = mysql_fetch_assoc($RsTrabajadores)); ?>


</table>

<p>
  <?php
  
mysql_free_result($RsTrabajadores);
}
else {
echo "<b><center><h3>No existen registros con ese nombre</h3></center></b>";
}
?>

</p>
<p></p>
<p></p>
<p></p>
<p></p>

<?php
 if ($totalRows_RsTrabajadores > 5){
?> 	
	<h3 align="center"><strong>
	<a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, 0, $queryString_RsTrabajadores); ?>" class="Estilo2">Comienzo</a> - 
	<a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, max(0, $pageNum_RsTrabajadores - 1), $queryString_RsTrabajadores); ?>" class="Estilo2">Anterior</a> - 
	<a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, min($totalPages_RsTrabajadores, $pageNum_RsTrabajadores + 1), $queryString_RsTrabajadores); ?>" class="Estilo2">Próximo</a> - 
	<a href="<?php printf("%s?pageNum_RsTrabajadores=%d%s", $currentPage, $totalPages_RsTrabajadores, $queryString_RsTrabajadores); ?>" class="Estilo2">Final</a></strong></h3>;
	 <?php
 }
 else {
 echo "<b><center><h3>Proporcione otro nombre u oprima en el botón buscar para reflejar todos los trabajadores</h3></center></b>";
     }
?>