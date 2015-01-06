<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Document</title>
</head>

<body>
<?php 
foreach($query_docs as $row){
if ($row->docs_type == 'SKEP'){?>
		<table>	
						<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
						
						<tr><td><br/></td><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><b><u>SURAT KEPUTUSAN</u></b></td>
						</tr>
						
						<tr><td></td></tr>	
						
						<tr>
							<td colspan="2" align="center">Nomor : <?php echo strtoupper($row->docs_no);?></td>
						</tr>
						
						<tr><td></td></tr>		   
						
						<tr>
							<td colspan="2" align="center"><h5>Tentang</h5></td>
						</tr>
						
						<tr><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><?php echo $row->docs_subject; ?></td>
						</tr>
								   
						<tr><td><br/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td><br/></td></tr>
								   
						<tr>
							<td><?php echo $row->docs_description ;?></td>
						</tr>
		</table>
					
	<?php } 
	else if ($row->docs_type == 'Inst'){
	?>
		<table>
						<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
						
						<tr><td><br/></td><td></td></tr>						
						
						<tr>
							<td colspan="2" align="center"><b><u>INSTRUKSI</u></b></td>
						</tr>
						
						<tr><td></td></tr>	
						
						<tr>
							<td colspan="2" align="center">Nomor : <?php echo strtoupper($row->docs_no);?></td>
						</tr>
						
						<tr><td></td></tr>		   
						
						<tr>
							<td colspan="2" align="center"><h5>Tentang</h5></td>
						</tr>
						
						<tr><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><?php echo $row->docs_subject; ?></td>
						</tr>
								   
						<tr><td><br/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td><br/></td></tr>
								   
						<tr>
							<td><?php echo $row->docs_description ;?></td>
						</tr>
		</table>
	<?php } 
	else if($row->docs_type == 'SE') {
	?>
		<table>
						<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
						
						<tr><td><br/></td><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><b><u>SURAT EDARAN</u></b></td>
						</tr>
						
						<tr><td></td></tr>	
						
						<tr>
							<td colspan="2" align="center">Nomor : <?php echo strtoupper($row->docs_no);?></td>
						</tr>
						
						<tr><td></td></tr>		   
						
						<tr>
							<td colspan="2" align="center"><h5>Tentang</h5></td>
						</tr>
						
						<tr><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><?php echo $row->docs_subject; ?></td>
						</tr>
								   
						<tr><td><br/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td><br/></td></tr>
								   
						<tr>
							<td><?php echo $row->docs_description ;?></td>
						</tr>
		</table>
	<?php } 
	else if($row->docs_type == 'SD') {
	?>
		<table>
			<tr>
				<td colspan="2" align="left">
				<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
				</td>
			</tr>
			
			<tr><td><br/></td><td></td></tr>
			
			<tr>
            	<td colspan="2">Kepada Yth.</td>
            </tr>
					   
			<tr><td><br/></td><td></td></tr>
					   
			<tr>
				<td colspan="2"><?php echo $row->docs_to;?></td>
            </tr>
					   
			<tr><td><br/></td><td></td></tr>
					   
			<tr>
				<td width="15%">Jakarta</td>
				<td>: <?php echo mdate("%d-%m-%Y",strtotime($row->docs_date));?></td>
            </tr>		   
					   
			<tr>
                <td>Nomor</td>
				<td>: <?php echo strtoupper($row->docs_no);?></td>
            </tr>
                       
			<tr>
				<td>Perihal</td>
				<td>: <?php echo $row->docs_subject; ?></td>
            </tr>
                       
			<tr><td><br/></td><td></td></tr>
                       
			<tr>
                <td colspan="2"><?php echo $row->docs_description ;?></td>
            </tr>
		</table>
	<?php } 
	else 
	if ($row->docs_type == 'GAPURA'){
	?>
		<table>		
            <tr>
				<td colspan="2" align="left">
				<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
				</td>
			</tr>
			
			<tr><td><br/></td><td></td></tr>
			          
			<tr>
            	<td colspan="2">Kepada Yth.</td>
            </tr>
					   
			<tr><td><br/></td><td></td></tr>
					   
			<tr>
				<td colspan="2"><?php echo $row->docs_to;?></td>
            </tr>
					   
			<tr><td><br/></td><td></td></tr>
					   
			<tr>
				<td width="15%">Jakarta</td>
				<td>: <?php echo mdate('%d-%m-%Y',strtotime($row->docs_date));?></td>
            </tr>
					   
			<tr>
                <td>Nomor</td>
				<td>: <?php echo strtoupper($row->docs_no);?></td>
            </tr>
                       
			<tr>
				<td>Perihal</td>
				<td>: <?php echo $row->docs_subject; ?></td>
            </tr>
                       
			<tr><td><br/></td><td></td></tr>
                       
			<tr>
                <td colspan="2"><?php echo $row->docs_description ;?></td>
            </tr>
		</table>
	<?php } 
	else 
	if ($row->docs_type == 'ND'){?>
		<table>	
            <tr>
				<td colspan="3" align="left">
				<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
				</td>
			</tr>
			
			<tr><td colspan="3"><br/></td></tr>
			
			<tr>
                <td colspan="3" align="center"><b><u>NOTA DINAS</u></b></td>
            </tr>     
                       
            <tr><td colspan="3"><br/></td></tr>
                              
            <tr>
                <td width="15%">Nomor</td>
				<td width="3%">:</td>
				<td width="82%"><?php echo strtoupper($row->docs_no);?></td>
            </tr>
			
			<tr><td colspan="3"><br/></td></tr>
			
            <tr>
                <td>Kepada Yth</td>
				<td>: </td>
				<td><?php echo strtoupper($row->docs_to);?></td>
            </tr>

            <tr>
                <td>Dari</td>
				<td>: </td>
				<td><?php echo strtoupper($row->docs_from);?></td>
            </tr>
			
            <tr>
                <td>Tembusan </td>
				<td>: </td>
				<td>
				<?php 
					$no = 0;
					   foreach ($query_copy as $copy) 
					   {	$no++;
							echo $no.'. ';
							echo strtoupper(ucwords($this->encrypt->decode($copy->ui_nama, $this->config->item('encryption_key')))).'<br/>';
					   }
				?></td>
            </tr>

            <tr>
                <td>Perihal</td>
				<td >: </td>
				<td><?php echo $row->docs_subject; ?></td>
            </tr>
             
			<tr><td colspan="3"><br/></td></tr>
            <tr><td colspan="3"><hr/></td></tr>
                       
            <tr>
                <td colspan="3"><?php echo $row->docs_description ;?></td>
            </tr>
		</table>
	<?php }
	else
	if ($row->docs_type == 'PE'){?>
				
		<table>
						<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
						
						<tr><td><br/></td><td></td></tr>
                    	
						<tr>
                        	<td colspan="2" align="center"><b><u>PENGUMUMAN</u></b></td>
                       </tr>
                       
                       <tr><td><br/></td><td></td></tr>
                       
                       <tr>
                       		<td width="15%">Nomor</td>
							<td width="85%">: <?php echo strtoupper($row->docs_no);?></td>
                       </tr>
					   
					   <tr><td><br/></td><td></td></tr>
					   
					   <tr>
                       <td colspan="2"><?php echo $row->docs_description ;?></td>
                       </tr>
		</table>
	<?php } 
	if ($row->docs_type == 'Sprint'){?>
		
		<table>
                    	<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
			
						<tr><td><br/></td><td></td></tr>
						
						<tr>
                        	<td  colspan="2" align="center"><b><u>SURAT PERINTAH </u></b></td>
                       </tr>
                       
                       <tr><td colspan="2"><br /></td></tr>
                       
                       <tr>
                       		<td width="15%">Nomor</td>
							<td width="85%">: <?php echo strtoupper($row->docs_no);?></td>
                       </tr>
					   
					  <tr><td colspan="2"><br /></td></tr>
					   
					   <tr>
                       <td colspan="2"><?php echo $row->docs_description ;?></td>
                       </tr>
		</table>
	<?php } 
	else
	if ($row->docs_type == 'NR'){?>
		
		<table>
                    	<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
						
						<tr><td><br/></td><td></td></tr>
						
                    	<tr>
                        	<td colspan="2" align="center"><b><u>NOTULEN RISALAH RAPAT </u></b></td>
                       </tr>
                       
                      <tr><td><br/></td><td></td></tr>
					   
					   <tr>
                       <td colspan="2"><?php echo $row->docs_description ;?></td>
                       </tr>
		</table>
	<?php } 
	else
	if ($row->docs_type == 'MM'){?>
				
		<table>
						<tr>
							<td colspan="2" align="left">
							<img src="<?php echo base_url()."./wp-content/themes/gapura-angkasa/modules/wms/images/logo-small_ioc.jpg" ?>" width="150px" height="25px">
							</td>
						</tr>
						
						<tr><td><br/></td><td></td></tr>
						
						<tr>
                        	<td colspan="2" align="center"><b><u>MEMO</u></b></td>
                       </tr>
                       
                       <tr><td><br/></td><td></td></tr>
					   
					   <tr>
                       		<td colspan="2">Kepada Yth.</td>
                       </tr>
					   <tr>
							<td colspan="2"><?php echo $row->docs_to;?></td>
                       </tr>
					   
					  <tr><td><br/></td><td></td></tr>
					   
					   <tr>
                       <td colspan="2"><?php echo $row->docs_description ;?></td>
                       </tr>
		</table>
	<?php }?>
<?php } ?>

