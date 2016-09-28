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
            height: 300,
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