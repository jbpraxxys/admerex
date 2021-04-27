<!doctype html>
<html class="no-js" lang="en">
    <head>
        <% base_tag %>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <% loop HeaderFooter %>
        <link rel="shortcut icon" href="$Favicon.Url" type="image/x-icon" />
        <meta name="keywords" content="$SeoKeywords"> 
        <meta name="description" content="$SeoDesc"> 
        <% if Logo %>
             <meta property="og:image" content="$Logo.Url">
        <% end_if %>
        <% end_loop %>

        <% if $MetaDescription %>
            <meta name="description" content="$MetaDescription">
            <meta property="og:description" content="$MetaDescription">
        <% else %>
            <% loop HeaderFooter %>
                <meta name="description" content="$Description">
                <meta property="og:description" content="$Description">
            <% end_loop %>
        <% end_if %>

        <meta property="og:title" content="$Title">
        <meta property="og:url" content="{$AbsoluteBaseURL}">
        <meta property="og:site_name" content="$SiteConfig.Title">
        <meta property="og:type" content="website">

        <% if $ExtraMeta %>
            $ExtraMeta
        <% end_if %>


        <!-- Ionicon -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Slick -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/>

        <!-- Remodal -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/remodal/1.0.6/remodal.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/remodal/1.0.6/remodal-default-theme.min.css">

        <%-- Animate Css --%>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

        <!-- Light Gallery -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/css/lightgallery.min.css">
        
        <!-- SweetAlert -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

        <!-- Fonts -->
        <%-- <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="$ThemeDir/fonts/Ubuntu.css" rel="stylesheet"> --%>
        <link href="$ThemeDir/fonts/product-sans/stylesheet.css" rel="stylesheet">

        <!-- Compiled CSS -->
        <link href="$ThemeDir/assets/app.min.css" rel="stylesheet">

        <!-- Recaptcha -->
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        
        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>

        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="main" id="top">
        <% include Header %>

            $Form
            $Layout

            <% if $Content %>
                <div class="page-errorCon align-c">
                    <div class="vertical-parent">
                        <div class="vertical-align">
                            <h1>$Title</h1>
                            $Content
                        </div>
                    </div>
                </div>
            <% end_if %>

        <% include Footer %>
        </div>

      

        <!-- !!! -->
        <script type="text/javascript">
            var pageID = '$ClassName',
            baseHref = '$BaseHref',
            themeDir = '$ThemeDir';
        </script>


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147160707-30"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-147160707-30');
        </script>


        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5f0cfd8167771f3813c0f9eb/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

        <!-- Script -->
        <script type="text/javascript" src="$ThemeDir/assets/vendor.min.js"></script>
        <script type="text/javascript" src="$ThemeDir/assets/app.min.js"></script>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

         <!-- File Upload -->
        <script src="$ThemeDir/js/vendor/jquery.ui.widget.js"></script>
        <script src="$ThemeDir/js/vendor/jquery.iframe-transport.js"></script>
        <script src="$ThemeDir/js/vendor/jquery.fileupload.js"></script>
        <!--  -->

        <!-- Vue -->
        <!--<script src="https://cdn.jsdelivr.net/npm/vue@2.6.6/dist/vue.js"></script>-->

        <!-- jQuery Zoom -->
        <!-- <script src="https://cdn.rawgit.com/jackmoore/zoom/master/jquery.zoom.min.js"></script>-->

        <!-- Validate -->
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

        <!-- StickyFloat -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/stickyfloat/7.5.0/stickyfloat.js"></script>
        
        <!-- Slick -->
        <script src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
        <script src="//alexandrebuffet.fr/codepen/slider/slick-animation.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <!-- Remodal -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/remodal/1.0.6/remodal.min.js"></script>
        
        <!-- SweetAlert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Scrollify -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.5/jquery.scrollify.min.js"></script>    

        <!-- TweenMax -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenLite.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/plugins/ModifiersPlugin.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/plugins/ScrollToPlugin.min.js"></script>

        <!-- ScrollMagic -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d0c0ed665a9655b"></script>

        <!-- HoverIntent -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/1.8.1/jquery.hoverIntent.min.js"></script>
        
        <!-- GoogleMap -->
        <%--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZhlAVfe9K80UZJvHRTBmMmsXpD9ocqo"></script>
        <script type="text/javascript" src="$ThemeDir/js/vendor/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="$ThemeDir/js/storelocator.js"></script>

        <!-- Maps -->
        <% loop ContactPage %>
             <script type="text/javascript">
                    var mapLat = $Lat,
                        mapLng = $Lng;

                var mapOptions = {
                    zoom: 15,
                    center: new google.maps.LatLng(mapLat, mapLng),
                    // styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}]
                };

                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(mapLat, mapLng),
                    map: map,
                    title: 'Trinity',
                    icon: '$MapPin.Url',
                    animation: google.maps.Animation.DROP,
                });
            </script>
        <% end_loop %> --%>

        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        
        <!-- Light Gallery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/js/lightgallery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lg-video@1.2.2/dist/lg-video.min.js"></script>
        
        <!-- Script --> 
        <script type="text/javascript" src="$ThemeDir/js/script.js"></script>
        <script type="text/javascript" src="$ThemeDir/js/animate.js"></script>

    </body>
</html>
