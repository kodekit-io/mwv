$.ajax({
    url : ajaxUrl + '/project/chart-data/share-of-media-bar',
    data : {
        projectId: projectId,
        keywords: brands,
        startDate: startDate,
        endDate: endDate,
        search: search
    },
    beforeSend : function(xhr) {
        $('#shareofmediabar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });

    },
    complete : function(xhr, status) {
        $('#shareofmediabar').unblock();
    },
    success : function(result) {
        shareofmediabar('shareofmediabar', jQuery.parseJSON(result));
    }

});

function shareofmediabar($id, $data) {
    $data = $data['shareOfMedia'];
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

        shareofmediabarOptions($id, $content);
    }
}

function shareofmediabarOptions(id, dataSet, cat) {
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
