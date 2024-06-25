<!DOCTYPE html>

<html lang="en" class="light-style   layout-menu-fixed   customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/"
    data-base-url="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1" data-framework="laravel"
    data-template="blank-menu-theme-default-light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ env('APP_NAME') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="assetsLogin/vendor/fonts/tabler-iconsea04.css?id=6ad8bc28559d005d792d577cf02a2116" />
<link rel="stylesheet" href="assetsLogin/vendor/fonts/fontawesome8a69.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5" />
<link rel="stylesheet" href="assetsLogin/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />
<!-- Core CSS -->
<link rel="stylesheet" href="assetsLogin/vendor/css/rtl/core6cc1.css?id=9dd8321ea008145745a7d78e072a6e36" class="template-customizer-core-css" />
<link rel="stylesheet" href="assetsLogin/vendor/css/rtl/theme-defaultfc79.css?id=a4539ede8fbe0ee4ea3a81f2c89f07d9" class="template-customizer-theme-css" />
<link rel="stylesheet" href="assetsLogin/css/demof1ed.css?id=ddd2feb83a604f9e432cdcb29815ed44" />
<link rel="stylesheet" href="assetsLogin/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc" />
<link rel="stylesheet" href="assetsLogin/vendor/libs/perfect-scrollbar/perfect-scrollbar7358.css?id=280196ccb54c8ae7e29ea06932c9a4b6" />
<link rel="stylesheet" href="assetsLogin/vendor/libs/typeahead-js/typeaheadb5e1.css?id=2603197f6b29a6654cb700bd9367e2a3" />

<!-- Vendor Styles -->
<!-- Vendor -->
<link rel="stylesheet" href="assetsLogin/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="assetsLogin/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="assetsLogin/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="assetsLogin/vendor/libs/%40form-validation/umd/styles/index.min.css" />


<!-- Page Styles -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assetsLogin/vendor/css/pages/page-auth.css') }}">

  <!-- Include Scripts for customizer, helper, analytics, config -->
  <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
  <!-- laravel style -->
<script src="assetsLogin/vendor/js/helpers.js"></script>
<!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="assetsLogin/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assetsLogin/js/config.js"></script>

    <meta name="csrf-token" content="y0lzh53YmoH0xFgY2vFjhD4S1TOiq6lE58zbW7ec">
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">
    <meta name="title" content="Hummatech - Perusahaan Software Terbaik di Malang" />
    <meta name="description"
        content="Hummatech adalah perusahaan software development terbaik di Malang. Kami menyediakan solusi perangkat lunak yang inovatif dan berkualitas tinggi." />
    <meta name="og:description"
        content="Hummatech adalah perusahaan software development terbaik di Malang. Kami menyediakan solusi perangkat lunak yang inovatif dan berkualitas tinggi." />
    <meta name="og:image" content="{{ asset('mobilelogo.png') }}" />
    <meta name="twitter:image" content="{{ asset('mobilelogo.png') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <link rel="canonical" href="{{ url('/') }}" />

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/fonts/tabler-iconsea04.css?id=6ad8bc28559d005d792d577cf02a2116') }}" />
    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/fonts/fontawesome8a69.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5') }}" />
    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assetsLogin/vendor/css/rtl/core6cc1.css?id=9dd8321ea008145745a7d78e072a6e36') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/css/rtl/theme-defaultfc79.css?id=a4539ede8fbe0ee4ea3a81f2c89f07d9') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assetsLogin/css/demof1ed.css?id=ddd2feb83a604f9e432cdcb29815ed44') }}" />
    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc') }}" />
    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/libs/perfect-scrollbar/perfect-scrollbar7358.css?id=280196ccb54c8ae7e29ea06932c9a4b6') }}" />
    <link rel="stylesheet"
        href="{{ asset('assetsLogin/vendor/libs/typeahead-js/typeaheadb5e1.css?id=2603197f6b29a6654cb700bd9367e2a3') }}" />

    <link rel="stylesheet" href="{{ asset('assetsLogin/vendor/libs/%40form-validation/umd/styles/index.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assetsLogin/vendor/css/pages/page-auth.css') }}">
    <script src="{{ asset('assetsLogin/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/js/template-customizer.js') }}"></script>

    <script src="{{ asset('assetsLogin/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <link rel="stylesheet" href="{{ asset('assetsLogin/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsLogin/vendor/libs/sweetalert2/sweetalert2.css') }}" />

   
</head>

<body style="background-color: rgb(255, 255, 255)">

    @yield('content')

    <script src="{{ asset('assetsLogin/vendor/libs/jquery/jquery1e84.js?id=0f7eb1f3a93e3e19e8505fd8c175925a') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/libs/popper/popper0a73.js?id=baf82d96b7771efbcc05c3b77135d24c') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/js/bootstraped84.js?id=9a6c701557297a042348b5aea69e9b76') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/libs/node-waves/node-waves259f.js?id=4fae469a3ded69fb59fce3dcc14cd638') }}">
    </script>
    <script
        src="{{ asset('assetsLogin/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a') }}">
    </script>
    <script src="{{ asset('assetsLogin/vendor/libs/hammer/hammer2de0.js?id=0a520e103384b609e3c9eb3b732d1be8') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6') }}">
    </script>
    <script src="{{ asset('assetsLogin/vendor/js/menu2dc9.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/libs/%40form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assetsLogin/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assetsLogin/js/mainf696.js?id=8bd0165c1c4340f4d4a66add0761ae8a') }}"></script>
    <script src="{{ asset('assetsLogin/js/pages-auth.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assetsLogin/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="assetsLogin/vendor/libs/jquery/jquery1e84.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
    <script src="assetsLogin/vendor/libs/popper/popper0a73.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
    <script src="assetsLogin/vendor/js/bootstraped84.js?id=9a6c701557297a042348b5aea69e9b76"></script>
    <script src="assetsLogin/vendor/libs/node-waves/node-waves259f.js?id=4fae469a3ded69fb59fce3dcc14cd638"></script>
    <script src="assetsLogin/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
    <script src="assetsLogin/vendor/libs/hammer/hammer2de0.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
    <script src="assetsLogin/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
    <script src="assetsLogin/vendor/js/menu2dc9.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
    <script src="assetsLogin/vendor/libs/cleavejs/cleave.js"></script>
    <script src="assetsLogin/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="assetsLogin/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="assetsLogin/vendor/libs/select2/select2.js"></script>
    <script src="assetsLogin/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
    <script src="assetsLogin/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="assetsLogin/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="assetsLogin/js/mainf696.js?id=8bd0165c1c4340f4d4a66add0761ae8a"></script>

    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assetsLogin/js/pages-auth-multisteps.js') }}"></script>
    @yield('script')
</body>

</html>
