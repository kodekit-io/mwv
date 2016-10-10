$('#table_facebook').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-facebook',
        "data": {
            "project_id": projectId
            //"start_date": '{!! $startDate !!}',
            //"end_date": '{!! $endDate !!}'
        }
    },
    "columns": [
        { "data": "Author" },
        { "data": "Post" },
        { "data": "Comments" },
        { "data": "Likes" },
        { "data": "Shares" },
        { "data": "Media Type" },
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
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [0, 4, 5]
    }]
});