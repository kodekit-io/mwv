function buzzTrend($id, $data) {
    if ($data.dates.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.chartData.length; i++) {
            $content[i] = { name: $data.chartData[i]['name'], data: $data.chartData[i]['value'] };
        }
        // console.log($content);
        var data = {
            content: $content,
            categories: $data.dates
        };

        createProjectBuzzChart(data, $id);
    }
}


function createProjectBuzzChart(data, id) {
    $('#' + id).highcharts({
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
        series: data.content
    });
}
