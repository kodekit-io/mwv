$.ajax({
    url : ajaxUrl + '/project/chart-data/potential-pie/' + mediaId + '/' + type,
    data : {
        keywords: brands,
        startDate: startDate,
        endDate: endDate
    },
    beforeSend : function(xhr) {
        $('#potentialpie').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#potentialpie').unblock();
    },
    success : function(result) {
        potentialPieChart('potentialpie', jQuery.parseJSON(result));
    }
});

function potentialPieChart($id, $data) {
    $data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $keywordname = $data[i].keywordName;
            $buzz = $data[i].preach;
            $content[i] = {name: $keywordname, y: $buzz};
        }
        createPotentialPie($content, $id);
    }
}

function createPotentialPie(dataSet, id) {
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
            pointFormat: 'Potential Reach: {point.y} ({point.percentage:.1f}%)'
        },
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
