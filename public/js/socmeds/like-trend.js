$.ajax({
    url : ajaxUrl + '/project/chart-data/like-trend/' + type,
    data : data,
    beforeSend : function(xhr) {
        $('#liketrend').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#liketrend').unblock();
    },
    success : function(result) {
        likeTrendChart('liketrend', jQuery.parseJSON(result));
    }
});

function likeTrendChart($id, $data) {
    if ($data.length === 0) {
        $('#'+$id).html("<div class='center'>No data chart</div>");
    } else {
        $dates = $data.dates;
        $content = [];
        for (var i = 0; i < $data.data.length; i++) {
            $content[i] = { name: $data.data[i].keywordName, data: $data.data[i].like };
        }
        var chartData = {
            content: $content,
            categories: $dates
        };

        createLikeTrendChart(chartData, $id);
    }
}

function createLikeTrendChart(chartData, id) {
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
                formatter: function() {
                    //return(this.value.substring(0,10) + "...");
                    return( jQuery.trim(this.value.split('-')[2]) + "/" + jQuery.trim(this.value.split('-')[1]) );
                },
                rotation: 0,
                style: {
                    fontSize: '.75em'
                }
            }
        },
        yAxis: {
            title: {
                text: 'Like'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Like'
        },
        series: chartData.content
    });
}
