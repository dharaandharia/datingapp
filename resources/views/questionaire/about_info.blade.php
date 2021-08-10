<html>
<body id="questionnaireQuestion" class="questionnairePages"  style="background-color: rgba(0, 142, 214, 0.6) !important;">
        
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=0">
<title>Questionaire</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/registration_combined.css') }}" />
<style>
    .container.abt {
    max-width: 800px;
    margin: 0 auto;
    align-items: center;
    display: flex;
}
.container.abt .row {
    box-shadow: 0px 0px 16px -3px #dfdfdf;
    padding: 20px;
}


p.grey-n {
    background: #bfbfbf;
    text-align: center;
    padding: 16px;
    font-size: 20px;
    font-family: system-ui;
    color: #000;
    font-weight: 500;
    border-radius: 5px;
}
p.blue-n {
    background: #2899d2;
    text-align: center;
    padding: 16px;
    font-size: 20px;
    font-family: system-ui;
    color: #fff;
    font-weight: 500;
    border-radius: 5px;
}
form.abt-from input[type="submit"] {
border: 1px solid #2899d2;
    height: 50px;
    display: block;
    margin-top: 10px !important;
    max-width: 150px;
    width: 100%;
    margin: 0 auto;
    background: #2899d2;
    font-size: 20px;
    text-transform: uppercase;
    color: #fff;
}
form.abt-from textarea {
    width: 100%;
    border-radius: 5px 0px 0px 5px;
}
img.logo-n {
    max-width: 90px;
    margin: 0 auto;
    display: block;
}

</style>
<div id="pageWrapper">
    <main id="content">
            <section>
                <div class="container abt">
                    <div class="row">
                        <img class="logo-n" src="{{ url('/images/logo.png') }}">
                        <p class="blue-n">Please give us some details to help fill out both your account and your profile Image</p>
                    <p class="blue-n">Tell us a little about you! Describe yourself, what you're looking for in a relationship, and/or about your ideal partner</p>
                    <form class="abt-from" method="POST" action="{{ url('saveaboutinfo') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <textarea name="aboutinfo" rows="10"></textarea>
                        <input type="submit" value="Submit">
                    </form>
                    </div>
                    
                </div>
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