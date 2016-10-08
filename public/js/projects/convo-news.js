$('#table_news').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-news',
        "data": {
            "project_id": projectId
            //"start_date": '{!! $startDate !!}',
            //"end_date": '{!! $endDate !!}'
        }
    },
    "columns": [
        { "data": "Date" },
        { "data": "Media" },
        { "data": "Title" },
        { "data": "Url" },
        { "data": "Comments" },
        { "data": "Summary" },
        { "data": "Sentiment" },
        { "data": "Reach" },
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [0, 3]
    }]
});