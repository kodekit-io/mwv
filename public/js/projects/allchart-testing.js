function buzzpie(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -25,
                    color:'white',
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                },
                showInLegend: true
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [{
            name: 'Buzz',
            colorByPoint: true,
            data: [{
                name: 'Indomilk',
                y: 4033
            }, {
                name: 'Frisian Flag',
                y: 3003,
            }, {
                name: 'Dancow',
                y: 1538
            }, {
                name: 'Milo',
                y: 777
            }]
        }]
    });
}
function postpie(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -25,
                    color:'white',
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                },
                showInLegend: true
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [{
            name: 'Post',
            colorByPoint: true,
            data: [{
                name: 'Indomilk',
                y: 14033
            }, {
                name: 'Frisian Flag',
                y: 23003,
            }, {
                name: 'Dancow',
                y: 11538
            }, {
                name: 'Milo',
                y: 1777
            }]
        }]
    });
}
function interactionpie(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -25,
                    color:'white',
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                },
                showInLegend: true
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [{
            name: 'Interactions',
            colorByPoint: true,
            data: [{
                name: 'Indomilk',
                y: 56.33
            }, {
                name: 'Frisian Flag',
                y: 24.03,
            }, {
                name: 'Dancow',
                y: 10.38
            }, {
                name: 'Milo',
                y: 4.77
            }]
        }]
    });
}
function authorpie(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -25,
                    color:'white',
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                },
                showInLegend: true
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [{
            name: 'Unique User',
            colorByPoint: true,
            data: [{
                name: 'Indomilk',
                y: 43523
            }, {
                name: 'Frisian Flag',
                y: 63425,
            }, {
                name: 'Dancow',
                y: 14644
            }, {
                name: 'Milo',
                y: 11233
            }]
        }]
    });
}
function sentimentbar(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            type: 'column',
            events: {
                click: function() {
                    hideCtxMenu();
                }
            }
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        xAxis: {
            type: "category"
        },
        yAxis: {
            title: {
                text: null
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false
                }
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [
            {
                "data": [
                    ["Indomilk", 6511],
                    ["Frisian Flag", 4511],
                    ["Milo", 10311],
                    ["Dancow", 7834]
                ],
                "name": "Positive",
                "color": "#009688",
            }, {
                "data": [
                    ["Indomilk", 570],
                    ["Frisian Flag", 128],
                    ["Milo", 234],
                    ["Dancow", 581]
                ],
                "name": "Neutral",
                "color": "#b0bec5",
            }, {
                "data": [
                    ["Indomilk", 1140],
                    ["Frisian Flag", 2145],
                    ["Milo", 1445],
                    ["Dancow", 1257]
                ],
                "name": "Negative",
                "color": "#f44336",
            }
        ]
    });
}
function interactionbar(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            type: 'column',
            events: {
                click: function() {
                    hideCtxMenu();
                }
            }
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        xAxis: {
            type: "category"
        },
        yAxis: {
            title: {
                text: null
            }
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true
                }
            },
            series: {
                pointWidth: 40
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [{
            name: 'Indomilk',
            data: [['Indomilk',0.83]]
        }, {
            name: 'Frisian Flag',
            data: [['Frisian Flag',1.03]]
        }, {
            name: 'Dancow',
            data: [['Dancow',0.68]]
        }, {
            name: 'Milo',
            data: [['Milo',0.77]]
        }]
    });
}
function shareofmediabar(id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            renderTo: id,
            type: 'column',
            events: {
                click: function() {
                    hideCtxMenu();
                }
            }
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        xAxis: {
            type: "category"
        },
        yAxis: {
            title: {
                text: null
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false
                }
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        series: [
            {
                "data": [
                    ["Indomilk", 65119.6],
                    ["Frisian Flag", 65119.6],
                    ["Milo", 103118.6],
                    ["Dancow", 78349.6]
                ],
                "name": "Twitter",
                "color": "#63cef2",
            }, {
                "data": [
                    ["Indomilk", 3570.5],
                    ["Frisian Flag", 50128.38],
                    ["Milo", 50128.38],
                    ["Dancow", 5281.22]
                ],
                "name": "Facebook",
                "color": "#507bbf",
            }, {
                "data": [
                    ["Indomilk", 10140.84],
                    ["Frisian Flag", 21445.04],
                    ["Milo", 21445.04],
                    ["Dancow", 12957.77]
                ],
                "name": "Video",
                "color": "#f35951",
            }
        ]
    });
}
