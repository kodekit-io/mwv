$.ajax({
    url : ajaxUrl + '/project/chart-data/view-pie/' + type,
    data : data,
    beforeSend : function(xhr) {
        $('#viewpie').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#viewpie').unblock();
    },
    success : function(result) {
        viewPieChart('viewpie', jQuery.parseJSON(result));
    }
});

function viewPieChart($id, $data) {
    $data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $keywordname = $data[i].keywordName;
            $buzz = $data[i].view;
            $content[i] = {name: $keywordname, y: $buzz};
        }
        createViewPieChart($content, $id);
    }
}

function createViewPieChart(dataSet, id) {
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
            pointFormat: 'View: {point.y} ({point.percentage:.1f}%)'
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
        series: [{
            data: dataSet
        }]
    });
}
