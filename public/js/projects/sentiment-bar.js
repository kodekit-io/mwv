$.ajax({
    url : ajaxUrl + '/project/chart-data/sentiment-bar/' + mediaId,
    data : data,
    beforeSend : function(xhr) {
        $('#sentimentbar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });

    },
    complete : function(xhr, status) {
        $('#sentimentbar').unblock();
    },
    success : function(result) {
        sentimentBar('sentimentbar', jQuery.parseJSON(result));

    }

});

function sentimentBar($id, $data) {
    $data = $data['sentiment'];
    //$data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $x = $data[i].data;
            $y = $data[i].name;
            $c = $data[i].color;

            //console.log('x:'+$x);
            //console.log('y:'+$y);
            //console.log('c:'+$c);

            $content[i] = { data: $x, name: $y, color: $c };
        }

        sentimentBarOptions($id, $content);
    }
}

function sentimentBarOptions(id, dataSet, cat) {
    jQuery("#" + id).highcharts({
        chart: {
            //renderTo: id,
            type: 'column',
            events: {
                click: function() {
                    hideCtxMenu();
                }
            }
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: ({point.percentage:.2f}%)<br>{point.y} from total {point.stackTotal}'
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
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: 'white',
                    formatter: function () {
                         return this.percentage.toFixed(0)+'%';
                    },
                    style: {
                        fontSize: 11,
                        fontWeight: 'normal'
                    }
                }
            }
        },
        series:dataSet
    });
}
