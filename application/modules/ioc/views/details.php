<?php include($this->config->item('header')); ?>
	<div class="content">
        <div class="page-header">
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Details</h1>
        </div>
      
	  <!-- row title -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"></i> DETAILS </h4>
        </div>
      </div>
      <!-- row -->
      
      <!-- row -->
      <div class="row-fluid">
        
        <!-- col -->
        <div class="span12 col-lg-12">
          
          <!-- widget -->
          <div class="block">
            
            <!-- wigget content -->
            <div class="data-fluid">
            
             <ul class="nav nav-tabs" id="myTab">
                <li class="active"><?php echo anchor('ioc/details/id/' . $this->uri->segment(4, 0), 'DETAILS'); ?></li>
                <li class=""><a data-toggle="tab" href="#tabs-2">TRACKING</a></li>
                <li class=""><a data-toggle="tab" href="#tabs-3">HANDLING</a></li>
                <li class=""><a data-toggle="tab" href="#tabs-4">DISCUSSION</a></li>
                <li class=""><a data-toggle="tab" href="#tabs-5">FLOW CONTROL</a></li>
             </ul>   
            			
  
  
  
  <div class="tab-content" id="myTabContent">
                
                
                <div id="#home" class="tab-pane fade active in">
                
                <div class="widget-header">    <h3><i class="fa fa-folder-open-o"></i> Document information</h3> </div>
                
                
                  
              	 <table class="table" border="0">
            
              		<tbody>
                
			<?php foreach ($query_docs as $row):?>
                 	
					<?php $docs_id = $row->docs_id; ?>
					
				<?php if($row->docs_type == 'SKEP'){?>
					
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center"><h4><u>SURAT KEPUTUSAN</u></h4></div>
							<div class="span12 col-lg-12" align="center"> <h5>Nomor : <?php echo strtoupper($row->docs_no);?></h5></div>
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12" align="center"><h5>Tentang</h5></div>
                       </div>
					   <div class="row">
                       <div class="span12 col-lg-12" align="center"><h5><?php echo $row->docs_subject; ?></h5></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12"><?php echo $row->docs_description ;?></div>
                       </div>
                       
                       <div class="row"><hr /></div>
					</div>
					   
				<?php } elseif ($row->docs_type == 'Inst'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center"><h4><u>INSTRUKSI</u></h4></div>
							<div class="span12 col-lg-12" align="center"> <h5>Nomor : <?php echo strtoupper($row->docs_no);?></h5></div>
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12" align="center"><h5>Tentang</h5></div>
                       </div>
					   <div class="row">
                       <div class="span12 col-lg-12" align="center"><h5><?php echo $row->docs_subject; ?></h5></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12"><?php echo $row->docs_description ;?></div>
                       </div>
                       
                       <div class="row"><hr /></div>
					</div>
				
				<?php } elseif ($row->docs_type == 'SE'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center"><h4><u>SURAT EDARAN</u></h4></div>
							<div class="span12 col-lg-12" align="center"> <h5>Nomor : <?php echo strtoupper($row->docs_no);?></h5></div>
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12" align="center"><h5>Tentang</h5></div>
                       </div>
					   <div class="row">
                       <div class="span12 col-lg-12" align="center"><h5><?php echo $row->docs_subject; ?></h5></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12"><?php echo $row->docs_description ;?></div>
                       </div>
                       
                       <div class="row"><hr /></div>
					</div>
				
				<?php } elseif ($row->docs_type == 'SD'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center"><h4><u>SURAT DINAS INTERNAL</u></h4></div>
							
                       </div>
                       
                       <div class="row">
                       		<div class="span12 col-lg-2">Kepada Yth.</div>
                       </div>
					   <div class="row">
							<div class="span12 col-lg-2"><?php echo $row->docs_to;?></div>
                       </div>
					   
					   <div class="row"><br/></div>
					   
					   <div class="row">
                       		<div class="span2 col-lg-2">Jakarta</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span1 col-lg-9"><?php echo mdate('%d-%m-%Y',strtotime($row->docs_date));?></div>
                       </div>
					   
					   <div class="row">
                       		<div class="span2 col-lg-2">Nomor</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo strtoupper($row->docs_no);?></div>
                       </div>
                       
                       <div class="row">
                       <div class="span2 col-lg-2">Perihal</div><div class="col-lg-1">:</div><div class="col-lg-9"><?php echo $row->docs_subject; ?></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12"><?php echo $row->docs_description ;?></div>
                       </div>
                       
                       <div class="row"><hr /></div>
					</div>
				
				<?php } elseif ($row->docs_type == 'GAPURA'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center"><h4><u>SURAT DINAS EXTERNAL</u></h4></div>
							
                       </div>
                       
                       <div class="row">
                       		<div class="span2 col-lg-2">Kepada Yth.</div>
                       </div>
					   <div class="row">
							<div class="span2 col-lg-2"><?php echo $row->docs_to;?></div>
                       </div>
					   
					   <div class="row"><br/></div>
					   
					   <div class="row">
                       		<div class="span2 col-lg-2">Jakarta</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo mdate('%d-%m-%Y',strtotime($row->docs_date));?></div>
                       </div>
					   
					   <div class="row">
                       		<div class="span2 col-lg-2">Nomor</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo strtoupper($row->docs_no);?></div>
                       </div>
                       
                       <div class="row">
                       <div class="span2 col-lg-2">Perihal</div><div class="span1 col-lg-1">:</div><div class="span9 col-lg-9"><?php echo $row->docs_subject; ?></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
                       
                       <div class="row">
                       <div class="span12 col-lg-12"><?php echo $row->docs_description ;?></div>
                       </div>
                       
                       <div class="row"><hr /></div>
					</div>
				
				<?php } elseif ($row->docs_type == 'ND'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center">
                        	<h4><u>NOTA DINAS</u></h4>
                            </div>
                       </div>
                       
                       <div class="row"><br />
                       </div>
                       
                       
                       <div class="row">
                       		<div class="span2 col-lg-2">Nomor</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo strtoupper($row->docs_no);?></div>
                       </div>
                       
                       <div class="row">
                       		<div class="span2 col-lg-2">Kepada Yth</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo $row->docs_to;?></div>
                       </div>
                       
                       <div class="row">
                       		<div class="span2 col-lg-2">Dari</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo $row->docs_from;?></div>
                       </div>
                       
                       <div class="row">
                       <div class="span2 col-lg-2">Tembusan</div><div class="span1 col-lg-1">:</div><div class="col-lg-6"><?php 
					   $no = 0;
					   foreach ($query_copy as $copy) 
					   {	$no++;
							echo $no.'. ';
							echo ucwords($this->encrypt->decode($copy->ui_nama, $this->config->item('encryption_key'))).'<br/>';
					   }
					   ?></div>
                       </div>
                       
                       <div class="row">
                       <div class="span2 col-lg-2">Perihal</div><div class="span1 col-lg-1">:</div><div class="col-lg-9"><?php echo $row->docs_subject; ?></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
                       
                       <div class="row">
                       <div class="span9 col-lg-9"><?php echo $row->docs_description ;?></div>
                       </div>
                       
                       <div class="row"><hr />
                       </div>
					</div>
					
				<?php } elseif ($row->docs_type == 'PE'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center">
                        	<h4><u>PENGUMUMAN</u></h4>
                            </div>
                       </div>
                       
                       <div class="row"><br />
                       </div>
                       
                       <div class="row">
                       		<div class="span2 col-lg-2">Nomor</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo strtoupper($row->docs_no);?></div>
                       </div>
					   
					   <div class="row"><br /></div>
					   
					   <div class="row">
                       <div class="span9 col-lg-9"><?php echo $row->docs_description ;?></div>
					   </div>
					   
					   <div class="row"><hr/>
                       </div>
					</div>
				
				<?php } elseif ($row->docs_type == 'Sprint'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center">
                        	<h4><u>SURAT PERINTAH </u></h4>
                            </div>
                       </div>
                       
                       <div class="row"><br /></div>
                       
                       <div class="row">
                       		<div class="span2 col-lg-2">Nomor</div>
                            <div class="span1 col-lg-1">:</div>
							<div class="span9 col-lg-9"><?php echo strtoupper($row->docs_no);?></div>
                       </div>
					   
					   <div class="row"><br /></div>
					   
					   <div class="row">
                       <div class="span9 col-lg-9"><?php echo $row->docs_description ;?></div>
					   </div>
					   
					   <div class="row"><hr />
                       </div>
					</div>
					   
				<?php } elseif ($row->docs_type == 'NR'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center">
                        	<h4><u>NOTULEN RISALAH RAPAT </u></h4>
                            </div>
                       </div>
                       
                       <div class="row"><br />
                       </div>
					   
					   <div class="row">
                       <div class="span9 col-lg-9"><?php echo $row->docs_description ;?></div>
					   </div>
					   
					   <div class="row"><hr />
                       </div>
					</div>
					   
				<?php } elseif ($row->docs_type == 'MM'){?>
				
					<div class="span12 col-lg-12">
                    	<div class="row">
                        	<div class="span12 col-lg-12" align="center">
                        	<h4><u>MEMO</u></h4>
                            </div>
                       </div>
                       
                       <div class="row"><br />
                       </div>
					   
					   <div class="row">
                       		<div class="span9 col-lg-9">Kepada Yth.</div>
                       </div>
					   <div class="row">
							<div class="span9 col-lg-9"><?php echo $row->docs_to;?></div>
                       </div>
					   
					   <div class="row"><br /></div>
					   
					   <div class="row">
                       <div class="span9 col-lg-9"><?php echo $row->docs_description ;?></div>
					   </div>
					   
					   <div class="row"><hr />
                       </div>
					</div>
					   
				<?php } ?>
				
			<?php endforeach; ?>
                
			<div align="right">
				<?php #echo anchor('ioc/details/print_docs/' . $this->uri->segment(4, 0),"<button class='btn btn-primary'>PRINT</button>")?>
				<?php echo anchor('ioc/details/print_docs_pdf/' . $this->uri->segment(4, 0),"<button class='btn btn-primary'>PRINT</button>",'target="_blank"')?>

			</div>
				
                <?php $no = 0;
				foreach ($query_files as $row_files): 
				$no++;
				?>
                <?php if ($row_files->df_system_name != NULL)
				{ ?>
			<div class="span12 col-lg-12">
				<div class="row">
                       <div class="span2 col-lg-2">Lampiran<?php echo ' '.$no; ?></div>
					   <div class="span1 col-lg-1">:</div>
					   <div class="span9 col-lg-9"><a href="<?php echo base_url(); ?>wp-uploads/ioc/<?php echo $row_files->df_system_name . '-' . $row_files->df_real_name; ?> "><?php echo $row_files->df_real_name; ?></a></div>
                </div>
		
					<?php 
					if ($row_files->df_ext == '.pdf' or $row_files->df_ext == '.PDF')
							{
								  echo '<embed src="' . base_url() . 'wp-uploads/ioc/' . $row_files->df_system_name . '-' . $row_files->df_real_name . '" width="100%" height="500px">';
							}
					elseif 
							($row_files->df_ext == '.jpg' or $row_files->df_ext == '.JPG')	
							{
								  echo '<img src="' . base_url() . 'wp-uploads/ioc/' . $row_files->df_system_name . '-' . $row_files->df_real_name . '">';
							}
					elseif 
							($row_files->df_ext == '.png' or $row_files->df_ext == '.PNG')
							{
								  echo '<img src="' . base_url() . 'wp-uploads/ioc/' . $row_files->df_system_name . '-' . $row_files->df_real_name . '">';
							}
					elseif 
							($row_files->df_ext == '.jpeg' or $row_files->df_ext == '.JPEG')
							{
								  echo '<img src="' . base_url() . 'wp-uploads/ioc/' . $row_files->df_system_name . '-' . $row_files->df_real_name . '">';
							}
					elseif 
							($row_files->df_ext == '.bmp' or $row_files->df_ext == '.BMP')
							{
								  echo '<img src="' . base_url() . 'wp-uploads/ioc/' . $row_files->df_system_name . '-' . $row_files->df_real_name . '">';
							}
					elseif 
							($row_files->df_ext == '.gif' or $row_files->df_ext == '.GIF')
							{
								  echo '<img src="' . base_url() . 'wp-uploads/ioc/' . $row_files->df_system_name . '-' . $row_files->df_real_name . '">';
							}
					?>
				<div><br/></div>
			</div>
				<?php }?>
				<?php endforeach; ?> 
               			   
                </div>
				
                
              </tbody>
            </table>
  	</div>
  
  
  <div id="tabs-2" class="tab-pane fade">
  
  <div class="widget-header">    <h3><i class="fa fa-flag-o"></i> Document tracking</h3> </div>
  

    <table class="table table-hover">
             <thead>
                <tr>
                  <th width="10%">FROM</th>
                  <th width="10%">TO</th>
                  <th width="10%">STATUS DOCS</th>
				  <th width="10%">STATUS READ</th>
                  <!--<th width="10%">DATE</th>
                  <th width="20%">SUBJECT</th>-->
                  <th width="20%">DESCRIPTION</th>
				  
                </tr>
				
              </thead>
              <tbody>
                <?php foreach ($query_flow as $pos):{ ?>
                
                <tr>
					
                	<td><?php echo ucwords($this->encrypt->decode($pos->from_user, $this->config->item('encryption_key'))) ;?></td>
                    <td><?php  ucwords($this->encrypt->decode($pos->to_user, $this->config->item('encryption_key'))) ;?>
						<?php if ($pos->from_user == $pos->to_user) 
						         {echo '';} 
							  else
							     {echo ucwords($this->encrypt->decode($pos->to_user, $this->config->item('encryption_key'))) ;}
						?>
					</td>
                    <td><?php echo strtoupper($pos->df_flow);?></td>
					<td><?php if ($pos->df_read == '0000-00-00 00:00:00'){echo 'UNREAD';}else {echo 'AT : '.mdate("%d-%m-%Y %H:%i", strtotime($pos->df_read));}?></td>
                  	<!--<td><?php echo mdate("%d-%m-%Y %H:%i", strtotime($pos->df_update_on)) ;?></td>
                	<td><?php echo $pos->df_subject ;?></td>-->
                    <td colspan="3"><?php echo $pos->df_description ;?></td>
				</tr>
                   
                <?php } endforeach; ?>
              </tbody>
            </table>
            
            
  </div>
  
  
  
