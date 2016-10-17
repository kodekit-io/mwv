
var table_twitter = $('#table_twitter').DataTable( {
    //"processing": true,
    //"serverSide": true,
    //"searching": false,
    //"info": false,
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-twitter',
        "data" : {
            "projectId": projectId,
            "keywords": brands,
            "startDate": startDate,
            "endDate": endDate
        },
    },
    "columns": [
        { "data": "Date" },
        //{ "data": "Author" },
        {
            "data": null,
            "render": function ( data ) {
                var user = data["Author"];
                return '<a href="https://twitter.com/'+user+'" target="_blank" data-uk-tooltip title="'+user+'" class="uk-link">'+user+'</a>';
            }
        },
        //{ "data": "Post" },
        {
            "data": null,
            "render": function ( data ) {
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var link = data["Link"];
                return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Original Reach" },
        { "data": "Viral Reach" },
        { "data": "Interactions" },
        { "data": "Viral Score" },
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
        { "data": "Link" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [3, 6, 8]
    }],
    "order": [[ 0, "desc" ]]
});
