<?php
/*********************************************************************************
 *       Filename: devolucion.php
 *       Generated with CodeCharge 2.0.5
 *       PHP 4.0 build 11/30/2001
 *********************************************************************************/

//-------------------------------
// devolucion CustomIncludes begin
session_start();
include_once ("./common.php");
include_once ("./encabezado.php");

// devolucion CustomIncludes end
//-------------------------------

//$db->conn->debug=true;

//===============================
// Save Page and File Name available into variables
//-------------------------------
$sFileName = "devolucion.php";
//===============================


//===============================
// devolucion PageSecurity begin
check_security();
// devolucion PageSecurity end
//===============================

//===============================
// devolucion Open Event begin
// devolucion Open Event end
//===============================

//===============================
// devolucion OpenAnyPage Event start
// devolucion OpenAnyPage Event end
//===============================

//===============================
//Save the name of the form and type of action into the variables
//-------------------------------
$sAction = get_param("FormAction");
$sForm = get_param("FormName");
//===============================

// devolucion Show begin

//===============================
// Display page

//===============================
// HTML Page layout
//-------------------------------
?><html>
<head>
<title></title>
<meta name="GENERATOR" content="YesSoftware CodeCharge v.2.0.5 build 11/30/2001">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="cache-control" content="no-cache">
<link rel="stylesheet" href="Site.css" type="text/css"></head>
<body class="PageBODY">

 <table>
  <tr>
   <td valign="top">
 <?php Form1_show() ?>
   
   </td>
  </tr>
 </table>

 <table>
  <tr>
   
   <td valign="top">
<?php Search_show() ?>
    
   </td>
  </tr>
 </table>
 <table>
  <tr>
   <td valign="top">
<?php PRESTAMO_show() ?>
    
   </td>
  </tr>
 </table>


</body>
</html>
<?php

// devolucion Show end

//===============================
// devolucion Close Event begin
// devolucion Close Event end
//===============================
//********************************************************************************


//===============================
// Display Search Form
//-------------------------------
function Search_show()
{
  global $db;
  global $styles;
  
  global $sForm;
  $sFormTitle = "Buscar";
  $sActionFileName = "devolucion.php";

//-------------------------------
// Search Open Event begin
// Search Open Event end
//-------------------------------
//-------------------------------
// Set variables with search parameters
//-------------------------------
  $flds_RADI_NUME_RADI = strip(get_param("s_RADI_NUME_RADI"));

//-------------------------------
// Search Show begin
//-------------------------------


//-------------------------------
// Search Show Event begin
// Search Show Event end
//-------------------------------
?>
    <form method="GET" action="<?= $sActionFileName ?>" name="Search">
    <input type="hidden" name="FormName" value="Search"><input type="hidden" name="FormAction" value="search">
    <table class="FormTABLE">
     <tr>
      <td class="FormHeaderTD" colspan="3"><a name="Search"><font class="FormHeaderFONT"><?=$sFormTitle?></font></a></td>
     </tr>
     <tr>
      <td class="FieldCaptionTD"><font class="FieldCaptionFONT">Radicado</font></td>
      <td class="DataTD"><input type="text" name="s_RADI_NUME_RADI" maxlength="" value="<?= tohtml($flds_RADI_NUME_RADI) ?>" size="" ></td>
     <td ><input type="submit" value="B�squeda"></td>
    </tr>
   </table>
   </form>
<?

//-------------------------------
// Search Show end
//-------------------------------

//-------------------------------
// Search Close Event begin
// Search Close Event end
//-------------------------------
//===============================
}


