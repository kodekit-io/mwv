$.ajax({
    url : ajaxUrl + '/project/chart-data/reach-trend/' + mediaId + '/' + type,
    data : {
        keywords: brands,
        startDate: startDate,
        endDate: endDate,
        search: search
    },
    beforeSend : function(xhr) {
        $('#reachtrend').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#reachtrend').unblock();
    },
    success : function(result) {
        // console.log(result);
        reachTrendChart('reachtrend', jQuery.parseJSON(result));
    }
});

function reachTrendChart($id, $data) {
    if ($data.length === 0) {
        $('#'+$id).html("<div class='center'>No data chart</div>");
    } else {
        $dates = $data.dates;
        $content = [];
        for (var i = 0; i < $data.data.length; i++) {
            $content[i] = { name: $data.data[i].keywordName, data: $data.data[i].post };
        }
        var data = {
            content: $content,
            categories: $dates
        };

        createReachTrend(data, $id);
    }
}

function createReachTrend(data, id) {
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
            categories: data.categories,
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
                text: 'Reach'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Reach'
        },
        series: data.content
    });
}
