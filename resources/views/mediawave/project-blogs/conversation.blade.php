<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#influencer ul'}">
                    <li class="uk-active"><a>TOP 10 BLOG</a></li>
                </ul>
            </div>
        </div>
        <div id="authorwrap" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <ul class="uk-switcher">
                <li>
                    <table id="top10Blog" class="striped bordered highlight responsive-table"></table>
                </li>
            </ul>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">BLOG POSTS</h2>
        </div>
        <div id="convwrap" class="md-card-content conv-wrap">
			<?php //BLOG TABLE ?>
			<table id="table_blog" class="striped bordered highlight responsive-table">
				<thead>
				<tr>
					<th>Date</th>
					<th>Author</th>
					<th>Title</th>
					<th>Summary</th>
					<th>Author Url</th>
					<th>Url</th>
				</tr>
				</thead>
			</table>
        </div>
    </div>

</li>