//===============================
// Display Grid Form
//-------------------------------
function PRESTAMO_show()
{
//-------------------------------
// Initialize variables  
//-------------------------------
  
  
  global $db;
  global $sPRESTAMOErr;
  global $sFileName;
  global $styles;
  $sWhere = "";
  $sOrder = "";
  $sSQL = "";
  $sFormTitle = "Documentos Prestados";
  $HasParam = false;
  $iRecordsPerPage = 20;
  $iCounter = 0;
  $iPage = 0;
  $bEof = false;
  $iSort = "";
  $iSorted = "";
  $sDirection = "";
  $sSortParams = "";
  $iTmpI = 0;
  $iTmpJ = 0;
  $sCountSQL = "";

  $transit_params = "";
  $form_params = "s_RADI_NUME_RADI=" . tourl(get_param("s_RADI_NUME_RADI")) . "&";

//-------------------------------
// Build ORDER BY statement
//-------------------------------
  $iSort = get_param("FormPRESTAMO_Sorting");
  $iSorted = get_param("FormPRESTAMO_Sorted");
  if(!$iSort)
  {
    $form_sorting = "";
  }
  else
  {
    if($iSort == $iSorted)
    {
      $form_sorting = "";
      $sDirection = " DESC";
      $sSortParams = "FormPRESTAMO_Sorting=" . $iSort . "&FormPRESTAMO_Sorted=" . $iSort . "&";
    }
    else
    {
      $form_sorting = $iSort;
      $sDirection = " ASC";
      $sSortParams = "FormPRESTAMO_Sorting=" . $iSort . "&FormPRESTAMO_Sorted=" . "&";
    }
    if ($iSort == 1) $sOrder = " order by P.RADI_NUME_RADI" . $sDirection;
    if ($iSort == 2) $sOrder = " order by P.USUA_LOGIN_ACTU" . $sDirection;
    if ($iSort == 3) $sOrder = " order by D.DEPE_NOMB" . $sDirection;
    if ($iSort == 4) $sOrder = " order by P.USUA_LOGIN_PRES" . $sDirection;
    if ($iSort == 5) $sOrder = " order by P.PRES_DESC" . $sDirection;
    if ($iSort == 6) $sOrder = " order by P.PRES_FECH_PRES" . $sDirection;
    if ($iSort == 7) $sOrder = " order by P.PRES_FECH_DEVO" . $sDirection;
    if ($iSort == 8) $sOrder = " order by P.PRES_FECH_PEDI" . $sDirection;
    if ($iSort == 9) $sOrder = " order by P.PRES_ESTADO" . $sDirection;
    if ($iSort == 10) $sOrder = " order by P.PRES_REQUERIMIENTO" . $sDirection;
    if ($iSort == 11) $sOrder = " order by P.PRES_FECH_VENC" . $sDirection;
  }

//-------------------------------
// HTML column headers
//-------------------------------
?>
     <table class="FormTABLE">
      <tr>
       <td class="FormHeaderTD" colspan="10"><a name="PRESTAMO"><font class="FormHeaderFONT"><?=$sFormTitle?></font></a></td>
      </tr>
      <tr>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=1&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Radicado</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=2&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Solicit&oacute;</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=3&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Dependencia</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=4&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Prest&oacute;</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=5&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Descripci&oacute;n</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=8&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Solicitado el</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=6&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Prestado el</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=11&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Vence</font></a></td>
       <td class="ColumnTD"><a href="<?=$sFileName?>?<?=$form_params?>FormPRESTAMO_Sorting=10&FormPRESTAMO_Sorted=<?=$form_sorting?>&"><font class="ColumnFONT">Requerimiento</font></a></td>
       <td class="ColumnTD"><font class="ColumnFONT">Renovar</font></td>
      </tr>
<?
  
//-------------------------------
// Build WHERE statement
//-------------------------------
  $ps_RADI_NUME_RADI = get_param("s_RADI_NUME_RADI");

  if(is_number($ps_RADI_NUME_RADI) && strlen($ps_RADI_NUME_RADI)) 
    $ps_RADI_NUME_RADI = tosql($ps_RADI_NUME_RADI, "Number");
  else 
    $ps_RADI_NUME_RADI = "";
  if(strlen($ps_RADI_NUME_RADI))
  {
    $HasParam = true;
    $sWhere = "P.RADI_NUME_RADI like ('%" . $ps_RADI_NUME_RADI . "%') or " . "P.USUA_LOGIN_ACTU like " . tosql("%".$ps_RADI_NUME_RADI ."%", "Text");
  }


  if($HasParam)
    $sWhere = " AND (" . $sWhere . ")";


//-------------------------------
// Build base SQL statement
//-------------------------------
  $radiATexto = $db->conn->numToString("P.RADI_NUME_RADI");
  $sSQL = "select P.DEPE_CODI as P_DEPE_CODI, " . 
    "P.PRES_DESC as P_PRES_DESC, " . 
    "P.PRES_ESTADO as P_PRES_ESTADO, " . 
    "P.PRES_FECH_PEDI as P_PRES_FECH_PEDI, " . 
    "P.PRES_FECH_PRES as P_PRES_FECH_PRES, " . 
    "P.PRES_FECH_VENC as P_PRES_FECH_VENC, " . 
    "P.PRES_ID as P_PRES_ID, " . 
    "P.PRES_REQUERIMIENTO as P_PRES_REQUERIMIENTO, " . 
    " $radiATexto as P_RADI_NUME_RADI, " . 
    "P.USUA_LOGIN_ACTU as P_USUA_LOGIN_ACTU, " . 
    "P.USUA_LOGIN_PRES as P_USUA_LOGIN_PRES, " . 
    "D.DEPE_CODI as D_DEPE_CODI, " . 
    "D.DEPE_NOMB as D_DEPE_NOMB " . 
    " from PRESTAMO P, DEPENDENCIA D"  . 
    " where D.DEPE_CODI=P.DEPE_CODI  ";
//-------------------------------

//-------------------------------
// PRESTAMO Open Event begin
$depe=get_session("Dependencia");
$sWhere .= " AND (P.PRES_ESTADO=2 OR P.PRES_ESTADO=5) AND PRES_DEPE_ARCH=".$depe;
// PRESTAMO Open Event end
//-------------------------------

//-------------------------------
// Assemble full SQL statement
//-------------------------------
  $sSQL .= $sWhere . $sOrder;
  if($sCountSQL == "")
  {
    $iTmpI = strpos(strtolower($sSQL), "select");
    $iTmpJ = strpos(strtolower($sSQL), "from") - 1;
    $sCountSQL = str_replace(substr($sSQL, $iTmpI + 6, $iTmpJ - $iTmpI - 6), " count(*) ", $sSQL);
    $iTmpI = strpos(strtolower($sCountSQL), "order by");
    if($iTmpI > 1) 
      $sCountSQL = substr($sCountSQL, 0, $iTmpI - 1);
  }
//-------------------------------

  

//-------------------------------
// Execute SQL statement
//-------------------------------
  $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
  $rs=$db->query($sSQL);
  $db->conn->SetFetchMode(ADODB_FETCH_NUM);  
//-------------------------------
// Process empty recordset
//-------------------------------
  if(!$rs || $rs->EOF)
  {
?>
     <tr>
      <td colspan="10" class="DataTD"><font class="DataFONT">No hay Registros</font></td>
     </tr>
<?
 
//-------------------------------
//  The insert link.
//-------------------------------
?>
    <tr>
     <td colspan="10" class="ColumnTD"><font class="ColumnFONT">
<?
  
?>
  </table>
<?

    return;
  }

//-------------------------------

//-------------------------------
// Prepare the lists of values
//-------------------------------
  
  $aPRES_ESTADO = split(";", "1;Pedido;2;Prestado;3;Devuelto;4;Cancelado;5;Prestamo Indefinido");
  $aPRES_REQUERIMIENTO = split(";", "1;Documento;2;Anexo");
//-------------------------------
//-------------------------------
// Initialize page counter and records per page
//-------------------------------
  $iRecordsPerPage = 20;
  $iCounter = 0;
//-------------------------------

//-------------------------------
// Process page scroller
//-------------------------------
  $iPage = get_param("FormPRESTAMO_Page");
  $db_count = get_db_value($sCountSQL);
  $dResult = intval($db_count) / $iRecordsPerPage;
  $iPageCount = intval($dResult);
  if($iPageCount < $dResult) $iPageCount = $iPageCount + 1;
  $iTotalPages = $iPageCount;

  
  if(!strlen($iPage))
    $iPage = 1;
  else
  {
    if($iPage == "last") $iPage = $iPageCount;
  }
  
if(($iPage - 1) * $iRecordsPerPage != 0)
  {
    do
    {
      $iCounter++;
      $rs->MoveNext();
    } while ($iCounter < ($iPage - 1) * $iRecordsPerPage && !$rs->EOF);
    
  }
  $iCounter = 0;
//-------------------------------

//-------------------------------
// Display grid based on recordset
//-------------------------------
  while($rs && !$rs->EOF  && $iCounter < $iRecordsPerPage)
  {
//-------------------------------
// Create field variables based on database fields
//-------------------------------
    $fldDEPE_CODI =$rs->fields["D_DEPE_NOMB"];
    $fldPRES_DESC =$rs->fields["P_PRES_DESC"];
    $fldPRES_ESTADO =$rs->fields["P_PRES_ESTADO"];
    $fldPRES_FECH_DEVO =$rs->fields["P_PRES_FECH_DEVO"];
    $fldPRES_FECH_PEDI =$rs->fields["P_PRES_FECH_PEDI"];
    $fldPRES_FECH_PRES =$rs->fields["P_PRES_FECH_PRES"];
    $fldPRES_FECH_VENC =$rs->fields["P_PRES_FECH_VENC"];
    $fldPRES_ID =$rs->fields["P_PRES_ID"];
    $fldPRES_REQUERIMIENTO = $rs->fields["P_PRES_REQUERIMIENTO"];
    $fldRADI_NUME_RADI_URLLink = "devolver.php";
    $fldRADI_NUME_RADI_PRES_ID =$rs->fields["P_PRES_ID"];
    $fldRADI_NUME_RADI =$rs->fields["P_RADI_NUME_RADI"];
    $fldUSUA_LOGIN_ACTU =$rs->fields["P_USUA_LOGIN_ACTU"];
    $fldUSUA_LOGIN_PRES =$rs->fields["P_USUA_LOGIN_PRES"];
    $rs->MoveNext();
    
//-------------------------------
// PRESTAMO Show begin
//-------------------------------

//-------------------------------
// PRESTAMO Show Event begin
// PRESTAMO Show Event end
//-------------------------------


//-------------------------------
// Process the HTML controls
//-------------------------------
?>
      <tr>
       <td class="DataTD"><font class="DataFONT"><a href="<?=$fldRADI_NUME_RADI_URLLink?>?PRES_ID=<?=$fldRADI_NUME_RADI_PRES_ID?>&<?= $transit_params ?>"><font class="DataFONT"><?=$fldRADI_NUME_RADI?></font></a>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldUSUA_LOGIN_ACTU) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldDEPE_CODI) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldUSUA_LOGIN_PRES) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldPRES_DESC) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldPRES_FECH_PEDI) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldPRES_FECH_PRES) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <?= tohtml($fldPRES_FECH_VENC) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT">
      <? $fldPRES_REQUERIMIENTO = get_lov_value($fldPRES_REQUERIMIENTO, $aPRES_REQUERIMIENTO); ?>
      <?= tohtml($fldPRES_REQUERIMIENTO) ?>&nbsp;</font></td>
       <td class="DataTD"><font class="DataFONT"><a href="renovar.php?PRES_ID=<?=$fldRADI_NUME_RADI_PRES_ID?>&<?= $transit_params ?>"><font class="DataFONT">Renovar</font></a>&nbsp;</font></td>
      </tr><?
