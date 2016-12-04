$(function() {
    //$('select').material_select();
    $("#reportKeyword").chained("#reportProject");

    function chartSelector(x,divID) {
        // x -> 0 = Project, 1 = Socmed
        // y -> media/page apa? 0 = fb, 1 = twiter 2 = blog dst...
		$.ajax({
			url : 'mediawave/jsontest/chartlist.json',
			beforeSend : function(xhr) {
				$('#' + divID).hide();
			},
			complete : function(xhr, status) {
				$('#' + divID).show();
			},
			success : function(result) {
                console.log(result);
                $data = result.chartlist[x].media;
				//$data = result.chartlist[1].media;

				if ($data.length === 0) {
					$('#' + divID).html("<div class='center'>No data chart</div>");
				} else {
                    $media = [];
                    $charts = [];

					for (i = 0; i < $data.length; i++) {
                        $mediaId = $data[i].mediaId;
                        $mediaName = $data[i].mediaName;
                        $mediaActive = $data[i].mediaActive;
                        $mediaChart = $data[i].mediaChart;

                        //list media/page
                        if ($mediaActive == 'true') {
                            var selection = '<div class="md-card z-depth-0"> \
                            <div class="md-card-toolbar"> \
                                <h2 class="md-card-toolbar-heading-text">'+$mediaName+'</h2> \
                            </div> \
                            <div class="md-card-content"> \
                                    <ul id="listChart0'+$mediaId+'" class="uk-grid uk-grid-collapse uk-grid-width-1-5 uk-grid-match"  data-uk-grid-margin> \
                                        <li> \
                                        <input type="checkbox" name="all'+$mediaName+'" id="all'+$mediaName+'" class="filled-in checkedAll" /> \
                                        <label for="all'+$mediaName+'" class="black-text">Select All</label> \
                                        </li> \
                                    </ul> \
                            </div> \
                            </div>';
                            $('#' + divID).append(selection);

                            $media[i] = {id:$mediaId,name:$mediaName,active:$mediaActive};

                            for (y = 0; y < $mediaChart.length; y++) {
                                //list ceklist chart
                                var $mediaChartName = $mediaChart[y].chartName;
                                var $mediaChartId = $mediaChart[y].chartId;
                                var list = '<li> \
                            <input type="checkbox" name="'+$mediaId+''+$mediaChartId+'" id="'+$mediaId+''+$mediaChartId+'" class="filled-in checkSingle" /> \
                            <label for="'+$mediaId+''+$mediaChartId+'" class="black-text">'+$mediaChartName+'</label> \
                            </li>';

                                if ($mediaChart[y].chartActive=='true') {
                                    $('#listChart0'+$mediaId).append(list);
                                }
                            }

                        }
                    }
				}

                $(window).trigger("resize");

                $(".checkedAll").change(function() {
                    if (this.checked) {
                        $(this).closest("ul").find(".checkSingle").each(function() {
                            this.checked = true;
                        })
                    } else {
                        //$(".checkSingle").each(function() {
                        $(this).closest("ul").find(".checkSingle").each(function() {
                            this.checked = false;
                        })
                    }
                });

                $(".checkSingle").click(function() {
                    if ($(this).is(":checked")) {
                        var isAllChecked = 0;
                        $(this).closest("ul").find(".checkSingle").each(function() {
                            //$(".checkSingle").each(function() {
                            if (!this.checked)
                                isAllChecked = 1;
                        })
                        if (isAllChecked == 0) {
                            $(this).closest("ul").find(".checkedAll").prop("checked", true);
                        }
                    } else {
                        $(this).closest("ul").find(".checkedAll").prop("checked", false);
                    }
                });
			}
		});
    }

    chartSelector(0, "plist");
    chartSelector(1, "slist");

});
