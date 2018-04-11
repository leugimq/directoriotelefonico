<?php require_once('Connections/base.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

	
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE trabajadores SET nombre=%s, apellidos=%s, cel=%s, extencion=%s, puesto=%s, dependencia=%s  WHERE id_usuario=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellidos'], "text"),
                       GetSQLValueString($_POST['cel'], "text"),
                       GetSQLValueString($_POST['extencion'], "text"),
					   GetSQLValueString($_POST['puesto'], "text"),
					   GetSQLValueString($_POST['dependencia'], "text"),
                       GetSQLValueString($_POST['id_usuario'], "text"));

  mysql_select_db($database_base, $base);
  $Result1 = mysql_query($updateSQL, $base) or die(mysql_error());

  $updateGoTo = "listadotrabajadores3.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$iidtrabaja_RsTrabajadores = "1";
if (isset($_GET["recordID"])) {
  $iidtrabaja_RsTrabajadores = (get_magic_quotes_gpc()) ? $_GET["recordID"] : addslashes($_GET["recordID"]);
}
mysql_select_db($database_base, $base);
$query_RsTrabajadores = sprintf("SELECT * FROM trabajadores WHERE trabajadores.id_usuario = %s", $iidtrabaja_RsTrabajadores);
$RsTrabajadores = mysql_query($query_RsTrabajadores, $base) or die(mysql_error());
$row_RsTrabajadores = mysql_fetch_assoc($RsTrabajadores);
$totalRows_RsTrabajadores = mysql_num_rows($RsTrabajadores);
?>
<head
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
<!--
.Estilo1 {font-size: 24px}
-->
</style>
</head>

<style> 
 .center{
width:60%;
margin:0 auto;

}
</style>

<p><img src="img/innovacion.jpg" width="254" height="111" /></p>
<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
<h1 class="Estilo1"> Forma para modificar trabajadores </h1>

<ol class="breadcrumb"  style="background-color:#9d1b30; color:#FFFFFF ">
  <li><h3><a href="<?=$_SERVER["HTTP_REFERER"]?>" style="color:#FFFFFF">Regresar</a></h3></li>
</ol>
<p>
  <?php
mysql_free_result($RsTrabajadores);
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<div class='center'>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
   
	<div class='control-group' >
		<label>Nombre:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'"  type="text" name="nombre" value="<?php echo $row_RsTrabajadores['nombre']; ?>" size="32">
  		<label>Apellido:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="apellidos" value="<?php echo $row_RsTrabajadores['apellidos']; ?>" size="32">
  		<label>Celular:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="cel" value="<?php echo $row_RsTrabajadores['cel']; ?>" size="32">
  		<label>Extensión:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="extencion" value="<?php echo $row_RsTrabajadores['extencion']; ?>" size="32">
		<?php /*?><label>Puesto:</label>
    	<input class='form-control' type="text" name="puesto" value="<?php echo $row_RsTrabajadores['puesto']; ?>" size="32"><?php */?>
		<p></p>
		
		
		<?php /*?><label><strong><u>Puesto Actual:</u></strong></label> 
		<strong><?php echo $row_RsTrabajadores['puesto']; ?></strong><?php */?>
		<p></p>
		<label>Puesto:</label>
			<select size="1" class="form-control" onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="puesto" value="">

				<?php 

					$puestos=array("Secretario","Secretario Técnico","Coordinador Administrativo","Subsecretario","Director","Jefe de Departamento","Analista de Sistemas","Auditor Interno","Auxiliar Administrativo ","Auxiliar Contable","Auxiliar de Dirección","Auxiliar servicios compartidos","Auxiliar del departamento","Programador","Programador de Sistemas Web","Analista A","Analista B","Asistente");


					$idPuesto=$row_RsTrabajadores['puesto'];

                    	 foreach ($puestos as $nombrePuesto ) {
						 if($nombrePuesto==$idPuesto)
						  {

						  echo "<option value='$nombrePuesto' selected>$idPuesto</option>";
						  }
						 else
						  {
						  echo "<option value='$nombrePuesto' value='$nombrePuesto'>$nombrePuesto</option>";
						  }
					     }
						
				?>

	  </select>
			
		
		<?php /*?><label><strong><u>Puesto Actual:</u></strong></label> 
		<strong><?php echo $row_RsTrabajadores['puesto']; ?></strong>
		<p></p>
		
		   <label for="puesto">Puesto:</label>
			<select size="1" class="form-control" type="text" name="puesto" value="">
    		<option value="Secretario">Secretario</option>
			<option value="Secretario Técnico">Secretario Técnico</option>
			<option value="Coordinador Administrativo">Coordinador Administrativo</option>
			<option value="Subsecretario">Subsecretario</option>
			<option value="Director">Director</option>
			<option value="Jefe de Departamento">Jefe de Departamento</option>
			<option value="Analista de Sistemas">Analista de Sistemas</option>
			<option value="Auditor Interno">Auditor Interno</option>
			<option value="Auxiliar Administrativo ">Auxiliar Administrativo</option>
			<option value="Auxiliar Contable">Auxiliar Contable</option>
			<option value="Auxiliar de Dirección">Auxiliar de Dirección</option>
			<option value="Auxiliar servicios compartidos">Auxiliar servicios compartidos</option>
			<option value="Auxiliar del departamento">Auxiliar del departamento</option> 
			<option value="Programador">Programador</option>
			<option value="Programador de Sistemas Web">Programador de Sistemas Web</option>
			<option value="Analista A">Analista A</option>
			<option value="Analista B">Analista B</option>
			<option value="Asistente">Asistente</option>		
		  </select><?php */?>
		
		
		
		<?php /*?><label><strong><u>Dependencia Actual:</u></strong></label> 
		<strong><?php echo $row_RsTrabajadores['dependencia']; ?></strong><?php */?>
		<p></p>
		<p></p>
		<label>Dependencia:</label>
		
		
			<select size="1" class="form-control" onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="dependencia" value="">

				<?php 

					$dependencias=array("Secretaría General de Gobierno","Secretaría de Administración y Finanzas","Secretaría de Innovación","Secretarí­a de Desarrollo Social","Secretaría de Desarrollo Sustentable","Secretaría de Desarrollo Económico","Secretaría de Obras Públicas","Secretaría de Educación Pública y Cultura","Secretaría de Salud","Secretaría de Agricultura y Ganadería","Secretaría de Pesca y Acuacultura","Secretaría de Turismo","Secretaría de Seguridad Pública","Secretaría de Transparencia y Rendición de Cuentas","Fiscalía General del Estado","Dirección de la Policía Ministerial","Oficina del Gobernador","Coordinación de Estrategia Digital","Coordinación de Comunicación Social");


					$iddependencia=$row_RsTrabajadores['dependencia'];


					foreach ($dependencias as $nombredependencia ) {
						if($nombredependencia==$iddependencia) 
						{
						echo "<option value='$nombredependencia' selected>$iddependencia</option>";
						}
						else
						{
						echo "<option value='$nombredependencia' value='$nombredependencia'>$nombredependencia</option>";
						}
					}
				?>

	  </select>
		
	<p></p>				 
		
		<input class="btn btn-primary"  type="submit" value="Actualizar registro">
</div>

	<input type="hidden" name="MM_update" value="form1">
	<input type="hidden" name="id_usuario" value="<?php echo $row_RsTrabajadores['id_usuario']; ?>">
</form>
</div>	
</div>
<p>&nbsp;</p>
