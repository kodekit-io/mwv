<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4"  data-uk-tooltip title="asdf
                a
                sdf
                asdf
                as
                df
                asdf
                asdfasdfkasldfjasdf asdfasdf asdfasdf asdf asd fas dfas dfa sdfasdf asdf asdf asdf"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#trend'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trend ul'}">
                    <li class="uk-active"><a>BUZZ TREND</a></li>
                    <li><a>USER TREND</a></li>
                    <li><a>REACH TREND</a></li>
                </ul>
            </div>
        </div>
        <?php //TRENDS ?>
        <div id="trend" class="md-card-content">
            <ul class="uk-switcher">
                <li>
                    <div id="buzztrend" class="md-chart">BUZZ TREND</div>
                </li>
                <li>
                    <div id="usertrend" class="md-chart">USER TREND</div>
                </li>
                <li>
                    <div id="reachtrend" class="md-chart">REACH TREND</div>
                </li>
            </ul>
        </div>
    </div>
</li>