$(function() {
    //$('select').material_select();
    $("#reportKeyword").chained("#reportProject");

    function chartSelector(x,y,divID) {
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
                $data = result.chartlist[x].media;
				//$data = result.chartlist[1].media;

				if ($data.length === 0) {
					$('#' + divID).html("<div class='center'>No data chart</div>");
				} else {
                    $media = [];
                    $charts = [];

					for (i = 0; i < $data.length; i++) {
                        $mediaId = $data[y].mediaId;
                        $mediaName = $data[y].mediaName;
                        $mediaActive = $data[y].mediaActive;
                        $mediaChart = $data[y].mediaChart;

                        $media[i] = {id:$mediaId,name:$mediaName,active:$mediaActive};
					}
                    for (i = 0; i < $mediaChart.length; i++) {
                        $chartId = $mediaChart[i].chartId;
                        $chartName = $mediaChart[i].chartName;
                        $chartActive = $mediaChart[i].chartActive;

                        $charts[i] = {id:$chartId,name:$chartName,active:$chartActive};

                        //list ceklist chart
                        var list = '<div class="hehelist"> \
                            <input type="checkbox" name="'+$media[y].name+''+$charts[i].id+'" id="'+$media[y].name+''+$charts[i].id+'" class="filled-in checkSingle" /> \
                            <label for="'+$media[y].name+''+$charts[i].id+'" class="black-text">'+$charts[i].name+'</label> \
                        </div>';

                        if ($charts[i].active=='true') {
                            $('#listChart0'+$media[y].id).append(list);
                        }

                        //list media/page
                        var selection = '<div class="md-card z-depth-0"> \
                            <div class="md-card-toolbar"> \
                                <h2 class="md-card-toolbar-heading-text">'+$media[y].name+'</h2> \
                            </div> \
                            <div class="md-card-content"> \
                                <div id="listChart0'+$media[y].id+'" class="uk-grid uk-grid-collapse uk-grid-width-1-5 uk-grid-match"  data-uk-grid-margin> \
                                    <div> \
                                        <input type="checkbox" name="all'+$media[y].name+'" id="all'+$media[y].name+'" class="filled-in checkedAll" /> \
                                        <label for="all'+$media[y].name+'" class="black-text">Select All</label> \
                                    </div> \
                                <div> \
                            </div> \
                        </div>';
                        $('#' + divID).append(selection);
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
			}
		});
    }

    chartSelector(0,0,"pFB");
    /*chartSelector(0,1,"pTW");
    chartSelector(0,2,"pBL");
    chartSelector(0,3,"pNW");
    chartSelector(0,4,"pVD");
    chartSelector(0,5,"pFR");
    chartSelector(0,6,"pIG");*/

    /*chartSelector(1,0,"sFB");
    chartSelector(1,1,"sTW");
    chartSelector(1,4,"sVD");*/
    chartSelector(1,6,"sIG");

});
