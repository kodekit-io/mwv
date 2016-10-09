/*$.ajax({
    url : ajaxUrl + '/project/chart-data/share-of-media-bar',
    beforeSend : function(xhr) {
        $('#shareofmediabar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#shareofmediabar').unblock();
    },
    success : function(result) {
        shareOfMediaBarChart('shareofmediabar', jQuery.parseJSON(result));
    }
});

function shareOfMediaBarChart($id, $data) {
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        shareOfMediaBarOptions($id, $data);
    }
}

function shareOfMediaBarOptions(id, dataSet, cat) {
    jQuery("#" + id).highcharts({
        chart: {
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
        series: dataSet
    });
}
*/
$.ajax({
    //url : ajaxUrl + '/project/chart-data/share-of-media-bar',
    url : ajaxUrl + "/mediawave/jsontest/column-shareofmedia.json",
    beforeSend : function(xhr) {
        $('#shareofmediabar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });

    },
    complete : function(xhr, status) {
        $('#shareofmediabar').unblock();
    },
    success : function(result) {
        shareofmediabar('shareofmediabar', result);

    }

});

function shareofmediabar($id, $data) {
    $data = $data['shareOfMedia'];
    //$data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $x = $data[i].data;
            $y = $data[i].name;
            $c = $data[i].color;

            //console.log('x:'+$x);
            //console.log('y:'+$y);
            //console.log('c:'+$c);

            $content[i] = { data: $x, name: $y, color: $c };
        }

        shareofmediabarOptions($id, $content);
    }
}

function shareofmediabarOptions(id, dataSet, cat) {
    jQuery("#" + id).highcharts({
        chart: {
            //renderTo: id,
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
            pointFormat: '{series.name}: ({point.percentage:.2f}%)<br>{point.y} from total {point.stackTotal}'
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
                    enabled: true,
                    color: 'white',
                    formatter: function () {
                         return this.percentage.toFixed(0)+'%';
                    },
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                }
            }
        },
        series:dataSet
    });
}
