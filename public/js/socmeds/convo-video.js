$(document).ready( function () {
    var table_video = $('#table_video').DataTable( {
        "ajax": {
            "url": ajaxUrl + '/project/chart-data/convo-video/' + type,
            //"url": ajaxUrl + "/mediawave/jsontest/convo-video.json",
            "data" : data
        },
        "columns": [
            {
                "data": null,
                "orderable": false,
            },
            {
                "data": null,
                "title": "Date",
                "render": function ( data ) {
                    var date = data["Date"];
                    var now = new Date();
                    var offset = now.getTimezoneOffset() / 60;
                    var newdate = new Date(date);
                    var timezoneDif = offset * 60 + newdate.getTimezoneOffset();
                    var localtime = newdate; //new Date(newdate.getTime() + timezoneDif * 60 * 1000);

                    return localtime;
                }
            },
            {
                "data": null,
                "title": "Video",
                "render": function ( data ) {
                    var post = data["Title"];
                    var postrim = post.substring(0,100) + "...";
                    var plink = data["Url"];
                    return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
                }
            },
            {
                "data": null,
                "title": "Summary",
                "render": function ( data ) {
                    var post = data["Summary"];
                    return post;
                }
            },
            { "data": "view", "title": "View", "render": $.fn.dataTable.render.number( '\.', '', 0, '' )},
            { "data": "Comments", "title": "Comments", "render": $.fn.dataTable.render.number( '\.', '', 0, '' )}
        ],
        "order": [[ 1, "desc" ]]
    });
    table_video.on( 'order.dt search.dt', function () {
        table_video.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    table_video.columns.adjust().draw();
});