$('#table_video').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-video',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-video.json",
        "data" : {
            "projectId": projectId,
            "keywords": brands,
            "startDate": startDate,
            "endDate": endDate
        }
    },
    "columns": [
        { "data": "Date" },
        //{ "data": "Author" },
        {
            "data": null,
            "render": function ( data ) {
                var page = data["Author"];
                var link = data["Author Url"];
                return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+page+'" class="uk-link">'+page+'</a>';
            }
        },
        //{ "data": "Post" },
        {
            "data": null,
            "render": function ( data ) {
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Post Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Likes" },
        { "data": "Comments" },
        { "data": "View" },
        { "data": "Author Url" },
        { "data": "Post Url" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [6,7]
    }],
    "order": [[ 0, "desc" ]]
});
