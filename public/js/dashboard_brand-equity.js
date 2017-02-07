function brandChart($id, $data) {
    if ($data.length === 0) {
        $('#' + $id).html("");
        //$('#' + 'btnview-{!! $project->pid !!}').block();
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
    var w = $('.uk-grid div').width();
    //console.log(w);
    $('#' + $id).highcharts({
        chart: {
            type: 'bubble',
            plotBorderWidth: 1,
            height: 200,
            width: w - 50
        },
        legend: {
            enabled: false
        },
        title: {
            text: 'Brand Equity'
        },
        xAxis: {
            title: {
                text: ''
            },
            labels: {
                enabled: false,
                format: '{value}'
            },
        },
        yAxis: {
            startOnTick: false,
            endOnTick: false,
            title: {
                text: ''
            },
            labels: {
                enabled: false,
                format: '{value}'
            },
			tickInterval: 0.1,
			lineWidth: 1,
        },
        tooltip: {
            useHTML: true,
            /*
            headerFormat: '<ul class="uk-list uk-margin-remove" style="width:200px;">',
            pointFormat: '<li><h6 class="white-text uk-margin-remove">{point.name}</h6></li>' +
            '<li>Net Sentiment: <div class="right">{point.x}</div></li>' +
            '<li>Sims Score: <div class="right">{point.y}</div></li>' +
            '<li>Unique User: <div class="right">{point.z}</div></li>' +
            '<li>Buzz Size: <div class="right">{point.Buzz}</div></li>' +
            '<li>Brand Favourable Talkability: <div class="right">{point.BrandFavourableTalkability}</div></li>' +
            '<li>Earned Media Share: <div class="right">{point.EarnedMediaShare}</div></li>' +
            '<li>Net Brand Reputation: <div class="right">{point.NetBrandReputation}</div></li>',
            footerFormat: '</ul>',
            */
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
