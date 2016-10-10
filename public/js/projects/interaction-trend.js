$.ajax({
    url : ajaxUrl + '/project/chart-data/interaction-trend',
    beforeSend : function(xhr) {
        $('#interacttrend').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#interacttrend').unblock();
    },
    success : function(result) {
        // console.log(result);
        interactionTrendChart('interacttrend', jQuery.parseJSON(result));
    }
});

function interactionTrendChart($id, $data) {
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

        createInteractionTrend(data, $id);
    }
}

function createInteractionTrend(data, id) {
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
                text: 'Interaction'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Interaction'
        },
        series: data.content
    });
}
