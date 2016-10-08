$('#table_forum').DataTable( {
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-forum',
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
        { "data": "Original Reach" },
        { "data": "Viral Reach" },
        { "data": "Interactions" },
        { "data": "Viral Score" },
        { "data": "Sentiment" },
        { "data": "Link" },
        {
            "data": null,
            "defaultContent": "",
            "className": "namaclass",
            "orderable": false
        }
    ],
    "columnDefs": [{
        "visible": false,
        "targets": [0, 4, 5]
    }]
});