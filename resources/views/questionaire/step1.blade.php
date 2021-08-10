@extends('layouts.continuesteps')

@section('content')
	<div class="mainContent" aria-label="Welcome back!">
		<h1>This is our affinity questionnaire, why not give it a try?</h1>
		<p>Thanks for registering, this is the beginning of a beautiful friendship!</p>
	</div>
	<div class="submitRow">
		<a class="wdk-button t-primarySkin2 next " href="{{ url('/register/questionaire/2/'.$id) }}"><span class="text">Continue</span></a> 
	</div>
	
@endsection
               
