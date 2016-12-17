$.ajax({
    url : ajaxUrl + '/project/chart-data/rating-bar/',
    data : data,
    beforeSend : function(xhr) {
        $('#ratingbar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#ratingbar').unblock();
    },
    success : function(result) {
        ratingBar('ratingbar', jQuery.parseJSON(result));
    }
});

function ratingBar($id, $data) {
    //console.log($data['data']);
    $data = $data['data'];
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        var $dataSum = 0;
        for (var i = 0; i < $data.length; i++) {
            $x = $data[i].keywordName;
            $y = $data[i].rating;
            $length = $data.length;
            $dataSum += $data[i].rating;

            $content[i] = {name: $x, data: [[$x,$y]] };
            $mean = $dataSum / $length;
        }

        //console.log($mean);
        createRatingBar($id, $content, $mean);
    }

}

function createRatingBar(id, dataSet, mean) {

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
