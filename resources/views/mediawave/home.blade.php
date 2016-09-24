@extends('layouts.mediawave')

@section('content')
<main class="">
    <div class="md-container">
        <div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-4 uk-grid-medium uk-grid-match" data-uk-grid-margin>
             <div>
                 <div class="uk-panel uk-panel-box valign-wrapper">
                     <div class="valign uk-width-1-1 uk-text-center">
                         <a href="#" title="Create New Project">
                             <i class="material-icons light-blue-text large">add_circle</i>
                         </a>
                         <h6 class="uk-margin-bottom-remove light-blue-text">CREATE NEW PROJECT</h6>
                     </div>
                 </div>
             </div>
            @foreach($projects as $project)
            <div>
                <div id="edit-{!! $project->pid !!}" class="modal modal-fixed-footer modal-small">
                    <form id="" name="" class="" method="post" action="">
                         <div class="modal-content">
                             <h4>Edit Project</h4>
                             <p>Provide your password then click EDIT to continue</p>
                                {!! csrf_field() !!}
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" name="password" type="password" class="validate" required>
                                    <label for="password">Password</label>
                                </div>
                         </div>
                         <div class="modal-footer">
                             <a href="#" class="left uk-width-medium-2-5 modal-action modal-close waves-effect waves-green btn grey z-depth-0">CANCEL</a>
                             <button class="uk-width-medium-2-5 modal-action modal-close waves-effect waves-light btn blue z-depth-0" type="submit" name="action">EDIT</button>
                         </div>
                    </form>
                </div>
                <div id="delete-{!! $project->pid !!}" class="modal modal-fixed-footer modal-small">
                    <form id="" name="" class="" method="post" action="">
                         <div class="modal-content">
                             <h4>Are you sure?</h4>
                             <p>Provide your password then click YES to DELETE this project</p>
                                {!! csrf_field() !!}
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" name="password" type="password" class="validate" required>
                                    <label for="password">Password</label>
                                </div>
                         </div>
                         <div class="modal-footer">
                             <a href="#" class="left uk-width-medium-2-5 modal-action modal-close waves-effect waves-green btn grey z-depth-0">CANCEL</a>
                             <button class="uk-width-medium-2-5 modal-action modal-close waves-effect waves-light btn red z-depth-0" type="submit" name="action">YES!</button>
                         </div>
                    </form>
                </div>
                <div class="md-card hoverable">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions">
                            <a href="#edit-{!! $project->pid !!}" class="btn waves-effect waves-light z-depth-0 cyan tooltipped modal-trigger" data-position="top" data-delay="25" data-tooltip="Edit Project"><i class="material-icons md-icon">mode_edit</i></a>
                            <a href="#delete-{!! $project->pid !!}" class="btn waves-effect waves-light z-depth-0 red darken-4 tooltipped modal-trigger" data-position="top" data-delay="25" data-tooltip="Delete Project"><i class="material-icons md-icon">delete</i></a>
                        </div>
                        <h2 class="md-card-toolbar-heading-text">{!! $project->pname !!}</h2>
                    </div>
                    <div class="md-card-content">
                        <div id="container-{{ $project->pid }}" class="sum-project"></div>
                        <div class="center-align">
                            <a href="{!! url('project-detail/' . $project->pid) !!}" class="waves-effect waves-light btn center-align z-depth-0 deep-orange white-text" title="View Project"><i class="material-icons left">visibility</i> VIEW PROJECT</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</main>
@endsection

@section('page-level-plugins')
    <script src="{!! asset('mediawave/js/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/components/datepicker.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/highcharts.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/highcharts-more.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/modules/exporting.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/themes/mw.js') !!}"></script>
@endsection

@section('page-level-scripts')
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script>
        @foreach($projects as $project)
            $.ajax({
                    url : '{{ url('chart-1/' . $project->pid) }}',
                    beforeSend : function(xhr) {
                        $('#' + 'container-{!! $project->pid !!}').block({
                            //message: '<span>Processing</span>',
                            //css: { border: '3px solid #a00' }
                            message: '<img src="{!! asset('mediawave/img/spinner.gif') !!}">',
                            css: { border: 'none', marginTop: '-32px' },
                            overlayCSS: { backgroundColor: '#fff', zIndex: 100 }
                        });
                    },
                    complete : function(xhr, status) {
                        $('#' + 'container-{!! $project->pid !!}').unblock();
                    },
                    success : function(result) {
                        brandChart('container-{!! $project->pid !!}', jQuery.parseJSON(result));
                    }
                });
        @endforeach
    </script>

@endsection
