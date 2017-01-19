$(document).ready( function () {
    var table_ig = $('#table_ig').DataTable( {
        "ajax": {
            "url": ajaxUrl + '/project/chart-data/convo-ig',
            //"url": ajaxUrl + "/mediawave/jsontest/convo-ig.json",
            "data": data
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
                    var localtime = new Date(newdate.getTime() + timezoneDif * 60 * 1000);

                    return localtime;
                }
            },
            {
                "data": null,
                "title": "Author",
                "render": function ( data ) {
                    var user = data["Author"];
                    return '<a href="https://www.instagram.com/'+user+'" target="_blank" data-uk-tooltip title="'+user+'" class="uk-link">'+user+'</a>';
                }
            },
            {
                "data": null,
                "title": "Post",
                "render": function ( data ) {
                    var post = data["Post"];
                    var postrim = post.substring(0,100) + "...";
                    var plink = data["Url"];
                    return '<a href="'+plink+'" target="_blank" data-uk-tooltip="{pos:\'top-left\'}" title="'+post+'">'+postrim+'</a>';
                }
            },
            { "data": "Likes", "title": "Likes" },
            { "data": "Comments", "title": "Comments" },
        ],
        "order": [[ 1, "desc" ]],
    });
    table_ig.on( 'order.dt search.dt', function () {
        table_ig.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    table_ig.columns.adjust().draw();
});