<div id="tabs-3" class="tab-pane fade">
  
  <div class="widget-header">    <h3><i class="fa fa-pencil-square-o"></i> Document handling</h3> </div>
  
  	<div class="panel-body" style="margin-left:50px;">
    <?php if($query_handling){?>
            
    	<?php echo form_open_multipart('ioc/handling'); 
		if ( $ui_nama != 'admin')
		{
		?>
              
        <?php if (substr($ui_level, 6, 2) != '11' ) { ?>
		
        <div class="row-form">
        
        	<div class="row">
            	<div class="col-sm-3" title="send document to upper level">
				<?php echo form_radio('docs_action', 'report', TRUE); ?> Report to
				</div>
                <div class="col-sm-9">
                     <table>
					  <?php
                  		/*
						$dropdown = array();
                            foreach($query_upline as $row) 
                            {
                            $dropdown[$row->ui_nipp] = strtoupper($this->encrypt->decode($row->ui_nama, $this->config->item('encryption_key')));
                            }
                         echo form_dropdown('report', $dropdown, '','class="form-control"');
						 */
						 $no = 0;
						 foreach ($query_upline as $upline)
						 {	
							$no++;
							$nipp = $upline->ui_nipp;
							$nama2 = strtoupper($this->encrypt->decode($upline->ui_nama, $this->config->item('encryption_key')));
							$nama = str_replace(" ","_",$nama2);
							$dataup = array (
										'name'  	=> "report_$nama",
										'id'    	=> "report_$nama",
										'value' 	=> "$nipp",
										'checked'   => TRUE,
										'style'     => "margin:10px",
										'title'		=> "Report to $nama2",
										
							);
							if (($no % 3) == 1)
								{ echo "<tr>";}
							
							echo "<td>".form_checkbox($dataup)."</td><td width='200px'>".$nama2."</td>";
							
							if (($no % 3) == 0)
								{ echo "</tr>";}
						
						  $coor  = $nama; 
						 }
						
						 
					  ?>
					 </table><hr/>
					 
                 </div>
            </div>  
        </div>
        
        <div class="row-form">
                
            <div class="row">
            	<div class="span3 col-sm-3" title="send document to same level">
				<!--<?php //echo form_radio('docs_action', 'coordination', FALSE); ?> Coordination to -->
				<?php 
					$num = 0;
					foreach ($query_colleagues as $colleagues)
					{ 
					 if ($coor != strtoupper($this->encrypt->decode($colleagues->ui_nama, $this->config->item('encryption_key'))) )
					 {
						$num++;
					 }
					}
					
					if ($num > 0 )
						{echo form_radio('docs_action', 'coordination', FALSE).' Coordination to ';}
					else
						{echo '<div style="color:#FFCC00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Coordination to</div>';}
					?>	
				</div>
                <div class="span9 col-sm-9">
                    <table>
					 <?php /*
				  		$dropdown_colleagues = array();
                            foreach($query_colleagues as $row_colleagues) 
                            {
                            $dropdown_colleagues[$row_colleagues->ui_nipp] = strtoupper($this->encrypt->decode($row_colleagues->ui_nama, $this->config->item('encryption_key')));
                            }
                         echo form_dropdown('coordination', $dropdown_colleagues, '','class="form-control"');
						 */
						 $jumlah = 0;
						 $no = 0;
						 foreach ($query_colleagues as $colleagues)
						 {	$no++;
							$nipp = $colleagues->ui_nipp;
							$nama2 = strtoupper($this->encrypt->decode($colleagues->ui_nama, $this->config->item('encryption_key')));
							$nama = str_replace(" ","_",$nama2);
							$datacoor = array (
										'name'  	=> "coordination_$nama",
										'id'    	=> "coordination_$nama",
										'value' 	=> "$nipp",
										'checked'   => TRUE,
										'style'     => "margin:10px",
										'title'		=> "Coordination to $nama2",
										
							);
							
							if (($no % 3) == 1)
								{ echo "<tr>";}
							if ($coor != $nama)
							{echo "<td>".form_checkbox($datacoor)."</td><td width='200px'>".$nama2."</td>";}
							else {echo '<div style="color:#FFCC00">Tidak ada pegawai dengan level jabatan yang sama.</div>';}
							
							
							if (($no % 3) == 0)
								{ echo "</tr>";}
						 } 
						 
						 //else {echo '<div style="color:#FFCC00">Tidak ada pegawai dengan jabatan yang sama.</div>';}
						?>
					</table><hr/>
                </div>
            </div>
        </div>     
		<?php } ?>
		
        <div class="row-form">          
                  <div class="row">
                    <div class="span3 col-sm-3" title="send document to down level">
                      <!--<?php //echo form_radio('docs_action', 'disposition', FALSE);?> Disposition to-->
					<?php 
					$num = 0;
					foreach ($query_downline as $down)
					{ $num++;
					  if ($num  == 1)
					  {
						if ($ui_nipp != $down->ui_nipp)
						{echo form_radio('docs_action', 'disposition', FALSE).' Disposition to';}
						else
						{echo '<div style="color:#FFCC00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disposition to</div>';}
					  }
					  
					}
					?>					  
                    </div>
                    <div class="span9 col-sm-9" >
                     <table>
					 <?php 
						/*
				  		$dropdown_downline = array();
                            foreach($query_downline as $row_downline) 
                            {
                            $dropdown_downline[$row_downline->ui_nipp] = strtoupper($this->encrypt->decode($row_downline->ui_nama, $this->config->item('encryption_key')));
                            }
                         echo form_dropdown('disposition', $dropdown_downline, '', 'class="form-control"'); 
						 */
						 $no = 0;
						 foreach ($query_downline as $downline)
						 {
							$no++;
							$nipp = $downline->ui_nipp;
							$nama2 = strtoupper($this->encrypt->decode($downline->ui_nama, $this->config->item('encryption_key')));
							$nama = str_replace(" ","_",$nama2);
							$datadispo = array (
										'name'  	=> "disposition_$nama",
										'id'    	=> "disposition_$nama",
										'value' 	=> "$nipp",
										'checked'   => TRUE,
										'style'     => "margin:10px",
										'title'		=> "Disposition to $nama2",
										
							);
							if (($no % 3) == 1)
								{ echo "<tr>";}
								
							if ($ui_nipp != $downline->ui_nipp)
								{echo "<td>".form_checkbox($datadispo)."</td><td width='200px'>".$nama2."</td>";}
							else {echo '<div style="color:#FFCC00">Data staff belum ditambahkan.</div>';}
							
							if (($no % 3) == 0)
								{ echo "</tr>";}
						 
						  }
					?>
					</table><hr/>
                    </div>
                  </div>
          </div>  
            
                  
         <!--
         <div class="row-form">          
                   <div class="row">
                    <div class="col-sm-3">
                      <p>Title</p>
                    </div>
                    <div class="col-sm-4">
                     <?php echo form_input('docs_subject','', 'class="form-control", placeholder="title"'); ?>
                    </div>
                  </div>  
         </div>
         -->
         <div class="row-form">
                  <div class="row">
                    <div class="span3 col-sm-3" title="add description to handling">
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description</p>
                    </div>
                    <div class="span4 col-sm-4">
                     <?php echo form_textarea('docs_description','', 'class="form-control"'); ?>
                    </div>
                  </div>   
        </div>
        
        <div class="row-form">          
                  <div class="row">
                    <div class="span3 col-sm-3" title="add additional file">
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add additional file (optional)</p>
                    </div>
                    <div class="span4 col-sm-4" title="choose file to upload">
                     <?php echo form_upload('file','', 'class="form-control"'); ?>
                    </div>
                  </div>   
    	</div>
        
		<?php //if (substr($ui_level, 6, 2) == '11' OR substr($ui_level, 6, 2) == '12' OR substr($ui_level, 6, 2) == '13' OR substr($ui_level, 6, 2) == '14') { ?>
         <div class="row-form">         
                  <div class="row">
                    <div class="span3 col-sm-3" title="make document completed">
                      <?php echo form_radio('docs_action', 'completed', FALSE); ?> Completed
                    </div>
                    <div class="span4 col-sm-4">
                     <?php //echo form_input('completed','', 'class="form-control", placeholder="completing comment. eq : great job"'); ?>
                    </div>
                  </div>   
        </div>
		
		<div class="row-form">        
                   <div class="row">
                    <div class="span3 col-sm-3" title="ignore document">
                      <?php echo form_radio('docs_action', 'closed', FALSE); ?> Closed
                    </div>
                    <div class="span4 col-sm-4">
                     <?php //echo form_input('canceled','', 'class="form-control", placeholder="cancelling comment. eq : just info"'); ?>
                    </div>
                  </div>
         </div>
                   <?php //} ?>
		
        <div class="row-form">              
                  <div class="row">
                    <div class="span3 col-sm-3">
                      
                    </div>
                    <div class="span6 col-sm-6" title="submit your handling">
                     <?php echo form_submit('submit','submit' , 'class="btn btn-primary"'); ?>
                    </div>
                  </div>   
                  
                  </div>
               
               <?php echo form_hidden('docs_id', $docs_id); ?>
			   <?php foreach ($query_docs as $row)
					 {echo form_hidden('docs_type',$row->docs_type);}
		}
			   ?>
			   
               <?php echo form_close(); ?>
    <?php } ?>
		 
		 <?php //if($query_handling){ ?>
		 <div align="right">
		 <?php //echo anchor('ioc/handling/docs_close/' . $this->uri->segment(4, 0),"<button class='btn btn-danger'>Close Document</button>") ?>
		 </div>
		 <?php //} ?>
	 </div>
	 
  </div>
  
  <div id="tabs-4" class="tab-pane fade">
  <div class="widget-header">    <h3><i class="fa fa-comments"></i> Document discussion</h3> </div>
  	
    	<table>
        	
        	<tr>
            	
                <td valign="top" width="80%">
                  <table class="table table-hover">
                             <thead>
                                <tr>
                                  <th colspan="4">FORUM DISKUSI</th>
                                </tr>
                                <tr>
                                	<th>sender</th>
                                    <th>date</th>
                                    <th>subject</th>
                                    <th>message</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($query_discussion as $dis):{ ?>
                                
                                <tr>
                                    <td><small><?php echo $this->encrypt->decode($dis->ui_nama, $this->config->item('encryption_key')) ;?></small></td>
                                    <td><small><?php echo mdate("%d-%m-%Y %H:%i", strtotime($dis->dd_update_on)) ;?></small></td>
                                    <td><?php echo $dis->dd_subject ;?></td>
                                    <td><?php echo $dis->dd_message ;?></td>
                                </tr>
                                <?php } endforeach; ?> 
                              </tbody>
                    </table>
              
              		</td>
                    
                    <td width="40%">
                	<strong>ADD NEW MESSAGE</strong>
					<?php echo form_open('ioc/discussion'); ?>
                   <?php echo form_hidden('docs_id', $docs_id); ?>
                	<table>
                    	<tr>
                        	
                        
                        	<td><?php echo form_input('subject','');?></td>
                        </tr>
                        <tr>
                        	
                       
                        	<td><?php echo form_textarea('message',''); ?></td>
                        </tr>
                        <tr>
                        	<td><?php echo form_submit('submit', 'send', 'class="btn btn-primary"'); ?></td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                    
                </td>
                
            	</tr>        
        	</table>
  </div>
  
  <div id="tabs-5" class="tab-pane fade">
  <div class="widget-header">    <h3><i class="fa fa-bar-chart-o"></i> Document flow</h3> </div>

 	 
  	<table class="table table-hover">
             <thead>
                <tr>
                  <th>PIC</th>
                  <th>DATE IN</th>
                  <th>DATE OUT</th>
                  <th>DURATION</th>
				  <th>DATE DOCS</th>
				  
                </tr>
				
              </thead>
              <tbody>
                <?php foreach ($query_position as $pos):{ ?>
                
                <tr>
                	<td><?php echo $this->encrypt->decode($pos->ui_nama, $this->config->item('encryption_key')); ?></td>
                  	<td><?php echo mdate("%d-%m-%Y %H:%i", strtotime($pos->dp_date_in)) ;?></td>
                    <td><?php 
							if($pos->dp_date_out == '0000-00-00 00:00:00')
							{
								echo '<div style="color:#FFCC00">Dokumen belum ditangani</div>';
							}
							else
							{
								echo mdate("%d-%m-%Y %H:%i", strtotime($pos->dp_date_out));
							}
					?></td>
                    <td><?php 
							if($pos->dp_date_out == '0000-00-00 00:00:00')
							{
								$hari = ((time() - strtotime($pos->dp_date_in))/(60*60*24));
								if ( floor($hari) != 0 )
								{echo floor ($hari) . ' day';}
								else
								{echo '1 day';}
							}
							else
							{
								$hari = ((strtotime($pos->dp_date_out) - strtotime($pos->dp_date_in))/(60*60*24));
								if ( floor($hari) != 0 )
								{echo floor ($hari) . ' day';}
								else
								{echo '1 day';}
							}
							?>
                 	</td>
					<td>
					<?php echo mdate("%d-%m-%Y", strtotime($pos->docs_date));?></td>
				</tr>	
                
                <?php } endforeach; ?> 
				
              </tbody>
            </table>
  </div>
</div>
            
            </div>
            <!-- wigget content -->
            
            </div>
            <!-- widget -->          
          
          </div>
          <!-- col -->
          
        </div>
        <!-- row -->
	</div>
</div>
<?php include($this->config->item('footer')); ?>



