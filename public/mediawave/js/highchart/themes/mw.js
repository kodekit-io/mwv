Highcharts.theme = {
	colors: ["#f45b5b", "#8085e9", "#8d4654", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
		"#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
	chart: {
		backgroundColor: null,
		style: {
			font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
		}
	},
	title: {
		style: {
			font: '1.2em "proxima_nova_condensedSBd", Helvetica, Arial, sans-serif',
			textTransform: 'uppercase'
		}
	},
	subtitle: {
		style: {
			font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
		}
	},
	tooltip: {
		borderWidth: 0,
		backgroundColor: 'rgba(0,0,0,0.5)',
		shadow: false,
		style: {
			color: '#ffffff'
		}
	},
	xAxis: {
		labels: {
			style: {
				font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
			}
		},
		title: {
			style: {
				font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'

			}
		}
	},
	yAxis: {
		labels: {
			style: {
				font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
			}
		},
		title: {
			style: {
				font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
			}
		}
	},
	legend: {
		itemStyle: {
			font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
		}
	},
	labels: {
		style: {
			font: '"proxima_nova_rgregular", Helvetica, Arial, sans-serif'
		}
	}
};

// Apply the theme
var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
