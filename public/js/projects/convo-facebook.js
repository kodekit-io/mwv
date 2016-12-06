$(document).ready( function () {
    var table_facebook = $('#table_facebook').DataTable( {
        "ajax": {
            "url": ajaxUrl + '/project/chart-data/convo-facebook',
            //"url": ajaxUrl + "/mediawave/jsontest/convo-fb.json",
            "data" : {
                "projectId": projectId,
                "keywords": brands,
                "startDate": startDate,
                "endDate": endDate,
                "search": search
            }
        },
        "columns": [
            //{ "data": "Date" },
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
            { "data": "Author" },
            //{
            //    "data": null,
            //    "render": function ( data ) {
            //        var page = data["Author"];
            //        var link = data["Author Link"];
            //        return '<a href="'+link+'" target="_blank" data-uk-tooltip title="'+page+'" class="uk-link">'+page+'</a>';
            //    }
            //},
            //{ "data": "Post" },
            {
                "data": null,
                "render": function ( data ) {
                    var post = data["Post"];
                    var postrim = post.substring(0,100) + "...";
                    var plink = data["Post Link"];
                    return '<a href="'+plink+'" target="_blank" data-uk-tooltip title="'+post+'" class="uk-link">'+postrim+'</a>';
                }
            },
            { "data": "Comments" },
            { "data": "Likes" },
            { "data": "Shares" },
            { "data": "Media Type" },
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
            //{ "data": "Author Link" },
            { "data": "Post Link" }
        ],
        "columnDefs": [{
            "visible": false,
            "targets": [8]
        }],
        "order": [[ 0, "desc" ]],
        "initComplete": function () {
            this.api().columns().every( function () {
                var column = this;
                if(column[0][0] == 7) {
                    var select = $('<select class="browser-default uk-width-1-1"><option value="">All</option></select>')
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
});