$(document).ready( function () {
    var table_twitter = $('#table_twitter').DataTable( {
        //"processing": true,
        //"serverSide": true,
        //"searching": false,
        //"info": false,
        "ajax": {
            "url": ajaxUrl + '/project/chart-data/convo-twitter',
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
                    var localtime = new Date(newdate.getTime() + timezoneDif * 60 * 1000);

                    return localtime;
                }
            },
            {
                "data": null,
                "title": "Author",
                "render": function ( data ) {
                    var user = data["Author"];
                    return '<a href="https://twitter.com/'+user+'" target="_blank" data-uk-tooltip title="'+user+'" class="uk-link">'+user+'</a>';
                }
            },
            {
                "data": null,
                "title": "Post",
                "render": function ( data ) {
                    var post = data["Post"];
                    var postrim = post.substring(0,100) + "...";
                    var link = data["Link"];
                    return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
                }
            },
            {
                "data": "Original Reach",
                "title": "Original Reach",
                "render": $.fn.dataTable.render.number( '\.', '', 0, '' )
            },
            {
                "data": "Viral Reach",
                "title": "Viral Reach",
                "render": $.fn.dataTable.render.number( '\.', '', 0, '' )
            },
            {
                "data": "Interactions",
                "title": "Interactions",
                "render": $.fn.dataTable.render.number( '\.', '', 0, '' )
            },
            {
                "data": "Viral Score",
                "title": "Viral Score",
                "render": $.fn.dataTable.render.number( '\.', '', 0, '' )
            },
            {
                "data": "sentiment",
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
                if(column[0][0] == 8) {
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

    table_twitter.on( 'order.dt search.dt', function () {
        table_twitter.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    table_twitter.columns.adjust().draw();
});