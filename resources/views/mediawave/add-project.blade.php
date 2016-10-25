@extends('layouts.mediawave')

@section('content')
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <ul class="uk-navbar-nav md-head-container">
        <li class="uk-active"><a href="{!! url('/create-project') !!}">Create Project</a></li>
        <li><a href="{!! url('/create-project-ig') !!}">Create Instagram Project</a></li>
    </ul>
</nav>
<main class="">
    <div class="md-container">
        <form action="{!! url('save-project') !!}" method="post" name="project-form" class="project-form">
            {!! csrf_field() !!}
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid-match="{target:'.md-card'}" data-uk-grid-margin>
                <div class="uk-width-medium-1-2 uk-push-1-2">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h2 class="md-card-toolbar-heading-text">How To Create New Project?</h2>
                        </div>
                        <div class="md-card-content">
                            <p>A step by step guide to create a Project, just click the button below and follow the instructions.</p>
                            <a class="btn btn-success blue" href="javascript:void(0);" onclick="introAdd();">Show me how</a>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-2 uk-pull-1-2">
                    <div class="md-card step1">
                        <div class="md-card-toolbar">
                            <h2 class="md-card-toolbar-heading-text">PROJECT INFORMATION</h2>
                        </div>
                        <div class="md-card-content">
                            <div class="input-field step2">
                                <input id="projectname" name="projectname" type="text" class="validate uk-margin-remove" required>
                                <label for="projectname">Project Name (required)</label>
                            </div>
                            <div class="input-field step3">
                                <textarea id="projectobj" name="projectobj" class="validate materialize-textarea uk-margin-remove"></textarea>
                                <label for="projectobj">Project Objective</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-card">
                <ul class="tabs uk-margin-top step4">
                    <li class="tab"><a class="active" href="#mode1">STEP BY STEP</a></li>
                    <li class="tab"><a href="#mode2">ADVANCED</a></li>
                </ul>
                <div class="md-card-content">
                    <div id="mode1">
                        <ul class="uk-grid uk-grid-collapse uk-grid-width-1-3 uk-text-center md-steps uk-margin-top uk-margin-bottom" data-uk-switcher="{connect:'#keywordsteps'}">
                            <li class="uk-active"><a href="#" class="switchkeyword"><span class="uk-border-circle">1</span>Keyword</a></li>
                            <li class=""><a href="#" class="switchtopic"><span class="uk-border-circle">2</span>Topic</a></li>
                            <li class=""><a href="#" class="switchexcld"><span class="uk-border-circle">3</span>Topic Not Include</a></li>
                        </ul>

                        <ul id="keywordsteps" class="uk-switcher">
                            <li>
                                <h5>CREATE KEYWORDS</h5>
                                <div class="wrap_keys">
                                    <div id="key-1" class="key uk-panel uk-panel-box uk-margin-bottom">
                                         <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 key-op-1 step5">
                                            <li>
                                                <label class="label_key"><i class="material-icons">label</i></label>
                                                <input type="text" data-key-group="1" name="field_key[1][]" value="" placeholder="Write keyword here" />
                                            </li>
                                        </ul>
                                        <a href="javascript:void(0);" class="dropdown-button uk-button teal darken-4 white-text step6" data-activates="dropkey-1" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a>
                                        <ul id="dropkey-1" class="dropdown-content">
                                           <li><a href="javascript:void(0);" class="add_and" onclick="addKey(1, 'and')"> AND</a></li>
                                           <li><a href="javascript:void(0);" class="add_or" onclick="addKey(1, 'or')"> OR</a></li>
                                           <li><a href="javascript:void(0);" class="add_not" onclick="addKey(1, 'not')"> NOT</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_key uk-width-medium-1-5 step7" title="Add Keyword">ADD MORE KEYWORD</a>

                                <div class="uk-panel uk-panel-box uk-margin-top">
                                    <a class="btn amber darken-4 right uk-margin-left nextstep step8" data-uk-tooltip title="Next Step: Create Topics">NEXT STEP</a>
                                </div>
                            </li>
                            <li>
                                 <h5>CREATE TOPICS</h5>
                                 <div class="wrap_topics">
                                     <div id="topic-1" class="topic uk-panel uk-panel-box uk-margin-bottom">
                                          <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 topic-op-1 step9">
                                             <li>
                                                 <label class="label_topic"><i class="material-icons">label</i></label>
                                                 <input type="text" name="field_topic[1][]" data-topic-group="1" value="" placeholder="Write topic here" />
                                             </li>
                                         </ul>
                                         <a href="javascript:void(0);" class="dropdown-button uk-button teal darken-4 white-text step10" data-activates="droptopic-1" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a>
                                         <ul id="droptopic-1" class="dropdown-content">
                                            <li><a href="javascript:void(0);" class="add_and" onclick="addTopic(1, 'and')"> AND</a></li>
                                            <li><a href="javascript:void(0);" class="add_or" onclick="addTopic(1, 'or')"> OR</a></li>
                                            <li><a href="javascript:void(0);" class="add_not" onclick="addTopic(1, 'not')"> NOT</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_topic uk-width-medium-1-5 step11" title="Add Topic">ADD MORE TOPIC</a>

                                 <div class="uk-panel uk-panel-box uk-margin-top">
                                    <a class="btn white black-text left prevstep backtopic" data-uk-tooltip title="Prev Step: Keywords">BACK</a>
                                    <a class="btn amber darken-4 right uk-margin-left nextstep step12" data-uk-tooltip title="Next Step: Create Excluded Topics">NEXT STEP</a>
                                 </div>
                            </li>
                            <li>
                                 <h5>CREATE EXCLUDED TOPICS</h5>
                                 <div class="wrap_exclds">
                                     <div id="topic-1" class="excld uk-panel uk-panel-box uk-margin-bottom">
                                          <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 excld-op-1 step13">
                                             <li>
                                                 <label class="label_excld"><i class="material-icons">label</i></label>
                                                 <input type="text" name="field_excld[1][]" data-excld-group="1" value="" placeholder="Write exclude here" />
                                             </li>
                                         </ul>
                                         <a href="javascript:void(0);" class="dropdown-button uk-button teal darken-4 white-text step14" data-activates="dropexcld-1" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a>
                                         <ul id="dropexcld-1" class="dropdown-content">
                                            <li><a href="javascript:void(0);" class="add_and" onclick="addExcld(1, 'and')"> AND</a></li>
                                            <li><a href="javascript:void(0);" class="add_or" onclick="addExcld(1, 'or')"> OR</a></li>
                                            <li><a href="javascript:void(0);" class="add_not" onclick="addExcld(1, 'not')"> NOT</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_excld uk-width-medium-1-5 step15" title="Add Exclude">ADD MORE EXCLUDE</a>

                                 <div class="uk-panel uk-panel-box uk-margin-top">
                                    <a class="btn white black-text left prevstep backexcld" data-uk-tooltip title="Prev Step: Topics">BACK</a>
                                    <button type="submit" class="btn amber darken-4 right uk-margin-left nextstep step17" name="form_mode" value="regular" data-uk-tooltip title="Save Query">SAVE NOW</button>
                                    <a href="#previewquery" class="modal-trigger btn white black-text right uk-margin-left step16" data-uk-tooltip title="Preview All Query" onclick="previewQuery()">PREVIEW QUERY</a>
                                 </div>
                            </li>
                        </ul>
                    </div>
                    <div id="mode2">
                        <ul id="keywordadv" class="uk-list uk-list-line">
                            <li>
                                <h5>CREATE KEYWORDS</h5>
                                <div class="wrap_advkeys">
                                     <div class="advkey">
                                          <textarea id="key-1" name="adv_field_key[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                     </div>
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advkey uk-width-medium-1-5 uk-margin-bottom" title="Add Keyword">ADD MORE KEYWORD</a>
                            </li>
                            <li>
                                  <h5>CREATE TOPICS</h5>
                                  <div class="wrap_advtopics">
                                       <div class="advtopic">
                                            <textarea id="topic-1" name="adv_field_topic[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                       </div>
                                  </div>
                                  <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advtopic uk-width-medium-1-5 uk-margin-bottom" title="Add Topic">ADD MORE TOPIC</a>
                            </li>
                            <li>
                                  <h5>CREATE EXCLUDED TOPICS</h5>
                                  <div class="wrap_advexclds">
                                       <div class="advexcld">
                                            <textarea id="excld-1" name="adv_field_excld[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                       </div>
                                  </div>
                                  <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advexcld uk-width-medium-1-5 uk-margin-bottom" title="Add Exclude">ADD MORE EXCLUDE</a>

                                  <div class="uk-panel uk-panel-box uk-margin-top">
                                    <button type="submit" class="btn amber darken-4 right uk-margin-left nextstep tooltipped" data-position="top" data-delay="25" name="form_mode" value="advanced" data-tooltip="Save Query">SAVE NOW</button>
                                    <a href="#previewquery" class="modal-trigger btn white black-text right uk-margin-left" data-uk-tooltip title="Preview All Query" onclick="previewAdavancedQuery()">PREVIEW QUERY</a>
                                  </div>
                            </li>
                         </ul>
                    </div>
                </div>
            </div>

            <div id="previewquery" class="modal modal-fixed-footer">
                 <div class="modal-content">
                    <div class="previewquery"></div>
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
    <script src="{!! asset('js/help.js') !!}" type="text/javascript"></script>
@endsection
