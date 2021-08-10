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
               <form action="" method="post" novalidate="novalidate">
                  @csrf
                  <article>
                     <header>
                        <h1 class="row" role="heading" aria-level="1">
                           <p class="questionText">Where do you like to spend your free time?</p>
                        </h1>
                     </header>
                     <div class="row">
                        <ul class="column">
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="" name=""
                                 value="" />
                              <label id="" for="">
                              At my home or visiting friends </label>
                           </li>
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="answerID_q106_106.02" name="question['q106'].answer['0']"
                                 value="106.02" />
                              <label id="answerID_q106_106.02_label" for="answerID_q106_106.02">
                              Doing stuff outdoors </label>
                           </li>
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="answerID_q106_106.02" name="question['q106'].answer['0']"
                                 value="106.02" />
                              <label id="answerID_q106_106.02_label" for="answerID_q106_106.02">
                              Socialising </label>
                           </li>
                        </ul>
                     </div>
                  </article>
                  <article>
                     <header>
                        <h1 class="row" role="heading" aria-level="1">
                           <p class="questionText">How much do you like to cook?</p>
                        </h1>
                     </header>
                     <div class="row">
                        <ul class="column">
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="#" name="question['q107'].answer['0']"
                                 value="107.01" />
                              <label id="answerID_q107_107.01_label" for="answerID_q107_107.01">
                              I'm always cooking and trying new recipes </label>
                           </li>
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="#" name="question['q107'].answer['0']"
                                 value="107.02" />
                              <label id="answerID_q107_107.02_label" for="answerID_q107_107.02">
                              I like to cook occasionally </label>
                           </li>
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="#" name="question['q107'].answer['0']"
                                 value="107.02" />
                              <label id="answerID_q107_107.02_label" for="answerID_q107_107.02">
                              I only cook if i have to </label>
                           </li>
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="#" name="question['q107'].answer['0']"
                                 value="107.02" />
                              <label id="answerID_q107_107.02_label" for="answerID_q107_107.02">
                              I only cook on special occasions </label>
                           </li>
                           <li class="answerWrapper qa-answerWrapper">
                              <input type="radio" id="#" name="question['q107'].answer['0']"
                                 value="107.02" />
                              <label id="answerID_q107_107.02_label" for="answerID_q107_107.02">
                              I'm not a good cook </label>
                           </li>
                        </ul>
                     </div>
                  </article>
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
                     <a id="footerLink1" href="" >About us</a>
                  </li>
                  <li>
                     <a id="footerLink2" href="" >Terms & conditions </a>
                  </li>
                  <li>
                     <a id="footerLink3" href="" rel="nofollow" >Privacy policy </a>
                  </li>
                  <li>
                     <a id="footerLink4" href="" >Help</a>
                  </li>
               </ul>
            </nav>
         </footer>
      
   </body>
</html>


