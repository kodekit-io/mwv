$('#table_facebook').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-facebook',
        "data": {
            "project_id": projectId
            //"start_date": '{!! $startDate !!}',
            //"end_date": '{!! $endDate !!}'
        }
    },
    "columns": [
        { "data": "Date" },
        { "data": "Author" },
        { "data": "Post" },
        { "data": "Comments" },
        { "data": "Likes" },
        { "data": "Shares" },
        { "data": "Media Type" },
        { "data": "Sentiment" },
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [0, 4, 5]
    }]
});