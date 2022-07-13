$(document).ready(function () {
 //Morris chart
 // Bar Chart

	var barChartData = {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: 'rgb(253 114 121 / 50%)',
			borderColor: '#FD7279',
			borderWidth: 1,
			data: [35, 59, 80, 81, 56, 55, 40]
		}, {
			label: 'Dataset 2',
			backgroundColor: 'rgb(55 81 126 / 50%)',
			borderColor: '#37517E',
			borderWidth: 1,
			data: [28, 48, 40, 19, 86, 27, 90]
		}]
	};

	var ctx = document.getElementById('bargraph').getContext('2d');
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: barChartData,
		options: {
			responsive: true,
			legend: {
				display: false,
			}
		}
	});

	// Line Chart

	var lineChartData = {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [{
			label: "My First dataset",
			backgroundColor: "rgb(55 81 126 / 50%)",
			data: [100, 70, 20, 100, 120, 50, 70, 50, 50, 100, 50, 90]
		}, {
			label: "My Second dataset",
			backgroundColor: "rgb(253 114 121 / 50%)",
			fill: true,
			data: [28, 48, 40, 19, 86, 27, 20, 90, 50, 20, 90, 20]
		}]
	};

	var linectx = document.getElementById('linegraph').getContext('2d');
	window.myLine = new Chart(linectx, {
		type: 'line',
		data: lineChartData,
		options: {
			responsive: true,
			legend: {
				display: false,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			}
		}
	});
	//Morris chart

	$(document).ready(function () {

		lineChart();
		areaChart();
		donutChart();

		$(window).resize(function () {

			window.lineChart.redraw();
			window.areaChart.redraw();
			window.donutChart.redraw();
		});
	});


	function lineChart() {
		window.lineChart = Morris.Line({
			element: 'line-chart',
			data: [{
					y: '2006',
					a: 100,
					b: 90
				},
				{
					y: '2007',
					a: 75,
					b: 65
				},
				{
					y: '2008',
					a: 50,
					b: 40
				},
				{
					y: '2009',
					a: 75,
					b: 65
				},
				{
					y: '2010',
					a: 50,
					b: 40
				},
				{
					y: '2011',
					a: 75,
					b: 65
				},
				{
					y: '2012',
					a: 100,
					b: 90
				}
			],
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['Series A', 'Series B'],
			lineColors: ['#FD7279', '#37517E'],
			backgroundColors: ['#FD7279', '#37517E'],
			lineWidth: '3px',
			resize: true,
			redraw: true
		});
	}

	function areaChart() {
		window.areaChart = Morris.Area({
			element: 'area-chart',
			data: [{
					y: '2006',
					a: 100,
					b: 90
				},
				{
					y: '2007',
					a: 75,
					b: 65
				},
				{
					y: '2008',
					a: 50,
					b: 40
				},
				{
					y: '2009',
					a: 75,
					b: 65
				},
				{
					y: '2010',
					a: 50,
					b: 40
				},
				{
					y: '2011',
					a: 75,
					b: 65
				},
				{
					y: '2012',
					a: 100,
					b: 90
				}
			],
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['Series A', 'Series B'],
			lineColors: ['#FD7279', '#37517E'],
			lineWidth: '3px',
			resize: true,
			redraw: true
		});
	}

	function donutChart() {
		window.donutChart = Morris.Donut({
			element: 'donut-chart',
			data: [{
					label: "Download Sales",
					value: 50
				},
				{
					label: "In-Store Sales",
					value: 25
				},
				{
					label: "Mail-Order Sales",
					value: 5
				},
				{
					label: "Uploaded Sales",
					value: 10
				},
				{
					label: "Video Sales",
					value: 10
				}
			],
			resize: true,
			redraw: true
		});
	}

});
//am chart


//-----amchart
var chartData = generateChartData();

