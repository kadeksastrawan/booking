<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Nota Dinas</title>
<style type="text/css">
html {
	margin-top : 7mm;
	margin-left : 13mm;
	margin-right : 13mm;
}
table.gridtable {
	font-family: times,arial,sans-serif;
	font-size:9px;
	width: 18.00cm; 
	
}
table.gridtable td {
	padding: 0px;
	text-align: left;
}
</style>

</head>
<body>
<?php foreach($query_docs as $row)
{?>
<table width="600">
	<tr><td align="center"><?php if ($row->docs_type == 'ND'){echo 'NOTA DINAS';}?> </td></tr>
	<tr><td>Nomor : <?php echo $row->docs_no;?></td></tr>
	<td><br/></td>
	<tr><td>Kepada   : <?php echo $row->docs_to;?></td></tr>
	<tr><td>Dari     : <?php echo $row->docs_from;?></td></tr>
	<tr><td>Tembusan : <?php echo $row->docs_copy;?></td></tr>
	<tr><td>Perihal  : <?php echo $row->docs_subject;?></td></tr>
	<td><br/></td>
	<tr><td><?php echo $row->docs_description;?></td></tr>
	<td><br/></td>
	<tr><td>Jakarta,</td></tr>
	<td><br/></td>
	<tr><td>.................</td></tr>
	<tr><td>(...............)</td></tr>
	<td><br/></td>
	<tr><td>.................</td></tr>
	<tr><td>(...............)</td></tr>
</table>
<?php }?>
</body>
</html>
