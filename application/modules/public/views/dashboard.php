<?php include($this->config->item('header')); ?>	
   
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
                            <div class="widget blue value">
                                <div class="left">60%</div>
                                <div class="right">
                                    $1,530 amount paid<br/>
                                    $2,102 in queue<br/>
                                    $11,100 total taxes
                                </div>
                                <div class="bottom">
                                    <a href="#">Invoices statistics</a>
                                </div>
                            </div>
                            <div class="widget green icon">
                                <div class="left">
                                    <div class="icon">
                                        <span class="ico-download"></span>
                                    </div>
                                </div>
                                <div class="right">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td>HDD</td><td>4.5 / 250 GB</td>
                                        </tr>
                                        <tr>
                                            <td>MySQL</td><td>1.8 / 10 GB</td>
                                        </tr>
                                        <tr>
                                            <td>Databases</td><td>1 / 5</td> 
                                        </tr>
                                        <tr>
                                            <td>E-mails</td><td>5 / 15</td> 
                                        </tr>
                                        <tr>
                                            <td>Tickets</td><td>2</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="bottom">
                                    <a href="#">Server information</a>
                                </div>                            
                            </div>
                            <div class="widget orange chart nmr">
                                <div class="left">                                    
                                    <span class="mChartBar" sparkWidth="90" sparkHeight="90" sparkType="bar" sparkBarColor="#FFFFFF" sparkBarWidth="10">10,9,8.5,8,9,8,7,7.5</span>
                                </div>
                                <div class="right">
                                    65% New<br/>
                                    35% Returning<br/>
                                    00:05:12 Average time on site
                                </div>
                                <div class="bottom">
                                    <a href="#">List visits</a>
                                </div>                            
                            </div>

							<div class="widget2">
							<div class="data TAC">
									<div id="chart-3" style="height: 300px;"></div>
							</div>
                            </div>
                            	
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
					<div class="block">
                        <div class="head red">
							<h2></h2>
							<div class="row-form">
								<div class="span3">Append:</div>
								<div class="span9">
								<div class="input-append file">
									<input type="text"/>
									<span class="add-on blue"><i class="icon-search icon-white"></i></span>
									<button class="btn">Search</button>
								</div>                                                        
							</div>
						</div>
					</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
                        <div class="block">
                            <div class="head purple">
                                <div class="icon"><span class="ico-location"></span></div>
                                <h2>Online Document System</h2>     
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_hover'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                          
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="25%">
                                            Email
                                            </th>
                                            <th width="25%">
                                            Name
                                            </th>
                                            <th width="25%">
                                            Code
                                            </th>
                                            <th width="25%">
                                            Post
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">dmitry@domain.com</a>
                                            </td>
                                            <td>
                                                Dmitry Ivaniuk
                                            </td>
                                            <td>
                                                DT-SV35582
                                            </td>
                                            <td>
                                                <span class="label label-success">Developer</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">olga@domain.com</a>
                                            </td>
                                            <td>
                                                Olga Ivaniuk
                                            </td>                                
                                            <td width="25%">
                                                DS-SV34522
                                            </td>      
                                            <td width="25%">
                                                <span class="label label-warning">Economist</span>
                                            </td>                                
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">alex@domain.com</a>
                                            </td>
                                            <td>
                                                Alex Fruz
                                            </td>         
                                            <td width="25%">
                                                DV-SV41222
                                            </td>  
                                            <td width="25%">
                                                <span class="label label-info">Developer</span>
                                            </td>                                  
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">helen@domain.com</a>
                                            </td>
                                            <td>
                                                Helen Simonchuk
                                            </td>                                                                
                                            <td width="25%">
                                                DV-ST32212
                                            </td>   
                                            <td width="25%">
                                                <span class="label label-important">Promoter</span>
                                            </td>                                  
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">valentin@domain.com</a>
                                            </td>       
                                            <td>
                                                Valentin Ratushev
                                            </td>        
                                            <td width="25%">
                                                DV-WR21677
                                            </td>    
                                            <td width="25%">
                                                <span class="label">Lawyer</span>
                                            </td>                                
                                        </tr>                           
                                    </tbody>
                                </table>
                            </div>                
                        </div>

					</div>
				</div>
				
            </div>
			
<?php include($this->config->item('footer')); ?>	 
     