<?php
/* foreach($query_docs as $row)
{?>

	
	<?php if ($row->docs_type == 'SKEP'){?>

						<tr>
							<td colspan="2" align="center"><b><u>SURAT KEPUTUSAN</u></b></td>
						</tr>
						
						<tr><td></td></tr>	
						
						<tr>
							<td colspan="2" align="center">Nomor : <?php echo strtoupper($row->docs_no);?></td>
						</tr>
						
						<tr><td></td></tr>		   
						
						<tr>
							<td colspan="2" align="center"><h5>Tentang</h5></td>
						</tr>
						
						<tr><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><?php echo $row->docs_subject; ?></td>
						</tr>
								   
						<tr><td><br/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td><br/></td></tr>
								   
						<tr>
							<td><?php echo $row->docs_description ;?></td>
						</tr>
					
	<?php } elseif ($row->docs_type == 'Inst'){?>
				
						<tr>
							<td colspan="2" align="center"><b><u>INSTRUKSI</u></b></td>
						</tr>
						
						<tr><td></td></tr>	
						
						<tr>
							<td colspan="2" align="center">Nomor : <?php echo strtoupper($row->docs_no);?></td>
						</tr>
						
						<tr><td></td></tr>		   
						
						<tr>
							<td colspan="2" align="center"><h5>Tentang</h5></td>
						</tr>
						
						<tr><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><?php echo $row->docs_subject; ?></td>
						</tr>
								   
						<tr><td><br/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td><br/></td></tr>
								   
						<tr>
							<td><?php echo $row->docs_description ;?></td>
						</tr>
				
	<?php } elseif ($row->docs_type == 'SE'){?>
				
						<tr>
							<td colspan="2" align="center"><b><u>SURAT EDARAN</u></b></td>
						</tr>
						
						<tr><td></td></tr>	
						
						<tr>
							<td colspan="2" align="center">Nomor : <?php echo strtoupper($row->docs_no);?></td>
						</tr>
						
						<tr><td></td></tr>		   
						
						<tr>
							<td colspan="2" align="center"><h5>Tentang</h5></td>
						</tr>
						
						<tr><td></td></tr>
						
						<tr>
							<td colspan="2" align="center"><?php echo $row->docs_subject; ?></td>
						</tr>
								   
						<tr><td><br/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td><br/></td></tr>
								   
						<tr>
							<td><?php echo $row->docs_description ;?></td>
						</tr>
				
	<?php } elseif ($row->docs_type == 'SD'){?>
						

                       
			<tr>
            	<td>Kepada Yth.</td>
            </tr>
					   
			<tr><td><br/></td></tr>
					   
			<tr>
				<td><?php echo $row->docs_to;?></td>	
            </tr>
					   
			<tr><td><br/></td></tr>
					   
			<tr>
				<td width="5%">Jakarta</td>
				<td>: <?php echo mdate('%d-%m-%Y',strtotime($row->docs_date));?></td>
            </tr>
					   
			<tr><td></td></tr>
					   
			<tr>
                <td>Nomor</td>
				<td>: <?php echo strtoupper($row->docs_no);?></td>
            </tr>
                       
			<tr><td></td></tr>
                       
			<tr>
				<td>Perihal</td>
				<td>: <?php echo $row->docs_subject; ?></td>
            </tr>
                       
			<tr><td><br/></td></tr>
                       
			<tr>
                <td><?php echo $row->docs_description ;?></td>
            </tr>
						
	<?php } elseif ($row->docs_type == 'GAPURA'){?>
				
                       
			<tr>
            	<td>Kepada Yth.</td>
            </tr>
					   
			<tr><td><br/></td></tr>
					   
			<tr>
				<td><?php echo $row->docs_to;?></td>	
            </tr>
					   
			<tr><td><br/></td></tr>
					   
			<tr>
				<td width="5%">Jakarta</td>
				<td>: <?php echo mdate('%d-%m-%Y',strtotime($row->docs_date));?></td>
            </tr>
					   
			<tr><td></td></tr>
					   
			<tr>
                <td>Nomor</td>
				<td>: <?php echo strtoupper($row->docs_no);?></td>
            </tr>
                       
			<tr><td></td></tr>
                       
			<tr>
				<td>Perihal</td>
				<td>: <?php echo $row->docs_subject; ?></td>
            </tr>
                       
			<tr><td><br/></td></tr>
                       
			<tr>
                <td><?php echo $row->docs_description ;?></td>
            </tr>
				
	<?php } elseif ($row->docs_type == 'ND'){?>
		<table>	
            <tr>
                <td  colspan="2" align="center"><b><u>NOTA DINAS</u></b></td>
				<td></td>
            </tr>     
                       
            <tr><td colspan="2" ><br/></td><td> </td></tr>
                              
            <tr>
                <td width="5">Nomor</td>
				<td >: <?php echo strtoupper($row->docs_no);?></td>
				<td width="25px"> </td>
            </tr>
			
            <tr>
                <td>Kepada Yth</td>
				<td>: <?php echo $row->docs_to;?></td>
				<td></td>
            </tr>

            <tr>
                <td>Dari</td>
				<td>: <?php echo $row->docs_from;?></td>
				<td></td>
            </tr>
			
            <tr>
                <td>Tembusan</td>
				<td>: <?php echo $row->docs_copy;?></td>
				<td></td>
            </tr>

            <tr>
                <td>Perihal</td>
				<td >: <?php echo $row->docs_subject; ?></td>
				<td></td>
            </tr>
                       
            <tr><td colspan="2"><hr/></td><td></td></tr>
                       
            <tr>
                <td><?php echo $row->docs_description ;?></td>
				<td></td>
				<td></td>
            </tr>
		</table>
					
	<?php } elseif ($row->docs_type == 'PE'){?>
				
					<td >
                    	<tr>
                        	<td  align="center">
                        	<b><u>PENGUMUMAN</u></b>
                            </td>
                       </tr>
                       
                       <tr><br />
                       </tr>
                       
                       <tr>
                       		<td >Nomor</td>
                            <td >:</td>
							<td ><?php echo strtoupper($row->docs_no);?></td>
                       </tr>
					   
					   <tr><br /></tr>
					   
					   <tr>
                       <td ><?php echo $row->docs_description ;?></td>
                       </tr>
				
	<?php } elseif ($row->docs_type == 'Sprint'){?>
				
					<td >
                    	<tr>
                        	<td  align="center">
                        	<b><u>SURAT PERINTAH </u></b>
                            </td>
                       </tr>
                       
                       <tr><br /></tr>
                       
                       <tr>
                       		<td >Nomor</td>
                            <td >:</td>
							<td ><?php echo strtoupper($row->docs_no);?></td>
                       </tr>
					   
					   <tr><br /></td>
					   
					   <tr>
                       <td ><?php echo $row->docs_description ;?></td>
                       </tr>
					   
	<?php } elseif ($row->docs_type == 'NR'){?>
				
					<td >
                    	<tr>
                        	<td  align="center">
                        	<b><u>NOTULEN RISALAH RAPAT </u></b>
                            </td>
                       </tr>
                       
                       <tr><br />
                       </tr>
					   
					   <tr>
                       <td ><?php echo $row->docs_description ;?></td>
                       </tr>
					   
	<?php } elseif ($row->docs_type == 'MM'){?>
				
					<td >
                    	<tr>
                        	<td  align="center">
                        	<b><u>MEMO</u></b>
                            </td>
                       </tr>
                       
                       <tr><br />
                       </tr>
					   
					   <tr>
                       		<td >Kepada Yth.</td>
                       </tr>
					   <tr>
							<td ><?php echo $row->docs_to;?></td>
                       </tr>
					   
					   <tr><br /></tr>
					   
					   <tr>
                       <td ><?php echo $row->docs_description ;?></td>
                       </tr>
					   
	<?php } ?>
	

<?php }
*/
?>

</body>
</html>
