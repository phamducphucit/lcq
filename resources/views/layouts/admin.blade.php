<!DOCTYPE html>
<html lang="en">

<head>
    <title>TỔNG KHO SÀI GÒN - LINH CHI QUÁN</title>
  
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('..\files\assets\images\favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\bootstrap\css\bootstrap.min.css') }}">
   
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">

    <!-- jquery file upload Frame work -->
    <link href="{{ asset('..\files\assets\pages\jquery.filer\css\jquery.filer.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('..\files\assets\pages\jquery.filer\css\themes\jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\css\component.css')}}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('..\files\bower_components\select2\css\select2.min.css')}}">
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\multiselect\css\multi-select.css')}}">
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\jquery.steps\css\jquery.steps.css') }}">
     <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\bootstrap-tagsinput\css\bootstrap-tagsinput.css') }}">
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\switchery\css\switchery.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\icon\themify-icons\themify-icons.css')}}">
    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\icon\simple-line-icons\css\simple-line-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\icon\icofont\css\icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\icon\feather\css\feather.css')}}">
    <!-- light-box css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\ekko-lightbox\css\ekko-lightbox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\lightbox2\css\lightbox.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\css\style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\css\jquery.mCustomScrollbar.css') }}">
    
    
</head>

<body>
    <!-- Pre-loader start -->
    @include('layouts.pages_include.pre_loader')
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('layouts.pages_include.navbar_header')

            <!-- Sidebar chat start -->
            @include('layouts.pages_include.sidebar_chat')

            <!-- Sidebar inner chat start-->
            @include('layouts.pages_include.sidebar_inner_chat')
            <!-- Sidebar inner chat end-->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!--  -->
                    @include('layouts.pages_include.navbar_left')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper" style="padding: 0px;">
                                    <div class="page-body">
                                        @yield('content')
                                    </div>
                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <!-- <script data-cfasync="false" src="{{ asset('..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\jquery\js\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('..\files\bower_components\jquery-ui\js\jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('..\files\bower_components\popper.js\js\popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('..\files\bower_components\bootstrap\js\bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\modernizr\js\modernizr.js') }}"></script>
    <!--Forms - Wizard js-->
    <script src="{{ asset('..\files\bower_components\jquery.cookie\js\jquery.cookie.js') }}"></script>
    <script src="{{ asset('..\files\bower_components\jquery.steps\js\jquery.steps.js') }}"></script>
    <script src="{{ asset('..\files\bower_components\jquery-validation\js\jquery.validate.js') }}"></script>
    <!-- data-table js -->
    <script src="{{ asset('..\files\bower_components\datatables.net\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('..\files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('..\files\assets\pages\data-table\js\jszip.min.js')}}"></script>
    <script src="{{ asset('..\files\assets\pages\data-table\js\pdfmake.min.js')}}"></script>
    <script src="{{ asset('..\files\assets\pages\data-table\js\vfs_fonts.js')}}"></script>
    <script src="{{ asset('..\files\bower_components\datatables.net-buttons\js\buttons.print.min.js')}}"></script>
    <script src="{{ asset('..\files\bower_components\datatables.net-buttons\js\buttons.html5.min.js')}}"></script>
    <script src="{{ asset('..\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('..\files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('..\files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{ asset('..\files\assets\pages\data-table\js\data-table-custom.js')}}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\chart.js\js\Chart.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset('..\files\assets\pages\widget\amchart\amcharts.js') }}"></script>
    <script src="{{ asset('..\files\assets\pages\widget\amchart\serial.js') }}"></script>
    <script src="{{ asset('..\files\assets\pages\widget\amchart\light.js') }}"></script>
    <script src="{{ asset('..\files\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('..\files\assets\js\SmoothScroll.js') }}"></script> -->
    <script src="{{ asset('..\files\assets\js\pcoded.min.js') }}"></script>
    <!-- light-box js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\ekko-lightbox\js\ekko-lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('..\files\bower_components\lightbox2\js\lightbox.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('..\files\assets\js\vartical-layout.min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('..\files\assets\pages\dashboard\custom-dashboard.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('..\files\assets\js\script.min.js') }}"></script>

    <!-- jquery file upload js -->
    <script src="{{ asset('..\files\assets\pages\jquery.filer\js\jquery.filer.min.js')}}"></script>
    <script src="{{ asset('..\files\assets\pages\filer\custom-filer.js')}}" type="text/javascript"></script>
    <script src="{{ asset('..\files\assets\pages\filer\jquery.fileuploads.init.js')}}" type="text/javascript"></script>
    <!-- Model animation js -->
    <script src="{{ asset('..\files\assets\js\classie.js')}}"></script>
    <script src="{{ asset('..\files\assets\js\modalEffects.js')}}"></script>
    <script type="text/javascript" src="{{ asset('..\files\assets\pages\product-list\product-list.js')}}"></script>
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\select2\js\select2.full.min.js')}}"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js')}}">
    </script>
    <script type="text/javascript" src="{{ asset('..\files\bower_components\multiselect\js\jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{ asset('..\files\assets\js\jquery.quicksearch.js')}}"></script>
<!-- Switch component js -->
    <script type="text/javascript" src="{{ asset('..\files\bower_components\switchery\js\switchery.min.js')}}"></script>
    <!-- Custom js -->

    <script src="{{ asset('..\files\assets\pages\forms-wizard-validation\form-wizard.js')}}"></script>
    <script type="text/javascript" src="{{ asset('..\files\assets\pages\advance-elements\select2-custom.js')}}"></script>

    <script type="text/javascript" src="{{ asset('..\files\assets\js\script.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
