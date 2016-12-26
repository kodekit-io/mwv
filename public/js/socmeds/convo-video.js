$('#table_video').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-video',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-video.json",
        "data" : data
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
        {
            "data": null,
            "title": "Author",
            "render": function ( data ) {
                var page = data["Author"];
                var link = data["Author Url"];
                return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+page+'" class="uk-link">'+page+'</a>';
            }
        },
        {
            "data": null,
            "title": "Post",
            "render": function ( data ) {
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Post Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Likes", "title": "Likes", "render": $.fn.dataTable.render.number( '\.', '', 0, '' )},
        { "data": "Comments", "title": "Comments", "render": $.fn.dataTable.render.number( '\.', '', 0, '' )},
        { "data": "View", "title": "View", "render": $.fn.dataTable.render.number( '\.', '', 0, '' )}
    ],
    "order": [[ 0, "desc" ]]
});
