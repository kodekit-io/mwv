@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/intro.js.css') !!}" />
@endsection

@section('content')
    <main class="">
        <div class="md-container">
            <form action="{!! url('update-project') !!}" method="post" name="project-form" class="project-form">
                {!! csrf_field() !!}
                <input type="hidden" name="project_id" value="{!! $project->pid !!}">
                <input type="hidden" name="keywords_number" value="{!! count($keywords) !!}">
                <input type="hidden" name="topics_number" value="{!! count($topics) !!}">
                <input type="hidden" name="excludes_number" value="{!! count($excludes) !!}">
                <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid-match="{target:'.md-card'}" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2 uk-push-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h2 class="md-card-toolbar-heading-text">How To Edit Project?</h2>
                            </div>
                            <div class="md-card-content">
                                <p>A step by step guide to edit a Project, just click the button below and follow the instructions.</p>
                                <a class="btn btn-success blue z-depth-0" href="javascript:void(0);" onclick="introEdit();">Show me how</a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2 uk-pull-1-2">
                        <div class="md-card step1">
                            <div class="md-card-toolbar">
                                <h2 class="md-card-toolbar-heading-text">EDIT PROJECT INFORMATION</h2>
                            </div>
                            <div class="md-card-content">
                                <div class="input-field">
                                    <input id="projectname" name="projectname" type="text" value="{!! $project->pname !!}" class="validate" required>
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
                <div class="md-card">
                    <div class="md-card-content">
                        <ul id="keywordadv" class="uk-list uk-list-line uk-margin-bottom-remove">
                            <li>
                                <h5>EDIT KEYWORDS</h5>
                                <div class="wrap_advkeys step2">
                                    @if (count($keywords) > 0)
                                        <?php $x = 1; ?>
                                        @foreach($keywords as $keyword)
                                            <div class="advkey">
                                            <textarea id="key-{!! $x !!}" name="field_key[{!! $x !!}]" class="materialize-textarea uk-margin-small-bottom">{!! $keyword->keyword->keywordName !!}</textarea>
                                            <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form step3" onclick="removeAdvKey(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>
                                            </div>
                                            <?php $x++; ?>
                                        @endforeach
                                    @else
                                    <div class="advkey">
                                        <textarea id="key-1" name="field_key[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                    </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advkey uk-margin-bottom step4" title="Add Keyword">ADD MORE KEYWORD</a>
                            </li>
                            <li>
                                <h5>EDIT TOPICS</h5>
                                <div class="wrap_advtopics step5">
                                    @if(count($topics) > 0)
                                        <?php $x = 1; ?>
                                        @foreach($topics as $topic)
                                            <div class="advtopic">
                                                <textarea id="topic-{!! $x !!}" name="field_topic[{!! $x !!}]" class="materialize-textarea uk-margin-small-bottom">{!! $topic->topicName !!}</textarea>
                                                <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form step6" onclick="removeAdvTopic(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>
                                            </div>
                                            <?php $x++ ?>
                                        @endforeach
                                    @else
                                        <div class="advtopic">
                                            <textarea id="topic-1" name="field_topic[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                        </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advtopic uk-margin-bottom step7" title="Add Topic">ADD MORE TOPIC</a>
                            </li>
                            <li>
                                <h5>EDIT EXCLUDED TOPICS</h5>
                                <div class="wrap_advexclds step8">
                                    @if (count($excludes) > 0)
                                        <?php $x = 1; ?>
                                        @foreach($excludes as $exclude)
                                            <div class="advexcld">
                                                <textarea id="excld-{!! $x !!}" name="field_excld[{!! $x !!}]" class="materialize-textarea uk-margin-small-bottom">{!! $exclude->noiseKeyName !!}</textarea>
                                                <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form step9" onclick="removeAdvExcld(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>
                                            </div>
                                            <?php $x++; ?>
                                        @endforeach
                                    @else
                                        <div class="advexcld">
                                            <textarea id="excld-1" name="field_excld[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                        </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advexcld step10" title="Add Exclude">ADD MORE EXCLUDE</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php /*
                <div class="md-card" id="addIG">
                    <div class="md-card-toolbar step11">
                        <div class="md-card-toolbar-actions">
                            <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Hide Instagram" data-uk-toggle="{target:'#addIG .md-card-content'}"><i class="material-icons md-icon">visibility_off</i></a>
                        </div>
                        <h2 class="md-card-toolbar-heading-text">INSTAGRAM</h2>
                    </div>
                    <div class="md-card-content">
                        <ul id="hashtags" class="uk-list uk-list-line uk-margin-bottom-remove">
                           <li class="step12">
                               <h5>HASHTAG</h5>
                               <p>Write hashtag with prefix '#' then hit ENTER to add more hashtags.</p>
                               <div class="wrap_hashtag">
                                    <div class="chips-hashtag"></div>
                               </div>
                           </li>
                           <li class="step13">
                                 <h5>EXCLUDE HASHTAG</h5>
                                 <p>Write hashtag with prefix '#' then hit ENTER to add more hashtags.</p>
                                 <div class="wrap_excldhashtag">
                                      <div class="chips-excldhashtag"></div>
                                 </div>
                           </li>
                           <li class="step14">
                                 <h5>USER</h5>
                                 <p>Write user with prefix '@' then hit ENTER to add more users.</p>
                                 <div class="wrap_user">
                                      <div class="chips-user"></div>
                                 </div>
                           </li>
                           <li class="step15">
                                 <h5>EXCLUDE USER</h5>
                                 <p>Write user with prefix '@' then hit ENTER to add more users.</p>
                                 <div class="wrap_exclduser">
                                      <div class="chips-exclduser"></div>
                                 </div>
                            </li>
                        </ul>

                    </div>
                </div>
                */ ?>
                <div class="md-card">
                    <div class="md-card-content uk-text-right">
                        <a class="btn grey z-depth-0 left" data-uk-tooltip title="Cancel Edit" href="{!! url('/dashboard') !!}">CANCEL</a>
                        <button type="submit" class="btn amber darken-4 z-depth-0 step11" data-uk-tooltip title="Save Editing">SAVE EDITING</button>
                    </div>
                </div>
            </form>
        </div>

    </main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('mediawave/js/intro.min.js') !!}"></script>
    <script src="{!! asset('js/edit-project.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/help-editproject.js') !!}" type="text/javascript"></script>
@endsection
