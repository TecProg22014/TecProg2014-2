<?php 
	include 'header.php';
?>

			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<div class="row-fluid">
				
				<div class="box">
					<div class="box-header">
						<h2><i class="icon-list-alt"></i><span class="break"></span>
							Chart with points</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div id="sincos"  class="center" style="height:300px;" ></div>
						<p id="hoverdata">Mouse position at (<span id="x">0</span>, 
															 <span id="y">0</span>). 
															 <span id="clickdata"></span></p>
					</div>
				</div>
				
				<div class="box">
					<div class="box-header">
						<h2><i class="icon-list-alt"></i><span class="break"></span>
							Flot</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div id="flotchart" class="center" style="height:300px"></div>
					</div>
				</div>
				
				<div class="box">
					<div class="box-header">
						<h2><i class="icon-list-alt"></i><span class="break"></span>
							Stack Example</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="stackchart" class="center" style="height:300px;"></div>

						<p class="stackControls center">
							<input class="btn" type="button" value="With stacking">
							<input class="btn" type="button" value="Without stacking">
						</p>

						<p class="graphControls center">
							<input class="btn-primary" type="button" value="Bars">
							<input class="btn-primary" type="button" value="Lines">
							<input class="btn-primary" type="button" value="Lines with steps">
						</p>
					</div>
				</div>

			</div><!--/row-->
			
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="icon-list-alt"></i><span class="break"></span>
							Pie</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<div id="piechart" style="height:300px"></div>
					</div>
				</div>
			
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="icon-list-alt"></i><span class="break"></span>
							Donut</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="donutchart" style="height: 300px;"></div>
					</div>
				</div>
			
			</div><!--/row-->
		
			<hr>
		
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-list-alt"></i><span class="break"></span>
							Realtime</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="realtimechart" style="height:190px;"></div>
						 <p>You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
						 <p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
					</div>
				</div>
			</div><!--/row-->
			
			<div class="row-fluid">
				
				<div class="box span3 noMargin" onTablet="span6" onDesktop="span3">
					<div class="box-header">
						<h2><i class="icon-bar-chart"></i> Browsers</h2>
					</div>
					<div class="box-content">
						<div class="browserStat big">
							<img src="img/browser-chrome-big.png" alt="Chrome">
							<span>34%</span>
						</div>
						<div class="browserStat big">
							<img src="img/browser-firefox-big.png" alt="Firefox">
							<span>34%</span>
						</div>
						<div class="browserStat">
							<img src="img/browser-ie.png" alt="Internet Explorer">
							<span>34%</span>
						</div>
						<div class="browserStat">
							<img src="img/browser-safari.png" alt="Safari">
							<span>34%</span>
						</div>
						<div class="browserStat">
							<img src="img/browser-opera.png" alt="Opera">
							<span>34%</span>
						</div>	
					</div>
				</div>
				
				<div class="box span4" onTablet="span6" onDesktop="span4">
					<div class="box-header">
						<h2><i class="icon-bar-chart"></i> Weekly Stat</h2>
					</div>
					<div class="box-content">
						<div class="sparkLineStats">

	                        <ul class="unstyled">
	                            
	                            <li><span class="sparkLineStats3"></span> 
	                                Pageviews: 
	                                <span class="number">781</span>
	                            </li>
	                            <li><span class="sparkLineStats4"></span>
	                                Pages / Visit: 
	                                <span class="number">2,19</span>
	                            </li>
	                            <li><span class="sparkLineStats5"></span>
	                                Avg. Visit Duration: 
	                                <span class="number">00:02:58</span>
	                            </li>
	                            <li><span class="sparkLineStats6"></span>
	                                Bounce Rate: <span class="number">59,83%</span>
	                            </li>
	                            <li><span class="sparkLineStats7"></span>
	                                % New Visits: 
	                                <span class="number">70,79%</span>
	                            </li>
	                            <li><span class="sparkLineStats8"></span>
	                                % Returning Visitor: 
	                                <span class="number">29,21%</span>
	                            </li>

	                        </ul>
	
	                    </div><!-- End .sparkStats -->
					</div>
				</div><!--/span-->
			
			</div>
			
			<div class="row-fluid">
				
				<div class="box span6" onTablet="span6" onDesktop="span6">
					<div class="box-header">
						<h2><i class="icon-facebook"></i> Facebook Fans</h2>
					</div>
					<div class="box-content">
						<div id="facebookChart" style="height:300px" ></div>
					</div>
				</div><!--/span-->
				
				<div class="box span6" onTablet="span6" onDesktop="span6">
					<div class="box-header">
						<h2><i class="icon-twitter"></i> Twitter Followers</h2>
					</div>
					<div class="box-content">
						<div id="twitterChart" style="height:300px" ></div>
					</div>
				</div><!--/span-->
			
			</div>
		
		
					
			</div>
			<!-- end: Content -->
				
				</div><!--/fluid-row-->
				
<?php 
	include 'footer.php';
?>