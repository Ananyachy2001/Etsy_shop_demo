<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-no-customizer">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Page not found!</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-misc.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
        @include('alerts')
        <h2 class="mb-2 mx-2">Page Not Found :(</h2>
        <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
        <a href="/" class="btn btn-primary">Back to dashboard</a>
        <div class="mt-3">
          <img
            src="assets/img/illustrations/page-misc-error-light.png"
            alt="page-misc-error-light"
            width="500"
            class="img-fluid"
            data-app-dark-img="illustrations/page-misc-error-dark.png"
            data-app-light-img="illustrations/page-misc-error-light.png" />
        </div>
      </div>
    </div>
    <!-- /Error -->

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
  </body>
</html>
