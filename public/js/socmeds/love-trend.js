$.ajax({
    url : ajaxUrl + '/project/chart-data/love-trend/' + type,
    data : data,
    beforeSend : function(xhr) {
        $('#lovetrend').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#lovetrend').unblock();
    },
    success : function(result) {
        loveTrendChart('lovetrend', jQuery.parseJSON(result));
    }
});

function loveTrendChart($id, $data) {
    if ($data.length === 0) {
        $('#'+$id).html("<div class='center'>No data chart</div>");
    } else {
        $dates = $data.dates;
        $content = [];
        for (var i = 0; i < $data.data.length; i++) {
            $content[i] = { name: $data.data[i].keywordName, data: $data.data[i].love };
        }
        var chartData = {
            content: $content,
            categories: $dates
        };

        createLoveTrendChart(chartData, $id);
    }
}

function createLoveTrendChart(chartData, id) {
    var now = new Date();
    var offset = Math.abs( now.getTimezoneOffset() / 60 );
    //console.log(now);
    Highcharts.setOptions({
        global: {
            timezoneOffset: offset * 60
        }
    });
    $('#' + id).highcharts({
        chart: {
            type: 'spline',
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        xAxis: {
            categories: chartData.categories,
            labels: {
                /*formatter: function() {
                    //return(this.value.substring(0,10) + "...");
                    return( jQuery.trim(this.value.split('-')[2]) + "/" + jQuery.trim(this.value.split('-')[1]) );
                },
                rotation: 0,*/
                style: {
                    fontSize: '.75em'
                }
            }
        },
        yAxis: {
            title: {
                text: 'Love'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Love'
        },
        series: chartData.content
    });
}
