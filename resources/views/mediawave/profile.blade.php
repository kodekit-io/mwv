@extends('layouts.mediawave')

@section('content')

<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <div class="md-head-container white-text">
        <div class="left">Hi <span class="appusername">Username</span>!</div>
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
									<img class="thumbnailUrl uk-border-circle"></img>
								</div>
							</div>
						</div>
					</div>
					<div class="md-card-content center-align">
						<h6 class="appusername">{!! $userProfile->userName !!}</h6>
						<div class="uk-text-small gravmail">{!! $userProfile->email !!}</div>
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
		                            <a class="btn waves-effect waves-light z-depth-0 red darken-4 white-text" data-uk-tooltip title="Change Password" data-uk-toggle="{target:'.changePass'}"><i class="material-icons md-icon">lock</i></a>
		                        </div>
								<h2 class="md-card-toolbar-heading-text">USER PROFILE</h2>
							</div>
							<div class="md-card-content">
								<form class="changeProfile">
									<div class="row">
										<div class="input-field col s12">
											<input disabled value="{!! $userProfile->userName !!}" id="name" type="text">
											<label for="name">Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input disabled value="{!! $userProfile->email !!}" id="email" type="email">
											<label for="email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input disabled value="{!! $userProfile->company !!}" id="company" type="text">
											<label for="company">Company</label>
										</div>
									</div>
									<div class="row uk-text-center uk-margin-bottom saveProfile uk-hidden">
										<button type="submit" class="btn amber darken-4" data-uk-tooltip title="Save Profile">SAVE PROFILE</button>
									</div>
								</form>
								<form class="changePass uk-hidden">
									<h6 class="md-card-toolbar-heading-text" style="padding-left:0.75rem;">CHANGE PASSWORD</h6>
									<div class="row">
										<div class="input-field col s12">
											<input value="" id="currentPass" type="password" class="validate">
											<label for="currentPass">Current Password</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input value="" id="newPass" type="password" class="validate">
											<label for="newPass">New Password</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input value="" id="newPassAgain" type="password" class="validate">
											<label for="newPassAgain">Repeat New Password</label>
										</div>
									</div>
									<div class="row uk-margin-bottom uk-text-center">
										<button type="submit" class="btn amber darken-4" data-uk-tooltip title="Save Password">SAVE PASSWORD</button>
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
											@foreach($socmeds as $socmed)
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
                                            @endforeach
										</ul>
									</div>
		                        </div>
								<h2 class="md-card-toolbar-heading-text">SOCIAL MEDIA ACCOUNTS</h2>
							</div>
							<div class="md-card-content">
								<form>
									<div class="addsocmed">
										<div class="row">
											<div class="input-field col s12">
												<i class="uk-icon-twitter-square prefix light-blue-text text-lighten-2"></i>
												<input value="" id="Twitter[1][]" type="text">
												<label for="Twitter[1][]">Twitter</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<i class="uk-icon-facebook-square prefix blue-text text-darken-4"></i>
												<input value="" id="Facebook[1][]" type="text">
												<label for="Facebook[1][]">Facebook</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<i class="uk-icon-youtube-square prefix red-text"></i>
												<input value="" id="Youtube[1][]" type="text">
												<label for="Youtube[1][]">Youtube</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<i class="uk-icon-instagram prefix brown-text"></i>
												<input value="" id="Instagram[1][]" type="text">
												<label for="Instagram[1][]">Instagram</label>
											</div>
										</div>
									</div>
									<div class="row uk-margin-bottom uk-text-center">
										<button type="submit" class="btn amber darken-4" data-uk-tooltip title="Save Social Media">SAVE NOW</button>
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
