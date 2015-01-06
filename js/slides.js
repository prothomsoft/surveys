(function($) {

	function initChart1() {
		$('.container-head-one').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [20, 60, 20, 60],
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				colors: ['#FF9900'],
				title: {
					text: 'TITRE DE L\'ETUDE 1 - 1 January 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: 'VOIR LES RESULTATS DETAILLES',
 				   style: { "color": "#FFFFFF" }
				},				
				xAxis: [{
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					}
				}],
				yAxis: [{ // Primary yAxis
					title: {
						text: ''
					}
				}, { // Secondary yAxis
					title: {
						text: ''
					},					
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					},
					opposite: true
				}],
				tooltip: {
					formatter: function() {
						if (this.series.name == 'Sunshine') {
							return '<b>' + this.point.name + ':</b> ' + this.y;
						} else {
							return '' + this.x + ': ' + this.y + (this.series.name == 'Rainfall' ? ' mm' : '°C');
						}
					}
				},
				series: [{
					name: 'Rainfall',
					type: 'column',
					yAxis: 1,
					data: [29.9, 21.5, 26.4, 29.2, 44.0, 76.0, 35.6, 48.5, 16.4, 94.1, 95.6, 54.4]

				}],
				legend: {
					enabled: false
				},
				credits: {
				      enabled: false
				},
				exporting: {
				      enabled: false
				}
			});
		});
	}

	function initChart2() {
		$('.container-head-two').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [20, 60, 20, 60],
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				colors: ['#FF9900'],
				title: {
					text: 'TITRE DE L\'ETUDE 2 - 1 February 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: 'VOIR LES RESULTATS DETAILLES',
 				   style: { "color": "#FFFFFF" }
				},				
				xAxis: [{
					categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					}
				}],
				yAxis: [{ // Primary yAxis
					title: {
						text: ''
					}
				}, { // Secondary yAxis
					title: {
						text: ''
					},					
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					},
					opposite: true
				}],
				tooltip: {
					formatter: function() {
						if (this.series.name == 'Sunshine') {
							return '<b>' + this.point.name + ':</b> ' + this.y;
						} else {
							return '' + this.x + ': ' + this.y + (this.series.name == 'Rainfall' ? ' mm' : '°C');
						}
					}
				},
				series: [{
					name: 'Rainfall',
					type: 'column',
					yAxis: 1,
					data: [129.9, 121.5, 126.4, 129.2, 144.0, 176.0, 35.6]

				}],
				legend: {
					enabled: false
				},
				credits: {
				      enabled: false
				},
				exporting: {
				      enabled: false
				}
			});
		});
	}
	
	function initChart3() {
		$('.container-head-three').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [20, 60, 20, 60],
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				colors: ['#FF9900'],
				title: {
					text: 'TITRE DE L\'ETUDE 3 - 1 March 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: 'VOIR LES RESULTATS DETAILLES',
 				   style: { "color": "#FFFFFF" }
				},				
				xAxis: [{
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					}
				}],
				yAxis: [{ // Primary yAxis
					title: {
						text: ''
					}
				}, { // Secondary yAxis
					title: {
						text: ''
					},					
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					},
					opposite: true
				}],
				tooltip: {
					formatter: function() {
						if (this.series.name == 'Sunshine') {
							return '<b>' + this.point.name + ':</b> ' + this.y;
						} else {
							return '' + this.x + ': ' + this.y + (this.series.name == 'Rainfall' ? ' mm' : '°C');
						}
					}
				},
				series: [{
					name: 'Rainfall',
					type: 'column',
					yAxis: 1,
					data: [39.9, 51.5, 26.4, 79.2, 44.0, 26.0, 55.6, 18.5, 16.4, 34.1, 15.6, 14.4]

				}],
				legend: {
					enabled: false
				},
				credits: {
				      enabled: false
				},
				exporting: {
				      enabled: false
				}
			});
		});
	}
	
	function initChart4() {
		$('.container-head-four').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [20, 60, 20, 60],
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				colors: ['#FF9900'],
				title: {
					text: 'TITRE DE L\'ETUDE 4 - 1 April 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: 'VOIR LES RESULTATS DETAILLES',
 				   style: { "color": "#FFFFFF" }
				},				
				xAxis: [{
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					}
				}],
				yAxis: [{ // Primary yAxis
					title: {
						text: ''
					}
				}, { // Secondary yAxis
					title: {
						text: ''
					},					
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					},
					opposite: true
				}],
				tooltip: {
					formatter: function() {
						if (this.series.name == 'Sunshine') {
							return '<b>' + this.point.name + ':</b> ' + this.y;
						} else {
							return '' + this.x + ': ' + this.y + (this.series.name == 'Rainfall' ? ' mm' : '°C');
						}
					}
				},
				series: [{
					name: 'Rainfall',
					type: 'column',
					yAxis: 1,
					data: [39.9, 51.5, 26.4, 79.2, 44.0, 26.0, 55.6, 18.5, 16.4, 34.1, 15.6, 14.4]

				}],
				legend: {
					enabled: false
				},
				credits: {
				      enabled: false
				},
				exporting: {
				      enabled: false
				}
			});
		});
	}

  	// Initialize the Flex slider
	$(function() {
		var touch;
		if ((window.ontouchstart !== undefined)) {
			touch = true;
			$(".flex-slides").addClass("touch");
		}
		$('.flexslider').flexslider({
			animation: 'slide',
			animationLoop: true,
			directionNav: !touch,
			prevText: "",
			nextText: "",
			startAt: 0,
			maxItems: 1,
			itemWidth: 2,
			_slideshow: false,
			controlNav: true,
			start: function() {
				initChart1();
        		initChart2();
				initChart3();
				initChart4();
			}
		});
	});
}(jQuery));