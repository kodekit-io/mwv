$('#table_blog').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-blog',
        //"url": ajaxUrl + "/mediawave/jsontest/convo-blog.json",
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
            "title": "Blog",
            "render": function ( data ) {
                var page = data["Author"];
                var link = data["Author Url"];
                return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+page+'" class="uk-link">'+page+'</a>';
            }
        },
        {
            "data": null,
            "title": "Title",
            "render": function ( data ) {
                var post = data["Title"];
                var postrim = post.substring(0,100) + "...";
                var plink = data["Url"];
                return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
            }
        },
        { "data": "Summary", "title": "Summary", },
        {
            "data": "Sentiment",
            "title": "",
            "orderable": false,
            "createdCell": function (td, cellData, rowData, row, col) {
                switch (cellData) {
                    case 'positive':
                    case 'Positif':
                    case 'positif':
                        $(td).css('color', 'green');
                        break;
                    case 'neutral':
                    case 'Netral':
                    case 'netral':
                        $(td).css('color', 'grey');
                        break;
                    case 'negative':
                    case 'Negatif':
                    case 'negatif':
                        $(td).css('color', 'red');
                        break;
                }
            }
        },
    ],
    "order": [[ 0, "desc" ]],
    "initComplete": function () {
        this.api().columns().every( function () {
            var column = this;
            if(column[0][0] == 4) {
                var select = $('<select class="browser-default uk-width-1-1 select-sentiment"><option value="">All Sentiment</option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
            }
        });
    },
});
