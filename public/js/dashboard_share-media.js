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
        chartShareMedia($content, $id);

    }
}

function chartShareMedia(dataSet, id) {
    var $chartMedia = new Highcharts.Chart({
        chart: {
            height: 300,
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
                innerSize: '70%',
                dataLabels: {
                    enabled: false
                }
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
        $chartMedia.renderer.text('<span style="color: white">Share Of Media</span>', 75, 155).css({
            width: circleradius * 2,
            color: '#4572A7',
            fontSize: '16px',
            textAlign: 'center'
        }).attr({
            zIndex: 999
        }).add();
    });
}
