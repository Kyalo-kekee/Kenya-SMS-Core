'use strict';

$(document).ready(function() {

	// DB Chart 1

	if($('#db-chart1').length > 0) {	
		var options = {
			chart: {
				width: 100,
				height: 80,
				type: "line",
				toolbar: {
					show: false
				},
				columnWidth: 2
			},
			grid: {
				show: false
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: "smooth"
			},
			series: [{
				name: "Income",
				color: '#37517E',
				data: [30, 25, 36, 30, 45, 35, 64, 30, 25]
			}],
			xaxis: {
				categories: ['18 Nov', '19 Nov'],
				labels: {
					show: false
				}
			},
			yaxis: {
				labels: {
					show: false
				}
			},
			axisBorder: {
				show: false,
				offsetX: 0,
				offsetY: 0
			},
		}
		var chart = new ApexCharts(
			document.querySelector("#db-chart1"),
			options
		);
		chart.render();
	}

	// DB Chart 2

	if($('#db-chart2').length > 0) {	
		var options = {
			chart: {
				width: 100,
				height: 80,
				type: "line",
				toolbar: {
					show: false
				},
				columnWidth: 2
			},
			grid: {
				show: false
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: "smooth"
			},
			series: [{
				name: "Income",
				color: '#37517E',
				data: [30, 25, 36, 30, 45, 35, 64, 30, 25]
			}],
			xaxis: {
				categories: ['18 Nov', '19 Nov'],
				labels: {
					show: false
				}
			},
			yaxis: {
				labels: {
					show: false
				}
			},
			axisBorder: {
				show: false,
				offsetX: 0,
				offsetY: 0
			},
		}
		var chart = new ApexCharts(
			document.querySelector("#db-chart2"),
			options
		);
		chart.render();
	}

	// DB Chart 3

	if($('#db-chart3').length > 0) {	
		var options = {
			chart: {
				width: 100,
				height: 80,
				type: "line",
				toolbar: {
					show: false
				},
				columnWidth: 2
			},
			grid: {
				show: false
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: "smooth"
			},
			series: [{
				name: "Income",
				color: '#37517E',
				data: [30, 25, 36, 30, 45, 35, 64, 30, 25]
			}],
			xaxis: {
				categories: ['18 Nov', '19 Nov'],
				labels: {
					show: false
				}
			},
			yaxis: {
				labels: {
					show: false
				}
			},
			axisBorder: {
				show: false,
				offsetX: 0,
				offsetY: 0
			},
		}
		var chart = new ApexCharts(
			document.querySelector("#db-chart3"),
			options
		);
		chart.render();
	}

	// Sell Order Chart

	if($('#sellorder-chart').length > 0) {	
		var options = {
			series: [{
			name: 'Net Profit',
			data: [44, 55, 57, 56, 61, 58]
		  },
		  {
			name: 'Free Cash Flow',
			data: [35, 41, 36, 26, 45, 48]
		  }],
			chart: {
			type: 'bar',
			height: 240,
			toolbar: {
				show: false
			}
		  },
		  grid: {
			show: false
		  },
		  colors: ['#37517E', '#FD7279'],
		  plotOptions: {
			bar: {
			  horizontal: false,
			  columnWidth: '55%',
			  endingShape: 'rounded'
			},
		  },
		  dataLabels: {
			enabled: false
		  },
		  stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		  },
		  xaxis: {
			categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			labels: {
				style: {
					colors: '#979797'
				}
			}
		  },
		  yaxis: {
			title: {
			  show: false
			},
			labels: {
				style: {
					colors: '#979797'
				}
			}
		  },
		  fill: {
			opacity: 1
		  },
		  tooltip: {
			y: {
			  formatter: function (val) {
				return "$ " + val + " thousands"
			  }
			}
		  }
		  };
  
		  var chart = new ApexCharts(document.querySelector("#sellorder-chart"), options);
		  chart.render();
	}
	
	// Earnings Chart

	if($('#earnings-chart').length > 0) {	
		var options = {
			series: [14, 86],
			chart: {
			width: '100%',
			height: 250,
			type: 'pie',
		  },
		  labels: ["Spend", "Earnings"],
		  fill: {
			colors: ["#FD7279", "#37517E"],
		  },		  
		  theme: {
			monochrome: {
			  enabled: true
			}
		  },
		  plotOptions: {
			pie: {
			  dataLabels: {
				offset: -5
			  }
			}
		  },
		  dataLabels: {
			formatter(val, opts) {
			  const name = opts.w.globals.labels[opts.seriesIndex]
			  return [name, val.toFixed(1) + '%']
			}
		  },
		  legend: {
			show: false
		  }
		  };
  
		  var chart = new ApexCharts(document.querySelector("#earnings-chart"), options);
		  chart.render();
	}

	// Market Chart

	if($('#market-chart').length > 0) {
		var options = {
			series: [
			{
			  data: [5, 18, 29, 33, 29, 32]
			}
		  ],
			chart: {
			height: 450,
			type: 'line',
			
			toolbar: {
			  show: false
			}
		  },
		  colors: ['#37517E'],
		  dataLabels: {
			enabled: false,
		  },
		  stroke: {
			curve: 'smooth'
		  },
		//   markers: {
		// 	size: 1
		//   },
		  markers: {
			size: 3,
			colors: ["#FD7279"],
			strokeColors: "#FD7279",
			strokeWidth: 1,
			hover: {
			  size: 4,
			}
			},
		  xaxis: {
			categories: ['31/01', '01/02', '02/02', '03/02', '04/02', '05/02', '06/02'],
			labels: {
				style: {
					colors: '#979797'
				}
			}
		  },
		  grid: {
			xaxis: {
				lines: {
				  show: true
				}
			},
			yaxis: {
				lines: {
				  show: true
				}
			}
			
		  },
		  yaxis: {
			labels: {
				style: {
					colors: '#979797'
				}
			},
			min: 5,
			max: 40
		  },
		  legend: {
			position: 'top',
			horizontalAlign: 'right',
			floating: true
		  }
		  };
  
		  var chart = new ApexCharts(document.querySelector("#market-chart"), options);
		  chart.render();
	}
  
});