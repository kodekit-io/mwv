$('#table_news').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-news',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-news.json",
        "data": {
            "project_id": projectId
            //"start_date": '{!! $startDate !!}',
            //"end_date": '{!! $endDate !!}'
        }
    },
    "columns": [
        { "data": "Date" },
        //{ "data": "Media" },
        {
            "data": null,
            "render": function ( data ) {
                var media = data["Media"];
                var mlink = data["Media Url"];
                return '<a href="'+mlink+'" target="_blank" data-uk-tooltip title="'+media+'" class="uk-link">'+media+'</a>';
            }
        },
        //{ "data": "Title" },
        {
            "data": null,
            "render": function ( data ) {
                var post = data["Title"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Summary" },
        { "data": "Comments" },
        { "data": "Reach" },
        //{ "data": "Sentiment" },
        {
            "data": null,
            "render": function ( data ) {
                var sentiment = data["Sentiment"];
                //var c = "";
                switch (sentiment) {
                    case 'positive':
                        c = 'teal white-text uk-button uk-button-mini';
                        break;
                    case 'neutral':
                        c = 'blue-grey lighten-3 white-text uk-button uk-button-mini';
                        break;
                    case 'negative':
                        c = 'red white-text uk-button uk-button-mini';
                        break;
                }
                return '<span class="'+c+'">'+sentiment+'</span>';
            }
        },
        { "data": "Media Url" },
        { "data": "Url" },
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [7, 8]
    }],
    "order": [[ 0, "desc" ]]
});
