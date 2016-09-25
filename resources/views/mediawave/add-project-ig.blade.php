@extends('layouts.mediawave')

@section('content')
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <ul class="uk-navbar-nav md-head-container">
        <li><a href="{!! url('/create-project') !!}">Create Project</a></li>
        <li class="uk-active"><a href="{!! url('/create-project-ig') !!}">Create Instagram Project</a></li>
    </ul>
</nav>
<main class="">
    <div class="md-container">
        <form action="{!! url('save-project') !!}" method="post" name="project-form" class="project-form">
        {!! csrf_field() !!}
        <div class="uk-panel uk-panel-box white">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2 uk-push-1-2">
                    <h6>Create Project User Guide</h6>
                    <p>Hendrerit ornare eu ullamcorper dignissim elit inceptos scelerisque dolor a tellus non nam aenean condimentum vestibulum a ad himenaeos nisl mi scelerisque at gravida facilisi. Morbi posuere adipiscing ac platea integer maecenas mus eget nisl sem a bibendum in elit ultrices ultricies vestibulum himenaeos lobortis venenatis arcu inceptos adipiscing a vestibulum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                </div>
                <div class="uk-width-medium-1-2 uk-pull-1-2">
                     <h6>PROJECT INFORMATION</h6>
                    <div class="input-field">
                            <input id="projectname" name="projectname" type="text" class="validate" required>
                            <label for="projectname">Project Name (required)</label>
                        </div>
                        <div class="input-field">
                            <textarea id="projectobj" name="projectobj" class="validate materialize-textarea uk-margin-remove"></textarea>
                            <label for="projectobj">Project Objective</label>
                        </div>
                </div>
            </div>
        </div>
        <div class="uk-panel uk-panel-box white uk-margin-top">
             <ul id="keywordadv" class="uk-list uk-list-line">
                <li>
                    <h5>HASHTAG</h5>
                    <p>Write hastag without '#'. Hit ENTER to add more hashtags.</p>
                    <div class="wrap_hashtag">
                         <div class="chips"></div>
                    </div>
                </li>
                <li>
                      <h5>EXCLUDE HASHTAG</h5>
                      <p>Write hastag without '#'. Hit ENTER to add more hashtags.</p>
                      <div class="wrap_excldhashtag">
                           <div class="chips"></div>
                      </div>
                </li>
                <li>
                      <h5>USER</h5>
                      <p>Write user without '@'. Hit ENTER to add more users.</p>
                      <div class="wrap_user">
                           <div class="chips"></div>
                      </div>
                </li>
                <li>
                      <h5>EXCLUDE USER</h5>
                      <p>Write user without '@'. Hit ENTER to add more users.</p>
                      <div class="wrap_exclduser">
                           <div class="chips"></div>
                      </div>
                 </li>
             </ul>
             <div class="uk-panel uk-panel-box">
              <button type="submit" class="btn amber darken-4 right uk-margin-left nextstep tooltipped" data-position="top" data-delay="25" data-tooltip="Save Query">SAVE NOW</button>
              <a href="#previewquery" class="modal-trigger btn white black-text right uk-margin-left tooltipped" data-position="top" data-delay="25" data-tooltip="Preview All Query">PREVIEW QUERY</a>
             </div>
        </div>
        <div id="previewquery" class="modal modal-fixed-footer">
             <div class="modal-content">
                <h4>Your queries :</h4>

             </div>
             <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-light btn z-depth-0">CLOSE</a>
             </div>

        </div>
        </form>
    </div>

</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('js/add-project.js') !!}" type="text/javascript"></script>
@endsection
