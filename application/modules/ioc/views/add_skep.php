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
          <h4 class="page-title"><?php echo anchor('ioc/dashboard', 'IOC', 'title="Inter Office Correspondence"');?> <i class="fa fa-angle-double-right"> <?php echo anchor('ioc/add', 'Pilih Jenis', 'title="Pilih Jenis Dokumen"');?> <i class="fa fa-angle-double-right"></i></i> Add Document</h4>
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
                    
                  	<?php 
						//$isi_keterangan='Dengan hormat,';
						IF ($jenis =='NR' OR $jenis == 'MM' OR $jenis == 'LD')
						{
							//echo 'tess';
							$jenis   = '';
							$strip   = '';
							$strip2  = '';
							$ttd     = '';
							$no_docs = '';
							$bulan   = '';
							$tahun   = '';
							//echo $jenis;
						}
						ELSE {
						IF ($jenis == 'SD')
						{
							$jenis   = '';
							$strip   = '';
						}
						 
						$ttd	 = 'DZ';
						$strip2  = '/';
						$datestring = "%m";
						$time = time();
						$bulan= mdate($datestring,$time);
						
						if($bulan == 1){$bulan = 'I';}
						else
						if($bulan == 2){$bulan = 'II';}
						else
						if($bulan == 3){$bulan = 'III';}
						else
						if($bulan == 4){$bulan = 'IV';}
						else
						if($bulan == 5){$bulan = 'V';}
						else
						if($bulan == 6){$bulan = 'VI';}
						else
						if($bulan == 7){$bulan = 'VII';}
						else
						if($bulan == 8){$bulan = 'VIII';}
						else
						if($bulan == 9){$bulan = 'IX';}
						else
						if($bulan == 10){$bulan = 'X';}
						else
						if($bulan == 11){$bulan = 'XI';}
						else
						if($bulan == 12){$bulan = 'XII';}

						$datestring2 = "%Y";
						$time2 = time();
						$tahun= mdate($datestring2,$time2);
						}
						
					?>
					
					<?php echo form_open_multipart('ioc/add/save', 'class="form-horizontal"'); ?>
                    <?php echo form_hidden('docs_nomor',$no_docs)?>
					<?php echo form_hidden('docs_type',$jenis)?>
					<?php echo form_hidden('docs_from',$nama)?>
					
					  <div class="row-form">
                        <label for="inputTanggal" class="span2 col-sm-2 control-label">Tanggal Penerimaan</label>
                        <div class="span4 col-sm-4">
						<?php ?>
                          <input type="text" class="form-control" id="datepicker" placeholder="Tanggal Terima" name="docs_date_in" value="<?php echo mdate("%d-%m-%Y",time());?>">
                        </div>
                      </div>  
					
                    <div class="row-form">
                        <label for="inputNomor" class="span2 col-sm-2 control-label">Nomor Dokumen</label>
                        <div class="span4 col-sm-4">
                          <input type="text" style="color:blue" class="form-control" id="inputNomor" placeholder="Tidak Diberi Nomor" name="docs_no"  title="Generate by system" value="<?php echo $jenis; ?><?php echo $strip; ?><?php echo $ttd; ?><?php echo $strip2; ?><?php echo $no_docs; ?><?php echo $strip2; ?><?php echo $bulan; ?><?php echo $strip2; ?><?php echo $tahun; ?>" readonly>
						</div>
						<?php
							
						?>
                      </div>  
       
					<div class="row-form">
                        <label for="inputTanggal" class="span2 col-sm-2 control-label">Tanggal Dokumen</label>
                        <div class="span4 col-sm-4">
                          <input type="text" class="form-control" id="datepicker2" placeholder="Tanggal Dokumen" name="docs_date" value="<?php echo mdate("%d-%m-%Y",time());?>">
                        </div>
                      </div>    
                                    							
                     <div class="row-form">
                        <label for="inputPerihal" class="span2 col-sm-2 control-label">Tentang</label>
                        <div class="span4 col-sm-4">
                          	<input type="text" class="form-control" id="inputPerihal" placeholder="Tentang" name="docs_subject">
                        </div>
                      </div>    
						
					<div class="row-form">
                        <label for="inputPerihal" class="span2 col-sm-2 control-label"></label>
                        <div class="span12 col-sm-12">
                          	<div class="data">
							<div id="editable" class="typography" contenteditable="true">
						
						<div><b>DIREKSI PT. GAPURA ANGKASA</b>
						</div><br/>
							<div>Menimbang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. </div>
							<br/>
							<div>Mengingat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. </div>
							<br/>
						<div><b>MEMUTUSKAN</b>
						</div>
							<div style="width: 900px;">
								<div style="width: 100px; height: 20px; float:left ;">Menetapkan</div>
								<div style="width: 30px; height: 20px; float: left;">:</div>
								<div style="width: 700px; height: 20px; float: left;"><b>SURAT KEPUTUSAN DIREKSI PT. GAPURA ANGKASA TENTANG</b></div>
							</div>
							<div style="clear: both;"></div>
							<div style="width: 900px;">
								<div style="width: 100px; height: 20px; float:left ;">PERTAMA</div>
								<div style="width: 30px; height: 20px; float: left;">:</div>
								<div style="width: 700px; height: 20px; float: left;"></div>
							</div>
							<div style="clear: both;"></div>
							<div style="width: 900px;">
								<div style="width: 100px; height: 20px; float:left ;">KEDUA</div>
								<div style="width: 30px; height: 20px; float: left;">:</div>
								<div style="width: 700px; height: 20px; float: left;"></div>
							</div>
							<div style="clear: both;"></div>
							<div style="width: 900px;">
								<div style="width: 100px; height: 20px; float:left ;">KETIGA</div>
								<div style="width: 30px; height: 20px; float: left;">:</div>
								<div style="width: 700px; height: 20px; float: left;">Surat Keputusan ini berlaku terhitung sejak <?php echo mdate('%d-%m-%Y',time())?> 
							dengan ketentuan apabila dikemudian hari ternyata terdapat kekeliruan dalam penetapan Surat Keputusan ini maka akan dilakukan perbaikan sebagaimana mestinya.</div>
							</div>
							<div style="clear: both;"></div>
								
							<br/>
						<div style="float:right;">
							<div>Ditetapkan di &nbsp;:&nbsp;Jakarta</div>
							<div>Pada Tanggal &nbsp;: &nbsp;<?php echo mdate('%d-%m-%Y',time())?> </div>
							<br/>
							<div>.................................</div>
							<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</div>
							<br/>
							<div><u>.................................</u></div>
							<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</div>
						</div>
							
							</div>
							</div>
                        </div>
                      </div>
                            
                      <div class="row-form">
                        <div class="span2"><label for="inputFile" class="col-sm-2 control-label">Lampiran</label></div>
                        <div class="span3 col-sm-2">
                          	<input type="file" value="file" class="form-control" id="inputFile" name="file1">
						</div>
                        <div class="span3 col-sm-2">
                          	<input type="file" value="file" class="form-control" id="inputFile" name="file2">
						</div>
                        <div class="span3 col-sm-2">
                          	<input type="file" value="file" class="form-control" id="inputFile" name="file3">
						</div>
                      </div>      
                      <div class="row-form">
						<div class="span2"></div>
						<div class="span3 col-sm-2">
                          	<input type="file" value="file" class="form-control" id="inputFile" name="file4">
						</div>
                        <div class="span3 col-sm-2">
                          	<input type="file" value="file" class="form-control" id="inputFile" name="file5">
						</div>
                      </div>
                          
                      <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">			
                            <button class="btn btn-primary pull-right" type="submit">Save</button> 
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
<?php include($this->config->item('footer')); ?>