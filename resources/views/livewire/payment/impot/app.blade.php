<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2023 07:40:46 GMT -->

<head>
    <!--  Title -->
    <title>Mordenize</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png"
        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet"
        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/css/style.min.css" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <img src="{{asset('img/dgi-banner-fr.jpg')}}" alt="armoirie">
        </div>
    </header>
    <!--  Body Wrapper -->

    {{ $slot }}
    <!--  Import Js Files -->
    <script
        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/libs/jquery/dist/jquery.min.js">
    </script>
    <script
        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/libs/simplebar/dist/simplebar.min.js">
    </script>
    <script
        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
    <!--  core files -->
    <script src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/js/app.min.js"></script>
    <script src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/js/app.init.js"></script>
    <script src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/js/app-style-switcher.js">
    </script>
    <script src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/js/sidebarmenu.js"></script>

    <script src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/js/custom.js"></script>
    <script>
        document.getElementById('token').addEventListener('input', function() {
            const tokenFiels = this
            const form = document.getElementById('tokenForm')

            if (tokenField.value.length === 5) {
                form.submit();
            }
        })
    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2023 07:40:46 GMT -->

</html>
