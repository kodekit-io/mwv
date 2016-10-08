$.ajax({
    url : ajaxUrl + '/project/chart-data/unique-user-pie',
    beforeSend : function(xhr) {
        $('#authorpie').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#authorpie').unblock();
    },
    success : function(result) {
        uniqueUserPieChart('authorpie', jQuery.parseJSON(result));
    }
});

function uniqueUserPieChart($id, $data) {
    $data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $keywordname = $data[i].keywordName;
            $buzz = $data[i].author;
            $content[i] = {name: $keywordname, y: $buzz};
        }
        createUniqueUserPie($content, $id);
    }
}

function createUniqueUserPie(dataSet, id) {
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
