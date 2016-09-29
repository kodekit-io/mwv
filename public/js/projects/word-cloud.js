function wordCloud($id, $data) {
    if ($data.length === 0) {
        $('#' + $id).html("<div class='center'>No data chart</div>");
    } else {
        var words = [];
        for (i = 0; i < $data.length; i++) {
            words[i] = {text: $data[i].tag, weight: $data[i].buzz};
        }

        // console.log(words);

        $('#' + $id).jQCloud(words, {
            autoResize: true,
            //shape: 'rectangular'
        });
    }

}

