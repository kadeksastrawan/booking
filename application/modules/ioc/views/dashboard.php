<?php include($this->config->item('header')); ?>	
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Document', 'Total Download'],
          <?php foreach($result_chart as $rc){ echo "['".$rc->df_real_name."',".$rc->dfd_count."],";} ?>
		]);
        var options = {
          title: 'Popular Document',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script> 
            <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1>Dashboard</h1>
                </div>
                <div class="row-fluid">
                    <div class="span12">
					
                        <div class="widgets">
                            <div class="widget yellow value">
                                <div class="valtop">
								<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
								</div>
                                <div class="valbottom">
                                </div>
                                <div class="bottom">
                                </div>
                            </div>
                            <div class="widget yellow">
                                <div class="valtop">
								<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
								</div>
                                <div class="valbottom">
                                </div>
                                <div class="bottom">
                                </div>
                            </div>
                            <div class="widget yellow chart nmr">
                                <div class="valtop">
								<?php echo img("wp-content/themes/ods/img/logo-small.png"); ?>
								</div>
                                <div class="valbottom">
                                </div>
                                <div class="bottom">
                                </div>
                            </div>
							
							<div class="widget2">
							<div class="data TAC" style ="margin-top:-50px;">
							<div id="piechart_3d" style="width: 800px; height: 400px;"></div>	
							<!--		<div id="chart-3" style="height: 300px;"></div>
							-->
							</div>
                            </div>
                            	
                        </div>
						
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
					<div class="block">
                        <div class="row-form">
								<div class="span12">
								<br/><br/>
								<div class="input-append">
									<?php echo form_open("ioc/dashboard/search"); ?>
									<input type="text" name="search" />
									<span class="add-on blue"><i class="icon-search icon-white"></i></span>
									<button class="btn blue">Search</button>
									<?php echo form_close();?>
								</div>
								</div>		
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
                        <div class="block">
                            <div class="head orange">
                                <div class="icon"><span class="ico-location"></span></div>
                                <h2>Online Document System</h2>    
								<ul class="buttons">
                                    <li><a href="#" onClick="source('table_hover'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>
								<br/>
								<?php echo "<div style='color:#FF0000; margin-left:50px;'>".$search." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$page_start."-".$page_end." of ".$count."</div>" ;?>	
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="52%">
                                            Filename
                                            </th>
                                            <th width="8%">
                                            Reputation
                                            </th>
											<th width="4%">
                                            Like
											</th>
											<th width="4%">
                                            Dislike
                                            </th>
                                            <th width="8%">
                                            Last Download
                                            </th>
                                            <th width="8%">
                                            Size
                                            </th>
											<th width="8%">
                                            Hits
                                            </th>
											<th width="8%">
                                            Share
                                            </th>
											<th>
											Download
											</th>
										</tr>
                                    </thead>
                                    <tbody>
										<?php foreach($list_file as $lf){ ?>										
                                        <tr>
                                            <td>
                                                <?php echo $lf->df_user_name." <b>[".$lf->df_real_name."]</b>"; ?>
                                            </td>
                                            <td>
                                                <?php echo $lf->dfd_reputation; ?>
                                            </td>
                                            <td>
                                                <?php echo $lf->dfd_like; ?>
                                            </td>
											<td>
                                                <?php echo $lf->dfd_dislike; ?>
                                            </td>
											<td>
                                                <?php echo $lf->dfd_update_on; ?>
                                            </td>
                                            <td>
                                                <?php echo $lf->df_size." bytes";?>
                                            </td>
											<td>
												<?php echo $lf->dfd_count; ?>
											</td>
											<td>
												<?php echo $lf->dfd_share; ?>
											</td>
											<td>
												<?php 
													echo anchor("ioc/dashboard/like/".$lf->dfd_files_id."/yes","<span class='ico-thumbs-up'></span>"," title='like'"); 
													echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
													echo anchor("ioc/dashboard/like/".$lf->dfd_files_id."/no","<span class='ico-thumbs-down'></span>"," title='dislike'"); 
													echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
													echo anchor("ioc/dashboard/download/".$lf->dfd_files_id,"<span class='ico-download-3'></span>"," title='download' target='_blank'"); 
												?>
											</td>
                                        </tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>                
                        </div>

					</div>
				</div>
				
            </div>
		</div>
<?php include($this->config->item('footer')); ?>	 
     