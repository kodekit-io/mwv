$.ajax({
    url : ajaxUrl + '/project/chart-data/comment-bar/' + type,
    data : data,
    beforeSend : function(xhr) {
        $('#commentbar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#commentbar').unblock();
    },
    success : function(result) {
        commentBar('commentbar', jQuery.parseJSON(result));
    }
});

function commentBar($id, $data) {
    $data = $data['interactionrate'];
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        var $dataSum = 0;
        for (var i = 0; i < $data.length; i++) {
            $x = $data[i].name;
            $y = $data[i].data;
            $length = $data.length;
            $dataSum += $data[i].data;

            $content[i] = {name: $x, data: [[$x,$y]] };
            $mean = $dataSum / $length;
        }

        //console.log($mean);
        createCommentBar($id, $content, $mean);
    }

}

function createCommentBar(id, dataSet, mean) {

    jQuery("#" + id).highcharts({
        chart: {
            //renderTo: id,
            type: 'column',
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Interaction Rate: <b>{point.y}</b>'
        },
        xAxis: {
            type: "category",
            labels: {
                formatter: function() {
                    return(this.value.substring(0,15) + " ");
                },
                rotation: 0
            }
        },
        yAxis: {
            title: {
                text: null
            },
            plotLines: [{
                value: mean,
                color: 'red',
                dashStyle: 'shortdash',
                width: 1,
                zIndex: 2
            }]
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'normal'
                    }
                }
            },
        },

        series:dataSet
    });
}
