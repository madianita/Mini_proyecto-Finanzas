<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name') }} | @yield('title', '')</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>




    @livewireStyles

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('components.layouts.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                {{-- <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                </nav> --}}
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">@yield('breadcrumb')</h4>
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-12">
                                            <div class="card-body">
                                                @yield('content')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @livewireScripts


    <!-- Scripts al final del body -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <script type="text/javascript">
        Livewire.on('close-modal', () => {
            $('#create-modal').modal('hide');
            $('#edit-modal').modal('hide');
            $('#delete-modal').modal('hide');
            $('#info-modal').modal('hide');
            $('#show-modal').modal('hide');
        });

        window.addEventListener('open-edit-modal', event => {
            $('#edit-modal').modal('show');
        });

        window.livewire.on('alert', param => {
            toastr[param['type']](param['message']);
        });

        document.addEventListener('livewire:load', function() {
            Livewire.on('alert', (type, message) => {
                toastr[type](message);
            });
            window.livewire.on('alert', param => {
                toastr[param['type']](param['message']);
            });
        });

        document.addEventListener('livewire:load', function() {
            console.log('Livewire cargado y listo.');

            Livewire.on('searchUpdated', () => {
                console.log('La búsqueda se ha actualizado.');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            Livewire.emit('searchUpdated');
        });

        $(document).ready(function() {
            $('.mi-select').select2();
        });

        Livewire.on('selectUpdated', () => {
            console.log('El select ha sido actualizado.');
        });
    </script>
</body>

</html>
