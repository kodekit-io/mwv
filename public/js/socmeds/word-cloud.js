
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
        $('#' + $id).on('click','span',function(){
            $(this).hide();
            $('.unhide').removeClass('uk-hidden');
        });
        var unhide = '<a id="unhide" class="uk-button uk-button-mini uk-button-primary unhide uk-hidden">SHOW ALL</a>';
        $('#wordcloud').append(unhide);
        $('#unhide').click(function(){
            $('#'+$id+' span').show();
            $(this).addClass('uk-hidden');
        });
    }
}

wordCloudTemporary('wordcloud-container', ajaxUrl + '/project/chart-data/wordcloud/' + mediaId + '/' + type);
function wordCloudTemporary($id, $url) {

	$.ajax({
		//url : ajaxUrl + '/project/chart-data/comment-pie/' + mediaId,
		url : $url,
        data : {
            keywords: brands,
            startDate: startDate,
            endDate: endDate,
            search: search
        },
		beforeSend : function(xhr) {
			$('#' + $id).block({
				message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
				css: { border: 'none', zIndex: 100 },
				overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
			});
		},
		complete : function(xhr, status) {
			$('#' + $id).unblock();
		},
		success : function(result) {
            result = jQuery.parseJSON(result);
			$data = result.dataUnion;
			//console.log($data);
			if ($data.length === 0) {
				$('#' + $id).html("<div class='center'>No data chart</div>");
			} else {
				var words = [];
				for (i = 0; i < $data.length; i++) {
					words[i] = {text: $data[i].text, weight: $data[i].weight};
				}
				//console.log(words);

				$('#' + $id).jQCloud(words, {
					autoResize: true,
					fontSize: {
						from: 0.075,
						to: 0.01
					},
				});
                $('#' + $id).on('click','span',function(){
					$(this).hide();
                    $('.unhide').removeClass('uk-hidden');
				});
                var unhide = '<a id="unhide" class="uk-button uk-button-mini uk-button-primary unhide uk-hidden">SHOW ALL</a>';
                $('#wordcloud').append(unhide);
                $('#unhide').click(function(){
                    $('#'+$id+' span').show();
                    $(this).addClass('uk-hidden');
                });

			}
		}
	});
}
