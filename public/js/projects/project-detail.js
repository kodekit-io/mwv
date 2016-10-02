function brandChart($id, $data) {
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
            //zoomType: 'xy'
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



function shareOfVoice($id, $data) {
    if ($data.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {
        var $keywordId = '', $buzz = 0, $color = '', $keywordname = '', $percentage = 0, $variance = 0;
        var $dataSet = [], $dataColor = [], $content = [];

        for (var i = 0; i < $data.length; i++) {
            $keywordId = $data[i].keywordID;
            $buzz = $data[i].buzz;
            $color = $data[i].color;
            $variance = $data[i].variance;
            $percentage = $data[i].percentage;

            $keywordname = $data[i].keywordName;

            $content[i] = {name: $keywordname, y: $buzz, z: $percentage, color: $color, v: $variance, keyId: $keywordId};
        } // end of looping
        ///*
        // Information
        // */
        //var $buzzarrTertinggi = [], $firstBuzz = '';
        //
        //$buzzarrTertinggi = $data.sort(function(a, b) {
        //    return parseInt(b.buzz) - parseInt(a.buzz)
        //});
        //for (var $i = 0; $i < $buzzarrTertinggi.length; $i++) {
        //    if ($i == 0) {
        //        $firstBuzz += '<b>' + $buzzarrTertinggi[$i].keywordName + '</b>' + '(' + $buzzarrTertinggi[$i].buzz + ')' + ' get the highest Share of Voice [SOV] followed by ';
        //    } else if ($i > 0) {
        //        $firstBuzz += ',<b> ' + $buzzarrTertinggi[$i].keywordName + '</b>' + '(' + $buzzarrTertinggi[$i].buzz + ') ';
        //    }
        //}
        //var $html = $firstBuzz + '<br/><br/>';
        //popovercontent('right', 'Share Of Voice', 'sosound', $html);


        /*
         End of information
         */

        chartShareOfVoice($content, $id);
    }
}

function chartShareOfVoice(dataSet, id) {
    var $chart = new Highcharts.Chart({
        chart: {
            //height: 300,
            renderTo: id,
            //backgroundColor: '#0AAED5',
            type: 'pie',
            events: {
                click: function() {
                    hideCtxMenu();
                }
            }
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: 'Percentage : <b>{point.z} %</b><br/>Total Buzz : <b>{point.y}</b><br/>Variance : <b>{point.v}</b>'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            pie: {
                innerSize: '70%',
                dataLabels: {
                    enabled: false
                }
            },
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function(e) {
                            var $contextMenu = jQuery("#contextMenu");

                            var keyId = e.point.keyId;

                            $contextMenu.css({
                                display: "block",
                                left: e.pageX,
                                top: e.pageY
                            });

                            var $trend = jQuery("a#ctx_trend");
                            $trend.attr('onclick', 'detail_trend(' + keyId + ')').show();

                            var $sentiment = jQuery("a#ctx_sentimentTrend");
                            $sentiment.attr('onclick', 'detail_sentiment_trend(' + keyId + ')').show();

                            var $convo = jQuery("a#ctx_convo");
                            $convo.attr('onclick', 'detail_conversation(' + keyId + ')').show();

                            var $ctx_influ = jQuery("a#ctx_influencer");
                            $ctx_influ.hide();

                            var $close = jQuery("a#ctx_close");
                            $close.attr('onclick', 'hideCtxMenu()').show();

                        }


                    }
                },
                // showInLegend: false
            }
        },
        series: [{
            data: dataSet
        }]
    }, function($chart) {
        var circleradius = 72;
        $chart.renderer.text('<span style="color: white">Share Of Voice</span>', 75, 155)
            .css({
                fontSize: '16px',
                textAlign: 'center',
                width: circleradius * 2,
                color: '#4572A7',
            }).attr({
                zIndex: 999
            }).add();

        // console.log("$chart serie data: ",$chart.series.data);
        // console.log("$chart series : ",$chart.series);
        // console.log("$chart series [0] data: ",$chart.series[0].data);

        jQuery("#legendSov").popover({
            placement: 'left',
            html: 'true',
            title: 'Share Of Voice Legend',
            trigger: 'click'
        }).on('hidden.bs.popover', function(e) {
            jQuery(this).show();
        }).click(function(evt) {


            evt.stopPropagation();
            var $html = '';

            /*
             jQuery($chart.series[0].data).each(function (i, serie) {
             // $html += '<a style="color: ' + serie.color + ';cursor:pointer;text-align:none;float:left">' + serie.data[i].name + '</a><br>';
             $html += '<a style="color: ' + serie.color + ';cursor:pointer;text-align:none;float:left">' + serie.name + '</a><br>';
             });


             */
            var $datas = $chart.series[0].data;
            for (var $i = 0; $i < $datas.length; $i++) {
                $html += '<a style="color: ' + $datas[$i].color + ';cursor:pointer;text-align:none;float:left;clear:both;width:100%;">' + $datas[$i].name + '</a>';

            }


            jQuery(".popover-content").html($html);
            // console.log("children : ",jQuery(".popover-content").children());

            jQuery(".popover-content").children().click(function(ev) {
                var inxSOV = jQuery(this).index();
                // console.log("index : ",inx)
                // var point = $chart.series[inx];
                var point = $chart.series[0].data[inxSOV];
                // var point = $chart.series[0];
                if (point.visible)
                    point.setVisible(false);
                else
                    point.setVisible(true);
            });


        });


    });

}

