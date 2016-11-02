
influencerTable(influencers);
function influencerTable(influencers) {
	$.ajax({
		url : ajaxUrl + '/project/chart-data/influencer/' + mediaId,
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
                    window[$id]($id, result);

                    //switch ($id) {
                    //	case 'top10LikeStatus':
                    //		top10LikeStatus($id,result);
                    //		break;
                    //	case 'top10LikeStatusFB':
                    //		top10LikeStatusFB($id,result);
                    //		break;
                    //	case 'top10LikePhotoFB':
                    //		top10LikePhotoFB($id,result);
                    //		break;
                    //	case 'top10LikeLinkFB':
                    //		top10LikeLinkFB($id,result);
                    //		break;
                    //	case 'top10LikeVideoFB':
                    //		top10LikeVideoFB($id,result);
                    //		break;
                    //	case 'top10ByReachTW':
                    //		top10ByReachTW($id,result);
                    //		break;
                    //	case 'top10ByNumberTW':
                    //		top10ByNumberTW($id,result);
                    //		break;
                    //	case 'top10ByImpactTW':
                    //		top10ByImpactTW($id,result);
                    //		break;
                    //	case 'top10News':
                    //		top10News($id,result);
                    //		break;
                    //	case 'top10Blog':
                    //		top10Blog($id,result);
                    //		break;
                    //	case 'top10Vid':
                    //		top10Vid($id,result);
                    //		break;
                    //	case 'top10Forum':
                    //		top10Forum($id,result);
                    //		break;
                    //	case 'top10IG':
                    //		top10IG($id,result);
                    //		break;
                    //}
                }
            }

		}
	});
}
function testAja(ii) {
    console.log('test aja ' + ii);
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

function top10LikeStatusFB(id,result) {
	$data = result.influencer.top10LikeStatus.data;
	console.log($data);
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

function top10LikePhotoFB(id,result) {
	$data = result.influencer.top10LikePhoto.data;
	console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$user= $data[i].user;
			$photo= $data[i].photo;
			$urloflike= $data[i].urloflike;
			$link= $data[i].link;
			$content[i] = [ $user, $photo, $urloflike, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "User" },
				{ title: "Foto" },
				{ title: "URL Like" },
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

function top10LikeLinkFB(id,result) {
	$data = result.influencer.top10LikeLink.data;
	console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$user= $data[i].user;
			$oflike= $data[i].oflike;
			$link= $data[i].link;
			$content[i] = [ $user, $oflike, $link ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "User" },
				{ title: "Like" },
				//{ title: "URL Like" },
				//{ title: "Link" },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[2];
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

function top10LikeVideoFB(id,result) {
	$data = result.influencer.top10LikeVideo.data;
	console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$user= $data[i].user;
			$oflike= $data[i].oflike;
			$link= $data[i].link;
			$videourl= $data[i].videourl;
			$content[i] = [ $user, $oflike, $link, $videourl ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "User" },
				{ title: "Like" },
				{ title: "Link" },
				//{ title: "Link" },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[3];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Video</a>';
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

function top10News(id,result) {
	$data = result.influencer.top10.data;
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
			$url= $data[i].url;
			$popularity= $data[i].popularity;
			$content[i] = [ $name, $score, $value, $link, $url, $popularity ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				//{ title: "Media" },
				{
					data: null,
					title: "Media",
					render: function ( data ) {
						var media = data[0];
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-link">'+media+'</a>';
					}
				},
				{ title: "Score" },
				{ title: "Value" },
				{
					data: null,
					title: "Popularity",
					render: function ( data ) {
						var p = data[5];
						return p;
					}
				},
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

function top10Blog(id,result) {
	$data = result.influencer.top10.data;
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
			$url= $data[i].url;
			$popularity= $data[i].popularity;
			$content[i] = [ $name, $score, $value, $link, $url, $popularity ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				//{ title: "Media" },
				{
					data: null,
					title: "Blog",
					render: function ( data ) {
						var media = data[0];
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-link">'+media+'</a>';
					}
				},
				{ title: "Score" },
				{ title: "Value" },
				{
					data: null,
					title: "Popularity",
					render: function ( data ) {
						var p = data[5];
						return p;
					}
				},
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

function top10Vid(id,result) {
	$data = result.influencer.top10ByRate.data;
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
			$url= $data[i].url;
			$content[i] = [ $name, $score, $value, $link, $author, $url ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				//{ title: "Media" },
				{
					data: null,
					title: "Author",
					render: function ( data ) {
						var a = data[4];
						var p = data[3];
						return '<a href="'+p+'" target="_blank" data-uk-tooltip title="See Details" class="uk-link">'+a+'</a>';
					}
				},
				{
					data: null,
					title: "Title",
					render: function ( data ) {
						var a = data[0];
						return a;
					}
				},
				{
					data: null,
					title: "Score",
					render: function ( data ) {
						var a = data[1];
						return a;
					}
				},
				{
					data: null,
					title: "Value",
					render: function ( data ) {
						var a = data[2];
						return a;
					}
				},
				{
					data: null,
					render: function ( data ) {
						var postlink = data[5];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Video</a>';
					}
				},
			],
			/*columnDefs: [{
				visible: false,
				targets: [3]
			}],*/
			order: [[ 2, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}

function top10Forum(id,result) {
	$data = result.influencer.top10.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$user= $data[i].user;
			$alexa= $data[i]['alexa(ID)'];
			$popularity= $data[i].popularity;
			$content[i] = [ $user, $alexa, $popularity ];
			//console.log( $alexa );
		}

		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "Forum" },
				{ title: "Rating" },
				{ title: "Popularity" },
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

function top10IG(id,result) {
	$data = result.influencer.top10.data;
	//console.log($data);
	if ($data.length === 0) {
		$('#' + id).html("<div class='center'>No data chart</div>");
	} else {
		var $content = [];
		for (i = 0; i < $data.length; i++) {
			$user= $data[i].user;
			$content[i] = [ $user ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				{ title: "IGer" },
			],
			/*columnDefs: [{
				visible: false,
				targets: [3]
			}],*/
			order: [[ 0, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}
