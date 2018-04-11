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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO trabajadores (nombre, apellidos, cel, extencion, puesto, dependencia) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellidos'], "text"),
                       GetSQLValueString($_POST['cel'], "text"),
                       GetSQLValueString($_POST['extencion'], "text"),
					   GetSQLValueString($_POST['puesto'], "text"),
					   GetSQLValueString($_POST['dependencia'], "text"));

  mysql_select_db($database_base, $base);
  $Result1 = mysql_query($insertSQL, $base) or  header(sprintf("Location: %s", "creartrabajadores.php"));
  //die('existe un valor nulo: ' . mysql_error());
  //header(sprintf("Location: %s", "creartrabajadores.php"));
  $insertGoTo = "creartrabajadores.php";
  //$insertGoTo = "listadotrabajadores3.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
	
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_base, $base);
$query_RsTrabajadores = "SELECT * FROM trabajadores ORDER BY id_usuario ASC";
$RsTrabajadores = mysql_query($query_RsTrabajadores, $base) or die(mysql_error());
$row_RsTrabajadores = mysql_fetch_assoc($RsTrabajadores);
$totalRows_RsTrabajadores = mysql_num_rows($RsTrabajadores);
mysql_free_result($RsTrabajadores);

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
.error {color: #FF0000;};
</style>

<h1><img src="img/innovacion.jpg" width="263" height="102" /> </h1>
<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
<h1 class="Estilo1">Forma para dar de alta a trabajadores </h1>

<ol class="breadcrumb" style="background-color:#9d1b30; color:#FFFFFF ">
  <li><h3><a href="listadotrabajadores3.php" style="color:#FFFFFF">Regresar al menú</a></h3></li>
</ol>
<p>&nbsp;</p>

<div class='center'>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
	<div class='control-group'>
		<label>Nombre:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="nombre" value="" size="50">
  		<label>Apellido:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="apellidos" value="" size="50">
  		<label>Celular:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="cel" value="" size="32">
  		<label>Extensión:</label>
    	<input class='form-control' onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="extencion" value="" size="32">
		
		<label for="puesto">Puesto:</label>
			<select size="1" class="form-control" onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="puesto" value="">
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
		
		  </select>
		
		
		<label for="dependencia">Dependencia:</label>
			<select size="1" class="form-control" onmouseover="this.style.backgroundColor='#FFFFC6';this.style.cursor='hand';" onmouseout="this.style.backgroundColor='#FFFFFF'" type="text" name="dependencia" value="">
    			<option value="Secretaría General de Gobierno">Secretaría General de Gobierno</option>
				<option value="Secretaría de Administración y Finanzas">Secretaría de Administración y Finanzas</option>
				<option value="Secretaría de Innovación">Secretaría de Innovación</option>
				<option value="Secretarí­a de Desarrollo Social">Secretaría de Desarrollo Social</option>
				<option value="Secretaría de Desarrollo Sustentable">Secretaría de Desarrollo Sustentable</option>
				<option value="Secretaría de Desarrollo Económico">Secretaría de Desarrollo Económico</option>
				<option value="Secretaría de Obras Públicas">Secretaría de Obras Públicas</option>
				<option value="Secretaría de Educación Pública y Cultura">Secretaría de Educación Pública y Cultura</option>
				<option value="Secretaría de Salud">Secretaría de Salud</option>
				<option value="Secretaría de Agricultura y Ganadería">Secretaría de Agricultura y Ganadería</option>
				<option value="Secretaría de Pesca y Acuacultura">Secretaría de Pesca y Acuacultura</option>
				<option value="Secretaría de Turismo">Secretaría de Turismo</option>
				<option value="Secretaría de Seguridad Pública">Secretaría de Seguridad Pública</option>
				<option value="Secretaría de Transparencia y Rendición de Cuentas">Secretaría de Transparencia y Rendición de Cuentas</option>
				<option value="Fiscalía General del Estado">Fiscalía General del Estado</option>
				<option value="Dirección de la Policía Ministerial">Dirección de la Policía Ministerial</option>
				<option value="Oficina del Gobernador">Oficina del Gobernador</option>
				<option value="Coordinación de Estrategia Digital">Coordinación de Estrategia Digital</option>
				<option value="Coordinación de Comunicación Social">Coordinación de Comunicación Social</option>
									
	  </select>
		
			
		<input class="btn btn-primary" type="submit" value="Insertar registro" onclick="valida_envia()">
		 
	</div>
   
	<input type="hidden" name="MM_insert" value="form1">
	
    
</form>
</div>	
</div>
<p>&nbsp;</p>

<script>
function valida_envia(){ 
   	//valido el nombre 
   	if (document.form1.nombre.value.length==0) { 
      	alert("El campo nombre no puede quedar vacío, gracias") 
		document.form1.nombre.focus()
		<?php
         header('Location: creartrabajadores.php?');
         ?>
		
		return 0  ; 
	   	} 
		
	if (document.form1.apellidos.value.length==0){ 
      	alert("El campo apellidos no puede quedar vacío, gracias") 
      	document.form1.apellidos.focus()
		<?php
         header('Location: creartrabajadores.php?');
         ?> 
		return 0  ; 
	   	} 		
		
	if (document.form1.extencion.value.length==0){ 
      	alert("El campo extensión no puede quedar vacío, gracias") 
      	document.form1.extencion.focus() 
		<?php
         header('Location: creartrabajadores.php?');
         ?>
		return 0  ; 
	   	} 	
	
	//el formulario se envia 
   	alert("Todo está correcto"); 
   	document.form1.submit(); 

}
</script>