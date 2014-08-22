function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

function rgbToRgba(rgb, alpha) {
	
	if (jQuery.browser.version <= 8.0) {
		
		rgb = hexToRgb(rgb);
		
		rgba = 'rgba('+ rgb.r +','+ rgb.g +','+ rgb.b +','+ alpha +')';
		
		
	} else {
		
		rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

		rgba = 'rgba('+ rgb[1] +','+ rgb[2] +','+ rgb[3] +','+ alpha +')';
		
	}
	
	return rgba;
	
}

function charts() {
	
	/* ---------- Sparkline Charts ---------- */
	if($('.sparkLineStats').length) {

		//generate random number for charts
		randNum = function(){
			//return Math.floor(Math.random()*101);
			return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
		}

		var chartColours = ['#2FABE9', '#FA5833', '#b9e672', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'];

		//sparklines (making loop with random data for all 7 sparkline)
		i=1;
		for (i=1; i<9; i++) {
		 	var data = [[1, 3+randNum()], [2, 5+randNum()], [3, 8+randNum()], [4, 11+randNum()],[5, 14+randNum()],[6, 17+randNum()],[7, 20+randNum()], [8, 15+randNum()], [9, 18+randNum()], [10, 22+randNum()]];
		 	placeholder = '.sparkLineStats' + i;

			if (retina()) {

				$(placeholder).sparkline(data, {
					width: 200,//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
					height: 60,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
					lineColor: '#2FABE9',//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
					fillColor: '#f2f7f9',//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
					spotColor: '#467e8c',//The CSS colour of the final value marker. Set to false or an empty string to hide it
					maxSpotColor: '#b9e672',//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
					minSpotColor: '#FA5833',//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
					spotRadius: 2,//Radius of all spot markers, In pixels (default: 1.5) - Integer
					lineWidth: 1//In pixels (default: 1) - Integer
				});

				$(placeholder).css('zoom',0.5);

			} else {

				$(placeholder).sparkline(data, {
					width: 100,//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
					height: 30,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
					lineColor: '#2FABE9',//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
					fillColor: '#f2f7f9',//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
					spotColor: '#467e8c',//The CSS colour of the final value marker. Set to false or an empty string to hide it
					maxSpotColor: '#b9e672',//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
					minSpotColor: '#FA5833',//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
					spotRadius: 2,//Radius of all spot markers, In pixels (default: 1.5) - Integer
					lineWidth: 1//In pixels (default: 1) - Integer
				});

			}

		}

	}
	
	/* ---------- Vertical Chart ---------- */
	if($('.verticalChart')) {
		
		$('.singleBar').each(function(){
			
			var percent = $(this).find('.value span').html();
			
			$(this).find('.value').animate({height:percent}, 2000, function() {
			    
				$(this).find('span').fadeIn();
			 
			});
			
		});
		
	}
	
	/* ---------- Main Chart ---------- */

	if($('.main-chart')) {
		
		$('.bar').each(function(){
			
			var value = $(this).find(".value").html();

			var percentValue = (value * 100) / 200000;

			var finalValue = (300 * percentValue) / 100;
			
			$(this).find('.value').html('');
			
			$(this).find('.value').animate({height:finalValue}, 2000);
			
		});
		
	}

	else if($('.chart-natureza')) {
		
		$('.bar').each(function(){
			
			var value = $(this).find(".value").html();

			var percentValue = (value * 100) / 100;

			var finalValue = (300 * percentValue) / 10000;
			
			$(this).find('.value').html('');
			
			$(this).find('.value').animate({height:finalValue}, 2000);
			
		});
		
	}

	
	/* ---------- Bar Stats ---------- */
	if($('.bar-stat').length) {
	
		if (retina()) {

			$(".bar-stat > .chart").each(function(){

				var chartColor = $(this).css('color');	

				$(this).sparkline('html', {
				    type: 'bar',
				    height: '80', // Double pixel number for retina display
					barWidth: '10', // Double pixel number for retina display
					barSpacing: '4', // Double pixel number for retina display
				    barColor: chartColor,
				    negBarColor: '#eeeeee'}
				);

				$(this).css('zoom',0.5);

			});

		} else {

			$(".bar-stat > .chart").each(function(){

				var chartColor = $(this).css('color');

				$(this).sparkline('html', {				
				    type: 'bar',
				    height: '40',
					barWidth: '5',
					barSpacing: '2',
				    barColor: chartColor,
				    negBarColor: '#eeeeee'}
				);

			});

		}
	
	}
	
	if($('.chart-stat').length) {
	
		if (retina()) {

			$(".chart-stat > .chart").each(function(){

				var chartColor = $(this).css('color');	

				$(this).sparkline('html', {				
				    width: '180%',//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
					height: 80,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
					lineColor: chartColor,//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
					fillColor: false,//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
					spotColor: false,//The CSS colour of the final value marker. Set to false or an empty string to hide it
					maxSpotColor: false,//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
					minSpotColor: false,//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
					spotRadius: 2,//Radius of all spot markers, In pixels (default: 1.5) - Integer
					lineWidth: 2//In pixels (default: 1) - Integer
				});

				$(this).css('zoom',0.5);

			});

		} else {

			$(".chart-stat > .chart").each(function(){

				var chartColor = $(this).css('color');

				$(this).sparkline('html', {				
				    width: '90%',//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
					height: 40,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
					lineColor: chartColor,//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
					fillColor: false,//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
					spotColor: false,//The CSS colour of the final value marker. Set to false or an empty string to hide it
					maxSpotColor: false,//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
					minSpotColor: false,//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
					spotRadius: 2,//Radius of all spot markers, In pixels (default: 1.5) - Integer
					lineWidth: 2//In pixels (default: 1) - Integer
				});

			});

		}
	
	}
	
	/* ---------- Chart with points ---------- */
	if($('.chart-type1').length) {
		
		$('.chart-type1').each(function(){
			
			var data1 = [[0, 5], [5, 6], [11, 9], [17, 8], [21, 6], [27, 8],[31,4]];
			var data2 = [[0, 1], [1, 2], [2, 3], [3, 4],[4, 5], [5, 4], [6, 3], [7, 3],[8, 4], [9, 5], [10, 5], [11, 6],[12, 6], [13, 5], [14, 5], [15, 4],[16, 6], [17, 5], [18, 4], [19, 3],[20, 2], [21, 1], [22, 2], [23, 2],[24, 3], [25, 4], [26, 5], [27, 6],[28, 5], [29, 4], [30, 3], [31, 2]];
			
			
			var chartColor = $(this).parent().parent().css("color");
			
			
			var plot = $.plot($(".chart-type1"),

				[ { data: data1, 
					label: "Visits", 
					lines: { 
						show: true, 
						fill: true,
						fillColor: rgbToRgba(chartColor,0.25),
						lineWidth: 3 
					},
					points: { 
						show: true, 
						lineWidth: 3,
						fill: true 
					},
					shadowSize: 0	
				  }, {
					data: data2,
					bars: { 
						show: true,
						fill: false, 
						barWidth: 0.1, 
						align: "center",
						lineWidth: 8
					}
				  }
				], {

					grid: { 
						hoverable: true, 
						clickable: true, 
						tickColor: "#eee",
						borderWidth: 0
					},
					legend: {
						show: false
					},	
					colors: [chartColor, rgbToRgba(chartColor,0.25)],
					xaxis: {ticks:5, tickDecimals: 0 },
					yaxis: {ticks:5, tickDecimals: 0 },
				}
			);
			
			function showTooltip(x, y, contents) {
				$('<div id="tooltip">' + contents + '</div>').css( {
					position: 'absolute',
					display: 'none',
					top: y + 5,
					left: x + 5,
					border: '1px solid #fdd',
					padding: '2px',
					'background-color': '#dfeffc',
					opacity: 0.80
				}).appendTo("body").fadeIn(200);
			}
			
			var previousPoint = null;
			$(this).bind("plothover", function (event, pos, item) {
				$("#x").text(pos.x.toFixed(2));
				$("#y").text(pos.y.toFixed(2));

					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;

							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2),
								y = item.datapoint[1].toFixed(2);

							showTooltip(item.pageX, item.pageY,
										item.series.label + " of " + x + " = " + y);
						}
					}
					else {
						$("#tooltip").remove();
						previousPoint = null;
					}
			});		
			
		});
	
	}
	
	function randNum(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20)* 1200;
	}
	
	if($(".multi-stat-box-chart").length){
		
		$('.multi-stat-box-chart').each(function(){
			
			var data2 = [[1111, 5+randNum()], [1112, 10+randNum()], [1113, 15+randNum()], [1114, 20+randNum()], [1115, 25+randNum()],[1116, 30+randNum()], [1117, 25+randNum()]];
			
			var data = [[gd(2013, 1, 7), 5+randNum()], [gd(2013, 1, 8), 10+randNum()], [gd(2013, 1, 9), 15+randNum()], [gd(2013, 1, 10), 20+randNum()],[gd(2013, 1, 11), 25+randNum()],[gd(2013, 1, 12), 30+randNum()],[gd(2013, 1, 13), 25+randNum()]];
		
			var chartColor = $(this).parent().parent().css("color");
		
			var dayOfWeek = ["DOM", "SEG", "TER", "QUA", "QUI", "SEX", "SAB"];

			//Variavel adicionada por @author Sérgio Bezerra da Silva | para grafico de crimes contra a vida
			var yearsOfDecade = [2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011];
		
		function gd(year, month, day) {
		     return new Date(year, month - 1, day).getTime();
		}
		
		var plot = $.plot($(".multi-stat-box-chart"),
			   [ { data: data } ], {
				   series: {
					   lines: { show: true,
								lineWidth: 3, 
								fill: false
							 },
					   points: { show: true, 
								 lineWidth: 3,
								 fill: true,
								 fillColor: '#fff' 
							 },	
					   shadowSize: 0
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#fff",
						   borderColor: false
				   },
				   colors: ["#c7cbd5"],
				   xaxis: {
						mode: "time",       
							tickFormatter: function (val, axis) {           
						        return yearsOfDecade[new Date(val).getDay()];
						    },
						color: "#c7cbd5",
						autoscaleMargin: 0.000000000000000001
				   },
				   yaxis: {
						ticks:4, 
						tickDecimals: 0,
						color: "#fff",
				   },
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$(".multi-stat-box-chart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		
	});
	
	}
	
	function randNum(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20)* 1200;
	}
	
	if($(".chart-type2").length){
		
		$('.chart-type2').each(function(){
			
		var likes = [[1, 5+randNum()], [2, 10+randNum()], [3, 15+randNum()], [4, 20+randNum()],[5, 25+randNum()],[6, 30+randNum()],[7, 35+randNum()],[8, 40+randNum()],[9, 45+randNum()],[10, 50+randNum()],[11, 55+randNum()],[12, 60+randNum()]];
		
		var chartColor = $(this).parent().parent().css("color");
		
		var plot = $.plot($(".chart-type2"),
			   [ { data: likes} ], {
				   series: {
					   lines: { show: true,
								lineWidth: 3, 
								fill: false
							 },
					   points: { show: true, 
								 lineWidth: 3,
								 fill: true,
								 fillColor: chartColor 
							 },	
					   shadowSize: 0
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "rgba(255,255,255,.15)",
						   borderColor: "rgba(255,255,255,0)"
						 },
				   colors: ["#fff"],
				   xaxis: {
						ticks:6, 
						tickDecimals: 0, 
						tickColor: chartColor,
						color: "#fff"
				   },
				   yaxis: {
						ticks:4, 
						tickDecimals: 0,
						color: "#fff",
						autoscaleMargin: 0.000001
				   },
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$(".chart-type2").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		
	});
	
	}
	
	
	function randNum(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20)* 1200;
	}
	
	function randNum2(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20) * 500;
	}
	
	function randNum3(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20) * 300;
	}
	
	function randNum4(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20) * 100;
	}
	
	/* ---------- Chart with points ---------- */
	if($("#stats-chart2").length)
	{	
		var tickets = [[1, 5+randNum3()], [2, 10+randNum3()], [3, 15+randNum3()], [4, 20+randNum3()],[5, 25+randNum3()],[6, 30+randNum3()],[7, 35+randNum3()],[8, 40+randNum3()],[9, 45+randNum3()],[10, 50+randNum3()],[11, 55+randNum3()],[12, 60+randNum3()],[13, 65+randNum3()],[14, 70+randNum3()],[15, 75+randNum3()],[16, 80+randNum3()],[17, 85+randNum3()],[18, 90+randNum3()],[19, 85+randNum3()],[20, 80+randNum3()],[21, 75+randNum3()],[22, 80+randNum3()],[23, 75+randNum3()],[24, 70+randNum3()],[25, 65+randNum3()],[26, 75+randNum3()],[27,80+randNum3()],[28, 85+randNum3()],[29, 90+randNum3()], [30, 95+randNum3()]];
		var solved = [[1, 5+randNum3()], [2, 10+randNum3()], [3, 15+randNum3()], [4, 20+randNum3()],[5, 25+randNum3()],[6, 30+randNum3()],[7, 35+randNum3()],[8, 40+randNum3()],[9, 45+randNum3()],[10, 50+randNum3()],[11, 55+randNum3()],[12, 60+randNum3()],[13, 65+randNum3()],[14, 70+randNum3()],[15, 75+randNum3()],[16, 80+randNum3()],[17, 85+randNum3()],[18, 90+randNum3()],[19, 85+randNum3()],[20, 80+randNum3()],[21, 75+randNum3()],[22, 80+randNum3()],[23, 75+randNum3()],[24, 70+randNum3()],[25, 65+randNum3()],[26, 75+randNum3()],[27,80+randNum3()],[28, 85+randNum3()],[29, 90+randNum3()], [30, 95+randNum3()]];

		var plot = $.plot($("#stats-chart2"),
			   [ { data: tickets, label: "Tickets" }, 
				 { data: solved, label: "Solved Tickets"} ], {
				   series: {
					   lines: { show: true,
								lineWidth: 1,
								fill: true,
								fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.1 } ] } 
							 },
					   points: { show: false, 
								 lineWidth: 1 
							 },
					   shadowSize: 0
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   borderWidth: 0,
						 },
				 legend: {
						    show: false
						},	
				   colors: ["#bdea74", "#2FABE9"],
					xaxis: {ticks:10, tickDecimals: 0, tickColor: "#fff"},
					yaxis: {ticks:5, tickDecimals: 0, tickColor: "#c7cbd5"},
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#stats-chart2").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
	
	}
	
	function randNum(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20);
	}
	
	/* ---------- Chart with points ---------- */
	if($("#facebookChart").length)
	{	
		var likes = [[1, 5+randNum()], [2, 10+randNum()], [3, 15+randNum()], [4, 20+randNum()],[5, 25+randNum()],[6, 30+randNum()],[7, 35+randNum()],[8, 40+randNum()],[9, 45+randNum()],[10, 50+randNum()],[11, 55+randNum()],[12, 60+randNum()],[13, 65+randNum()],[14, 70+randNum()],[15, 75+randNum()],[16, 80+randNum()],[17, 85+randNum()],[18, 90+randNum()],[19, 85+randNum()],[20, 80+randNum()],[21, 75+randNum()],[22, 80+randNum()],[23, 75+randNum()],[24, 70+randNum()],[25, 65+randNum()],[26, 75+randNum()],[27,80+randNum()],[28, 85+randNum()],[29, 90+randNum()], [30, 95+randNum()]];

		var plot = $.plot($("#facebookChart"),
			   [ { data: likes, label: "Fans"} ], {
				   series: {
					   lines: { show: true,
								lineWidth: 2,
								fill: true, fillColor: { colors: [ { opacity: 0.5 }, { opacity: 0.2 } ] }
							 },
					   points: { show: true, 
								 lineWidth: 2 
							 },
					   shadowSize: 0
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#f9f9f9",
						   borderWidth: 0
						 },
				   colors: ["#3B5998"],
					xaxis: {ticks:6, tickDecimals: 0},
					yaxis: {ticks:3, tickDecimals: 0},
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#facebookChart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
	
	}
	
	function randNumTW(){
		return ((Math.floor( Math.random()* (1+40-20) ) ) + 20);
	}
	
	/* ---------- Chart with points ---------- */
	if($("#twitterChart").length)
	{	
		var followers = [[4, 8+randNumTW()], [4, 8+randNumTW()], [4, 8+randNumTW()], [4, 8+randNumTW()],[4, 8+randNumTW()],[4, 8+randNumTW()],[4, 8+randNumTW()],[4, 8+randNumTW()],[4, 8+randNumTW()],[10, 50+randNumTW()],[11, 55+randNumTW()],[12, 60+randNumTW()],[13, 65+randNumTW()],[14, 70+randNumTW()],[15, 75+randNumTW()],[16, 80+randNumTW()],[17, 85+randNumTW()],[18, 90+randNumTW()],[19, 85+randNumTW()],[20, 80+randNumTW()],[21, 75+randNumTW()],[22, 80+randNumTW()],[23, 75+randNumTW()],[24, 70+randNumTW()],[25, 65+randNumTW()],[26, 75+randNumTW()],[27,80+randNumTW()],[28, 85+randNumTW()],[29, 90+randNumTW()], [30, 95+randNumTW()]];

		var plot = $.plot($("#twitterChart"),
			   [ { data: followers, label: "Followers"} ], {
				   series: {
					   lines: { show: true,
								lineWidth: 2,
								fill: true, fillColor: { colors: [ { opacity: 0.5 }, { opacity: 0.2 } ] }
							 },
					   points: { show: true, 
								 lineWidth: 2 
							 },
					   shadowSize: 0
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#f9f9f9",
						   borderWidth: 0
						 },
				   colors: ["#1BB2E9"],
					xaxis: {ticks:6, tickDecimals: 0},
					yaxis: {ticks:3, tickDecimals: 0},
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#twitterChart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
	
	}
	

	if($("#activeUsers").length) {
	    var d1 = [];
	    
	    for (var i = 0; i <= 160; i += 1) {
	        d1.push([i, parseInt(Math.random() * 123123)]);
		}	

	    var stack = 0, bars = true, lines = false, steps = false;

	    function plotWithOptions2() {
					
	        $.plot($("#activeUsers"), [ d1 ], {
	            series: {
	                bars: { show: bars, 
							fill: true, 
							barWidth: 0.1, 
							align: "center",
							lineWidth: 5,
							fillColor: { colors: [ { opacity: 1 }, { opacity: 0.5 } ] }
						},
	            },
				grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#f6f6f6",
						   borderWidth: 0,
						},
				colors: ["#CBE968"],
				xaxis: {ticks:0, tickDecimals: 0, tickFormatter: function(v, a) {return v }},
				yaxis: {ticks:5, tickDecimals: 0, tickFormatter: function (v) { return v }},
	
	        });
	    }
	
	    plotWithOptions2();

	}
	
	/* ---------- Chart with points ---------- */
	if($("#stats-chart").length)
	{
		var visitors = [[1, randNum()-10], [2, randNum()-10], [3, randNum()-10], [4, randNum()],[5, randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 6+randNum()],[9, 6+randNum()],[10, 8+randNum()],[11, 9+randNum()],[12, 10+randNum()],[13,11+randNum()],[14, 12+randNum()],[15, 13+randNum()],[16, 14+randNum()],[17, 15+randNum()],[18, 15+randNum()],[19, 16+randNum()],[20, 17+randNum()],[21, 18+randNum()],[22, 19+randNum()],[23, 20+randNum()],[24, 21+randNum()],[25, 14+randNum()],[26, 24+randNum()],[27,25+randNum()],[28, 26+randNum()],[29, 27+randNum()], [30, 31+randNum()]];

		var plot = $.plot($("#stats-chart"),
			   [ { data: visitors, label: "visitors" } ], {
				   series: {
					   lines: { show: true,
								lineWidth: 3,
								fill: true, fillColor: { colors: [ { opacity: 0.5 }, { opacity: 0.2 } ] }
							 },
					   points: { show: true },
					   shadowSize: 2
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#eee",
						   borderWidth: 0,
						 },
				   colors: ["#b1d3d4"],
					xaxis: {ticks:11, tickDecimals: 0},
					yaxis: {ticks:11, tickDecimals: 0},
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#stats-chart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		


		$("#sincos").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
	}
	
	
	
	/* ---------- Chart with points ---------- */
	if($("#sincos").length)
	{
		var sin = [], cos = [];

		for (var i = 0; i < 14; i += 0.5) {
			sin.push([i, Math.sin(i)/i]);
			cos.push([i, Math.cos(i)]);
		}

		var plot = $.plot($("#sincos"),
			   [ { data: sin, label: "sin(x)/x"}, { data: cos, label: "cos(x)" } ], {
				   series: {
					   lines: { show: true,
								lineWidth: 2,
							 },
					   points: { show: true },
					   shadowSize: 2
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#dddddd",
						   borderWidth: 0 
						 },
				   yaxis: { min: -1.2, max: 1.2 },
				   colors: ["#FA5833", "#2FABE9"]
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#sincos").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		


		$("#sincos").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
	}
	
	/* ---------- Flot chart ---------- */
	if($("#flotchart").length)
	{
		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.25)
			d1.push([i, Math.sin(i)]);
		
		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.25)
			d2.push([i, Math.cos(i)]);

		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.1)
			d3.push([i, Math.tan(i)]);
		
		$.plot($("#flotchart"), [
			{ label: "sin(x)",  data: d1},
			{ label: "cos(x)",  data: d2},
			{ label: "tan(x)",  data: d3}
		], {
			series: {
				lines: { show: true },
				points: { show: true }
			},
			xaxis: {
				ticks: [0, [Math.PI/2, "\u03c0/2"], [Math.PI, "\u03c0"], [Math.PI * 3/2, "3\u03c0/2"], [Math.PI * 2, "2\u03c0"]]
			},
			yaxis: {
				ticks: 10,
				min: -2,
				max: 2
			},
			grid: {	tickColor: "#dddddd",
					borderWidth: 0 
			},
			colors: ["#FA5833", "#2FABE9", "#FABB3D"]
		});
	}
	
	/* ---------- Stack chart ---------- */
	if($("#stackchart").length)
	{
		var d1 = [];
		for (var i = 0; i <= 10; i += 1)
		d1.push([i, parseInt(Math.random() * 30)]);

		var d2 = [];
		for (var i = 0; i <= 10; i += 1)
			d2.push([i, parseInt(Math.random() * 30)]);

		var d3 = [];
		for (var i = 0; i <= 10; i += 1)
			d3.push([i, parseInt(Math.random() * 30)]);

		var stack = 0, bars = true, lines = false, steps = false;

		function plotWithOptions() {
			$.plot($("#stackchart"), [ d1, d2, d3 ], {
				series: {
					stack: stack,
					lines: { show: lines, fill: true, steps: steps },
					bars: { show: bars, barWidth: 0.6 },
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D"]
			});
		}

		plotWithOptions();

		$(".stackControls input").click(function (e) {
			e.preventDefault();
			stack = $(this).val() == "With stacking" ? true : null;
			plotWithOptions();
		});
		$(".graphControls input").click(function (e) {
			e.preventDefault();
			bars = $(this).val().indexOf("Bars") != -1;
			lines = $(this).val().indexOf("Lines") != -1;
			steps = $(this).val().indexOf("steps") != -1;
			plotWithOptions();
		});
	}
	
	/* ---------- Device chart ---------- */
	
	var data = [
	{ label: "Desktop",  data: 73},
	{ label: "Mobile",  data: 27}
	];
	
	/* ---------- Donut chart ---------- */
	if($("#deviceChart").length)
	{
		$.plot($("#deviceChart"), data,
		{
				series: {
						pie: {
								innerRadius: 0.6,
								show: true
						}
				},
				legend: {
					show: true
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
	}
	
	var data = [
	{ label: "iOS",  data: 20},
	{ label: "Android",  data: 7},
	{ label: "Linux",  data: 11},
	{ label: "Mac OSX",  data: 14},
	{ label: "Windows",  data: 48}
	];
	
	/* ---------- Donut chart ---------- */
	if($("#osChart").length)
	{
		$.plot($("#osChart"), data,
		{
				series: {
						pie: {
								innerRadius: 0.6,
								show: true
						}
				},
				legend: {
					show: true
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
	}

	/* ---------- Pie chart ---------- */
	<?php			
			include("../../views/CategoriaView.php");
			$categoriaVW = new CategoriaView();
			echo utf8_encode($categoriaVW->_listarTotalDeCategoria());
	?>
	
	if($("#piechart").length)
	{
		$.plot($("#piechart"), data,
		{
			series: {
					pie: {
							show: true
					}
			},
			grid: {
					hoverable: true,
					clickable: true
			},
			legend: {
				show: false
			},
			colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
		
		function pieHover(event, pos, obj)
		{
			if (!obj)
					return;
			percent = parseFloat(obj.series.percent).toFixed(2);
			$("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
		}
		$("#piechart").bind("plothover", pieHover);
	}
	
	/* ---------- Donut chart ---------- */
	if($("#donutchart").length)
	{
		$.plot($("#donutchart"), data,
		{
				series: {
						pie: {
								innerRadius: 0.5,
								show: true
						}
				},
				legend: {
					show: false
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
	}




	 // we use an inline data source in the example, usually data would
	// be fetched from a server
	var data = [], totalPoints = 300;
	function getRandomData() {
		if (data.length > 0)
			data = data.slice(1);

		// do a random walk
		while (data.length < totalPoints) {
			var prev = data.length > 0 ? data[data.length - 1] : 50;
			var y = prev + Math.random() * 10 - 5;
			if (y < 0)
				y = 0;
			if (y > 100)
				y = 100;
			data.push(y);
		}

		// zip the generated y values with the x values
		var res = [];
		for (var i = 0; i < data.length; ++i)
			res.push([i, data[i]])
		return res;
	}

	// setup control widget
	var updateInterval = 30;
	$("#updateInterval").val(updateInterval).change(function () {
		var v = $(this).val();
		if (v && !isNaN(+v)) {
			updateInterval = +v;
			if (updateInterval < 1)
				updateInterval = 1;
			if (updateInterval > 2000)
				updateInterval = 2000;
			$(this).val("" + updateInterval);
		}
	});


	/* ---------- Realtime chart ---------- */
	if($("#serverLoad").length)
	{	
		var options = {
			series: { shadowSize: 1 },
			lines: { show: true, lineWidth: 3, fill: true, fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.9 } ] }},
			yaxis: { min: 0, max: 100, tickFormatter: function (v) { return v + "%"; }},
			xaxis: { show: false },
			colors: ["#FA5833"],
			grid: {	tickColor: "#f9f9f9",
					borderWidth: 0, 
			},
		};
		var plot = $.plot($("#serverLoad"), [ getRandomData() ], options);
		function update() {
			plot.setData([ getRandomData() ]);
			// since the axes don't change, we don't need to call plot.setupGrid()
			plot.draw();
			
			setTimeout(update, updateInterval);
		}

		update();
	}
	
	if($("#realtimechart").length)
	{
		var options = {
			series: { shadowSize: 1 },
			lines: { fill: true, fillColor: { colors: [ { opacity: 1 }, { opacity: 0.1 } ] }},
			yaxis: { min: 0, max: 100 },
			xaxis: { show: false },
			colors: ["#F4A506"],
			grid: {	tickColor: "#dddddd",
					borderWidth: 0 
			},
		};
		var plot = $.plot($("#realtimechart"), [ getRandomData() ], options);
		function update() {
			plot.setData([ getRandomData() ]);
			// since the axes don't change, we don't need to call plot.setupGrid()
			plot.draw();
			
			setTimeout(update, updateInterval);
		}

		update();
	}
	
}