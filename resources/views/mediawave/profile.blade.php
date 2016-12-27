@extends('layouts.mediawave')

@section('content')

<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <div class="md-head-container white-text">
        <div class="left">Hi, <span class="appusername">@if(isset($userProfile->userName)){!! $userProfile->userName !!}@endif</span>!</div>
        <div class="widget-weather right">
            <span class="today"><i class="uk-icon uk-icon-calendar"></i> <?php echo(date("j F Y")); ?> </span>
            <a class="js-geolocation" title="Your locations"><i class="uk-icon uk-icon-map-marker"></i></a>
            <div id="weather"></div>
        </div>
    </div>
</nav>

<main class="user">
    <div class="md-container">
		<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
			<div class="uk-width-medium-1-5">
				<div class="md-card">
					<div class="profile-wrap gradient-four">
						<div class="profile valign-wrapper">
							<div class="valign uk-width-1-1 center-align">
								<div class="gravatar uk-border-circle">
									<img class="thumbnailUrl uk-border-circle" src="@if(isset($userProfile->picture) && $userProfile->picture != '') http://www.megacynics.com/img/avatar_sample_01.jpg @endif" />
								</div>
							</div>
						</div>
					</div>
					<div class="md-card-content center-align">
						<h6 class="appusername">@if(isset($userProfile->userName)){!! $userProfile->userName !!}@endif</h6>
						<div class="uk-text-small gravmail">@if(isset($userProfile->email)){!! $userProfile->email !!}@endif</div>
					</div>
				</div>
			</div>
			<div class="uk-width-medium-4-5">
				<div class="uk-grid uk-grid-small uk-grid-match" data-uk-grid-match="{target:'.md-card'}" data-uk-grid-margin>
					<div class="uk-width-medium-1-2">
						<div class="md-card">
							<div class="md-card-toolbar">
								<div class="md-card-toolbar-actions">
		                            <a class="btn waves-effect waves-light z-depth-0 cyan white-text" data-uk-tooltip title="Edit Profile" onclick="editProfile()" data-uk-toggle="{target:'.saveProfile.uk-hidden'}"><i class="material-icons md-icon">mode_edit</i></a>
                                    <?php /*
		                            <a class="btn waves-effect waves-light z-depth-0 red darken-4 white-text" data-uk-tooltip title="Change Password" data-uk-toggle="{target:'.changePass'}"><i class="material-icons md-icon">lock</i></a>
                                    */ ?>
		                        </div>
								<h2 class="md-card-toolbar-heading-text">USER PROFILE</h2>
							</div>
							<div class="md-card-content">
								<form class="changeProfile" method="post" action="{!! url('update-profile') !!}">
									{!! csrf_field() !!}
									<div class="row">
										<div class="input-field col s12">
											<input disabled value="@if(isset($userProfile->userName)){!! $userProfile->userName !!}@endif" name="name" id="name" type="text">
											<label for="name">Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input disabled value="@if(isset($userProfile->email)){!! $userProfile->email !!}@endif" name="email" id="email" type="email">
											<label for="email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input disabled value="@if(isset($userProfile->company)){!! $userProfile->company !!}@endif" name="company" id="company" type="text">
											<label for="company">Company</label>
										</div>
									</div>
									<div class="row uk-text-center uk-margin-bottom saveProfile uk-hidden">
										<button type="submit" class="btn amber darken-4" name="submit" value="submit-profile" data-uk-tooltip title="Save Profile">SAVE PROFILE</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<div class="uk-width-medium-1-2">
						<div class="md-card">
							<div class="md-card-toolbar">
								<div class="md-card-toolbar-actions" style="position:relative;">
									<div class="fixed-action-btn horizontal click-to-toggle">
										<a class="btn amber darken-3 z-depth-0" data-uk-tooltip="{pos:'top-right'}" title="Add more social media"><i class="material-icons">playlist_add</i></a>
										<ul>
											<li>
												<a class="btn-floating z-depth-0 light-blue lighten-2" data-uk-tooltip title="Add Twitter" onclick="addSocmed('twitter')"><i class="uk-icon-twitter"></i></a>
											</li>
											<li>
												<a class="btn-floating z-depth-0 blue darken-3" data-uk-tooltip title="Add Facebook" onclick="addSocmed('facebook')"><i class="uk-icon-facebook"></i></a>
											</li>
											<li>
												<a class="btn-floating z-depth-0 red" data-uk-tooltip title="Add Youtube" onclick="addSocmed('youtube')"><i class="uk-icon-youtube"></i></a>
											</li>
											<li>
												<a class="btn-floating z-depth-0 brown" data-uk-tooltip title="Add Instagram" onclick="addSocmed('instagram')"><i class="uk-icon-instagram"></i></a>
											</li>
										</ul>
									</div>
		                        </div>
								<h2 class="md-card-toolbar-heading-text">SOCIAL MEDIA ACCOUNTS</h2>
							</div>
							<div class="md-card-content">
								<form action="{!! url('update-profile') !!}" method="post">
                                    {!! csrf_field() !!}
									<div class="addsocmed">
                                        @if(count($socmeds) > 0)
                                            <?php
                                            $twitters = isset($socmeds[0]->twitter) ? $socmeds[0]->twitter : [];
                                            $instagrams = isset($socmeds[0]->instagram) ? $socmeds[0]->instagram : [];
                                            $facebooks = isset($socmeds[0]->facebook) ? $socmeds[0]->facebook : [];
                                            $youtubes = isset($socmeds[0]->youtube) ? $socmeds[0]->youtube : [];
                                            ?>
                                        @endif
                                        @if(count($twitters) > 0)
                                            @foreach($twitters as $twitter)
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="uk-icon-twitter-square prefix light-blue-text text-lighten-2"></i>
                                                        <input value="{!! $twitter->name !!}" id="twitter-{!! $twitter->id !!}" class="twitters" name="twitters[{!! $twitter->id !!}]" type="text">
                                                        <label for="twitter-{!! $twitter->id !!}">Twitter</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(count($facebooks) > 0)
                                            @foreach($facebooks as $facebook)
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="uk-icon-facebook-square prefix blue-text text-darken-4"></i>
                                                        <input value="{!! $facebook->name !!}" id="facebook-{!! $facebook->id !!}" class="facebooks" name="facebooks[{!! $facebook->id !!}]" type="text">
                                                        <label for="facebook-{!! $facebook->id !!}">Facebook</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(count($youtubes) > 0)
                                            @foreach($youtubes as $youtube)
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="uk-icon-youtube-square prefix red-text"></i>
                                                        <input value="{!! $youtube->name !!}" id="youtube-{!! $youtube->id !!}" class="youtubes" name="youtubes[{!! $youtube->id !!}]" type="text">
                                                        <label for="youtube-{!! $youtube->id !!}">Youtube</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(count($instagrams) > 0)
                                            @foreach($instagrams as $instagram)
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="uk-icon-instagram prefix brown-text"></i>
                                                        <input value="{!! $instagram->name !!}" id="instagram-{!! $instagram->id !!}" class="instagrams" name="instagrams[{!! $instagram->id !!}]" type="text">
                                                        <label for="instagram-{!! $instagram->id !!}">Instagram</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
										{{--<div class="row">--}}
											{{--<div class="input-field col s12">--}}
												{{--<i class="uk-icon-facebook-square prefix blue-text text-darken-4"></i>--}}
												{{--<input value="" id="facebook-1" class="facebooks" name="facebooks[1]" type="text">--}}
												{{--<label for="facebook-1">Facebook</label>--}}
											{{--</div>--}}
										{{--</div>--}}
										{{--<div class="row">--}}
											{{--<div class="input-field col s12">--}}
												{{--<i class="uk-icon-youtube-square prefix red-text"></i>--}}
												{{--<input value="" id="youtube-1" class="youtubes" name="youtubes[1]" type="text">--}}
												{{--<label for="youtube-1">Youtube</label>--}}
											{{--</div>--}}
										{{--</div>--}}
										{{--<div class="row">--}}
											{{--<div class="input-field col s12">--}}
												{{--<i class="uk-icon-instagram prefix brown-text"></i>--}}
												{{--<input value="" id="instagram-1" class="instagrams" name="instagrams[1]" type="text">--}}
												{{--<label for="instagram-1">Instagram</label>--}}
											{{--</div>--}}
										{{--</div>--}}
									</div>
									<div class="row uk-margin-bottom uk-text-center">
										<button type="submit" name="submit" value="submit-account" class="btn amber darken-4" data-uk-tooltip title="Save Social Media">SAVE NOW</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('js/jquery.simpleweather.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/profile.js') !!}" type="text/javascript"></script>
@endsection
