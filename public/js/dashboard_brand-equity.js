function brandChart($id, $data) {

    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No data chart</div>");
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
                        y: $sim,
                        z: $uniq,
                        keywordId: $keywordID,
                        name: $keywordName,
                        BrandFavourableTalkability: $BrandFavourableTalkability,
                        EarnedMediaShare: $EarnedMediaShare,
                        NetBrandReputation: $NetBrandReputation,
                        Buzz: $buzz
                    }
                ],
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
            zoomType: 'xy'
        },

        legend: {
            enabled: false
        },

        //title: {
        //    text: 'Sugar and fat intake per country'
        //},

        //subtitle: {
        //    text: 'Source: <a href="http://www.euromonitor.com/">Euromonitor</a> and <a href="https://data.oecd.org/">OECD</a>'
        //},

        title: {
            text: 'Brand Equity'
        },

        xAxis: {
            gridLineWidth: 1,
            title: {
                text: 'Net Sentiment'
            },
            labels: {
                format: '{value}'
            },
            //plotLines: [{
            //    color: 'black',
            //    dashStyle: 'dot',
            //    width: 2,
            //    value: 65,
            //    label: {
            //        rotation: 0,
            //        y: 15,
            //        style: {
            //            fontStyle: 'italic'
            //        },
            //        text: 'Safe fat intake 65g/day'
            //    },
            //    zIndex: 3
            //}]
        },

        yAxis: {
            startOnTick: false,
            endOnTick: false,
            title: {
                text: 'Sims Score'
            },
            labels: {
                format: '{value}'
            },
            maxPadding: 0.2,
            //plotLines: [{
            //    color: 'black',
            //    dashStyle: 'dot',
            //    width: 2,
            //    value: 50,
            //    label: {
            //        align: 'right',
            //        style: {
            //            fontStyle: 'italic'
            //        },
            //        text: 'Safe sugar intake 50g/day',
            //        x: -10
            //    },
            //    zIndex: 3
            //}]
        },

        //tooltip: {
        //    useHTML: true,
        //    headerFormat: '<table><caption>{point.key}</caption>',
        //    pointFormat: '<tr><td style="color: {series.color}">Net Sentiment</td><td style="text-align: right"><b>{point.x}</b></td></tr>' +
        //    '<tr><td style="color: {series.color}">Sim Score</td><td style="text-align: right"><b>{point.y}</b></td></tr>' +
        //    '<tr><td style="color: {series.color}">Unique User</td><td style="text-align: right"><b>{point.z}</b></td></tr>' +
        //    '<tr><td style="color: {series.color}">Buzz Size</td><td style="text-align: right"><b>{point.Buzz}</b></td></tr>' +
        //    '<tr><td style="color: {series.color}">Brand Favourable Talkability</td><td style="text-align: right"><b>{point.BrandFavourableTalkability}</b></td></tr>' +
        //    '<tr><td style="color: {series.color}">Earned Media Share</td><td style="text-align: right"><b>{point.EarnedMediaShare}</b></td></tr>' +
        //    '<tr><td style="color: {series.color}">Net Brand Reputation</td><td style="text-align: right"><b>{point.NetBrandReputation}</b></td></tr>',
        //    footerFormat: '</table>',
        //},

        tooltip: {
            useHTML: true,
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
            followPointer: true
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}',
                    style: {
                        fontWeight: 'normal',
                        color: '#000'
                    }
                }
            }
        },

        series: $data

    });
};
