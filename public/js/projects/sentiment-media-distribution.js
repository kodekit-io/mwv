function sentimentMediaDistribution($id, $data) {
    // console.log($data);
    var $buzzName = [];
    var $buzzPos = [];
    var $buzzNet = [];
    var $buzzNeg = [];
    var $buzzPercent = [];

    var $mediaName = "";
    var $pos = 0;
    var $net = 0;
    var $neg = 0;

    var $posPercent,$netPercent,$negPercent;

    if($data.length > 0){
        for(var i=0; i < $data.length; i++){
            $mediaName = $data[i].mediaName;
            $pos = $data[i].positive.buzz;
            // $posPercent = $data[i].sentimentData.positif.percentage;

            $net = $data[i].neutral.buzz;
            // $netPercent = $data[i].sentimentData.netral.percentage;

            $neg = $data[i].negative.buzz;
            // $negPercent = $data[i].sentimentData.negatif.percentage;

            // $total = (parseInt($pos) + parseInt($net) + parseInt($neg));
            $total = ($pos + $net + $neg);

            $buzzName.push($mediaName);
            $buzzPos.push($pos);
            $buzzNet.push($net);
            $buzzNeg.push($neg);
        }
        $content = [
            {
                name: 'Positive',
                color:'#aacb36',
                data:$buzzPos
            },{
                name: 'Neutral',
                color:'#aaaaaa',
                data:$buzzNet
            },{
                name: 'Negative',
                color:'#e85534',
                data: $buzzNeg
            }
        ];
        //console.log($content);
        chartSentimentMedia($id, $content,null,$buzzName);
    }else{
        chartSentimentMedia($id, false,"No Data");
    }
}


function chartSentimentMedia(id, dataSet, statmsg, cat) {
    if(dataSet === false){
        jQuery("#" + id).html("<div class='center'>"+statmsg+"</div>");
    }else{
        jQuery("#" + id).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: null
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
                    text: 'Total Buzz',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: 'Buzz'
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series:dataSet
        });
    }
}
