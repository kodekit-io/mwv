$('#table_ig').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-ig',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-ig.json",
        "data": {
            "projectId": projectId,
            "keywords": brands,
            "startDate": startDate,
            "endDate": endDate,
            "search": search
        }
    },
    "columns": [
        //{ "data": "Date", "title": "Date" },
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
        //{ "data": "Author" },
        {
            "data": null,
            "title": "Author",
            "render": function ( data ) {
                var user = data["Author"];
                return '<a href="https://www.instagram.com/'+user+'" target="_blank" data-uk-tooltip title="'+user+'" class="uk-link">'+user+'</a>';
            }
        },
        //{ "data": "Post" },
        {
            "data": null,
            "title": "Post",
            "render": function ( data ) {
                var w = $(".ig-img").width();
                $(".ig-img").css("height", w);
                var post = data["Post"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Post Url"];
                var img = data["Image Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip="{pos:\'top-left\'}" title="'+postrim+'" class="row"><span class="col s3 ig-img uk-responsive-width" style="background-image:url('+img+');min-height:100px;"></span><span class="col s9 uk-link">'+post+'</span></a>';
            }
        },
        { "data": "Likes", "title": "Likes" },
        { "data": "Comments", "title": "Comments" },
        { "data": "Potential Reach", "title": "Potential Reach" },
        { "data": "Post Url" },
        { "data": "Image Url" }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [6,7]
    }],
    "order": [[ 0, "desc" ]]
});
