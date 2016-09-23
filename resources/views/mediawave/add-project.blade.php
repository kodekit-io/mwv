@extends('layouts.mediawave')

@section('content')
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <ul class="uk-navbar-nav md-head-container">
        <li class="uk-active"><a href="">Create Project</a></li>
        <li><a href="">Create Instagram Project</a></li>
    </ul>
</nav>
<main class="">
    <div class="md-container">
        <div class="uk-panel uk-panel-box">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2 uk-push-1-2">
                    <h6>Create Project User Guide</h6>
                    <p>Hendrerit ornare eu ullamcorper dignissim elit inceptos scelerisque dolor a tellus non nam aenean condimentum vestibulum a ad himenaeos nisl mi scelerisque at gravida facilisi. Morbi posuere adipiscing ac platea integer maecenas mus eget nisl sem a bibendum in elit ultrices ultricies vestibulum himenaeos lobortis venenatis arcu inceptos adipiscing a vestibulum.</p>
                </div>
                <div class="uk-width-medium-1-2 uk-pull-1-2">
                    <div class="row">
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
        </div>
        <form action="" method="post" name="project-form" class="project-form">
            <ul class="tabs uk-margin-top">
                <li class="tab"><a class="active" href="#mode1">STEP BY STEP</a></li>
                <li class="tab"><a href="#mode2">ADVANCED</a></li>
            </ul>
            <div id="mode1" class="uk-panel uk-panel-box">
                <ul class="uk-grid uk-grid-collapse uk-grid-width-1-3 uk-text-center md-steps uk-margin-top uk-margin-bottom" data-uk-switcher="{connect:'#keywordsteps'}">
                    <li class="uk-active"><a href="#"><span class="uk-border-circle">1</span>Keyword</a></li>
                    <li class=""><a href="#"><span class="uk-border-circle">2</span>Topic</a></li>
                    <li class=""><a href="#"><span class="uk-border-circle">3</span>Topic Not Include</a></li>
                </ul>

                <ul id="keywordsteps" class="uk-switcher">
                    <li>
                        <h4>Create Keyword</h4>

                        <div class="wrap_all uk-margin-bottom">
                            <div id="key-1" class="card z-depth-0">
                                <div class="card-content">
                                    <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 wrap_operation-1">
                                        <li>
                                            <label class="label_key"><i class="material-icons">label</i></label>
                                            <input type="text" name="field_keys[1][]" value=""/>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-action">
                                    <a href="javascript:void(0);" class="dropdown-button uk-button teal darken-4 white-text" data-activates="opdrop-1" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a>
                                    <ul id="opdrop-1" class="dropdown-content">
                                        <li><a href="javascript:void(0);" class="add_and" onclick="addField(1, 'and')"> AND</a></li>
                                        <li><a href="javascript:void(0);" class="add_or" onclick="addField(1, 'or')"> OR</a></li>
                                        <li><a href="javascript:void(0);" class="add_not" onclick="addField(1, 'not')"> NOT</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_key" title="Add Keyword"><i class="material-icons left">label</i> ADD KEYWORD</a>
                        <hr>
                        <div class="uk-panel uk-panel-box">
                            <a class="btn amber darken-4 right uk-margin-left nextstep" data-uk-switcher-item="1">NEXT STEP</a>
                            <button class="btn white black-text right" type="submit" >Preview</button>
                        </div>
                    </li>
                    <li>Topic <a href="" data-uk-switcher-item="0">0</a><a href="" data-uk-switcher-item="2">2</a></li>
                    <li>Not Include <a href="" data-uk-switcher-item="1">1</a></li>
                </ul>
            </div>
            <div id="mode2" class="uk-panel uk-panel-box">Test 2</div>
        </form>
    </div>
</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('js/add-project.js') !!}" type="text/javascript"></script>
@endsection