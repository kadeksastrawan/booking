<?php include($this->config->item('header')); ?>
	<div class="content">
        <div class="page-header">
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Add Document</h1>
        </div>

      <!-- row title -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"></i> Add</h4>
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
        			 
        			<?php if($this->session->userdata('logged_in')) { ?>
            		<?php if(isset($message)){echo '<div class="badge-warning"><p class="text-danger">&nbsp; message : '.$message.'</p></div>';} ?>
            		<?php if(validation_errors()){echo '<div class="badge-warning">'.validation_errors().'</div>';} ?>
                    
                  	
					
					<?php echo form_open('ioc/add/add_form/', 'class="form-horizontal"'); ?> 
                                    
					 <div class="row-form">
                            <label for="inputJenis" class="span2 col-sm-2 control-label">Jenis</label>
                            <div class="span4 col-sm-4">
                            		 <!--
                            		<select name="docs_type" class="form-control">
                                      <option value="memo">Memo</option>
                                      <option value="notadinas" selected="selected">Nota Dinas</option>
                                      <option value="surat">Surat</option>
                                      <option value="sk">Surat Keputusan</option>
                                      <option value="ba">Berita Acara</option>
                                      <option value="sk">Surat Keputusan</option>
                                    </select>-->
									
									
									<?php
										foreach($jenis_docs as $jd){
											$var_docs[$jd->dt_code] = $jd->dt_name; 
										}
										/*$jenis_docs = array(
											"SKEP" => "Surat Keputusan",
											"Inst" => "Instruksi Direksi",
											"SE" => "Surat Edaran",
											"SD" => "Surat Dinas Internal",
											"GAPURA" => "Surat Dinas Eksternal",
											"ND" => "Nota Dinas",
											"PE" => "Pengumuman",
											"Sprint" => "Surat Perintah",
											"NR" => "Notulen/Risalah Rapat",
											"MM" => "Memo",
											//"LD" => "Lembar Disposisi",
											);
										*/
										echo form_dropdown('docs_type',$var_docs,'','class="form-control"');
									?>
                            </div>
                  	</div>
					
					  
                          
                      <div class="row-form">
                        <div class="span4 col-sm-offset-4 col-sm-6">			
                            <button class="btn btn-primary" type="submit">Add</button> 
                        </div>
                      </div>            
                                            
				<?php echo form_close(); ?>                    
                    
        			<?php } ?>
        
 			</div>
            <!-- wigget content -->
            
            </div>
            <!-- widget -->          
          
          </div>
          <!-- col -->
          
        </div>
        <!-- row -->
	</div>
<?php include($this->config->item('footer')); ?>