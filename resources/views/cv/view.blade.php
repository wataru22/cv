<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile->firstname }}'s CV</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
    <link rel="stylesheet" href="/assets/css/cv_uikit.css">
</head>
<body>
	<article id="content" class="uk-article uk-container-center">

		<section id="name" class="uk-grid">
			<div class="uk-width-medium-2-3">
				<h1 class="name uk-heading-large">{{ $profile->firstname }}{{ $profile->middlename ? ' '.$profile->middlename : '' }}{{ $profile->lastname ? ' '.$profile->lastname : '' }}</h1>
				@if ( $profile->title )
				<p class="name-sub">{{ $profile->title }}</p>
				@endif
			</div>
			<div id="personal-details" class="uk-width-medium-1-3">
				<div class="uk-margin-top uk-align-medium-right">
					@if ( $profile->address )
					<p id="home-address">
						{!! nl2br($profile->address) !!}
					</p>
					@endif
					<p id="contact-details">
						@if ( $profile->telephone )
						<span id="phone"><i class="uk-icon-phone-square"></i> {{ $profile->telephone }}</span><br>
						@endif
						@if ( $profile->mobile )
						<span id="mobile"><i class="uk-icon-phone-square"></i> {{ $profile->mobile }}</span><br>
						@endif
						@if ( $profile->email )
						<span id="email"><i class="uk-icon-envelope-square"></i> {{ $profile->email }}</span><br>
						@endif
						@if ( $profile->websites )
						<span id="website"><i class="uk-icon-globe"></i> {{ $profile->websites }}</span>@endif
					</p>
				</div>
			</div>
		</section>
		@if ( $profile->summary )
		<hr class="uk-article-divider">

		<section id="introduction">
			<p class="uk-article-lead">
			{!! nl2br($profile->summary) !!}
			</p>
		</section>
		@endif

		@if ( count($works) > 0 )
		<hr class="uk-article-divider">

		<section id="work-experience">
			<h2 class="section-title">Working experience</h2>
			<ul class="job-list">
				@foreach ( $works as $k => $work )
				<li id="job-{{ $k }}">
					<h3 class="job-title uk-margin-bottom-remove">{{ $work->title }}</h3>
					<p class="uk-article-meta uk-margin-small">
						@if ( $work->employer )
						<span class="job-employer">{{ $work->employer }}</span><br>
						@endif
						<span class="job-period">{{ date('F Y', strtotime($work->start)) }} - {{ $work->end ? date('F Y', strtotime($work->end)) : 'Present' }}</span><br>
						<span class="job-location">{{ $work->location }}</span>
					</p>
					<p class="job-description uk-margin-small-top">
						{!! nl2br($work->description) !!}
						@if ($work->website)<br><a href="{{ $work->website }}">{{ $work->website }}</a>@endif
					</p>
				</li>
				@endforeach
			</ul>
		</section>
		@endif
		@if ( count($schools) > 0 )
		<hr class="uk-article-divider">

		<section id="education">
			<h2 class="section-title">Education</h2>
			<ul>
			@foreach ($schools as $k => $school)
				<li id="education-{{ $k }}">
					<h3 class="uk-margin-bottom-remove">
						{{ $school->title }}<br>
						<span class="education-institution uk-h5">{{ $school->institution }}</span>
					</h3>
					<p class="uk-article-meta uk-margin-small">
						<span class="education-period">{{ date('F Y', strtotime($school->start)) }} - {{ $school->end ? date('F Y', strtotime($school->end)) : 'Present' }}</span>
					</p>
					<p class="education-details uk-margin-top-remove">
						{!! nl2br($school->description) !!}
						@if ($school->website)<br><a href="{{ $school->website }}">{{ $school->website }}</a>@endif
					</p>
				</li>
			@endforeach
			</ul>
		</section>
		@endif

		@if ( count($skills) > 0 )
		<hr class="uk-article-divider">

		<section id="skills">
			<h2 class="section-title">Skills</h2>
			<ul>
				@foreach ($skills as $k => $skill)
				<li>{{ $skill->skill }}</li>
				@endforeach
			</ul>
		</section>
		@endif

		@if ( count($awards) > 0 )
		<hr class="uk-article-divider">

		<section id="achievements">
			<h2 class="section-title">Achievements / Awards</h2>
			<ul>
				@foreach ($awards as $k => $achievement)
				<li>{{ $achievement->award }}</li>
				@endforeach
			</ul>
		</section>
		@endif

		@if ( count($interests) > 0 )
		<hr class="uk-article-divider">

		<section id="interests">
			<h2 class="section-title">Activities / Interests / Affiliations</h2>
			<ul>
				@foreach ($interests as $k => $interest)
				<li>{{ $interest->activity }}</li>
				@endforeach
			</ul>
		</section>
		@endif
	</div>

</body>
</html>