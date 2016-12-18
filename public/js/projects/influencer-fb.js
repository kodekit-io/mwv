influencerTable(influencers);
function influencerTable(influencers) {
	$.ajax({
		url : ajaxUrl + '/project/chart-data/influencer/' + mediaId,
		//url : ajaxUrl + '/mediawave/jsontest/influencer-fb.json',
		beforeSend : function(xhr) {
            for(i = 0; i < influencers.length; i++) {
                // console.log(influencers[i]);
                var $id = influencers[i];
                $('#' + $id).block({
                    message: '<img src="' + ajaxUrl + '/mediawave/img/spinner.gif">',
                    css: { border: 'none', zIndex: 100 },
                    overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
                });
            }

		},
		complete : function(xhr, status) {
			//$('#' + $id).unblock();
            for(i = 0; i < influencers.length; i++) {
                // console.log(influencers[i]);
                var $id = influencers[i];
                $('#' + $id).unblock();
            }
		},
		success : function(result) {
            result = jQuery.parseJSON(result);
            if (influencers.length > 0) {
                for(var i = 0; i < influencers.length; i++) {
                    var $id = influencers[i];
					//console.log($id);
                    //window[$id]($id, result);
					if ($id == 'topStatusFB') {
						topStatusFB($id,result);
					} else if ($id == 'topLinkFB') {
						topLinkFB($id,result);
					} else if ($id == 'topPhotoFB') {
						topPhotoFB($id,result);
					} else if ($id == 'topVideoFB') {
						topVideoFB($id,result);
					}
                }
            }

		}
	});
}

function topStatusFB(id,result) {
	$data = result.influencer.status.data;
	$share = result.influencer.status.data.share;
	$comment = result.influencer.status.data.comment;
	$like = result.influencer.status.data.like;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $share.length; i++) {
			$shareName= $share[i].name;
			$shareValue= $share[i].value;
			$shareScore= $share[i].score;
			$shareLink= $share[i].link;

			$commentName= $comment[i].name;
			$commentValue= $comment[i].value;
			$commentScore= $comment[i].score;
			$commentLink= $comment[i].link;

			$likeName= $like[i].name;
			$likeValue= $like[i].value;
			$likeScore= $like[i].score;
			$likeLink= $like[i].link;

			$content[i] = [ $commentName, $commentValue, $likeValue, $shareValue, $shareLink ]

		}

		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Comment", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Like", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Share", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 1, "desc" ]]
		});
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function topLinkFB(id,result) {
	$data = result.influencer.link.data;
	$share = result.influencer.link.data.share;
	$comment = result.influencer.link.data.comment;
	$like = result.influencer.link.data.like;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $share.length; i++) {
			$shareName= $share[i].name;
			$shareValue= $share[i].value;
			$shareScore= $share[i].score;
			$shareLink= $share[i].link;

			$commentName= $comment[i].name;
			$commentValue= $comment[i].value;
			$commentScore= $comment[i].score;
			$commentLink= $comment[i].link;

			$likeName= $like[i].name;
			$likeValue= $like[i].value;
			$likeScore= $like[i].score;
			$likeLink= $like[i].link;

			$content[i] = [ $commentName, $commentValue, $likeValue, $shareValue, $shareLink ]

		}

		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Comment", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Like", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Share", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 1, "desc" ]]
		});
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function topPhotoFB(id,result) {
	$data = result.influencer.photo.data;
	$share = result.influencer.photo.data.share;
	$comment = result.influencer.photo.data.comment;
	$like = result.influencer.photo.data.like;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $share.length; i++) {
			$shareName= $share[i].name;
			$shareValue= $share[i].value;
			$shareScore= $share[i].score;
			$shareLink= $share[i].link;

			$commentName= $comment[i].name;
			$commentValue= $comment[i].value;
			$commentScore= $comment[i].score;
			$commentLink= $comment[i].link;

			$likeName= $like[i].name;
			$likeValue= $like[i].value;
			$likeScore= $like[i].score;
			$likeLink= $like[i].link;

			$content[i] = [ $commentName, $commentValue, $likeValue, $shareValue, $shareLink ]

		}

		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Comment", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Like", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Share", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 1, "desc" ]]
		});
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function topVideoFB(id,result) {
	$data = result.influencer.video.data;
	$share = result.influencer.video.data.share;
	$comment = result.influencer.video.data.comment;
	$like = result.influencer.video.data.like;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $share.length; i++) {
			$shareName= $share[i].name;
			$shareValue= $share[i].value;
			$shareScore= $share[i].score;
			$shareLink= $share[i].link;

			$commentName= $comment[i].name;
			$commentValue= $comment[i].value;
			$commentScore= $comment[i].score;
			$commentLink= $comment[i].link;

			$likeName= $like[i].name;
			$likeValue= $like[i].value;
			$likeScore= $like[i].score;
			$likeLink= $like[i].link;

			$content[i] = [ $commentName, $commentValue, $likeValue, $shareValue, $shareLink ]

		}
		console.log( $content );

		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Comment", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Like", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Share", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 1, "desc" ]]
		});
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}