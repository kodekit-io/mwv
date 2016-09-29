function projectBuzz($id, $data) {
    if ($data.dates.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.chartData.length; i++) {
            $content[i] = { name: $data.chartData[i]['name'], data: $data.chartData[i]['value'] };
        }
        console.log($content);
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
            categories: data.categories
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
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'top',
            borderWidth: 0
        },
        series: data.content
    });
}