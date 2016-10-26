function influencerTable($id,$url) {

	$.ajax({
		//url : ajaxUrl + '/project/chart-data/comment-pie/' + mediaId,
		url : $url,
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
			$data = result.influencer.top10LikeStatus.data;
			//console.log($data);
			if ($data.length === 0) {
				$('#' + $id).html("<div class='center'>No data chart</div>");
			} else {
				for (i = 0; i < $data.length; i++) {
					$name= $data[i].name;
					$score= $data[i].score;
					$value= $data[i].value;
					$link= $data[i].link;
					$content[i] = [ $name, $score, $value, $link ];
				}
				//console.log( $content );
				var data = $content;
				$('#' + $id).DataTable( {
				    processing: true,
				    paging: false,
				    searching: false,
				    info: false,
					data: data,
					columns: [
			            { title: "Name" },
			            { title: "Score" },
			            { title: "Value" },
			            //{ title: "Link" },
						{
				            data: null,
				            render: function ( data ) {
				                var postlink = data[3];
				                return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
				            }
				        },
			        ],
					/*columnDefs: [{
				        visible: false,
				        targets: [3]
				    }],*/
				    order: [[ 1, "desc" ]]
				});
				$('#' + $id + '_wrapper .bottom-row').hide();
			}
		}
	});
}
