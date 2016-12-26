influencerTable(influencers);
function influencerTable(influencers) {
	$.ajax({
        url : ajaxUrl + '/project/chart-data/influencer/' + mediaId + '/' + type,
        data : data,
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
                    window[$id]($id, result);
                }
            }
		}
	});
}

function top10LikeStatus(id,result) {
	$data = result.influencer.top10LikeStatus.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $score, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
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
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10ByReachTW(id,result) {
	$data = result.influencer.top10ByReach.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $score, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Score", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
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
		// $('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10ByNumberTW(id,result) {
	$data = result.influencer.top10ByNumber.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $score, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Score", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
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
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10ByImpactTW(id,result) {
	$data = result.influencer.top10ByImpact.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $score, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Score", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
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
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10News(id,result) {
	$data = result.influencer.top10LikeStatus.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$popularity= $data[i].popularity;
			$content[i] = [ $name, $score, $value, $popularity, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Media", },
				{ title: "Score", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Popularity", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 2, "desc" ]]
		});
		//$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10Blog(id,result) {
	$data = result.influencer.top10LikeStatus.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$popularity= $data[i].popularity;
			$content[i] = [ $name, $score, $value, $popularity, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Blog", },
				{ title: "Score", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Popularity", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
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

function topLikeVid(id,result) {
	$data = result.influencer.video_like.data;

	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$author= $data[i].author;
			$content[i] = [ $author, $name, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Author" },
				{ title: "Title" },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[3];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Video</a>';
					}
				},
			],
			order: [[ 2, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}
function topRateVid(id,result) {
	$data = result.influencer.video_rating.data;

	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$author= $data[i].author;
			$content[i] = [ $author, $name, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Author" },
				{ title: "Title" },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[3];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Video</a>';
					}
				},
			],
			order: [[ 2, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10Forum(id,result) {
	$data = result.influencer.top10LikeStatus.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$popularity= $data[i].popularity;
			$content[i] = [ $name, $score, $value, $popularity, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Forum", },
				{ title: "Score", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{ title: "Popularity", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
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

function topCommentIG(id,result) {
	$data = result.influencer['top Comment'].data;

	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[2];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 0, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}
function topLoveIG(id,result) {
	$data = result.influencer['top Love'].data;

	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[2];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 0, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}
function topViewIG(id,result) {
	$data = result.influencer['top View'].data;

	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$name= $data[i].name;
			$score= $data[i].score;
			$value= $data[i].value;
			$link= $data[i].link;
			$content[i] = [ $name, $value, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: true,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Name" },
				{ title: "Value", "render": $.fn.dataTable.render.number( '\.', '', 0, '' ) },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[2];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			order: [[ 0, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
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
		//console.log( $content );

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