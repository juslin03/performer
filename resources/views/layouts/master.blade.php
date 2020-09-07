
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/logo_performer.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('images/logo_performer.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
</head>

<body class="">
  <div class="wrapper">

    {{-- side bar include --}}
    @include('layouts.inc.sidebar')
    {{-- end side bar include --}}

    <div class="main-panel" id="main-panel">

        {{-- navbar include --}}
        @include('layouts.inc.navbar')
        {{-- end navbar include --}}

        @yield('panel')
      <div class="content">
        @yield('content')
      </div>

     {{-- footer include --}}
     @include('layouts.inc.footer')
     {{-- end footer include --}}

    </div>


  </div>

  {{-- plugins include --}}
  @include('layouts.inc.plugin')
  {{-- end plugins include --}}


  {{-- Core JS Files --}}
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  {{-- Google Maps Plugin  --}}
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  {{-- Chart JS --}}
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  {{-- Notifications Plugin --}}
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>


  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>

  {{-- Sharrre libray --}}
  <script src="{{ asset('assets/demo/jquery.sharrre.js') }}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    @if(session('status'))
        swal({
            title: "{{ session('statuscode') }}",
            text: "{{ session('status') }}",
            icon: "{{ session('statuscode') }}",
            button: "ok!",
        });
    @endif
  </script>
  <script>
    $(document).ready(function(){
      statistics.initDashboardPageCharts();

      $('#facebook').sharrre({
    share: {
      facebook: true
    },
    enableHover: false,
    enableTracking: false,
    enableCounter: false,
    click: function(api, options){
      api.simulateClick();
      api.openPopup('facebook');
    },
    template: '<i class="fab fa-facebook-f"></i> Facebook',
    url: 'https://demos.creative-tim.com/now-ui-dashboard/examples/dashboard.html'
    });

      $('#google').sharrre({
    share: {
      googlePlus: true
    },
    enableCounter: false,
    enableHover: false,
    enableTracking: true,
    click: function(api, options){
      api.simulateClick();
      api.openPopup('googlePlus');
    },
    template: '<i class="fab fa-google-plus"></i> Google',
    url: 'https://demos.creative-tim.com/now-ui-dashboard/examples/dashboard.html'
     });

      $('#twitter').sharrre({
    share: {
      twitter: true
    },
    enableHover: false,
    enableTracking: false,
    enableCounter: false,
    buttons: { twitter: {via: 'CreativeTim'}},
    click: function(api, options){
      api.simulateClick();
      api.openPopup('twitter');
    },
    template: '<i class="fab fa-twitter"></i> Twitter',
    url: 'https://demos.creative-tim.com/now-ui-dashboard/examples/dashboard.html'
     });




        //  Facebook Pixel Code Don't Delete
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

        try{
            fbq('init', '111649226022273');
            fbq('track', "PageView");

        }catch(err) {
            console.log('Facebook Track Error:', err);
        }

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1"
    />

  </noscript>

    <script>
    $(document).ready(function(){
      $().ready(function(){
          $sidebar = $('.sidebar');
          $sidebar_img_container = $sidebar.find('.sidebar-background');

          $full_page = $('.full-page');

          $sidebar_responsive = $('body > .navbar-collapse');
          sidebar_mini_active = true;

          window_width = $(window).width();

          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

          // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
          //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
          //         $('.fixed-plugin .dropdown').addClass('show');
          //     }
          //
          // }

          $('.fixed-plugin a').click(function(event){
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
              if($(this).hasClass('switch-trigger')){
                  if(event.stopPropagation){
                      event.stopPropagation();
                  }
                  else if(window.event){
                     window.event.cancelBubble = true;
                  }
              }
          });

          $('.fixed-plugin .background-color span').click(function(){
              $(this).siblings().removeClass('active');
              $(this).addClass('active');

              var new_color = $(this).data('color');

              if($sidebar.length != 0){
                  $sidebar.attr('data-color',new_color);
              }

              if($full_page.length != 0){
                  $full_page.attr('filter-color',new_color);
              }

              if($sidebar_responsive.length != 0){
                  $sidebar_responsive.attr('data-color',new_color);
              }
          });

          $('.fixed-plugin .img-holder').click(function(){
              $full_page_background = $('.full-page-background');

              $(this).parent('li').siblings().removeClass('active');
              $(this).parent('li').addClass('active');


              var new_image = $(this).find("img").attr('src');

              if( $sidebar_img_container.length !=0 && $('.switch-sidebar-image input:checked').length != 0 ){
                  $sidebar_img_container.fadeOut('fast', function(){
                     $sidebar_img_container.css('background-image','url("' + new_image + '")');
                     $sidebar_img_container.fadeIn('fast');
                  });
              }

              if($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0 ) {
                  var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                  $full_page_background.fadeOut('fast', function(){
                     $full_page_background.css('background-image','url("' + new_image_full_page + '")');
                     $full_page_background.fadeIn('fast');
                  });
              }

              if( $('.switch-sidebar-image input:checked').length == 0 ){
                  var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                  var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                  $sidebar_img_container.css('background-image','url("' + new_image + '")');
                  $full_page_background.css('background-image','url("' + new_image_full_page + '")');
              }

              if($sidebar_responsive.length != 0){
                  $sidebar_responsive.css('background-image','url("' + new_image + '")');
              }
          });

          $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function(){
              $full_page_background = $('.full-page-background');

              $input = $(this);

              if($input.is(':checked')){
                  if($sidebar_img_container.length != 0){
                      $sidebar_img_container.fadeIn('fast');
                      $sidebar.attr('data-image','#');
                  }

                  if($full_page_background.length != 0){
                      $full_page_background.fadeIn('fast');
                      $full_page.attr('data-image','#');
                  }

                  background_image = true;
              } else {
                  if($sidebar_img_container.length != 0){
                      $sidebar.removeAttr('data-image');
                      $sidebar_img_container.fadeOut('fast');
                  }

                  if($full_page_background.length != 0){
                      $full_page.removeAttr('data-image','#');
                      $full_page_background.fadeOut('fast');
                  }

                  background_image = false;
              }
          });

          $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function(){
            var $btn = $(this);

            if(sidebar_mini_active == true){
                $('body').removeClass('sidebar-mini');
                sidebar_mini_active = false;
                nowuiDashboard.showSidebarMessage('Sidebar mini deactivated...');
            }else{
                $('body').addClass('sidebar-mini');
                sidebar_mini_active = true;
                nowuiDashboard.showSidebarMessage('Sidebar mini activated...');
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function(){
                window.dispatchEvent(new Event('resize'));
            },180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function(){
                clearInterval(simulateWindowResize);
            },1000);
          });
      });
    });
   </script>

  @yield('scripts')
</body>

</html>
