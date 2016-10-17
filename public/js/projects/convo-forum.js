$('#table_forum').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-forum',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-forum.json",
        "data": {
            "project_id": projectId
            //"start_date": '{!! $startDate !!}',
            //"end_date": '{!! $endDate !!}'
        }
    },
    "columns": [
        { "data": "Date" },
        { "data": "Forum" },
        { "data": "Thread Starter" },
        //{ "data": "Thread Title" },
        {
            "data": null,
            "render": function ( data ) {
                var post = data["Thread Title"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Replies" },
        //{ "data": "Sentiment" },
        {
            "data": null,
            "render": function ( data ) {
                var sentiment = data["Sentiment"];
                //var c = "";
				switch (sentiment) {
                    case 'positive':
					case 'Positif':
                        c = 'teal white-text uk-button uk-button-mini';
                        break;
                    case 'neutral':
					case 'Netral':
                        c = 'blue-grey lighten-3 white-text uk-button uk-button-mini';
                        break;
                    case 'negative':
					case 'Negatif':
                        c = 'red white-text uk-button uk-button-mini';
                        break;
                }
                return '<span class="'+c+'">'+sentiment+'</span>';
            }
        },
        { "data": "Url" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [6]
    }],
    "order": [[ 0, "desc" ]]
});
