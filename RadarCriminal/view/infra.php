<?php 
	include 'header.php';
?>

			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<div class="row-fluid">
				
				<div class="tempStats">
					<div class="tempStatBox span2" onTablet="span4" onDesktop="span2">
						<div class="tempStat">78</div>
						<span>CPU Temperature</span>
					</div>
				
					<div class="tempStatBox span2" onTablet="span4" onDesktop="span2">
						<div class="tempStat">78</div>
						<span>GPU Temperature</span>
					</div>
				
					<div class="tempStatBox span2" onTablet="span4" onDesktop="span2">
						<div class="tempStat">78</div>
						<span>HDD Temperature</span>
					</div>
				
					<div class="tempStatBox span2 noMargin" onTablet="span4" onDesktop="span2">
						<div class="tempStat">78</div>
						<span>SSD Temperature</span>
					</div>
				
					<div class="tempStatBox span2" onTablet="span4" onDesktop="span2">
						<div class="tempStat">78</div>
						<span>Memory Bank Temperature</span>
					</div>
				
					<div class="tempStatBox span2" onTablet="span4" onDesktop="span2">
						<div class="tempStat">78</div>
						<span>Memory Controller Temperature</span>
					</div>
					
					<div class="clearfix"></div>
				</div>	
				
				<div class="row-fluid hideInIE8">
				
				<div class="span12">
					
					<div class="circleStats">

						<div class="span2" onTablet="span4" onDesktop="span2">
	                    	<div class="circleStatsItemBox">
								<div class="header">Disk Space Usage</div>
								<span class="percent">percent</span>
								<div class="circleStat">
	                        		<input type="text" value="58" class="whiteCircle" />
								</div>		
								<div class="footer">
									<span class="count">
										<span class="number">20000</span>
										<span class="unit">MB</span>
									</span>
									<span class="sep"> / </span>
									<span class="value">
										<span class="number">50000</span>
										<span class="unit">MB</span>
									</span>	
								</div>
	                    	</div>
						</div>

						<div class="span2" onTablet="span4" onDesktop="span2">
	                    	<div class="circleStatsItemBox">
								<div class="header">Bandwidth</div>
								<span class="percent">percent</span>
								<div class="circleStat">
	                        		<input type="text" value="78" class="whiteCircle" />
								</div>
								<div class="footer">
									<span class="count">
										<span class="number">5000</span>
										<span class="unit">GB</span>
									</span>
									<span class="sep"> / </span>
									<span class="value">
										<span class="number">5000</span>
										<span class="unit">GB</span>
									</span>	
								</div>
	                    	</div>
						</div>

						<div class="span2" onTablet="span4" onDesktop="span2">
	                    	<div class="circleStatsItemBox">
								<div class="header">Memory</div>
								<span class="percent">percent</span>
	                        	<div class="circleStat">
	                        		<input type="text" value="100" class="whiteCircle" />
								</div>
								<div class="footer">
									<span class="count">
										<span class="number">64</span>
										<span class="unit">GB</span>
									</span>
									<span class="sep"> / </span>
									<span class="value">
										<span class="number">64</span>
										<span class="unit">GB</span>
									</span>	
								</div>
	                    	</div>
						</div>

						<div class="span2 noMargin" onTablet="span4" onDesktop="span2">
	                    	<div class="circleStatsItemBox">
								<div class="header">CPU</div>
								<span class="percent">percent</span>
	                        	<div class="circleStat">
	                        		<input type="text" value="83" class="whiteCircle" />
								</div>
								<div class="footer">
									<span class="count">
										<span class="number">64</span>
										<span class="unit">GHz</span>
									</span>
									<span class="sep"> / </span>
									<span class="value">
										<span class="number">3.2</span>
										<span class="unit">GHz</span>
									</span>	
								</div>
	                    	</div>
						</div>

						<div class="span2" onTablet="span4" onDesktop="span2">
	                    	<div class="circleStatsItemBox">
								<div class="header">Memory</div>
								<span class="percent">percent</span>
	                        	<div class="circleStat">
	                        		<input type="text" value="100" class="whiteCircle" />
								</div>
								<div class="footer">
									<span class="count">
										<span class="number">64</span>
										<span class="unit">GB</span>
									</span>
									<span class="sep"> / </span>
									<span class="value">
										<span class="number">64</span>
										<span class="unit">GB</span>
									</span>	
								</div>
	                    	</div>
						</div>

						<div class="span2" onTablet="span4" onDesktop="span2">
	                    	<div class="circleStatsItemBox">
								<div class="header">Memory</div>
								<span class="percent">percent</span>
	                        	<div class="circleStat">
	                        		<input type="text" value="100" class="whiteCircle" />
								</div>
								<div class="footer">
									<span class="count">
										<span class="number">64</span>
										<span class="unit">GB</span>
									</span>
									<span class="sep"> / </span>
									<span class="value">
										<span class="number">64</span>
										<span class="unit">GB</span>
									</span>	
								</div>
	                    	</div>
						</div>

	                </div>
					
				</div>
				
				</div>		
								
				
			
			</div>
			
			<hr>
			
			<div class="row-fluid">
				
				<div class="widget span12">
					<h2><span class="glyphicons fire"><i></i></span> Active Users</h2>
					<hr>
					<div class="content">
						 <div id="activeUsers" style="height:300px;"></div>
					</div>
				</div>
			
			</div>
			
			<hr>
						
			<div class="row-fluid">
				
				<div class="widget span12">
					<h2><span class="glyphicons fire"><i></i></span> Server Load</h2>
					<hr>
					<div class="content">
						 <div id="serverLoad" style="height:300px;"></div>
					</div>
				</div>
			
			</div>	
			
       
					
			</div>
			<!-- end: Content -->
				
				</div><!--/fluid-row-->

<?php 
	include 'footer.php';
?>