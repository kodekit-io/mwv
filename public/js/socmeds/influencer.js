influencerTable(influencers);
function influencerTable(influencers) {
	$.ajax({
        url : ajaxUrl + '/project/chart-data/influencer/' + mediaId + '/' + type,
        data : {
            keywords: brands,
            startDate: startDate,
            endDate: endDate,
            search: search
        },
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

function top10LikeStatusFB(id,result) {
	$data = result.influencer.top10LikeStatus.data;
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
		$('#' + id + '_wrapper .bottom-row').hide();
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

function top10IG(id,result) {
	$data = result.influencer.top10LoveStatus.data;
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
			$content[i] = [ $name, $score, $value, $link, $url ];
		}
		//console.log( $content );
		$('#' + id).DataTable( {
			processing: true,
			paging: false,
			searching: false,
			info: false,
			data: $content,
			columns: [
				//{ title: "Name" },
				{
					data: null,
					title: "Name",
					render: function ( data ) {
						var n = data[0];
						var l = data[3];
						return '<a href="'+l+'" target="_blank" data-uk-tooltip title="'+n+'" class="uk-link">'+n+'</a>';
					}
				},
				{ title: "Score" },
				{ title: "Value" },
				{ title: "Link" },
				//{ title: "Url" },
				{
					data: null,
					render: function ( data ) {
						var postlink = data[4];
						return '<a href="'+postlink+'" target="_blank" data-uk-tooltip title="See Details" class="uk-button uk-button-primary">See Details</a>';
					}
				},
			],
			columnDefs: [{
				visible: false,
				targets: [3]
			}],
			order: [[ 0, "desc" ]]
		});
		$('#' + id + '_wrapper .bottom-row').hide();
	}
}
