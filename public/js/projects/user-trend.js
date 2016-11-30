$.ajax({
    url : ajaxUrl + '/project/chart-data/user-trend/',
    data : {
        projectId: projectId,
        keywords: brands,
        startDate: startDate,
        endDate: endDate,
        search: search
    },
    beforeSend : function(xhr) {
        $('#usertrend').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#usertrend').unblock();
    },
    success : function(result) {
        userTrend('usertrend', jQuery.parseJSON(result));
    }
});

function userTrend($id, $data) {
    if ($data.dates.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.data.length; i++) {
            $content[i] = { name: $data.data[i].keywordName, data: $data.data[i].user };
        }
        var chartData = {
            content: $content,
            categories: $data.dates
        };

        createUserTrendChart(chartData, $id);
    }
}


function createUserTrendChart(chartData, id) {
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
                text: 'User'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' User'
        },
        series: chartData.content
    });
}
