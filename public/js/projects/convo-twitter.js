var table_twitter = $('#table_twitter').DataTable( {
    //"processing": true,
    //"serverSide": true,
    //"searching": false,
    //"info": false,
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-twitter',
        "data" : {
            "projectId": projectId,
            "mediaId": mediaId,
            "keywords": brands,
            "startDate": startDate,
            "endDate": endDate,
            "search": search
        }
    },
    "columns": [
        {
            "data": null,
            "title": "Date",
            "render": function ( data ) {
                var date = data["Date"];
                var now = new Date();
                var offset = now.getTimezoneOffset() / 60;
                var newdate = new Date(date);
                var timezoneDif = offset * 60 + newdate.getTimezoneOffset();
                var localtime = new Date(newdate.getTime() + timezoneDif * 60 * 1000);

                return localtime;
            }
        },
        { "data": "Author", "title": "Author" },
        //{
        //    "data": null,
        //    "render": function ( data ) {
        //        var user = data["Author"];
        //        return '<a href="https://twitter.com/'+user+'" target="_blank" data-uk-tooltip title="'+user+'" class="uk-link">'+user+'</a>';
        //    }
        //},
        //{ "data": "Post" },
        {
            "data": null,
            "title": "Post",
            "render": function ( data ) {
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var link = data["Link"];
                return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Original Reach", "title": "Original Reach" },
        { "data": "Viral Reach", "title": "Viral Reach" },
        { "data": "Interactions", "title": "Interactions" },
        { "data": "Viral Score", "title": "Viral Score" },
        //{ "data": "Sentiment" },
        {
            "data": null,
            "title": "Sentiment",
            "render": function ( data ) {
                var sentiment = data["Sentiment"];
                var c = "";
				switch (sentiment) {
                    case 'positive':
					case 'Positif':
					case 'positif':
                        c = 'teal white-text uk-button uk-button-mini';
                        break;
                    case 'neutral':
					case 'Netral':
					case 'netral':
                        c = 'blue-grey lighten-3 white-text uk-button uk-button-mini';
                        break;
                    case 'negative':
					case 'Negatif':
					case 'negatif':
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
