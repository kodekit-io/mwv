$('#table_author').DataTable( {
    "order": [[ 0, "desc" ]]
});
$('#table_twitter').DataTable( {
    //"processing": true,
    //"serverSide": true,
    //"searching": false,
    //"info": false,
    "ajax": {
        "url": ajaxUrl + '/project/chart-data/convo-twitter',
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
        "targets": [0, 8]
    }],
});