$.ajax({
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
        shareOfMediaBarChart($id, $data);
    }
}

function shareOfMediaBarChart(id, dataSet, cat) {
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