function generateChartData() {
  var chartData = [];
  var firstDate = new Date( 2021, 0, 1 );
  firstDate.setDate( firstDate.getDate() - 1000 );
  firstDate.setHours( 0, 0, 0, 0 );

  var a = 2000;
 
  for ( var i = 0; i < 1000; i++ ) {
    var newDate = new Date( firstDate );
    newDate.setHours( 0, i, 0, 0 );

    a += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
    var b = Math.round( Math.random() * 100000000 );

    chartData.push( {
      "date": newDate,
      "value": a,
      "volume": b
    } );
  }
  return chartData;
}

var chart = AmCharts.makeChart( "chartdiv2", {
  "type": "stock",
  "theme": "light",
  "categoryAxesSettings": {
    "minPeriod": "mm"
  },

  "dataSets": [ {
    "color": "#fbae1c",
    "fieldMappings": [ {
      "fromField": "value",
      "toField": "value"
    }, {
      "fromField": "volume",
      "toField": "volume"
    } ],

    "dataProvider": chartData,
    "categoryField": "date"
  } ],

  "panels": [ {
    "showCategoryAxis": false,
    "title": "Value",
    "percentHeight": 70,

    "stockGraphs": [ {
      "id": "g1",
      "valueField": "value",
      "type": "smoothedLine",
      "lineThickness": 2,
      "bullet": "round"
    } ],


    "stockLegend": {
      "valueTextRegular": " ",
      "markerType": "none"
    }
  }, {
    "title": "Volume",
    "percentHeight": 30,
    "stockGraphs": [ {
      "valueField": "volume",
      "type": "column",
      "cornerRadiusTop": 2,
      "fillAlphas": 1
    } ],

    "stockLegend": {
      "valueTextRegular": " ",
      "markerType": "none"
    }
  } ],

  "chartScrollbarSettings": {
    "graph": "g1",
    "usePeriod": "10mm",
    "position": "top"
  },

  "chartCursorSettings": {
    "valueBalloonsEnabled": true
  },

  "periodSelector": {
    "position": "top",
    "dateFormat": "YYYY-MM-DD JJ:NN",
    "inputFieldWidth": 150,
    "periods": [ {
      "period": "hh",
      "count": 1,
      "label": "1 hour"
    }, {
      "period": "hh",
      "count": 2,
      "label": "2 hours"
    }, {
      "period": "hh",
      "count": 5,
      "selected": true,
      "label": "5 hour"
    }, {
      "period": "hh",
      "count": 12,
      "label": "12 hours"
    }, {
      "period": "MAX",
      "label": "MAX"
    } ]
  },

  "panelsSettings": {
    "usePrefixes": true
  },

  "export": {
    "enabled": true,
    "position": "bottom-right"
  }
} );

