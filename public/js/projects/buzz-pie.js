function buzzPie($id, $data) {
    // console.log($data);
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No data chart</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $keywordname = $data[i].mediaName;
            $buzz = $data[i].buzz;
            $content[i] = {name: $keywordname, y: $buzz};
        }
        createBuzzPieChart($content, $id);
    }
}

function createBuzzPieChart(dataSet, id) {
    console.log(dataSet);
    $('#'+id).highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            data: dataSet
        }]
    });
}
