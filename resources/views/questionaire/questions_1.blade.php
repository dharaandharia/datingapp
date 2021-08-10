<!DOCTYPE html>
<html lang="en-US">
   <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=0">
      <title>Questionaire</title>
	  <link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/png">
      <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
   </head>
   <body id="questionnaireQuestion" class="questionnairePages" >
      <div id="pageWrapper">
<!--
         <div id="progressBar"><i style="width:54%;" data-current-status="72"></i></div>
-->
<!--
         <header id="header">
            <img class="brandLogo" src="{{ asset('/images/ps_logo_2016.svg') }}" alt="Dating with eharmony - eharmony.com" aria-hidden="true" />
         </header>
-->
         <main id="content">
            <section>
               <form action="{{ url('/saveoptions')}} " method="POST">
                  @csrf
				  <input type="hidden" name="user_id" value="{{ $id }}">
				  <input type="hidden" name="next_step" value="{{ $nextstep }}">
                  @foreach($questions as $question)
					  <article>
						 <header>
							<h1 class="row" role="heading" aria-level="1">
							   <p class="questionText">{{ $question['question'] }}</p>
							</h1>
						 </header>
						 <div class="row">
							<ul class="column">
								@foreach($question['option'] as $optkey => $option)
								   <li class="answerWrapper qa-answerWrapper">
									  <input type="radio" id="opt_{{ $option['id'] }}" name="question[{{ $question['id'] }}]"
										 value="{{ $option['id'] }}" />
									  <label id="opt_{{ $option['id'] }}_label" for="opt_{{ $option['id'] }}">
									  {{ $option['option'] }} </label>
								   </li>
								@endforeach
							</ul>
						 </div>
					  </article>
                  @endforeach
                  <footer>
                     <div class="row submitRow">
                        <div class="column">
                           <button id="submitQuestionForm" class="wdk-button t-primarySkin2 next disabled wdk_loadingIndicator" type="submit" > <span class="text">Continue</span> <span class="trippleDot loader t-dark"></span> </button> 
                        </div>
                     </div>
                  </footer>
               </form>
            </section>
         </main>
         <footer id="footerUnified" class="registrationLayout">
            <nav>
               <ul>
                  <li>
                    	<a id="footerLink1" href="{{ url('/privacypolicy') }}">Privacy policy </a>
                    </li>
                    <li>
                    	<a id="footerLink2" href="{{ url('/termsandconditions') }}" >Terms & conditions </a>
                    </li>
                    <li>
                    	<a id="footerLink3" href="{{ url('/useragreement') }}" >User Agreement</a>
                    </li>
               </ul>
            </nav>
         </footer>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
         <script>
		  var checkboxes_count = 0;
		  
		  $('input[type="radio"]').click(function(){
            if($(this).prop("checked") == true){
                console.log("Checkbox is checked.");
                checkboxes_count++;
            }
            else if($(this).prop("checked") == false){
                console.log("Checkbox is unchecked.");
                checkboxes_count--;
            }
            console.log(checkboxes_count);
            if(checkboxes_count >= 2){
				  $('#submitQuestionForm').removeClass('disabled');
			  }
			  else{
				  $('#submitQuestionForm').addClass('disabled');
			  }
        });
		  
      </script>
      
   </body>
</html>

