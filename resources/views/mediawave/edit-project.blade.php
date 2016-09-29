@extends('layouts.mediawave')

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
                                Hendrerit ornare eu ullamcorper dignissim elit inceptos scelerisque dolor a tellus non nam aenean condimentum vestibulum a ad himenaeos nisl mi scelerisque at gravida facilisi. Morbi posuere adipiscing ac platea integer maecenas mus eget nisl sem a bibendum in elit ultrices ultricies vestibulum himenaeos lobortis venenatis arcu inceptos adipiscing a vestibulum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2 uk-pull-1-2">
                        <div class="md-card">
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
                        <ul id="keywordadv" class="uk-list uk-list-line">
                            <li>
                                <h5>EDIT KEYWORDS</h5>
                                <div class="wrap_advkeys">
                                    @if (count($keywords) > 0)
                                        <?php $x = 1; ?>
                                        @foreach($keywords as $keyword)
                                            <div class="advkey">
                                            <textarea id="key-{!! $x !!}" name="field_key[{!! $x !!}]" class="materialize-textarea uk-margin-small-bottom">{!! $keyword->keyword->keywordName !!}</textarea>
                                            <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvKey(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>
                                            </div>
                                            <?php $x++; ?>
                                        @endforeach
                                    @else
                                    <div class="advkey">
                                        <textarea id="key-1" name="field_key[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                    </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advkey uk-width-medium-1-5 uk-margin-bottom" title="Add Keyword">ADD MORE KEYWORD</a>
                            </li>
                            <li>
                                <h5>EDIT TOPICS</h5>
                                <div class="wrap_advtopics">
                                    @if(count($topics) > 0)
                                        <?php $x = 1; ?>
                                        @foreach($topics as $topic)
                                            <div class="advtopic">
                                                <textarea id="topic-{!! $x !!}" name="field_topic[{!! $x !!}]" class="materialize-textarea uk-margin-small-bottom">{!! $topic->topicName !!}</textarea>
                                                <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvTopic(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>
                                            </div>
                                            <?php $x++ ?>
                                        @endforeach
                                    @else
                                        <div class="advtopic">
                                            <textarea id="topic-1" name="field_topic[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                        </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advtopic uk-width-medium-1-5 uk-margin-bottom" title="Add Topic">ADD MORE TOPIC</a>
                            </li>
                            <li>
                                <h5>EDIT EXCLUDED TOPICS</h5>
                                <div class="wrap_advexclds">
                                    @if (count($excludes) > 0)
                                        <?php $x = 1; ?>
                                        @foreach($excludes as $exclude)
                                            <div class="advexcld">
                                                <textarea id="excld-{!! $x !!}" name="field_excld[{!! $x !!}]" class="materialize-textarea uk-margin-small-bottom">{!! $exclude->noiseKeyName !!}</textarea>
                                                <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvExcld(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>
                                            </div>
                                            <?php $x++; ?>
                                        @endforeach
                                    @else
                                        <div class="advexcld">
                                            <textarea id="excld-1" name="field_excld[1]" class="materialize-textarea uk-margin-small-bottom"></textarea>
                                        </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="uk-button btn blue z-depth-0 add_advexcld uk-width-medium-1-5 uk-margin-bottom" title="Add Exclude">ADD MORE EXCLUDE</a>

                                <div class="uk-panel uk-panel-box uk-margin-top">
                                    <button type="submit" class="btn amber darken-4 right uk-margin-left nextstep tooltipped" data-position="top" data-delay="25" data-tooltip="Save Query">SAVE NOW</button>
                                    <a href="#previewquery" class="modal-trigger btn white black-text right uk-margin-left tooltipped" data-position="top" data-delay="25" data-tooltip="Preview All Query">PREVIEW QUERY</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>

    </main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('js/edit-project.js') !!}" type="text/javascript"></script>
@endsection
