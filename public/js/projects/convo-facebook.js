$(document).ready( function () {
    var table_facebook = $('#table_facebook').DataTable( {
        "ajax": {
            "url": ajaxUrl + '/project/chart-data/convo-facebook',
            //"url": ajaxUrl + "/mediawave/jsontest/convo-fb.json",
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
            { "data": "Author", "title": "Author", },
            {
                "data": null,
                "title": "Post",
                "render": function ( data ) {
                    var post = data["Post"];
                    var postrim = post.substring(0,100) + "...";
                    var plink = data["Link"];
                    return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
                }
            },
            { "data": "Comments", "title": "Comments", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
            { "data": "Likes", "title": "Likes", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
            { "data": "Shares", "title": "Shares", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
            { "data": "Media Type", "title": "Media Type", },
            { "data": "Link", visible: false },
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
        "order": [[ 1, "desc" ]],
        "initComplete": function () {
            this.api().columns().every( function () {
                var column = this;
                if(column[0][0] == 9) {
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
    table_facebook.on( 'order.dt search.dt', function () {
        table_facebook.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    table_facebook.columns.adjust().draw();
});