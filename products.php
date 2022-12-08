<?php

include "db_connect.php";

?>


<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/brand/faviconLogo.png">
  <link rel="icon" type="image/png" href="assets/img/brand/faviconLogo.png">
  <title>PCS </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../../use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

  <link href="assets/css/styles.css?v=1.0.3" rel="stylesheet" />

  <link rel="stylesheet" href="https://unpkg.com/jsvectormap/dist/css/jsvectormap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="src/styles.css" />

  <style>
    #map {
      height: 500px;
      width: 100%;
      overflow: hidden;
    }

    a[href^="http://maps.google.com/maps"],
    a[href^="https://maps.google.com/maps"],
    a[href^="https://www.google.com/maps"] {
      display: none !important;
    }

    .gm-bundled-control .gmnoprint {
      display: block;
    }

    .gmnoprint:not(.gm-bundled-control) {
      display: none;
    }
  </style>
</head>

<body class="presentation-page">


  <!----------------------------------------------- Start of Navigation bar---------------------------------------------->


  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-primary navbar-dark position-sticky top-0  py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="index.html">

        <img src="assets/img/brand/logo.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.html">
                <h2>PCS</h2>
                <!-- <img src="assets/img/brand/blue.png"> -->
              </a>
            </div>

          </div>
        </div>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
          <li>
            <a href="index.html">
              <i class="ni ni-ui-04 d-lg-none"></i>
              <span class="nav-link-inner--text" style="color: white; margin-right: 15px;">Home</span>
            </a>
          </li>

          <li>
            <a href="about-us.html">
              <i class="ni ni-ui-04 d-lg-none"></i>
              <span class="nav-link-inner--text" style="color: white; margin-right: 15px;">Our Services</span>
            </a>


          </li>
          <li>
            <a href="products.php">
              <i class="ni ni-app d-lg-none"></i>
              <span class="nav-link-inner--text" style="color: white;margin-right: 15px;">Our Projects</span>
            </a>


          </li>
          <li>
            <a href="ecosystem.html">
              <i class="ni ni-app d-lg-none"></i>
              <span class="nav-link-inner--text" style="color: white;margin-right: 15px;">Our Ecosystem</span>
            </a>


          </li>
          <li>
            <a href="contact-us.html">
              <i class="ni ni-app d-lg-none"></i>
              <span class="nav-link-inner--text" style="color: white;margin-right: 15px;">Customer Support</span>
            </a>


          </li>
          <li class="nav-item">
            <a href="register-page.php" class="btn btn-white" target="_blank">
              <i class="ni ni-basket d-lg-none"></i>
              <span class="nav-link-inner--text">login <span
                  style="font-size: 10px; text-transform: lowercase;">or</span> create account</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>



  <div class="container">
    <div class="row align-items-center text-lg-center">
      <div class="col-lg-12 col-12" style="margin: 25px;">
        <h1 style="font-size: 60px; font-weight: 800; color: #172b4d;">Our Projects</h1>

      </div>
    </div>
  </div>
  <!----------------------------------------------- End of Navigation bar---------------------------------------------->


  <div id="map"></div>

  <script>
    function initMap() {


      const uluru = { lat: -25.344, lng: 131.031 };

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: uluru,
        fullscreenControl: false,
        mapTypeControl: false,
        streetViewControl: false,
      });

      const marker = new google.maps.Marker({
        position: uluru,
        map: map,
      });
    }

    window.initMap = initMap;
  </script>

  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-7fnvr_bhld57PhQt3Zgf6w2XrCs9ig&callback=initMap&v=weekly"
    defer></script>



  <!----------------------------------------------- Start of Project list---------------------------------------------->
  <div class="section">
    <div class="container-fluid" style="padding: 0 50px 0 50px;">
      <div class="row">
        <div class="col-md-10 mx-auto text-center">
          <h3 class="desc my-5"> The latest projects</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">

            <?php

            $sql = "SELECT * from projects";
            $result = mysqli_query($conn, $sql);

            echo '
<div class="col-12" style="margin-top: 10px;">

