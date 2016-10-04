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
            },
            /*plotLines: [{
                color: 'red',
                value: '1',
                width: '1',
                zIndex: 1
            }]*/
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
/*function interactiontrend(id) {
    var $chartinteractiontrend = new Highcharts.Chart({
        chart: {
            renderTo: id,
            type: 'spline'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            //pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
            headerFormat: '<b>{series.name}</b><br>',
            pointFormat: '{point.x:%e %b}: {point.y:.2f} m'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%d/%m'
            },
            labels: {
                rotation: 0,
                style: {
                    fontSize: '.75em'
                }
            }
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
        series: [{
            name: 'Indomilk',
            data: [
                [Date.UTC(2016, 8, 1), 0],
                [Date.UTC(2016, 8, 2), 0.28],
                [Date.UTC(2016, 8, 3), 0.25],
                [Date.UTC(2016, 8, 4), 0.2],
                [Date.UTC(2016, 8, 5), 0.28],
                [Date.UTC(2016, 8, 6), 0.28],
                [Date.UTC(2016, 8, 7), 0.47],
                [Date.UTC(2016, 8, 8), 0.79],
                [Date.UTC(2016, 8, 9), 0.72],
                [Date.UTC(2016, 8, 10), 1.02],
                [Date.UTC(2016, 8, 11), 1.12],
                [Date.UTC(2016, 8, 12), 1.2],
                [Date.UTC(2016, 8, 13), 1.18],
                [Date.UTC(2016, 8, 14), 1.19],
                [Date.UTC(2016, 8, 15), 1.85],
                [Date.UTC(2016, 8, 16), 2.22],
                [Date.UTC(2016, 8, 17), 1.15],
                [Date.UTC(2016, 8, 18), 0]
            ]
        }, {
            name: 'Frisian Flag',
            data: [
                [Date.UTC(2016, 8, 1), 0],
                [Date.UTC(2016, 8, 2), 0.4],
                [Date.UTC(2016, 8, 3), 0.25],
                [Date.UTC(2016, 8, 4), 1.66],
                [Date.UTC(2016, 8, 5), 1.8],
                [Date.UTC(2016, 8, 6), 1.76],
                [Date.UTC(2016, 8, 7), 2.62],
                [Date.UTC(2016, 8, 8), 2.41],
                [Date.UTC(2016, 8, 9), 2.05],
                [Date.UTC(2016, 8, 10), 1.7],
                [Date.UTC(2016, 8, 11), 1.1],
                [Date.UTC(2016, 8, 12), 0]
            ]
        }, {
            name: 'Milo',
            data: [
                [Date.UTC(2016, 8, 1), 0],
                [Date.UTC(2016, 8, 2), 0.25],
                [Date.UTC(2016, 8, 3), 1.41],
                [Date.UTC(2016, 8, 4), 1.64],
                [Date.UTC(2016, 8, 5), 1.6],
                [Date.UTC(2016, 8, 6), 2.55],
                [Date.UTC(2016, 8, 7), 2.62],
                [Date.UTC(2016, 8, 8), 2.5],
                [Date.UTC(2016, 8, 9), 2.42],
                [Date.UTC(2016, 8, 10), 2.74],
                [Date.UTC(2016, 8, 11), 2.62],
                [Date.UTC(2016, 8, 12), 2.6],
                [Date.UTC(2016, 8, 13), 2.81],
                [Date.UTC(2016, 8, 14), 2.63],
                [Date.UTC(2016, 8, 15), 2.77],
                [Date.UTC(2016, 8, 16), 2.68],
                [Date.UTC(2016, 8, 17), 2.56],
                [Date.UTC(2016, 8, 18), 2.39],
                [Date.UTC(2016, 8, 19), 2.3],
                [Date.UTC(2016, 8, 20), 2],
                [Date.UTC(2016, 8, 21), 1.85],
                [Date.UTC(2016, 8, 22), 1.49],
                [Date.UTC(2016, 8, 23), 1.08]
            ]
        }]
    });
}*/
