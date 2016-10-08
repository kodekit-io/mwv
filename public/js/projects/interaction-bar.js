$.ajax({
    url : ajaxUrl + '/project/chart-data/interaction-bar',
    beforeSend : function(xhr) {
        $('#interactionbar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#interactionbar').unblock();
    },
    success : function(result) {
        sentimentBarChart('interactionbar', jQuery.parseJSON(result));
    }
});

function sentimentBarChart($id, $data) {
    $data = $data['interaction rate'];
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $keywordname = $data[i].name;
            $interaction = $data[i].data[0][1];
            $content[i] = {name: $keywordname, y: $interaction};
        }

        chartSentimentBar($id, $content);
    }
}

function chartSentimentBar(id, dataSet, cat) {
    jQuery("#" + id).highcharts({
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        xAxis: {
            type: "category"
        },
        yAxis: {
            title: {
                text: null
            }
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true
                }
            },
            series: {
                pointWidth: 40
            }
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
        series: [{
            name: 'Buzz',
            colorByPoint: true,
            data: dataSet
            //data: [{
            //    name: 'Indomilk',
            //    y: 4033
            //}, {
            //    name: 'Frisian Flag',
            //    y: 3003,
            //}, {
            //    name: 'Dancow',
            //    y: 1538
            //}, {
            //    name: 'Milo',
            //    y: 777
            //}]
        }]
    });
}