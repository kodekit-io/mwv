
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <div class="md-head-container">
        <ul class="uk-navbar-nav">

            <li>
                <a href="{!! url('/socmed-twitter') !!}" name="subnav" data-uk-tooltip title="Twitter">
                    <span class="uk-border-circle light-blue lighten-2"><i class="uk-icon-twitter"></i></span>
                    <span class="uk-hidden-small">Twitter</span>
                </a>
            </li>
            <li>
                <a href="{!! url('/socmed-facebook') !!}" name="subnav" data-uk-tooltip title="Facebook">
                    <span class="uk-border-circle blue darken-4"><i class="uk-icon-facebook"></i></span>
                    <span class="uk-hidden-small">Facebook</span>
                </a>
            </li>
            <li>
                <a href="{!! url('/socmed-youtube') !!}" name="subnav" data-uk-tooltip title="Youtube">
                    <span class="uk-border-circle red darken-4"><i class="uk-icon-youtube-play"></i></span>
                    <span class="uk-hidden-small">Youtube</span>
                </a>
            </li>
            <li>
                <a href="{!! url('/socmed-instagram') !!}" name="subnav" data-uk-tooltip title="Instagram">
                    <span class="uk-border-circle brown"><i class="uk-icon-instagram"></i></span>
                    <span class="uk-hidden-small">Instagram</span>
                </a>
            </li>
        </ul>
        <div class="uk-navbar-flip uk-hidden">
            <form>
                <div class="nav-wrapper md-search">
                    <div class="input-field">
                        <input id="search" type="search">
                        <label for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons emptysearch">close</i>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
