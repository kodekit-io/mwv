/*$.ajax({
    url : ajaxUrl + '/project/chart-data/sentiment-bar',
    beforeSend : function(xhr) {
        $('#sentimentbar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });
    },
    complete : function(xhr, status) {
        $('#sentimentbar').unblock();
    },
    success : function(result) {
        sentimentBarChart('sentimentbar', jQuery.parseJSON(result));
    }
});

function sentimentBarChart($id, $data) {
    // console.log($data);
    if($data.length > 0){
        var $buzzName = [];
        var $buzzPos = [],$buzzNet = [],$buzzNeg = [];
        var $buzzPosPercent = [],$buzzNetPercent = [],$buzzNegPercent = [],$keywordID = [];
        var $mediaName = "";
        var $pos = 0,$neg = 0,$net = 0;
        var $posPercent = 0,$NetPercent = 0,$NegPercent = 0;

        for(var i=0; i < $data.length; i++){
            // console.log("keyword id : ",$data[i]);
            $mediaName = $data[i].keywordName;

            // $keywordID = $data[i].keywordID;
            $pos = $data[i].positive.buzz;
            $net = $data[i].neutral.buzz;
            $neg = $data[i].negative.buzz;

            $posPercent = $data[i].positive.percentage;
            $NetPercent = $data[i].neutral.percentage;
            $NegPercent = $data[i].negative.percentage;

            $buzzName.push($mediaName);

            $buzzPos.push($pos);
            $buzzNet.push($net);
            $buzzNeg.push($neg);

            $buzzPosPercent.push($posPercent);
            $buzzNetPercent.push($NetPercent);
            $buzzNegPercent.push($NegPercent);

            $keywordID.push($data[i].keywordID);

        }
        $content = [
            {
                keywordID:$keywordID,
                name: 'Positive',
                color:'#aacb36',
                data:$buzzPos,
                persentase:$buzzPosPercent
            },{
                keywordID:$keywordID,
                name: 'Neutral',
                color:'#aaaaaa',
                data:$buzzNet,
                persentase:$buzzNetPercent,
            },{
                keywordID:$keywordID,
                name: 'Negative',
                color:'#e85534',
                data: $buzzNeg,
                persentase:$buzzNegPercent
            }
        ];
        // console.log("content : ",$content);

        chartSentimentBar($id, $content, null, $buzzName);
    }else{
        chartSentimentBar($id, false, "No Data");
    }
}

function chartSentimentBar(id, dataSet, statmsg, cat) {
    if(dataSet === false){
        jQuery("#" + id).html("<div class='center'>"+statmsg+"</div>");
    }else{
        var oneElementHeight = 90;
        var dataLength = dataSet[0].data.length;
        var maxHeight = ((oneElementHeight * dataLength) + dataLength);
        if (dataLength < 5) {
            maxHeight = 500;
        }


        jQuery("#" + id).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: cat,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Buzz'
                }
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            legend: {
                reversed: true
            },
            series:dataSet
        });
    }
}*/
$.ajax({
    url : ajaxUrl + '/project/chart-data/sentiment-bar',
    //url : ajaxUrl + "/mediawave/jsontest/column-sentiment.json",
    beforeSend : function(xhr) {
        $('#sentimentbar').block({
            message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
            css: { border: 'none', zIndex: 100 },
            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
        });

    },
    complete : function(xhr, status) {
        $('#sentimentbar').unblock();
    },
    success : function(result) {
        sentimentBar('sentimentbar', jQuery.parseJSON(result));
    }

});

function sentimentBar($id, $data) {
    //$data = $data['sentiment'];
    $data = $data.data;
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No Data</div>");
    } else {
        var $content = [];
        for (var i = 0; i < $data.length; i++) {
            $sentiment = $data[i].name;
            $keyword = $data[i].data[0][0];
            $buzz = $data[i].data[0][1];
            //$color = $data[i].color;
            $content[i] = {data: [[$keyword, $buzz]], name: $sentiment};
        }
        sentimentBarOptions($id, $content);
    }
}

function sentimentBarOptions(id, dataSet, cat) {
    jQuery("#" + id).highcharts({
        chart: {
            //renderTo: id,
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
            pointFormat: 'Sentiment: <b>{point.y}</b>'
        },
        xAxis: {
            type: "category"
        },
        yAxis: {
            title: {
                text: null
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false
                }
            }
        },
        legend: {
            y: 15,
            backgroundColor: '#eeeeee',
            padding: 10,
            itemMarginTop: 0,
            itemMarginBottom: 5,
            itemDistance: 10,
            itemStyle: {
                fontWeight: 'normal'
            }
        },
        /*series: [{
            name: 'Buzz',
            colorByPoint: true,
            data: dataSet
            //data: [{
            //    name: 'Indomilk',
            //    y: 4033
            //}, {
            //    name: 'Frisian Flag',
            //    y: 3003,
            //}, {
            //    name: 'Dancow',
            //    y: 1538
            //}, {
            //    name: 'Milo',
            //    y: 777
            //}]
        }]*/
        series:dataSet
    });
}
