<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=0">
		<title>Welcome</title>
		<link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/png">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/registration_combined.css') }}" />
   </head>

      <body id="questionnaireContinue" class="questionnairePages" >
      <div id="pageWrapper">
         <main id="content">
            <section>
               <article>
                  <header class="tableRow">
<!--
                     <div class="tableCell">
                        <img class="brandLogo" src="{{ asset('/images/ps_logo_2016.svg') }}" alt="Dating with wegatyou" aria-hidden="true" />
                     </div>
-->
                  </header>
                  @yield('content')
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

</html>
