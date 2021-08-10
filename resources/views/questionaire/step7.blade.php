<!DOCTYPE html>
<html lang="en-US">
   <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=0">
      <title>Questionaire</title>
	  <link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/png">
      <link rel="stylesheet" type="text/css" href="{{ asset('/css/registration_combined.css') }}" />

   </head>
   <body id="questionnaireCheckpoint" class=" is-checkpoint_1 questionnaireCheckpoints questionnairePages is-heteroUser" >
      <div id="pageWrapper">
         <main id="content">
            <section class="showPage1">
               <article>
                  <!--<header id="pageHeader">
                     <div id="checkpointProgress" aria-hidden="true">
                        <div class="status section_1"></div>
                        <span class="nr1">1</span>
                        <span class="nr2">2</span>
                        <span class="nr3">3</span>
                        <span class="nr4">4</span>
                        <span class="nr5">5</span>
                     </div>
                  </header>-->
                  <div class="mainContent">
                     <div id="page1" class="page">
                        <h1>You've completed 50%</h1>
                     </div>
                     <div id="page2" class="page" aria-hidden="true">
                        <p>Now we're going to ask some questions about your preferences and interests. This is how our Compatibility Matching System finds your most compatible matches</p>
                     </div>
                  </div>
                  <div class="submitRow">
                     <a id="buttonNext1" class="wdk-button t-primarySkin2 next " href="{{ url('/register/questionaire/8/'.$id) }}" > <span class="text">Continue</span> </a>
                  </div>
               </article>
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
      </div>
   </body>
</html>