/*
function shareMedia($id, $data) {
    if ($data.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {

        var $mediaId = 0, buzz = 0, $topicName = "", $percentage = 0, $color = "";
        var $content = [], $dataColor = [];

        var getColor = {
            'Facebook': '#507bbf',
            'Twitter': '#63cef2',
            'Blog': '#79d9b3',
            'News': '#97cf74',
            'Video': '#f35951'
        };

        var $brandArrTertinggi = [], $firstBrand = '';

        for (var i = 0; i < $data.length; i++) {
            $mediaId = $data[i].mediaID;
            $buzz = $data[i].buzz;
            $percentage = $data[i].percentage;
            $topicName = $data[i].mediaName;
            $content[i] = [$topicName, $buzz];

            $content[i] = {
                name: $topicName,
                y: $buzz,
                z: $percentage,
                mediaID: $mediaId,
                color: getColor[$topicName]
            };
        }
        // chartShareMedia([{data:$content,color:$dataColor}]);
        //Information
        $brandArrTertinggi = $data.sort(function(a, b) {
            return parseInt(b.buzz) - parseInt(a.buzz)
        });

        // console.log("brandArrTertinggi : ",$brandArrTertinggi);

        for (var $i = 0; $i < $brandArrTertinggi.length; $i++) {
            if ($i == 0) {
                $firstBrand += '<b>' + $brandArrTertinggi[$i].mediaName + '</b>' + '(' + $brandArrTertinggi[$i].buzz + ')' + ' get Top Share Media and followed by ';
            } else if ($i > 0) {
                $firstBrand += ',<b> ' + $brandArrTertinggi[$i].mediaName + '</b>' + '(' + $brandArrTertinggi[$i].buzz + ') ';
            }
        }
        //var $html = $firstBrand + '<br/><br/>';
        //popovercontent('left', 'Share Of Media', 'smsound', $html);
        //End of information
        chartShareMedia($content, $id);

    }
}

function chartShareMedia(dataSet, id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            //height: 300,
            renderTo: id,
            //backgroundColor: '#3CC37B',
            type: 'pie',
            events: {
                click: function() {
                    hideCtxMenu();
                }
            }
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        tooltip: {
            // pointFormat: 'Total Buzz: <b>{point.y}</b>'
            pointFormat: 'Percentage: <b>{point.z} %</b>'
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                dataLabels: {
                    enabled: false
               },
               allowPointSelect: true,
               cursor: 'pointer',
               showInLegend: true
            }, series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function(e) {

                            // console.log("e : ",e.point);
                            var $mediaID = e.point.mediaID;

                            var $contextMenu = jQuery("#contextMenu");

                            var $brandID = jQuery("input[name='brandID']").val();


                            $contextMenu.css({
                                display: "block",
                                left: e.pageX,
                                top: e.pageY
                            });

                            var $trend = jQuery("a#ctx_trend");
                            $trend.attr('onclick', 'detail_trend(' + $brandID + ',"",' + $mediaID + ')').show();

                            // console.log("brandID : ",$brandID);

                            var $sentiment = jQuery("a#ctx_sentimentTrend");
                            $sentiment.attr('onclick', 'detail_sentiment_trend(' + $brandID + ',"",' + $mediaID + ')').show();

                            var $convo = jQuery("a#ctx_convo");
                            $convo.attr('onclick', 'detail_conversation(' + $brandID + ',"",' + $mediaID + ')').show();

                            var $ctx_influ = jQuery("a#ctx_influencer");
                            $ctx_influ.attr('onclick', 'detail_influencer(' + $brandID + ',"",' + $mediaID + ',0,0,true)').show();
                            // $ctx_influ.hide();

                            var $close = jQuery("a#ctx_close");
                            $close.attr('onclick', 'hideCtxMenu()').show();

                        }
                    }
                }
            },
        },
        series: [{
            data: dataSet
        }]
    }, function($chartMedia) {
        var circleradius = 72;
        $chartMedia.renderer.text('<span>Share Of Media</span>', 75, 155).css({
            width: circleradius * 2,
            color: '#4572A7',
            fontSize: '16px',
            textAlign: 'center'
        }).attr({
            zIndex: 999
        }).add();

    });
}
*/
function shareMedia($id, $data) {
    if ($data.length === 0) {
        $content.html("<div class='center'>No data chart</div>");
    } else {

        var $mediaId = 0, $buzz = 0, $keywordID = '', $keywordName = '', $topicName = "", $percentage = 0, $color = "";
        var $content = [], $dataColor = [];

        var getColor = {
            'Facebook': '#507bbf',
            'Twitter': '#63cef2',
            'Blog': '#79d9b3',
            'News': '#97cf74',
            'Video': '#f35951'
        };

        var $brandArrTertinggi = [], $firstBrand = '';

        for (var i = 0; i < $data.length; i++) {
            $mediaId = $data[i].mediaID;
            $buzz = $data[i].buzz;
            $percentage = $data[i].percentage;
            $keywordID = $data[i].keywordID;
            $keywordName = $data[i].keywordName;
            $topicName = $data[i].mediaName;
            $content[i] = {
                 name: $topicName,
                 data: [[$keywordName, $buzz]],
                 color: getColor[$topicName]
            };

        }
        // chartShareMedia([{data:$content,color:$dataColor}]);
        /*
         Information
         */
        $brandArrTertinggi = $data.sort(function(a, b) {
            return parseInt(b.buzz) - parseInt(a.buzz)
        });

        // console.log("brandArrTertinggi : ",$brandArrTertinggi);

        for (var $i = 0; $i < $brandArrTertinggi.length; $i++) {
            if ($i == 0) {
                $firstBrand += '<b>' + $brandArrTertinggi[$i].mediaName + '</b>' + '(' + $brandArrTertinggi[$i].buzz + ')' + ' get Top Share Media and followed by ';
            } else if ($i > 0) {
                $firstBrand += ',<b> ' + $brandArrTertinggi[$i].mediaName + '</b>' + '(' + $brandArrTertinggi[$i].buzz + ') ';
            }
        }
        //var $html = $firstBrand + '<br/><br/>';
        //popovercontent('left', 'Share Of Media', 'smsound', $html);
        /*
         End of information
         */
        console.log($content);
        chartShareMedia($content, $id);

    }
}
function chartShareMedia(dataSet, id) {

    var $chartMedia = new Highcharts.Chart({
        chart: {
            //height: 300,
            renderTo: id,
            //backgroundColor: '#3CC37B',
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
            // pointFormat: 'Total Buzz: <b>{point.y}</b>'
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
        },
        xAxis: {
            categories: ['Twitter', 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },
        plotOptions: {
             column: {
                  stacking: 'normal',
                  dataLabels: {
                       enabled: true,
                       color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'black'
                  },
                  allowPointSelect: true,
                  cursor: 'pointer',
                  showInLegend: true
             },
        },
        series: dataSet
    });
}
