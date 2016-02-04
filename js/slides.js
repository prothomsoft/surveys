(function($) {

	function initChart1() {
		$('.container-head-one').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [15, 100, 5, 100],
					marginTop: 30,
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},

				title: {
					text: 'Grande consultation des entrepreneurs - Vague 6 / Janvier 2016',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: '- L’indicateur de l’optimisme -',
 				   style: { "color": "#FFFFFF", "fontSize": "16px" }
				},				
				
				
				
				
				xAxis: [{
					categories: ['02/2015', '04/2015', '06/2015', '09/2015', '11/2015', '01/2016'],

					lineColor: 'rgba(255, 255, 255, 0.01)',
	        		tickColor: 'rgba(255, 255, 255, 0.01)',
	        		labels: {
	            		style: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
							color: 'white'
	           					},
							},
				}],
				
				
				
				yAxis: [{ 
					title: {
						text: ''
					},
	        	gridLineColor: 'rgba(255, 255, 255, 0.2)',
				labels: {
                	formatter: function() {
                    return this.value ;
                		},
	            	style: {
	               	 fontSize: '8pt',
						fontFamily: 'Tahoma',
	                	color: 'rgba(255, 255, 255, 1)'
	            		}
	        		},
				}],
				
				
		
				
							labels: {

                items: [{

                    html: "<i>L’indicateur prend en compte la part de répondants qui se déclarent :<br><i> Optimistes ou qui pensent que ce sera mieux demain, ou qui ont confiance<br><i> dans leur entreprise ou qui pensent augmenter le nombre de salariés. <br><br><i>La référence est la vague 1 de février 2015 (base 100).</i>",

                    style: {

                        left: '100px',
                        top: '70px',
                    	fontSize: '8pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
				
				
				 plotOptions: {
            		series: {
			 		lineWidth: 5,
					dataLabels: {
                    	enabled: true,
                    	formatter: function() {
                        	return this.y ;
                    		},
                   		style: {
	                		fontSize: '15pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
                }
			 }
          },


	 		tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                },
				style: {
					color: '#333333',
					fontFamily: 'Tahoma',
					padding: '5px'
					}
            },


       		series: [{
                name: "L’indicateur de l’optimisme",
                marker: {symbol: "circle", radius: 8},
				color: '#E40342',
				//symbol: 'circle",
				data: [100, 109, 108, 130, 110, 104]
            }],
		
				legend: {
					enabled: false,
					itemStyle: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
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



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function initChart2() {
		$('.container-head-two').each(function() {
			$(this).highcharts({
				chart: {
					type: 'line',
					spacing: [15, 60, 8, 60],
					marginTop: 80,
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},

				title: {
					text: 'Grande consultation des entrepreneurs - Vague 6 / Janvier 2016',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: "- Etat d'esprit actuel des chefs d'entreprise -",
 				   style: { "color": "#FFFFFF", "fontSize": "16px" }
				},
				
								
				xAxis: [{
					categories: ['02/2015', '04/2015', '06/2015', '09/2015', '11/2015', '01/2016'],
                    lineColor: 'rgba(255, 255, 255, 0.01)',
                    tickColor: 'rgba(255, 255, 255, 0.01)',
				    labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal", "fontSize": '8pt'},	
					},}],
				
				
				yAxis: [{ 
				min: 5,
				max: 55,
				title: {
						text: ''
					},
	        	gridLineColor: 'rgba(255, 255, 255, 0.2)',
				labels: {
                	formatter: function() {
                    return this.value + '%';
                		},
	            	style: {
	               	 fontSize: '8pt',
						fontFamily: 'Tahoma',
	                	color: 'rgba(255, 255, 255, 1)'
	            		}
	        		},
				}],
				
	 		tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y + '%';
                },
				style: {
					color: '#333333',
					fontFamily: 'Tahoma',
					padding: '5px'
					}
            },
			
			
			labels: {

                items: [{

                    html: "<i>Q : Parmi les qualificatifs suivants, quels sont ceux qui caractérisent le mieux votre état d'esprit actuel ?</i>",

                    style: {

                        left: '250px',
                        top: '0px',
                    	fontSize: '8pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
			
			plotOptions: {
                line: {
			 		lineWidth: 3,
                    dataLabels: {
                        enabled: true,
                        formatter: function() {
                    		return this.y + '%';
                					},
				      style: {
                        fontSize: '7pt',
						fontFamily: 'Tahoma',
						fontWeight: 'normal',
						color: "#FFFFFF"
						 },
                    },
                },
            },
				
				legend: {
					enabled: true,
					itemStyle: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
				},



      		series: [{
                name: "Optimiste",
                color: '#85D6D6',
				data: [30, 30, 34, 45, 28, 31]
            },
			{
                name: "Confiant",
                color: '#6FBC62',
				data: [24, 23, 22, 35, 28, 27]
            },
			{
                name: "Attentiste",
                color: '#90D146',
				data: [26, 28, 19, 31, 25, 27]
            },
			{
                name: "Serein",
                color: '#ACD379',
				data: [19, 17, 18, 30, 21, 19]
            },
			{
                name: "Audacieux",
                color: '#DADADA',
				data: [16, 11, 7, 23, 19, 13]
            },
			{
                name: "Inquiet",
                color: '#F26F4C',
				data: [40, 37, 33, 41, 40, 38]
            },
			{
                name: "Méfiant",
                color: '#F9BD46',
				data: [31, 29, 24, 35, 27, 29]
            },
			{
                name: "Angoissé",
                color: '#EF2950',
				data: [16, 16, 12, 20, 14, 15]
            }],				  
			
			
				credits: {
				      enabled: false
				},
				exporting: {
				      enabled: false
				}
			});
		});
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	function initChart3() {
		$('.container-head-three').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [20, 60, 20, 60],
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				//colors: ['#FF9900'],
				title: {
					text: 'Grande consultation des entrepreneurs - Vague 6 / Janvier 2016',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: '- Evolutions pronostiquées des embauches pour 2015 -',
 				   style: { "color": "#FFFFFF", "fontSize": "16px" }
				},				
				
				
				
				
				xAxis: [{
					categories: ['02/<br>2015', '04/<br>2015', '06/<br>2015', '09/<br>2015', '11/<br>2015', '01/<br>2016'],

					lineColor: 'rgba(255, 255, 255, 0.01)',
	        		tickColor: 'rgba(255, 255, 255, 0.01)',
	        		labels: {
	            		style: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
							color: 'white'
	           					},
							},
				}],
				
				
				
				yAxis: [{ 
				min: 0,
				max: 100,
				title: {
						text: ''
					},
	        	gridLineColor: 'rgba(255, 255, 255, 0.2)',
				labels: {
                	formatter: function() {
                    return this.value + '%';
                		},
	            	style: {
	               	 fontSize: '8pt',
						fontFamily: 'Tahoma',
	                	color: 'rgba(255, 255, 255, 1)'
	            		}
	        		},
				}],
				
				
		
				
			labels: {

                items: [{

                    html: "<i>Q : Au cours des 12 prochains mois, votre entreprise envisage-t-elle de … ?</i>",

                    style: {

                        left: '310px',
                        top: '65px',
                    	fontSize: '9pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
				
				
				 plotOptions: {
                 series: {
					lineWidth: 4,
			 		dataLabels: {
                    	enabled: true,
                    	formatter: function() {
                        	return this.y +'%';
                    		},
                   		style: {
	                		fontSize: '11pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
                }
			 }

		  
		  },


	 		tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y + '%' ;
                },
				style: {
					color: '#333333',
					fontFamily: 'Tahoma',
					padding: '5px'
					}
            },


       		series: [{
                name: "Réduire le nombre de salariés",
                color: '#E50043',
				//symbol: 'circle",
				data: [8, 5, 6, 7, 6, 6]
            },
			{
                name: "Maintenir le nombre de salariés",
                color: '#FF9900',
				data: [87, 85, 86, 84, 86, 89]
            },
			{
                name: "Augmenter le nombre de salariés",
                color: '#90D146',
				data: [5, 10, 8, 9, 8, 5]
            }],
		
				legend: {
					enabled: true,
					itemStyle: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	function initChart4() {
		$('.container-head-four').each(function() {
			$(this).highcharts({
				chart: {
					type: 'pie',
					spacing: [20, 180, 20, 180],
					height: 360,
					marginTop: 80,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				//colors: ['#FF9900'],
				title: {
					text: 'Grande consultation des entrepreneurs - Vague 6 / Janvier 2016',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: "<i>Question d'actualité : Impact des attentats de novembre 2015 sur le chiffre d’affaires</i>",
 				   style: { "color": "#FFFFFF", "fontSize": "14px" }
				},				
				
				
				
				
				xAxis: [{
					categories: [' '],
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal"}
					}
				}],
				
				
				
				yAxis: [{ 
				min: 0,
				//max: 100,
				title: {
						text: ''
					},
	        	gridLineColor: 'rgba(255, 255, 255, 0.2)',
				labels: {
                	formatter: function() {
                    return this.value + '%';
                		},
	            	style: {
	               	 fontSize: '8pt',
						fontFamily: 'Tahoma',
	                	color: 'rgba(255, 255, 255, 1)'
	            		}
	        		},
				}],
		

		labels: {

                items: [{

                    html: "<i>Par rapport à l’an dernier, avez-vous constaté <br>une diminution de votre chiffre d’affaires <br>qui serait imputable aux attentats <br>de novembre 2015 ?</i>",

                    style: {

                        left: '10px',
                        top: '52px',
                    	fontSize: '10pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },},{

                    html: "<i>Une diminution de l'ordre de 10 à 20% <br>pour 34% des chefs d'entreprise <br>(54% pour le secteur Cafés, hôtels, <br>restaurants) </i>",

                    style: {

                        left: '550px',
                        top: '95px',
                    	fontSize: '12pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
			
 			credits: {
				      enabled: false
				},
			exporting: {
				      enabled: false
				},

	
	tooltip: {
                formatter: function() {
                    return this.point.name +': '+ this.y +'%';
				}},
				
	plotOptions: {
            column: {
                //grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
			
	legend: {
					enabled: true,
					itemStyle: {
	                		fontSize: '10pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
				},

	series: [{

                type: 'pie',

                name: '',

                allowPointSelect: true,
                data: [{

                    name: 'OUI',

                    y: 17,

                    color: '#E6332A'

                    },{

                    name: 'NON',

                    y: 83,

                    color: '#78C479'

                    }],

                center: [400, 100],

                size: 200,

                showInLegend: true,

                dataLabels: {

                    enabled: false,
					distance: 10,

                }}]


		
			});
		});
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	function initChart5() {
		$('.container-head-five').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [15, 60, 15, 60],
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				colors: ['#FF9900'],
				title: {
					text: 'Evolution des niveaux de confiance des dirigeants d’entreprises',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: "L'observatoire Banque Palatine/Challenges/Itélé des PME-ETI",
 				   style: { "color": "#FFFFFF" }
				},				
				xAxis: [{
					categories: ['01/<br>2012','02','03','04','05','06','09','10','11','12','01/<br>2013','02','03','04','05','06','09','10','11', '12', '01/<br>2014','02', '03','04','05', '06', '09', '10', '11', '12','01/<br>2015', '02', '03', '04', '05', '06', '09', '10', '11', '12', '01/<br>2016'],

					lineColor: 'rgba(255, 255, 255, 0.01)',
	        		tickColor: 'rgba(255, 255, 255, 0.01)',
	        		labels: {
	            		style: {
	                		fontSize: '7pt',
							fontFamily: 'Tahoma',
							color: 'white'
	           					},
							},
				}],

	    		yAxis: {
	       			min: 0,
					max: 80,
	        		title: {
	            		text: ''
	        				},
	        	gridLineColor: 'rgba(255, 255, 255, 0.4)',
	        	labels: {
                formatter: function() {
                    return this.value +' %';
                		},
	            style: {
	                fontSize: '8pt',
					fontFamily: 'Tahoma',
	                color: 'white'
	            		}
	        		}
	    		},

				 plotOptions: {
            		series: {
                
			 		dataLabels: {
                    	enabled: true,
                    	formatter: function() {
                        	return this.y +'%';
                    		},
                   		style: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
                }
			 }
          },


	 		tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y + '%' ;
                },
				style: {
					color: '#333333',
					fontFamily: 'Tahoma',
					padding: '5px'
					}
            },
			
			
       		series: [{
                name: "Confiance pour votre entreprise",
                color: '#E5769A',
				//symbol: 'circle",
				data: [70, 77, 77, 80, 78, 75, 72, 61, 59, 62, 65, 62, 65, 67, 69, 61, 69, 67, 70, 68, 75, 72, 71, 73, 74, 69, 67, 68, 67, 60, 67, 70, 73, 73, 74, 73, 80, 81, 82, 79, 88]
            },
			{
                name: "Confiance pour l'économie mondiale",
                color: '#80DDE0',
				data: [35, 32, 39, 37, 34, 30, 30, 21, 28, 31, 40, 36, 37, 34, 34, 44, 52, 51, 49, 49, 57, 61, 55, 62, 60, 55, 45, 49, 45, 46, 56, 51, 57, 61, 66, 62, 42, 47, 55, 52, 48]
            },
			{
                name: "Confiance pour l'économie française",
                color: '#FF9900',
				data: [25, 25, 30, 38, 28, 30, 23, 17, 16, 18, 24, 21, 21, 11, 14, 12, 27, 25, 21, 20, 24, 20, 24, 25, 22, 17, 13, 14, 13, 12, 27, 28, 33, 36, 39, 39, 41, 26, 44, 39, 43]
            }],
			
				legend: {
					enabled: true,
					itemStyle: {
	                		fontSize: '8pt',
							fontFamily: 'Tahoma',
	               			color: 'white'
	            	}
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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
				initChart5();
			}
		});
	});
}(jQuery));