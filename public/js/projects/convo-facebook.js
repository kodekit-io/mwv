$('#table_facebook').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-facebook',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-fb.json",
        "data" : {
            "projectId": projectId,
            "keywords": brands,
            "startDate": startDate,
            "endDate": endDate,
            "search": search
        }
    },
    "columns": [
        { "data": "Date" },
        { "data": "Author" },
        //{
        //    "data": null,
        //    "render": function ( data ) {
        //        var page = data["Author"];
        //        var link = data["Author Link"];
        //        return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+page+'" class="uk-link">'+page+'</a>';
        //    }
        //},
        //{ "data": "Post" },
        {
            "data": null,
            "render": function ( data ) {
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Post Link"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Comments" },
        { "data": "Likes" },
        { "data": "Shares" },
        { "data": "Media Type" },
        {
            "data": null,
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
        //{ "data": "Author Link" },
        { "data": "Post Link" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [8]
    }],
    "order": [[ 0, "desc" ]]
});
