(function($) {

	function initChart1() {
		$('.container-head-one').each(function() {
			$(this).highcharts({
				chart: {
					type: 'column',
					spacing: [15, 100, 5, 100],
					marginTop: 30,
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},

				title: {
					text: 'Grande consultation des entrepreneurs - Vague 1 / Février 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: "- Etat d'esprit actuel -",
 				   style: { "color": "#FFFFFF", "fontSize": "16px" }
				},
				
								
				xAxis: [{
					categories: ['Inquiet', 'Méfiant', 'Optimiste', 'Attentiste', 'Confiant', 'Serein', 'Audacieux', 'Angoissé'],
					labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal", "fontSize": '11pt', 'width': '230px',},	
					},
					lineColor: 'rgba(255, 255, 255, 0.01)',
                    tickColor: 'rgba(255, 255, 255, 0.01)',
				}],
				
				
				yAxis: {
                    min: 0,
				    max: 60,
				    labels: {
					  enabled: false},
					gridLineColor: 'rgba(255, 255, 255, 0.01)',
					//opposite: true,
					title: {
                     enabled: false,
                     },
				},
				
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = '' +
                       this.series.name + '/ ' + this.point.name + ': ' + this.y + '%';
                    } else {
                        s = '' + '<b>'+ 
                       this.series.name + '/ ' + this.x + '</b>'+' : ' + this.y + '%';
                    }
                    return s;
                },
			},
				
			
			labels: {

                items: [{

                    html: "<i>Q : Parmi les qualificatifs suivants, quels sont ceux <br><i>qui caractérisent le mieux votre état d'esprit actuel ?<br><i> (Plusieurs réponses possibles)</i>",

                    style: {

                        left: '650px',
                        top: '55px',
                    	fontSize: '9pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
				
			plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        formatter: function() {
                  return this.y + "%";
                },
				      style: {
                        fontSize: '11pt',
						fontFamily: 'Tahoma',
						fontWeight: 'normal',
						color: "#FFFFFF"
						 },
                    },
                },
            },
				
				       legend: {
            layout: 'vertical',
            align: 'right',
			//reversed: true,
            verticalAlign: 'top',
            x: -360,
            y: 70,
            floating: true,
            borderWidth: 0,
            backgroundColor: 'rgba(255, 255, 255, 0.5)',
            shadow: false
        },
					  
				series: [{
					name: 'Ensemble des entrepreneurs',
					//yAxis: 1,
					color: '#FF9900',
					data: [40, 31, 30, 26, 24, 19, 16, 16]

				},
				{
					name: 'Ensemble des Français',
					//yAxis: 2,
					color: '#E50043',
					data: [40, 38, 20, 19, 14, 15, 6, 15]

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
	function initChart2() {
		$('.container-head-two').each(function() {
			$(this).highcharts({
				chart: {
					type: 'column',
					spacing: [15, 60, 5, 60],
					marginTop: 30,
					height: 360,
					backgroundColor: 'rgba(0,67,120,1)'
				},

				title: {
					text: 'Grande consultation des entrepreneurs - Vague 1 / Février 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: "- Les pressions s’exerçant sur les entrepreneurs -",
 				   style: { "color": "#FFFFFF", "fontSize": "16px" }
				},
				
								
				xAxis: [{
					categories: ["La complexité et l'instabilité administrative et fiscale ","Les prix de ventes","Les délais de paiement de vos clients","Votre carnet de commande","La qualité de vos prestations","Les délais de livraison","Les ressources humaines ","Autres types de pressions  ","Aucune"],
                    lineColor: 'rgba(255, 255, 255, 0.01)',
                    tickColor: 'rgba(255, 255, 255, 0.01)',
				    labels: {
					 	style: {"color":"#FFFFFF","fontWeight":"normal", "fontSize": '10pt'},	
					},}],
				
				
				yAxis: {
                    min: 0,
				    max: 60,
				    labels: {
					  enabled: false},
					gridLineColor: 'rgba(255, 255, 255, 0.01)',
					//opposite: true,
					title: {
                     enabled: false,
                     },
				},
				
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = '' +
                        this.point.name + ': ' + this.y + '%';
                    } else {
                        s = '' + '<b>'+ 
                        this.x + '</b>'+' : ' + this.y + '%';
                    }
                    return s;
                },
			},
			
			
			labels: {

                items: [{

                    html: "<i>Q : Parmi les critères suivants quels sont ceux sur lesquels vous subissez des fortes pressions ?<br><i> (Plusieurs réponses possibles)</i>",

                    style: {

                        left: '250px',
                        top: '55px',
                    	fontSize: '9pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
			
			plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        formatter: function() {
                  return this.y + "%";
                },
				      style: {
                        fontSize: '11pt',
						fontFamily: 'Tahoma',
						fontWeight: 'normal',
						color: "#FFFFFF"
						 },
                    },
                },
            },
				
            legend: {
         enabled: false
         },



           	 series: [{
         data: [{y:55,color:'#E50043'}, {y:30,color:'#E50043'}, {y:23,color:'#E50043'}, {y:18,color:'#333333'}, {y:11,color:'#333333'}, {y:10,color:'#333333'}, {y:9,color:'#333333'}, {y:3,color:'#D6D6D6'}, {y:7,color:'#FF9900'}],
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
					text: 'Grande consultation des entrepreneurs - Vague 1 / Février 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: '- Priorité actuelle pour l’entreprise -',
 				   style: { "color": "#FFFFFF", "fontSize": "16px" }
				},				
				
				
				
				
				xAxis: [{
					categories: [],
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
				
				
			
				
		labels: {

                items: [{

                   //useHTML: true,
				  // html: "",


                    style: {

                        left: '250px',
                        top: '55px',
                    	fontSize: '9pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
				
							labels: {

                items: [{

                    html: "<i>Q : Pour votre entreprise actuellement la priorité c’est avant tout… ?</i>",

                    style: {

                        left: '310px',
                        top: '20px',
                    	fontSize: '9pt',
                    	color: '#FFFFFF',
						fontFamily: 'Tahoma',


                    },}],
			},
				
				
				
 	  tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>'+': '+ this.y +'%';
				}},
				
				
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                    return this.point.name + ' : ' +'<b>'+ Highcharts.numberFormat(Math.abs(this.point.y), 0) + '%' + '<b>';
                      },
                    style: {
                        fontSize: '14pt',
                        color: 'white'                        
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '100%'],
				size: 300,
            }
        },
        series: [{
            type: 'pie',
            //name: 'Browser share',
            innerSize: '50%',
            data: [{

                    name: "Trouver des leviers de croissance<br>pour votre activité",

                    y: 52,

                    color: '#89CED3'

                    },{

                    name: "Trouver des leviers de rentabilité<br>pour votre activité",

                    y: 48,

                    color: '#FF9900'

                    }]
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	function initChart4() {
		$('.container-head-four').each(function() {
			$(this).highcharts({
				chart: {
					spacing: [20, 180, 20, 180],
					height: 360,
					marginTop: 80,
					backgroundColor: 'rgba(0,67,120,1)'
				},
				//colors: ['#FF9900'],
				title: {
					text: 'Grande consultation des entrepreneurs - Vague 1 / Février 2015',
					style: { "color": "#FFFFFF", "fontSize": "18px" }
				},
				subtitle: {
 				   text: '<i>Q : Innover c’est pour votre entreprise avant tout… ?</i>',
 				   style: { "color": "#FFFFFF", "fontSize": "14px" }
				},				
				
				
				
				
				xAxis: [{
					categories: [],
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
                    return this.point.name +': '+ this.point.value +'%';
				}},
				
				
     plotOptions: {
            treemap: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                    return this.point.name +': '+ this.point.value +'%';
                      },
                    style: {
                        fontSize: '12pt',
                        color: 'white'                        
                    }
                },

            }
        },


        series: [{
            type: "treemap",
            layoutAlgorithm: 'squarified',
            data: [{
                name: "Un investissement<br>",
                value: 36,
                color: '#89CED3'
            }, {
                name: "Une prise<br>de risque",
                value: 24,
                color: '#FF9900'
            }, {
                name: "Une condition<br>de survie<br>pour l’entreprise",
                value: 24,
                color: '#D499D6'
            }, {
                name: "Un mirage<br>plus qu’autre<br>chose",
                value: 14,
                color: '#E50043'
            }, {
                name: "NSP<br>",
                value: 2,
                color: '#262626'
            }]
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
 				   text: 'VOIR LES RESULTATS DETAILLES',
 				   style: { "color": "#FFFFFF" }
				},				
				xAxis: [{
					categories: ['01/<br>2012','02','03','04','05','06','09','10','11','12','01/<br>2013','02','03','04','05','06','09','10','11', '12', '01/<br>2014','02', '03','04','05', '06', '09', '10', '11', '12','01/<br>2015', '02', '03', '04'],

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
				data: [70, 77, 77, 80, 78, 75, 72, 61, 59, 62, 65, 62, 65, 67, 69, 61, 69, 67, 70, 68, 75, 72, 71, 73, 74, 69, 67, 68, 67, 60, 67, 70, 73, 73]
            },
			{
                name: "Confiance pour l'économie mondiale",
                color: '#80DDE0',
				data: [35, 32, 39, 37, 34, 30, 30, 21, 28, 31, 40, 36, 37, 34, 34, 44, 52, 51, 49, 49, 57, 61, 55, 62, 60, 55, 45, 49, 45, 46, 56, 51, 57, 61]
            },
			{
                name: "Confiance pour l'économie française",
                color: '#FF9900',
				data: [25, 25, 30, 38, 28, 30, 23, 17, 16, 18, 24, 21, 21, 11, 14, 12, 27, 25, 21, 20, 24, 20, 24, 25, 22, 17, 13, 14, 13, 12, 27, 28, 33, 36]
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