<table class="table table-striped table-hover">
<thead>
<tr>
  <th scope="col">Id</th>
  <th scope="col">Name</th>
  <th scope="col">Country</th>
  <th scope="col">Stage</th>
  <th scope="col">Verification Body</th>
  <th scope="col">Developer</th>
  
</tr>
</thead>';

            while ($row = mysqli_fetch_assoc($result)) {
              echo '
<tbody>
<tr>
  <td>' . $row['projectId'] . '</td>
  <td>' . $row['name'] . '</td>
  <td>' . $row['country'] . '</td>
  <td>' . $row['stage'] . '</td>
  <td>' . $row['verificationBody'] . '</td>
  <td>' . $row['developer'] . '</td>
</tr>
</tbody>

';
            }
            echo '
</table>
</div>';
            ?>


            <div class="col-md-3 ml-auto mr-auto mt-5 text-center">
              <button rel="tooltip" class="btn btn-primary btn-round btn-simple">Load more...</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!----------------------------------------------- Start of Footer ---------------------------------------------->
  <footer class="footer-section">
    <div class="container">

      <div class="footer-content pt-5 pb-5">
        <div class="row">
          <div class="col-xl-6 col-lg-6 mb-50">
            <div class="footer-widget">
              <div class="footer-logo">
                <a href="index.html"><img src="assets/img/brand/logo.png" class="img-fluid" alt="logo"></a>
              </div>
              <div class="footer-text">
                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec
                  tetur adipisicing
                  elit,Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="footer-social-icon">
                <span>Follow us</span>
                <a href="#"><i class="fa fa-facebook facebook-bg"></i></a>
                <a href="#"><i class="fa fa-twitter twitter-bg"></i></a>
                <a href="#"><i class="fa fa-github github-bg"></i></a>
              </div>
            </div>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-6 mb-50">
            <div class="footer-widget">
              <div class="footer-widget-heading">
                <h3>Subscribe</h3>
              </div>
              <div class="footer-text mb-25">
                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
              </div>
              <div class="subscribe-form">
                <form action="#">
                  <input type="text" placeholder="Email Address">
                  <button><i class="fa fa-mail-forward"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 text-center text-lg-left">
            <div class="copyright-text">
              <p>Copyright &copy; 2022, All Right Reserved <a href="#">MK</a></p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Policy</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!----------------------------------------------- End of Footer ---------------------------------------------->

  </div>

  <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script src="assets/js/plugins/bootstrap-switch.js"></script>

  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

  <script src="assets/js/plugins/glide.js" type="text/javascript"></script>

  <script src="assets/js/plugins/moment.min.js"></script>

  <script src="assets/js/plugins/choices.min.js" type="text/javascript"></script>

  <script src="assets/js/plugins/datetimepicker.js" type="text/javascript"></script>

  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

  <script src="assets/js/plugins/headroom.min.js"></script>


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>

  <script async defer src="../../buttons.github.io/buttons.js"></script>
  <script src="assets/js/styles.js?v=1.0.3" type="text/javascript"></script>
  <script src="assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function () {



      // Goolge Analytics Code Don't Delete

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-46172202-1']);
      _gaq.push(['_trackPageview']);

      (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();

      // Facebook Pixel Code Don't Delete
      ! function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '../../connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }


      // 
      // 

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
  </noscript>
  <script>
    // Carousel
    new Glide('.glide', {
      type: 'carousel',
      startAt: 0,
      focusAt: 2,
      perTouch: 1,
      perView: 4
    }).mount();


    // Testimonial Carousel
    new Glide('.testimonial-glide', {
      type: 'carousel',
      startAt: 0,
      focusAt: 2,
      perTouch: 1,
      perView: 4
    }).mount();

    ArgonKit.initGoogleMaps();
    ArgonKit.initGoogleMaps2();
  </script>
  <script src="../../cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
    integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
    data-cf-beacon='{"rayId":"755cbaee6a654cb0","token":"1b7cbb72744b40c580f8633c6b62637e","version":"2022.8.1","si":100}'
    crossorigin="anonymous"></script>

</body>

</html>