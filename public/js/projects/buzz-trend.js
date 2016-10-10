$.ajax({
    url : ajaxUrl + '/project/chart-data/buzz-trend/' + mediaId,
    beforeSend : function(xhr) {
        $('#buzztrend').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#buzztrend').unblock();
    },
    success : function(result) {
        buzzTrend('buzztrend', jQuery.parseJSON(result));
    }
});

function buzzTrend($id, $data) {
    if ($data.dates.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.data.length; i++) {
            $content[i] = { name: $data.data[i].keywordName, data: $data.data[i].buzz };
        }
        var chartData = {
            content: $content,
            categories: $data.dates
        };

        createProjectBuzzChart(chartData, $id);
    }
}


function createProjectBuzzChart(chartData, id) {
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
                text: 'Buzz'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Buzz'
        },
        series: chartData.content
    });
}
