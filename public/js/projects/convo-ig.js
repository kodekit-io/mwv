/*
"Date": "13 Sep 2016 15:01:43",
		"Author": "airasiaindonesia",
		"Post": "Nimati Wisata Musim Dingin di tokyo, beli untuk awal tahun mulai dari Rp.2jtan di www.airasia.com #DestinAsyik #flywithairasia",
		"Likes": 1256,
		"Comments": 31,
		"Potential Reach": 138794,
		"Post Url": "https://www.instagram.com/p/BKSeWWajuvD/",
		"Image Url": "https://scontent-hkg3-1.cdninstagram.com/t51.2885-15/s750x750/sh0.08/e35/14269031_1606849206280020_1808474762_n.jpg?ig_cache_key=MTMzODI2NTUxNjU3NDE3NDE0Nw%3D%3D.2"
*/
$('#table_ig').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-ig',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-ig.json",
        "data": {
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
