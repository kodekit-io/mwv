$('#table_blog').DataTable( {
    "ajax": {
        //"url": ajaxUrl + '/project/chart-data/convo-blog',
        "url": ajaxUrl + "/mediawave/jsontest/convo-blog.json",
        "data": {
            "project_id": projectId
            //"start_date": '{!! $startDate !!}',
            //"end_date": '{!! $endDate !!}'
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
                var post = data["Title"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Summary" },
        { "data": "Author Url" },
        { "data": "Url" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [4,5]
    }],
    "order": [[ 0, "desc" ]]
});
