<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Belesch-box">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('frontend/assets/images/favicon/favicon.png')}}" rel="icon">
    <title>@yield('title')</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
    {{--<link rel="stylesheet" href="../../../use.fontawesome.com/releases/v5.15.3/css/all.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/libraries.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/style.css')}}">
    @livewireStyles
</head>
<body>
<div class="wrapper">
    <div class="preloader">
        <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div>
@yield('content')
</div>
@livewireScripts
<script src="{{asset('/frontend/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/plugins.js')}}"></script>
<script src="{{asset('/frontend/assets/js/main.js')}}"></script>
<link rel="stylesheet" href="{{asset('frontend/assets/css/jquery.toast.css')}}">
<script src="{{asset('/frontend/assets/js/jquery.toast.min.js')}}"></script>
<!-- Bootstrap DatePicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
    function toastMessage(message) {
        $.toast({
            heading: 'Alert Message',
            text: message,
            icon: 'error',
            loader: true,        // Change it to false to disable loader
            loaderBg: '#de1414',  // To change the background
            showHideTransition: 'slide',
            hideAfter: 5000,
            allowToastClose: true,
            stack: 4,
            position: 'top-center',
        })
    }
	
	function sendMail() {
        var fullname = document.getElementById("contact-fname").value;
        var email = document.getElementById("contact-email").value;
        var phone = document.getElementById("contact-phone").value;
		var message = document.getElementById("contact-message").value;
			
		var mailtoLink = "mailto:info@beleschbox.de"
						+ "?subject=" + encodeURIComponent("Contact from " + fullname)
						+ "&body=" + encodeURIComponent("Full Name: " + fullname + "\n"
						+ "Phone: " + phone + "\n"
						+ "Email: " + email + "\n\n"
						+ "Message: \n" + message);
			
        window.location.href = mailtoLink;
    } 
</script>
@yield('extraJs')
</body>
</html>