//-------------------------------
// PRESTAMO Show end
//-------------------------------

//-------------------------------
// Move to the next record and increase record counter
//-------------------------------
    
    $iCounter++;
  }

 
//-------------------------------
//  Grid. The insert link and record navigator.
//-------------------------------
?>
    <tr>
     <td colspan="10" class="ColumnTD"><font class="ColumnFONT">
<?
  
  // PRESTAMO Navigation begin

  if(($rs || !$rs->EOF ) || $iPage != 1)
  {
    $iCounter = 1;
    $iHasPages = $iPage;
    $sPages = "";
    $iDisplayPages = 0;
    $iNumberOfPages = 10;
    $iHasPages = $iPageCount;
    if (($iHasPages - $iPage) < intval($iNumberOfPages / 2))
      $iStartPage = $iHasPages - $iNumberOfPages;
    else
      $iStartPage = $iPage - $iNumberOfPages + intval($iNumberOfPages / 2);
    
    if($iStartPage < 0) $iStartPage = 0;
    for($iPageCount = $iStartPage + 1;  $iPageCount <= $iPage - 1; $iPageCount++)
    {
      $sPages .=  "<a href=\"$sFileName?$form_params$sSortParams$FormPRESTAMO_Page=$iPageCount#PRESTAMO\"><font " . "class=\"ColumnFONT\"" . ">" . $iPageCount . "</font></a>&nbsp;";
      $iDisplayPages++;
    }
    
    $sPages .= "<font " . "class=\"ColumnFONT\"" . ">" . $iPage . "</font>&nbsp;";
    $iDisplayPages++;
    
    $iPageCount = $iPage + 1;
    while ($iDisplayPages < $iNumberOfPages && $iStartPage + $iDisplayPages < $iHasPages)
    {
      
      $sPages .= "<a href=\"" . $sFileName . "?" . $form_params . $sSortParams . "FormPRESTAMO_Page=" . $iPageCount . "#PRESTAMO\"><font " . "class=\"ColumnFONT\"" . ">" . $iPageCount . "</font></a>&nbsp;";
      $iDisplayPages++;
      $iPageCount++;
    }
    if ($iPage == 1) {
?>
        <font class="ColumnFONT">Primero</font>
        <font class="ColumnFONT">Anterior</font>
<? }
    else {
?>
        <a href="<?=$sFileName?>?<?=$form_params?><?=$sSortParams?>FormPRESTAMO_Page=1#PRESTAMO"><font class="ColumnFONT">Primero</font></a>
        <a href="<?=$sFileName?>?<?=$form_params?><?=$sSortParams?>FormPRESTAMO_Page=<?=$iPage - 1?>#PRESTAMO"><font class="ColumnFONT">Anterior</font></a>
<?
    }
    echo "&nbsp;[&nbsp;" . $sPages . "of " . $iTotalPages ."&nbsp;" . "]&nbsp;";
    
    if (!$bEof) {
?>
        <font class="ColumnFONT">Siguiente</font>
        <font class="ColumnFONT">Ultimo</font>
<?
    }
    else {
?>
        <a href="<?=$sFileName?>?<?=$form_params?><?=$sSortParams?>FormPRESTAMO_Page=<?=$iPage + 1?>#PRESTAMO"><font class="ColumnFONT">Siguiente</font></a>
        <a href="<?=$sFileName?>?<?=$form_params?><?=$sSortParams?>FormPRESTAMO_Page=last#PRESTAMO"><font class="ColumnFONT">Ultimo</font></a>
<?
    }
  }

//-------------------------------
// PRESTAMO Navigation end
//-------------------------------

//-------------------------------
// Finish form processing
//-------------------------------
  ?>
      </font></td></tr>
    </table>
  <?


//-------------------------------
// PRESTAMO Close Event begin
// PRESTAMO Close Event end
//-------------------------------
}
//===============================

?>
