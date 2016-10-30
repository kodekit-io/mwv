$('#table_ig').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-ig',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-ig.json",
        "data": {
            //"project_id": projectId
            "keywords": brands,
            "start_date": '{!! $startDate !!}',
            "end_date": '{!! $endDate !!}'
        }
    },
    "columns": [
        { "data": "Date" },
        //{ "data": "Author" },
        {
            "data": null,
            "render": function ( data ) {
                var user = data["Author"];
                return '<a href="https://www.instagram.com/'+user+'" target="_blank" data-uk-tooltip title="'+user+'" class="uk-link">'+user+'</a>';
            }
        },
        //{ "data": "Post" },
        {
            "data": null,
            "render": function ( data ) {
                var w = $(".ig-img").width();
                $(".ig-img").css("height", w);
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Post Url"];
                var img = data["Image Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip="{pos:\'top-left\'}" title="'+postrim+'" class="row"><span class="col s3 ig-img uk-responsive-width" style="background-image:url('+img+')"></span><span class="col s9 uk-link">'+post+'</span></a>';
            }
        },
        { "data": "Likes" },
        { "data": "Comments" },
        { "data": "Potential Reach" },
        { "data": "Post Url" },
        { "data": "Image Url" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [6,7]
    }],
    "order": [[ 0, "desc" ]]
});
