$.ajax({
    url : ajaxUrl + '/project/chart-data/interaction-pie',
    beforeSend : function(xhr) {
        $('#interactionpie').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#interactionpie').unblock();
    },
    success : function(result) {
        interactionPieChart('interactionpie', jQuery.parseJSON(result));
    }
});

function interactionPieChart($id, $data) {
    $data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $keywordname = $data[i].keywordName;
            $buzz = $data[i].interaction;
            $content[i] = {name: $keywordname, y: $buzz};
        }
        createInteractionPie($content, $id);
    }
}

function createInteractionPie(dataSet, id) {
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
            //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            pointFormat: 'Interactions: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        /*plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },*/
        plotOptions: {
            pie: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -25,
                    color:'white',
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                },
                showInLegend: true
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
            data: dataSet
        }]
    });
}
