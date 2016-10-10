Highcharts.theme = {
	colors: ["#FF5A5E", "#00bcd4", "#FDB45C", "#4D5360", "#949FB1", "#81d4fa", "#FF6384", "#69f0ae", "#ff8a65", "#4fc3f7"],
	chart: {
		backgroundColor: null,
		style: {
			fontFamily: 'proxima_nova_rgregular, Helvetica, Arial, sans-serif'
		}
	},
	title: {
		style: {
			fontSize: '1em',
			fontWeight: 'normal',
			textTransform: 'uppercase'
		}
	},
	subtitle: {

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

		},
		title: {

		}
	},
	yAxis: {
		labels: {

		},
		title: {

		}
	},
	legend: {
		y: 15,
		backgroundColor: '#eeeeee',
		padding: 8,
		itemMarginTop: 0,
		itemMarginBottom: 5,
		itemStyle: {
			fontWeight: 'normal',
			fontSize: '12px',
			lineHeight: '14px'
		}
	},
	labels: {

	}
};

// Apply the theme
var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
