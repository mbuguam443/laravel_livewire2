<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('backend/plugins/toastr/toastr.min.css')}} " rel="stylesheet">
    <livewire:styles />
    @stack('styles')

    <style>
        /*!
 * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
 * Copyright 2015 Daniel Cardoso <@DanielCardoso>
 * Licensed under MIT
 */
        .la-ball-spin,
        .la-ball-spin>div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .la-ball-spin {
            display: block;
            font-size: 0;
            color: #fff;
        }

        .la-ball-spin.la-dark {
            color: #333;
        }

        .la-ball-spin>div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor;
        }

        .la-ball-spin {
            width: 32px;
            height: 32px;
        }

        .la-ball-spin>div {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            margin-top: -4px;
            margin-left: -4px;
            border-radius: 100%;
            -webkit-animation: ball-spin 1s infinite ease-in-out;
            -moz-animation: ball-spin 1s infinite ease-in-out;
            -o-animation: ball-spin 1s infinite ease-in-out;
            animation: ball-spin 1s infinite ease-in-out;
        }

        .la-ball-spin>div:nth-child(1) {
            top: 5%;
            left: 50%;
            -webkit-animation-delay: -1.125s;
            -moz-animation-delay: -1.125s;
            -o-animation-delay: -1.125s;
            animation-delay: -1.125s;
        }

        .la-ball-spin>div:nth-child(2) {
            top: 18.1801948466%;
            left: 81.8198051534%;
            -webkit-animation-delay: -1.25s;
            -moz-animation-delay: -1.25s;
            -o-animation-delay: -1.25s;
            animation-delay: -1.25s;
        }

        .la-ball-spin>div:nth-child(3) {
            top: 50%;
            left: 95%;
            -webkit-animation-delay: -1.375s;
            -moz-animation-delay: -1.375s;
            -o-animation-delay: -1.375s;
            animation-delay: -1.375s;
        }

        .la-ball-spin>div:nth-child(4) {
            top: 81.8198051534%;
            left: 81.8198051534%;
            -webkit-animation-delay: -1.5s;
            -moz-animation-delay: -1.5s;
            -o-animation-delay: -1.5s;
            animation-delay: -1.5s;
        }

        .la-ball-spin>div:nth-child(5) {
            top: 94.9999999966%;
            left: 50.0000000005%;
            -webkit-animation-delay: -1.625s;
            -moz-animation-delay: -1.625s;
            -o-animation-delay: -1.625s;
            animation-delay: -1.625s;
        }

        .la-ball-spin>div:nth-child(6) {
            top: 81.8198046966%;
            left: 18.1801949248%;
            -webkit-animation-delay: -1.75s;
            -moz-animation-delay: -1.75s;
            -o-animation-delay: -1.75s;
            animation-delay: -1.75s;
        }

        .la-ball-spin>div:nth-child(7) {
            top: 49.9999750815%;
            left: 5.0000051215%;
            -webkit-animation-delay: -1.875s;
            -moz-animation-delay: -1.875s;
            -o-animation-delay: -1.875s;
            animation-delay: -1.875s;
        }

        .la-ball-spin>div:nth-child(8) {
            top: 18.179464974%;
            left: 18.1803700518%;
            -webkit-animation-delay: -2s;
            -moz-animation-delay: -2s;
            -o-animation-delay: -2s;
            animation-delay: -2s;
        }

        .la-ball-spin.la-sm {
            width: 16px;
            height: 16px;
        }

        .la-ball-spin.la-sm>div {
            width: 4px;
            height: 4px;
            margin-top: -2px;
            margin-left: -2px;
        }

        .la-ball-spin.la-2x {
            width: 64px;
            height: 64px;
        }

        .la-ball-spin.la-2x>div {
            width: 16px;
            height: 16px;
            margin-top: -8px;
            margin-left: -8px;
        }

        .la-ball-spin.la-3x {
            width: 96px;
            height: 96px;
        }

        .la-ball-spin.la-3x>div {
            width: 24px;
            height: 24px;
            margin-top: -12px;
            margin-left: -12px;
        }

        /*
 * Animation
 */
        @-webkit-keyframes ball-spin {

            0%,
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }
        }

        @-moz-keyframes ball-spin {

            0%,
            100% {
                opacity: 1;
                -moz-transform: scale(1);
                transform: scale(1);
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 0;
                -moz-transform: scale(0);
                transform: scale(0);
            }
        }

        @-o-keyframes ball-spin {

            0%,
            100% {
                opacity: 1;
                -o-transform: scale(1);
                transform: scale(1);
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 0;
                -o-transform: scale(0);
                transform: scale(0);
            }
        }

        @keyframes ball-spin {

            0%,
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 0;
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -o-transform: scale(0);
                transform: scale(0);
            }
        }
    </style>

    <!-- test -->


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.partials.navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            @include('layouts.partials.aside')

            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            {{$slot}}
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>

    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <livewire:scripts />
    <!-- test -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed');

                }
            });

            window.addEventListener('deleted', event => {
                Swal.fire({
                    title: "Deleted!",
                    text: event.detail.message,
                    icon: "success"
                });
            });
        });
    </script>






    <script>
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-bottom-right",
                "progressBar": true,
            }
            window.addEventListener('hide-form', event => {
                $('#form').modal('hide');

                toastr.success(event.detail.message, 'Success');
            });
            window.addEventListener('alert', event => {
                toastr.success(event.detail.message, 'Success');
            });
        });
    </script>
    <script>
        window.addEventListener('show-form', event => {
            $('#form').modal('show');

        });
        window.addEventListener('show-delete-modal', event => {
            $('#form2').modal('show');

        });
        window.addEventListener('hide-delete-form', event => {
            $('#form2').modal('hide');
            toastr.success(event.detail.message, 'Success');
        });
    </script>
    @stack('js')

</body>

</html>
