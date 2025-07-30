<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jul 2025 21:29:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: HRMS:: Admin Dashboard </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/my-task.style.min.css') }}">

@stack('styles')
</head>

<body  data-mytask="theme-indigo">
  <div id="mytask-layout">
  @include('includes.sidebar')
      @yield('content')
    

      <!-- start: template setting, and more. -->
	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_setting" aria-labelledby="offcanvas_setting">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Template Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column">
        <div class="mb-4">
          <h6>Set Theme Color</h6>
          <ul class="choose-skin list-unstyled mb-0">
            <li data-theme="ValenciaRed"><div style="--mytask-theme-color: #D63B38;"></div></li>
            <li data-theme="SunOrange"><div style="--mytask-theme-color: #F7A614;"></div></li>
            <li data-theme="AppleGreen"><div style="--mytask-theme-color: #5BC43A;"></div></li>
            <li data-theme="CeruleanBlue"><div style="--mytask-theme-color: #00B8D6;"></div></li>
            <li data-theme="Mariner"><div style="--mytask-theme-color: #0066FE;"></div></li>
            <li data-theme="PurpleHeart" class="active"><div style="--mytask-theme-color: #6238B3;"></div></li>
            <li data-theme="FrenchRose"><div style="--mytask-theme-color: #EB5393;"></div></li>
          </ul>
        </div>
              <div class="mb-4 flex-grow-1">
          <h6>Set Theme Light/Dark/RTL</h6>
          <!-- Theme: Switch Theme -->
                  <ul class="list-unstyled mb-0">
                      <li>
                          <div class="form-check form-switch theme-switch">
                              <input class="form-check-input fs-6" type="checkbox" role="switch" id="theme-switch">
                              <label class="form-check-label mx-2" for="theme-switch">Enable Dark Mode!</label>
                          </div>
                      </li>
                      <li>
                          <div class="form-check form-switch theme-rtl">
                              <input class="form-check-input fs-6" type="checkbox" role="switch" id="theme-rtl">
                              <label class="form-check-label mx-2" for="theme-rtl">Enable RTL Mode!</label>
                          </div>
                      </li>
                      <li>
                          <div class="form-check form-switch monochrome-toggle">
                              <input class="form-check-input fs-6" type="checkbox" role="switch" id="monochrome">
                              <label class="form-check-label mx-2" for="monochrome">Monochrome Mode</label>
                          </div>
                      </li>
                  </ul>
        </div>
        <div class="d-flex">
          <a href="https://themeforest.net/item/mytask-hr-project-management-admin-template/31974551" class="btn w-100 me-1 py-2 btn-primary">Buy Now</a>
          <a href="https://themeforest.net/user/pixelwibes/portfolio" class="btn w-100 ms-1 py-2 btn-dark">View Portfolio</a>
        </div>
      </div>
    </div>
  </div>
      
<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Plugin Js -->
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/page/hr.js') }}"></script>
@stack('scripts')


</body>

</html>