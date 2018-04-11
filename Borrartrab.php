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

if ((isset($_GET['recordID'])) && ($_GET['recordID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM trabajadores WHERE id_usuario=%s",
                       GetSQLValueString($_GET['recordID'], "int"));

  mysql_select_db($database_base, $base);
  $Result1 = mysql_query($deleteSQL, $base) or die(mysql_error());

  $deleteGoTo = "listadotrabajadores2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$idtrabajador_RsTrabajadores = "1";
if (isset($_get["recordID"])) {
  $idtrabajador_RsTrabajadores = (get_magic_quotes_gpc()) ? $_get["recordID"] : addslashes($_get["recordID"]);
}
mysql_select_db($database_base, $base);
$query_RsTrabajadores = sprintf("SELECT * FROM trabajadores WHERE trabajadores.id_usuario = %s", $idtrabajador_RsTrabajadores);
$RsTrabajadores = mysql_query($query_RsTrabajadores, $base) or die(mysql_error());
$row_RsTrabajadores = mysql_fetch_assoc($RsTrabajadores);
$totalRows_RsTrabajadores = mysql_num_rows($RsTrabajadores);
?>
<span class="glyphicons glyphicons-git-delete"></span>
<h1>Borrando.........</h1>
<p>
  <?php
mysql_free_result($RsTrabajadores);
?>
</p>
<p>&nbsp;</p>
