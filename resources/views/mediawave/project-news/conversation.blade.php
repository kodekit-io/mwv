<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#conv'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">ONLINE NEWS</h2>
        </div>
        <div id="conv" class="md-card-content conv-wrap">
			<?php //NEWS TABLE ?>
			<table id="table_news" class="striped bordered highlight responsive-table">
				<thead>
				<tr>
					<th>Date</th>
					<th>Media</th>
					<th>Title</th>
					<th>Summary</th>
					<th>Comments</th>
					<th>Reach</th>
					<th>Sentiment</th>
					<th>Media Url</th>
					<th>Url</th>
				</tr>
				</thead>
			</table>
        </div>
    </div>

</li>
