$.ajax({
    url : ajaxUrl + '/project/chart-data/brand-equity',
    data : data,
    beforeSend : function(xhr) {
        $('#brand-equity-container').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#brand-equity-container').unblock();
    },
    success : function(result) {
        brandEquityChart('brand-equity-container', jQuery.parseJSON(result));
    }
});

function brandEquityChart($id, $data) {
    if ($data.length === 0) {
        $('#'+$id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];

        var $netsen = 0,
            $sim = 0,
            $buzz = 0,
            $uniq = 0,
            $color = '',
            $keywordID = '',
            $keywordName = '',
            $BrandFavourableTalkability = 0,
            $EarnedMediaShare = 0,
            $NetBrandReputation = 0;

        for (var i = 0; i < $data.length; i++) {
            $netsen = $data[i].netsen;
            $sim = $data[i].sim;
            $buzz = $data[i].buzz;
            $uniq = $data[i].unquser;
            $color = $data[i].color;
            $keywordID = $data[i].keywordID;
            $keywordName = $data[i].keywordName;
            $BrandFavourableTalkability = $data[i].brandFavourableTalkability;
            $EarnedMediaShare = $data[i].earnedMediaShare;
            $NetBrandReputation = $data[i].netBrandReputation;

            $content[i] = {
                data: [
                    {
                        x: $netsen,
                        y: $EarnedMediaShare,
                        z: $uniq,
                        keywordId: $keywordID,
                        name: $keywordName,
                        BrandFavourableTalkability: $BrandFavourableTalkability,
                        EarnedMediaShare: $EarnedMediaShare,
                        NetBrandReputation: $NetBrandReputation,
                        Buzz: $buzz
                    }
                ],
                name: [$keywordName],
                color: $color
            };
        } //end of for
        showEquityChart($id, $content);
    }
}

function showEquityChart($id, $data) {
    $('#' + $id).highcharts({

        chart: {
            type: 'bubble',
            plotBorderWidth: 1,
        },
        legend: {
            enabled: true
        },
        title: {
            text: null
        },
        xAxis: {
            gridLineWidth: 1,
            title: {
                text: 'Net Sentiment'
            },
            labels: {
                format: '{value}'
            },
			//min: 0,
			//max: 4000,
            tickInterval: 500,
        },
        yAxis: {
            startOnTick: false,
            endOnTick: false,
            title: {
                text: 'Earned Media Share'
            },
            labels: {

            },
            tickInterval: 0.5,
            lineWidth: 1,
        },
        tooltip: {
            useHTML: true,
            headerFormat: '<ul class="uk-list uk-margin-remove" style="width:200px;">',
            pointFormat: '<li><h6 class="white-text uk-margin-remove truncate">{point.name}</h6></li>' +
            '<li><span class="left">Net Sentiment: </span><span class="right">{point.x}</span></li>' +
            '<li><span class="left">Earned Media Share: </span><span class="right">{point.y}</span></li>' +
            '<li><span class="left">Unique User: </span><span class="right">{point.z}</span></li>' +
            '<li><span class="left">Buzz Size: </span><span class="right">{point.Buzz}</span></li>',
            footerFormat: '</ul>',
            followPointer: true
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: false,
                    format: '{point.name}',
                    style: {
                        fontWeight: 'normal',
                        color: '#000'
                    }
                }
            },
            bubble:{
                minSize:'20%',
                maxSize:'40%'
            }
        },
        series: $data
    });
};