//----------------4---------
var chart = AmCharts.makeChart( "chartdiv4", {
  "type": "serial",
  "theme": "light",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [ {
    "id": "v1",
    "axisAlpha": 0,
    "position": "left",
    "ignoreAxisWidth": true
  } ],
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "graphs": [ {
    "id": "g1",
    "balloon": {
      "drop": true,
      "adjustBorderColor": false,
      "color": "#ffffff",
      "type": "smoothedLine"
    },
    "fillAlphas": 0.2,
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "title": "red line",
    "useLineColorForBulletBorder": true,
    "valueField": "value",
    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
  } ],
  "chartCursor": {
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "zoomable": false,
    "valueZoomable": true,
    "valueLineAlpha": 0.5
  },
  "valueScrollbar": {
    "autoGridCount": true,
    "color": "#000000",
    "scrollbarHeight": 50
  },
  "categoryField": "date",
  "categoryAxis": {
    "parseDates": true,
    "dashLength": 1,
    "minorGridEnabled": true
  },
  "export": {
    "enabled": true
  },
  "dataProvider": [ {
    "date": "2012-07-27",
    "value": 13
  }, {
    "date": "2012-07-28",
    "value": 11
  }, {
    "date": "2012-07-29",
    "value": 15
  }, {
    "date": "2012-07-30",
    "value": 16
  }, {
    "date": "2012-07-31",
    "value": 18
  }, {
    "date": "2012-08-01",
    "value": 13
  }, {
    "date": "2012-08-02",
    "value": 22
  }, {
    "date": "2012-08-03",
    "value": 23
  }, {
    "date": "2012-08-04",
    "value": 20
  }, {
    "date": "2012-08-05",
    "value": 17
  }, {
    "date": "2012-08-06",
    "value": 16
  }, {
    "date": "2012-08-07",
    "value": 18
  }, {
    "date": "2012-08-08",
    "value": 21
  }, {
    "date": "2012-08-09",
    "value": 26
  }, {
    "date": "2012-08-10",
    "value": 24
  }, {
    "date": "2012-08-11",
    "value": 29
  }, {
    "date": "2012-08-12",
    "value": 32
  }, {
    "date": "2012-08-13",
    "value": 18
  }, {
    "date": "2012-08-14",
    "value": 24
  }, {
    "date": "2012-08-15",
    "value": 22
  }, {
    "date": "2012-08-16",
    "value": 18
  }, {
    "date": "2012-08-17",
    "value": 19
  }, {
    "date": "2012-08-18",
    "value": 14
  }, {
    "date": "2012-08-19",
    "value": 15
  }, {
    "date": "2012-08-20",
    "value": 12
  }, {
    "date": "2012-08-21",
    "value": 8
  }, {
    "date": "2012-08-22",
    "value": 9
  }, {
    "date": "2012-08-23",
    "value": 8
  }, {
    "date": "2012-08-24",
    "value": 7
  }, {
    "date": "2012-08-25",
    "value": 5
  }, {
    "date": "2012-08-26",
    "value": 11
  }, {
    "date": "2012-08-27",
    "value": 13
  }, {
    "date": "2012-08-28",
    "value": 18
  }, {
    "date": "2012-08-29",
    "value": 20
  }, {
    "date": "2012-08-30",
    "value": 29
  }, {
    "date": "2012-08-31",
    "value": 33
  }, {
    "date": "2012-09-01",
    "value": 42
  }, {
    "date": "2012-09-02",
    "value": 35
  }, {
    "date": "2012-09-03",
    "value": 31
  }, {
    "date": "2012-09-04",
    "value": 47
  }, {
    "date": "2012-09-05",
    "value": 52
  }, {
    "date": "2012-09-06",
    "value": 46
  }, {
    "date": "2012-09-07",
    "value": 41
  }, {
    "date": "2012-09-08",
    "value": 43
  }, {
    "date": "2012-09-09",
    "value": 40
  }, {
    "date": "2012-09-10",
    "value": 39
  }, {
    "date": "2012-09-11",
    "value": 34
  }, {
    "date": "2012-09-12",
    "value": 29
  }, {
    "date": "2012-09-13",
    "value": 34
  }, {
    "date": "2012-09-14",
    "value": 37
  }, {
    "date": "2012-09-15",
    "value": 42
  }, {
    "date": "2012-09-16",
    "value": 49
  }, {
    "date": "2012-09-17",
    "value": 46
  }, {
    "date": "2012-09-18",
    "value": 47
  }, {
    "date": "2012-09-19",
    "value": 55
  }, {
    "date": "2012-09-20",
    "value": 59
  }, {
    "date": "2012-09-21",
    "value": 58
  }, {
    "date": "2012-09-22",
    "value": 57
  }, {
    "date": "2012-09-23",
    "value": 61
  }, {
    "date": "2012-09-24",
    "value": 59
  }, {
    "date": "2012-09-25",
    "value": 67
  }, {
    "date": "2012-09-26",
    "value": 65
  }, {
    "date": "2012-09-27",
    "value": 61
  }, {
    "date": "2012-09-28",
    "value": 66
  }, {
    "date": "2012-09-29",
    "value": 69
  }, {
    "date": "2012-09-30",
    "value": 71
  }, {
    "date": "2012-10-01",
    "value": 67
  }, {
    "date": "2012-10-02",
    "value": 63
  }, {
    "date": "2012-10-03",
    "value": 46
  }, {
    "date": "2012-10-04",
    "value": 32
  }, {
    "date": "2012-10-05",
    "value": 21
  }, {
    "date": "2012-10-06",
    "value": 18
  }, {
    "date": "2012-10-07",
    "value": 21
  }, {
    "date": "2012-10-08",
    "value": 28
  }, {
    "date": "2012-10-09",
    "value": 27
  }, {
    "date": "2012-10-10",
    "value": 36
  }, {
    "date": "2012-10-11",
    "value": 33
  }, {
    "date": "2012-10-12",
    "value": 31
  }, {
    "date": "2012-10-13",
    "value": 30
  }, {
    "date": "2012-10-14",
    "value": 34
  }, {
    "date": "2012-10-15",
    "value": 38
  }, {
    "date": "2012-10-16",
    "value": 37
  }, {
    "date": "2012-10-17",
    "value": 44
  }, {
    "date": "2012-10-18",
    "value": 49
  }, {
    "date": "2012-10-19",
    "value": 53
  }, {
    "date": "2012-10-20",
    "value": 57
  }, {
    "date": "2012-10-21",
    "value": 60
  }, {
    "date": "2012-10-22",
    "value": 61
  }, {
    "date": "2012-10-23",
    "value": 69
  }, {
    "date": "2012-10-24",
    "value": 67
  }, {
    "date": "2012-10-25",
    "value": 72
  }, {
    "date": "2012-10-26",
    "value": 77
  }, {
    "date": "2012-10-27",
    "value": 75
  }, {
    "date": "2012-10-28",
    "value": 70
  }, {
    "date": "2012-10-29",
    "value": 72
  }, {
    "date": "2012-10-30",
    "value": 70
  }, {
    "date": "2012-10-31",
    "value": 72
  }, {
    "date": "2012-11-01",
    "value": 73
  }, {
    "date": "2012-11-02",
    "value": 67
  }, {
    "date": "2012-11-03",
    "value": 68
  }, {
    "date": "2012-11-04",
    "value": 65
  }, {
    "date": "2012-11-05",
    "value": 71
  }, {
    "date": "2012-11-06",
    "value": 75
  }, {
    "date": "2012-11-07",
    "value": 74
  }, {
    "date": "2012-11-08",
    "value": 71
  }, {
    "date": "2012-11-09",
    "value": 76
  }, {
    "date": "2012-11-10",
    "value": 77
  }, {
    "date": "2012-11-11",
    "value": 81
  }, {
    "date": "2012-11-12",
    "value": 83
  }, {
    "date": "2012-11-13",
    "value": 80
  }, {
    "date": "2012-11-14",
    "value": 81
  }, {
    "date": "2012-11-15",
    "value": 87
  }, {
    "date": "2012-11-16",
    "value": 82
  }, {
    "date": "2012-11-17",
    "value": 86
  }, {
    "date": "2012-11-18",
    "value": 80
  }, {
    "date": "2012-11-19",
    "value": 87
  }, {
    "date": "2012-11-20",
    "value": 83
  }, {
    "date": "2012-11-21",
    "value": 85
  }, {
    "date": "2012-11-22",
    "value": 84
  }, {
    "date": "2012-11-23",
    "value": 82
  }, {
    "date": "2012-11-24",
    "value": 73
  }, {
    "date": "2012-11-25",
    "value": 71
  }, {
    "date": "2012-11-26",
    "value": 75
  }, {
    "date": "2012-11-27",
    "value": 79
  }, {
    "date": "2012-11-28",
    "value": 70
  }, {
    "date": "2012-11-29",
    "value": 73
  }, {
    "date": "2012-11-30",
    "value": 61
  }, {
    "date": "2012-12-01",
    "value": 62
  }, {
    "date": "2012-12-02",
    "value": 66
  }, {
    "date": "2012-12-03",
    "value": 65
  }, {
    "date": "2012-12-04",
    "value": 73
  }, {
    "date": "2012-12-05",
    "value": 79
  }, {
    "date": "2012-12-06",
    "value": 78
  }, {
    "date": "2012-12-07",
    "value": 78
  }, {
    "date": "2012-12-08",
    "value": 78
  }, {
    "date": "2012-12-09",
    "value": 74
  }, {
    "date": "2012-12-10",
    "value": 73
  }, {
    "date": "2012-12-11",
    "value": 75
  }, {
    "date": "2012-12-12",
    "value": 70
  }, {
    "date": "2012-12-13",
    "value": 77
  }, {
    "date": "2012-12-14",
    "value": 67
  }, {
    "date": "2012-12-15",
    "value": 62
  }, {
    "date": "2012-12-16",
    "value": 64
  }, {
    "date": "2012-12-17",
    "value": 61
  }, {
    "date": "2012-12-18",
    "value": 59
  }, {
    "date": "2012-12-19",
    "value": 53
  }, {
    "date": "2012-12-20",
    "value": 54
  }, {
    "date": "2012-12-21",
    "value": 56
  }, {
    "date": "2012-12-22",
    "value": 59
  }, {
    "date": "2012-12-23",
    "value": 58
  }, {
    "date": "2012-12-24",
    "value": 55
  }, {
    "date": "2012-12-25",
    "value": 52
  }, {
    "date": "2012-12-26",
    "value": 54
  }, {
    "date": "2012-12-27",
    "value": 50
  }, {
    "date": "2012-12-28",
    "value": 50
  }, {
    "date": "2012-12-29",
    "value": 51
  }, {
    "date": "2012-12-30",
    "value": 52
  }, {
    "date": "2012-12-31",
    "value": 58
  }, {
    "date": "2013-01-01",
    "value": 60
  }, {
    "date": "2013-01-02",
    "value": 67
  }, {
    "date": "2013-01-03",
    "value": 64
  }, {
    "date": "2013-01-04",
    "value": 66
  }, {
    "date": "2013-01-05",
    "value": 60
  }, {
    "date": "2013-01-06",
    "value": 63
  }, {
    "date": "2013-01-07",
    "value": 61
  }, {
    "date": "2013-01-08",
    "value": 60
  }, {
    "date": "2013-01-09",
    "value": 65
  }, {
    "date": "2013-01-10",
    "value": 75
  }, {
    "date": "2013-01-11",
    "value": 77
  }, {
    "date": "2013-01-12",
    "value": 78
  }, {
    "date": "2013-01-13",
    "value": 70
  }, {
    "date": "2013-01-14",
    "value": 70
  }, {
    "date": "2013-01-15",
    "value": 73
  }, {
    "date": "2013-01-16",
    "value": 71
  }, {
    "date": "2013-01-17",
    "value": 74
  }, {
    "date": "2013-01-18",
    "value": 78
  }, {
    "date": "2013-01-19",
    "value": 85
  }, {
    "date": "2013-01-20",
    "value": 82
  }, {
    "date": "2013-01-21",
    "value": 83
  }, {
    "date": "2013-01-22",
    "value": 88
  }, {
    "date": "2013-01-23",
    "value": 85
  }, {
    "date": "2013-01-24",
    "value": 85
  }, {
    "date": "2013-01-25",
    "value": 80
  }, {
    "date": "2013-01-26",
    "value": 87
  }, {
    "date": "2013-01-27",
    "value": 84
  }, {
    "date": "2013-01-28",
    "value": 83
  }, {
    "date": "2013-01-29",
    "value": 84
  }, {
    "date": "2013-01-30",
    "value": 81
  } ]
} );


//---------------
var chart = AmCharts.makeChart( "chartdiv3", {
  "theme": "light",
  "type": "gauge",
  "axes": [ {
    "axisColor": "#67b7dc",
    "axisThickness": 3,
    "endValue": 240,
    "gridInside": false,
    "inside": false,
    "radius": "100%",
    "valueInterval": 20,
    "tickColor": "#67b7dc"
  }, {
    "axisColor": "#fdd400",
    "axisThickness": 3,
    "endValue": 160,
    "radius": "80%",
    "valueInterval": 20,
    "tickColor": "#fdd400"
  } ],
  "arrows": [ {
    "color": "#67b7dc",
    "innerRadius": "20%",
    "nailRadius": 0,
    "radius": "85%"
  } ],
  "export": {
    "enabled": true
  }
} );

setInterval( randomValue, 2000 );

// set random value
function randomValue() {
  var value = Math.round( Math.random() * 240 );
  chart.arrows[ 0 ].setValue( value );
}

