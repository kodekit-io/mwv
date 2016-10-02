function shareofmedia($id, $data) {
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
            //$buzz = $data[i].buzz;
            //$percentage = $data[i].percentage;
            //$keywordID = $data[i].keywordID;
            //$keywordName = $data[i].keywordName;
            $buzz = $data[i].data[i].buzz;
            $percentage = $data[i].data[i].percentage;
            $keywordID = $data[i].data[i].keywordID;
            $keywordName = $data[i].data[i].keywordName;
            $mediaName = $data[i].mediaName;
            $content[i] = {
                 name: [$mediaName],
                 data: [$keywordName,$buzz],
                 color: getColor[$mediaName]
            };

        }

        console.log($content);
        chartshareofmedia($content, $id);

    }
}
function chartshareofmedia(dataSet, id) {

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
            type: "category"
            //categories: ['Twitter', 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false
                }
            }
        },
        /*
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
        */
        series: dataSet
    });
}
