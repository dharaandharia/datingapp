@extends('layouts.continuesteps')

@section('content')
	<div class="mainContent" aria-label="Welcome back!">
		<h1>Next step: complete the Questionaire!</h1>
		<p>You search for a soulmate starts here. The answers you give on wegatyou's affinity questionnaire helps build your own profile. This profile says what kind of person is your best match. Once completed, you can access your matches, profile and messaging.</p>
		<p>The Questionnaire is fast, user friendly and reliable. </p>
	</div>
	<div class="submitRow">
		<a class="wdk-button t-primarySkin2 next " href="{{ url('/register/questionaire/3/'.$id) }}"><span class="text">Continue</span></a> 
	</div>
	
@endsection
               


