<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0055)http://attnet05/corman_att/hojaderuta1.asp -->
<HTML><HEAD><TITLE>HOJA DE RUTA</TITLE>

<META content="text/html; charset=windows-1252" http-equiv=Content-Type>
<META name=GENERATOR content="MSHTML 9.00.8112.16450">
<META name=ProgId content=FrontPage.Editor.Document>
<STYLE>H1.SaltoDePagina { PAGE-BREAK-AFTER: always }
.Estilo1 {  FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: #000000; FONT-SIZE: 11px; FONT-WEIGHT: bold }
.Estilo4 {  COLOR: #666666 }
.Estilo5 {  FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: #000000; FONT-SIZE: 12px}
.Estilo6 {  COLOR: #000000; FONT-WEIGHT: bold}
.Estilo10 { FONT-FAMILY: Arial, Helvetica, sans-serif; FONT-SIZE: 14px}
.Estilo11 { FONT-FAMILY: Arial, Helvetica, sans-serif; FONT-SIZE: 24px; FONT-WEIGHT: bold}
.Estilo12 { FONT-FAMILY: Arial, Helvetica, sans-serif; FONT-SIZE: 20px; FONT-WEIGHT: bold}
.Estilo21 { FONT-SIZE: 36px}
.Estilo29 { FONT-FAMILY: Arial, Helvetica, sans-serif; FONT-SIZE: 35px; FONT-WEIGHT: bold}
</STYLE>
</HEAD>
<BODY leftMargin=80 topMargin=23>

<!-- PRIMERA PAGINA -->
<TABLE style="BORDER-COLLAPSE: collapse" id=AutoNumber1 border=0 cellSpacing=0 cellPadding=0 width=690 bgColor=#cccccc height=52>
  <TBODY>
  <TR>
    <TD height=26 rowSpan=2 width=55>
    <DIV align=center><IMG border=0 alt=Logo src="<?php echo base_url(); ?>att1.png" WIDTH=80 HEIGHT=40></DIV>
  </TD>
    <TD height=26 rowSpan=2 width=300> <!-- width=300 -->
    <DIV class=Estilo6 align=center><SPAN class=Estilo12>HOJA DE RUTA <?echo $tipo_hr;?></SPAN></DIV>
  </TD>
    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=269>
    <SPAN class=Estilo4>
      <B><DIV align=left><P align=center><FONT size=7 face=Verdana><SPAN class=Estilo29><?echo $hoja_ruta;?> </SPAN></FONT></P></DIV></B>
    </SPAN>
  </TD>
  </TR>
  <TR>
  <TD style="BORDER-TOP: 1px solid" height=23 width=269>
    <P class=Estilo4 align=right><FONT size=1 face=Verdana></FONT>&nbsp;</P>
  </TD>
  </TR>
  </TBODY>
</TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 borderColor=#cccccc cellPadding=0 width=691 bgColor=#cccccc height=1>
  <TBODY>
  <TR>
    <TD height=1 vAlign=top width=648>
      <TABLE border=1 cellSpacing=0 borderColor=#000000 width=691 bgColor=#cccccc>
        <TBODY>
        <TR>
         
          <TD style="BORDER-LEFT: 0px solid; BORDER-TOP: 1px solid" vAlign=top borderColor=#000000 width="70%">
            
      </TD>
    </TR>
       
    </TBODY>
    </TABLE>
  </TD>
  </TR>
  </TBODY>
</TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 borderColor=#111111 cellPadding=0 width=691 height=1>


   
  <?for($j=1;$j<=7;$j++){?>
  <TBODY>
  <TR>
    <TD width="100%" colSpan=5>
      <TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 cellPadding=0 width="100%" height=1>
        <TBODY>
        <TR>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" background="" borderColor=#000000 width="48%">
               <FONT size=1 face=Verdana>&nbsp;</FONT>
                </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" background="" borderColor=#000000 width="20%" align=center> <!--  width="16%"-->
            <B><FONT size=1 face=Verdana>Fecha</FONT></B>
          </TD>
          
          <TD style="BORDER-LEFT:1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" background="" borderColor=#000000 width="22%" align=center>
          <B><FONT size=1 face=Verdana>Firma</FONT></B>
          </TD>
        </TR>

        
        
        <!--<TR>
          <?if($j<=1){?>

          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="48%">
             <B><FONT size=1 face=Verdana>Remitido por: </FONT></B>
             <FONT size=1 face=Verdana><?if(isset($remitente[$j])){echo $remitente[$j];}?></FONT> 
          </TD>     
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="16%" align=center>
            <FONT size=1 face=Verdana>&nbsp;<?if(isset($fecha_envio[$j])){echo $fecha_envio[$j];}?></FONT>
          </TD>          
          
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" borderColor=#000000 width="22%">&nbsp;     
          </TD>
          <?}?>
        </TR>-->


        <TR>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 0px solid; height:35px;" borderColor=#000000 width="48%">
            <B><FONT size=1 face=Verdana>Derivado a: </FONT></B>
            <FONT size=1 face=Verdana>&nbsp;<?//if(isset($destino[$j])){echo $destino[$j];}?></FONT>
          </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="16%" align=center>
            <FONT size=1 face=Verdana>&nbsp;<?//if(isset($fecha_envio[$j])){echo $fecha_envio[$j];}?></FONT>
          </TD>  
          
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" borderColor=#000000 width="36%">&nbsp;
          </TD>
        </TR>
    </TBODY>
    </TABLE>
  </TD>
  </TR>
  <TR>
    <TD height=37 width=691 colSpan=5>
      <TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 borderColor=#111111 cellPadding=0 width="100%" height=80><!-- height=28-->
        <TBODY>
        <TR>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" vAlign=top borderColor=#000000 width=333>
      <p><font size="1" face="Verdana"><?//if(isset($tarea[$j])){echo $tarea[$j];}?></font></p>
            <p>&nbsp;</p>
            <p><FONT size=1 face=Verdana></FONT></p>
            <p>&nbsp;</p>
      </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" vAlign=top borderColor=#000000 width=358>
            <TABLE style="BORDER-LEFT: 0px solid; BORDER-COLLAPSE: collapse; BORDER-TOP: 0px solid; BORDER-RIGHT: 0px solid" id=AutoNumber3 border=0 cellSpacing=0 borderColor=#111111 cellPadding=0 width="100%">
              <TBODY>
              <TR>
                <TD style="BORDER-LEFT: medium none; BORDER-TOP: medium none; BORDER-RIGHT: medium none" bgColor=#e6e6e6 width="100%" colSpan=2>
                  <P align=center><B><FONT size=1 face=Verdana>Sello/Firma de Recepci&oacute;n:</FONT></B></P>
        </TD>
        </TR>
        </TBODY>
      </TABLE>
      </TD>
    </TR>
    </TBODY>
    </TABLE>
  </TD>
  </TR>
  </TBODY>
    <?}?>
</TABLE>


<TABLE style="BORDER-COLLAPSE: collapse" id=AutoNumber2 border=1 cellSpacing=0 borderColor=#111111 cellPadding=0 width=691>
  <TBODY>
  <TR>
    <TD width="34%">

    </TD>

  </TBODY>
</TABLE>
<!-- 2DA, 3RA, 4TA, ETC PAGINAS -->
<?for($s=1;$s<$num_paginas;$s++){?>
<BR><BR><BR><BR>
<TABLE style="BORDER-COLLAPSE: collapse" id=AutoNumber1 border=0 cellSpacing=0 cellPadding=0 width=690 bgColor=#cccccc height=52>
  <TBODY>
  <TR>
    <TD height=26 rowSpan=2 width=55>
    <DIV align=center><IMG border=0 alt=Logo src="<?php echo base_url(); ?>att1.png" WIDTH=80 HEIGHT=40></DIV>
  </TD>
    <TD height=26 rowSpan=2 width=366>
    <DIV class=Estilo6 align=center><SPAN class=Estilo12>HOJA DE RUTA <?echo $tipo_hr;?></SPAN></DIV>
  </TD>
    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=269>
    <SPAN class=Estilo4>
      <B><DIV align=left><P align=center><FONT size=7 face=Verdana><SPAN class=Estilo29><?echo $hoja_ruta;?></SPAN></FONT></P></DIV></B>
    </SPAN>
  </TD>
  </TR>
  <TR>
  <TD style="BORDER-TOP: 1px solid" height=23 width=269>
    <P class=Estilo4 align=right><FONT size=1 face=Verdana></FONT>&nbsp;</P>
  </TD>
  </TR>
  </TBODY>
</TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 borderColor=#111111 cellPadding=0 width=691 height=1>
  <?for($j=7*$s;$j<=(6+(7*$s));$j++){?>
  <TBODY>
  <TR>
    <TD width="100%" colSpan=5>
      <TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 cellPadding=0 width="100%" height=1>
        <TBODY>
        <TR>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" background="" borderColor=#000000 width="48%">
      <FONT size=1 face=Verdana>&nbsp;</FONT>
      </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" background="" borderColor=#000000 width="20%" align=center>
            <B><FONT size=1 face=Verdana>Fecha</FONT></B>
          </TD>
          <!--<TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" background="" borderColor=#000000 width="14%" align=center>
            <B><FONT size=1 face=Verdana>Plazo(dias)</FONT></B>
          </TD>-->
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" background="" borderColor=#000000 width="22%" align=center>
      <B><FONT size=1 face=Verdana>Firmas</FONT></B>
      </TD>
    </TR>
        <TR>
          <?if($j<=1){?>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="48%">
          <B><FONT size=1 face=Verdana>Remitido por: </FONT></B><FONT size=1 face=Verdana><?if(isset($remitente[$j])){echo $remitente[$j];}?></FONT> 
          </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="16%" align=center>
            <FONT size=1 face=Verdana>&nbsp;<?echo $fecha_envio[$j];?></FONT>
          </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="14%">
            <FONT size=1 face=Verdana>&nbsp;</FONT>
          </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" borderColor=#000000 width="22%">&nbsp;
          <?}?>
      </TD>
    </TR>
        <TR>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 0px solid; height:35px;" borderColor=#000000 width="48%">
      <B><FONT size=1 face=Verdana>Derivado a: </FONT></B>
      <FONT size=1 face=Verdana><?if(isset($destino[$j])){echo $destino[$j];}?></FONT>
      </TD>
          
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid" borderColor=#000000 width="16%" align=center>
            <FONT size=1 face=Verdana>&nbsp;<?if(isset($fecha_envio[$j])){echo $fecha_envio[$j];}?></FONT>
          </TD>
          
      <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" borderColor=#000000 width="36%">&nbsp;
      
      </TD>
    </TR>
    </TBODY>
    </TABLE>
  </TD>
  </TR>
  <TR>
    <TD height=37 width=691 colSpan=5>
      <TABLE style="BORDER-COLLAPSE: collapse" border=0 cellSpacing=0 borderColor=#111111 cellPadding=0 width="100%" height=28>
        <TBODY>
        <TR>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" vAlign=top borderColor=#000000 width=333>
      <p><font size="1" face="Verdana"><?if(isset($tarea[$j])){echo $tarea[$j];}?></font></p>
            <p>&nbsp;</p>
            <p><FONT size=1 face=Verdana></FONT></p>
            <p>&nbsp;</p>
      </TD>
          <TD style="BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" vAlign=top borderColor=#000000 width=358>
            <TABLE style="BORDER-LEFT: 0px solid; BORDER-COLLAPSE: collapse; BORDER-TOP: 0px solid; BORDER-RIGHT: 0px solid" id=AutoNumber3 border=0 cellSpacing=0 borderColor=#111111 cellPadding=0 width="100%">
              <TBODY>
              <TR>
                <TD style="BORDER-LEFT: medium none; BORDER-TOP: medium none; BORDER-RIGHT: medium none" bgColor=#e6e6e6 width="100%" colSpan=2>
                  <P align=center><B><FONT size=1 face=Verdana>Sello/Firma de Recepci&oacute;n:</FONT></B></P>
        </TD>
        </TR>
        </TBODY>
      </TABLE>
      </TD>
    </TR>
    </TBODY>
    </TABLE>
  </TD>
  </TR>
  </TBODY>
    <?}?>
</TABLE>


<TABLE style="BORDER-COLLAPSE: collapse" id=AutoNumber2 border=1 cellSpacing=0 borderColor=#111111 cellPadding=0 width=691>
  <TBODY>
  <TR>
    <TD width="34%">

  </TR>
  </TBODY>
</TABLE>
<?}?>


</BODY>
</HTML>
