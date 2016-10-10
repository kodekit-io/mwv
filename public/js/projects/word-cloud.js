function wordCloud($id, $data) {
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No data chart</div>");
    } else {
        var words = [];
        for (i = 0; i < $data.length; i++) {
            words[i] = {text: $data[i].tag, weight: $data[i].buzz};
        }

        $('#' + $id).jQCloud(words, {
            autoResize: true,
            fontSize: {
                from: 0.1,
                to: 0.01
            },
            //shape: 'rectangular'
        });
    }
}
$(document).ready(function() {
    $('.jqcloud').on('click','span',function(){
        $(this).hide();
    });
});
