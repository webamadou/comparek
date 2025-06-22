@extends('layouts.argon')

@section('content')
    <div class="wrapper">
        <div class="section section-hero section-shaped">
            <div class="shape shape-style-1 shape-primary">
                <span class="span-150"></span>
                <span class="span-50"></span>
                <span class="span-50"></span>
                <span class="span-75"></span>
                <span class="span-100"></span>
                <span class="span-75"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
            </div>
            <div class="page-header">
                <div class="container shape-container d-flex align-items-center py-lg">
                    <div class="col px-0">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img src="{{asset('assets/logo/comparek-logo.png')}}" style="width: 200px;" class="img-fluid">
                                <p class="lead text-white">A beautiful Design System for Bootstrap 4. It's Free and Open Source.</p>
                                <div class="btn-wrapper mt-5">
                                    <a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-lg btn-white btn-icon mb-3 mb-sm-0">
                                        <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                                        <span class="btn-inner--text">Download HTML</span>
                                    </a>
                                    <a href="https://github.com/creativetimofficial/argon-design-system" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0" target="_blank">
                                        <span class="btn-inner--icon"><i class="fa fa-github"></i></span>
                                        <span class="btn-inner--text"><span class="text-warning">Star us</span> on Github</span>
                                    </a>
                                </div>
                                <div class="mt-5">
                                    <small class="font-weight-bold mb-0 mr-2 text-white">*proudly coded by</small>
                                    <img src="./assets/img/brand/creativetim-white-slim.png" style="height: 28px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <div class="section section-components pb-0" id="section-components">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <!-- Basic elements -->
                        <h2 class="mb-5">
                            <span>Basic Elements</span>
                        </h2>
                        <!-- Buttons -->
                        <h3 class="h4 text-success font-weight-bold mb-4">Buttons</h3>
                        <!-- Button colors -->
                        <div class="mb-3 mt-5">
                            <small class="text-uppercase font-weight-bold">Pick your color</small>
                        </div>
                        <button type="button" class="btn btn-primary">Primary</button>
                        <button type="button" class="btn btn-info">Info</button>
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-danger">Danger</button>
                        <button type="button" class="btn btn-warning">Warning</button>
                        <button type="button" class="btn btn-default">Default</button>
                        <button type="button" class="btn btn-secondary">Secondary</button>
                        <div class="mb-3 mt-5">
                            <small class="text-uppercase font-weight-bold">Rounded</small>
                        </div>
                        <button type="button" class="btn btn-primary btn-round">Primary</button>
                        <button type="button" class="btn btn-info btn-round">Info</button>
                        <button type="button" class="btn btn-success btn-round">Success</button>
                        <button type="button" class="btn btn-danger btn-round">Danger</button>
                        <button type="button" class="btn btn-warning btn-round">Warning</button>
                        <button type="button" class="btn btn-default btn-round">Default</button>
                        <button type="button" class="btn btn-secondary btn-round">Secondary</button>
                        <div class="mb-3 mt-5">
                            <small class="text-uppercase font-weight-bold">Outline</small>
                        </div>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                        <button type="button" class="btn btn-outline-info">Info</button>
                        <button type="button" class="btn btn-outline-success">Success</button>
                        <button type="button" class="btn btn-outline-danger">Danger</button>
                        <button type="button" class="btn btn-outline-warning">Warning</button>
                        <button type="button" class="btn btn-outline-default">Default</button>
                        <button type="button" class="btn btn-outline-secondary">Secondary</button>
                        <div class="mb-3 mt-5">
                            <small class="text-uppercase font-weight-bold">Outline Rounded</small>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-round">Primary</button>
                        <button type="button" class="btn btn-outline-info btn-round">Info</button>
                        <button type="button" class="btn btn-outline-success btn-round">Success</button>
                        <button type="button" class="btn btn-outline-danger btn-round">Danger</button>
                        <button type="button" class="btn btn-outline-warning btn-round">Warning</button>
                        <button type="button" class="btn btn-outline-default btn-round">Default</button>
                        <button type="button" class="btn btn-outline-secondary btn-round">Secondary</button>
                        <!-- Button links -->
                        <div class="mb-3 mt-5">
                            <small class="text-uppercase font-weight-bold">Links</small>
                        </div>
                        <button type="button" class="btn btn-link text-primary">Primary</button>
                        <button type="button" class="btn btn-link text-info">Info</button>
                        <button type="button" class="btn btn-link text-success">Success</button>
                        <button type="button" class="btn btn-link text-danger">Danger</button>
                        <button type="button" class="btn btn-link text-warning">Warning</button>
                        <button type="button" class="btn btn-link text-default">Default</button>
                        <button type="button" class="btn btn-link text-secondary">Secondary</button>
                        <!-- Button styles -->
                        <div>
                            <div class="mb-3 mt-5">
                                <small class="text-uppercase font-weight-bold">Pick your style</small>
                            </div>
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-icon btn-3 btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">Left icon</span>
                            </button>
                            <button class="btn btn-icon btn-3 btn-primary" type="button">
                                <span class="btn-inner--text">Right icon</span>
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                            </button>
                            <button class="btn btn-icon btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                            </button>
                            <!-- Button sizes -->
                            <div class="mb-3 mt-5">
                                <small class="text-uppercase font-weight-bold">Pick your size</small>
                            </div>
                            <button class="btn btn-sm btn-primary" type="button">Small</button>
                            <button class="btn btn-1 btn-primary" type="button">Regular</button>
                            <button class="btn btn-lg btn-primary" type="button">Large Button</button>
                            <div class="mb-3 mt-5">
                                <small class="text-uppercase font-weight-bold">Floating</small>
                            </div>
                            <button class="btn btn-sm btn-primary btn-icon-only rounded-circle" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                            </button>
                            <button class="btn btn-primary btn-icon-only rounded-circle" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                            </button>
                            <button class="btn btn-lg btn-primary btn-icon-only rounded-circle" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 mt-5">
                                    <small class="text-uppercase font-weight-bold">Active & Disabled</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-block active" type="button">Active</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-block disabled" type="button">Disabled</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mt-5">
                                    <small class="text-uppercase font-weight-bold">Block Level</small>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary btn-block" type="button">Primary</button>
                                    <button class="btn btn-info btn-block" type="button">Info</button>
                                </div>
                            </div>
                        </div>
                        <!-- Back to top button -->
                        <button class="btn btn-primary btn-icon-only back-to-top" type="button" name="button">
                            <i class="ni ni-bold-up"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pb-0 section-components">
            <div class="container mb-5">
                <!-- Inputs -->
                <h3 class="h4 text-success font-weight-bold mb-4">Inputs</h3>
                <div class="mb-3">
                    <small class="text-uppercase font-weight-bold">Form controls</small>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" placeholder="Regular" class="form-control" />
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" placeholder="Regular" class="form-control" disabled />
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <input class="form-control" placeholder="Birthday" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group has-success">
                            <input type="text" placeholder="Success" class="form-control is-valid" />
                        </div>
                        <div class="form-group has-danger">
                            <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5 bg-secondary">
                <div class="container">
                    <!-- Inputs (alternative) -->
                    <div class="mb-3">
                        <small class="text-uppercase font-weight-bold">Form controls (alternative)</small>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" placeholder="Regular" class="form-control form-control-alternative" />
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" placeholder="Regular" class="form-control form-control-alternative " disabled />
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <input class="form-control" placeholder="Birthday" type="text">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group has-success">
                                <input type="text" placeholder="Success" class="form-control form-control-alternative is-valid" />
                            </div>
                            <div class="form-group has-danger">
                                <input type="email" placeholder="Error Input" class="form-control form-control-alternative is-invalid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <!-- Custom controls -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!-- Checkboxes -->
                        <div class="mb-3">
                            <small class="text-uppercase font-weight-bold">Checkboxes</small>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck1" type="checkbox">
                            <label class="custom-control-label" for="customCheck1">
                                <span>Unchecked</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck2" type="checkbox" checked>
                            <label class="custom-control-label" for="customCheck2">
                                <span>Checked</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck3" type="checkbox" disabled>
                            <label class="custom-control-label" for="customCheck3">
                                <span>Disabled Unchecked</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck4" type="checkbox" checked disabled>
                            <label class="custom-control-label" for="customCheck4">
                                <span>Disabled Checked</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4 mt-md-0">
                        <!-- Radio buttons -->
                        <div class="mb-3">
                            <small class="text-uppercase font-weight-bold">Radios</small>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-1" class="custom-control-input" id="customRadio1" type="radio">
                            <label class="custom-control-label" for="customRadio1">
                                <span>Unchecked</span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-1" class="custom-control-input" id="customRadio2" checked type="radio">
                            <label class="custom-control-label" for="customRadio2">
                                <span>Checked</span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-2" class="custom-control-input" id="customRadio3" disabled type="radio">
                            <label class="custom-control-label" for="customRadio3">
                                <span>Disabled unchecked</span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-2" class="custom-control-input" id="customRadio4" checked disabled type="radio">
                            <label class="custom-control-label" for="customRadio4">
                                <span>Disabled checkbox</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4 mt-md-0">
                        <!-- Toggle buttons -->
                        <div class="mb-3">
                            <small class="text-uppercase font-weight-bold">Toggle buttons</small>
                        </div><label class="custom-toggle">
                            <input type="checkbox">
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                        <span class="clearfix"></span>
                        <label class="custom-toggle">
                            <input type="checkbox" checked>
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4 mt-md-0">
                        <div class="mb-3">
                            <small class="text-uppercase font-weight-bold">Sliders</small>
                        </div>
                        <!-- Simple slider -->
                        <div class="input-slider-container">
                            <div id="sliderRegular" class="slider"></div>
                            <br>
                            <div id="sliderDouble" class="slider slider-primary"></div>
                        </div>
                        <!-- Range slider -->
                        <div class="mt-5">
                            <!-- Range slider container -->
                            <div id="input-slider-range" data-range-value-min="100" data-range-value-max="500"></div>
                            <!-- Range slider values -->
                            <div class="row d-none">
                                <div class="col-6">
                                    <span class="range-slider-value value-low" data-range-value-low="200" id="input-slider-range-value-low"></span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="range-slider-value value-high" data-range-value-high="400" id="input-slider-range-value-high"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-md">
                    <div class="col-lg-12">
                        <!-- Menu -->
                        <h3 class="h4 text-success font-weight-bold mb-4">Menu</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <small class="text-uppercase font-weight-bold">With text</small>
                                </div>
                                <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
                                    <div class="container">
                                        <a class="navbar-brand" href="javascript:;">Menu</a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="nav-inner-primary">
                                            <div class="navbar-collapse-header">
                                                <div class="row">
                                                    <div class="col-6 collapse-brand">
                                                        <a href="./index.html">
                                                            <img src="./assets/img/brand/blue.png">
                                                        </a>
                                                    </div>
                                                    <div class="col-6 collapse-close">
                                                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
                                                            <span></span>
                                                            <span></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="navbar-nav ml-lg-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="javascript:;">Discover
                                                        <span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="javascript:;">Profile</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="javascript:;" id="nav-inner-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                                                    <div class="dropdown-menu" aria-labelledby="nav-inner-primary_dropdown_1">
                                                        <a class="dropdown-item" href="javascript:;">Action</a>
                                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-lg-6 mt-4 mt-lg-0">
                                <div class="mb-3">
                                    <small class="text-uppercase font-weight-bold">With icons</small>
                                </div>
                                <nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
                                    <div class="container">
                                        <a class="navbar-brand" href="javascript:;">Menu</a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-inner-success" aria-controls="nav-inner-success" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="nav-inner-success">
                                            <div class="navbar-collapse-header">
                                                <div class="row">
                                                    <div class="col-6 collapse-brand">
                                                        <a href="./index.html">
                                                            <img src="./assets/img/brand/blue.png">
                                                        </a>
                                                    </div>
                                                    <div class="col-6 collapse-close">
                                                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-success" aria-controls="nav-inner-success" aria-expanded="false" aria-label="Toggle navigation">
                                                            <span></span>
                                                            <span></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="navbar-nav ml-lg-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link-icon" href="javascript:;">
                                                        <i class="ni ni-favourite-28"></i>
                                                        <span class="nav-link-inner--text d-lg-none">Discover</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link-icon" href="javascript:;">
                                                        <i class="ni ni-notification-70"></i>
                                                        <span class="nav-link-inner--text d-lg-none">Profile</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle nav-link-icon" href="javascript:;" id="nav-inner-success_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ni ni-settings-gear-65"></i>
                                                        <span class="nav-link-inner--text d-lg-none">Settings</span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-inner-success_dropdown_1">
                                                        <a class="dropdown-item" href="javascript:;">Action</a>
                                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-navbars">
            <div class="container">
                <!-- Navigation -->
                <h2 class="mb-5">
                    <span>Navbars</span>
                </h2>
            </div>
            <!-- Navbar default -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-default">
                <div class="container">
                    <a class="navbar-brand" href="javascript:;">Default Color</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-default">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="./index.html">
                                        <img src="./assets/img/brand/blue.png">
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="ni ni-favourite-28"></i>
                                    <span class="nav-link-inner--text d-lg-none">Discover</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="ni ni-notification-70"></i>
                                    <span class="nav-link-inner--text d-lg-none">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-link-icon dropdown-toggle" href="javascript:;" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="nav-link-inner--text d-lg-none">Settings</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                                    <a class="dropdown-item" href="javascript:;">Action</a>
                                    <a class="dropdown-item" href="javascript:;">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar primary -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-4">
                <div class="container">
                    <a class="navbar-brand" href="javascript:;">Primary Color</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-primary">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="./index.html">
                                        <img src="./assets/img/brand/blue.png">
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Discover
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Profile</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbar-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-primary_dropdown_1">
                                    <a class="dropdown-item" href="javascript:;">Action</a>
                                    <a class="dropdown-item" href="javascript:;">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar success -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-success mt-4">
                <div class="container">
                    <a class="navbar-brand" href="javascript:;">Success Color</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-success" aria-controls="navbar-success" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-success">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="./index.html">
                                        <img src="./assets/img/brand/blue.png">
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-success" aria-controls="navbar-success" aria-expanded="false" aria-label="Toggle navigation">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="ni ni-favourite-28"></i>
                                    <span class="nav-link-inner--text d-lg-none">Favorites</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="ni ni-planet"></i>
                                    <span class="nav-link-inner--text d-lg-none">Another action</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-link-icon dropdown-toggle" href="javascript:;" id="navbar-success_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="nav-link-inner--text d-lg-none">Settings</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-success_dropdown_1">
                                    <a class="dropdown-item" href="javascript:;">Action</a>
                                    <a class="dropdown-item" href="javascript:;">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar danger -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger mt-4">
                <div class="container">
                    <a class="navbar-brand" href="javascript:;">Danger Color</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-danger" aria-controls="navbar-danger" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-danger">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="./index.html">
                                        <img src="./assets/img/brand/blue.png">
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-danger" aria-controls="navbar-danger" aria-expanded="false" aria-label="Toggle navigation">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-facebook-square"></i>
                                    <span class="nav-link-inner--text d-lg-none">Facebook</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-twitter"></i>
                                    <span class="nav-link-inner--text d-lg-none">Twitter</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-google-plus"></i>
                                    <span class="nav-link-inner--text d-lg-none">Google +</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-instagram"></i>
                                    <span class="nav-link-inner--text d-lg-none">Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar warning -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-warning mt-4">
                <div class="container">
                    <a class="navbar-brand" href="javascript:;">Warning Color</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning" aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-warning">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="./index.html">
                                        <img src="./assets/img/brand/blue.png">
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-warning" aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-facebook-square"></i>
                                    <span class="nav-link-inner--text d-lg-none">Share</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-twitter"></i>
                                    <span class="nav-link-inner--text d-lg-none">Tweet</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-pinterest"></i>
                                    <span class="nav-link-inner--text d-lg-none">Pin</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar info -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-info mt-4">
                <div class="container">
                    <a class="navbar-brand" href="javascript:;">Info Color</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-info" aria-controls="navbar-info" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-info">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="./index.html">
                                        <img src="./assets/img/brand/blue.png">
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-info" aria-controls="navbar-info" aria-expanded="false" aria-label="Toggle navigation">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-facebook-square"></i>
                                    <span class="nav-link-inner--text">Facebook</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-twitter"></i>
                                    <span class="nav-link-inner--text">Twitter</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="javascript:;">
                                    <i class="fa fa-instagram"></i>
                                    <span class="nav-link-inner--text">Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="section section-components">
            <div class="container">
                <h3 class="h4 text-success font-weight-bold mb-4">Tabs</h4>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <!-- Tabs with icons -->
                            <div class="mb-3">
                                <small class="text-uppercase font-weight-bold">With icons</small>
                            </div>
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Messages</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.</p>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-5 mt-lg-0">
                            <!-- Menu -->
                            <div class="mb-3">
                                <small class="text-uppercase font-weight-bold">With text</small>
                            </div>
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Messages</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.</p>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                                            <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-grid justify-content-between align-items-center mt-lg">
                        <div class="col-lg-5">
                            <h3 class="h4 text-success font-weight-bold mb-4">Progress bars</h3>
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span>Task completed</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>40%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-default" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span>Task completed</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>60%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <h3 class="h4 text-success font-weight-bold mb-5">Pagination</h3>
                            <nav aria-label="Page navigation example" class="mb-4">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:;">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">5</a>
                                    </li>
                                </ul>
                            </nav>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;"><i class="fa fa-angle-left"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:;">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:;"><i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row row-grid justify-content-between">
                        <div class="col-lg-5">
                            <h3 class="h4 text-success font-weight-bold mb-5">Navigation Pills</h3>
                            <ul class="nav nav-pills nav-pills-circle mb-3" id="tabs_2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link rounded-circle active" id="home-tab" data-toggle="tab" href="#tabs_2_1" role="tab" aria-controls="home" aria-selected="true">
                                        <span class="nav-link-icon d-block"><i class="ni ni-atom"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                                        <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tabs_2_3" role="tab" aria-controls="contact" aria-selected="false">
                                        <span class="nav-link-icon d-block"><i class="ni ni-cloud-download-95"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5">
                            <h3 class="h4 text-success font-weight-bold mb-5">Labels</h3>
                </h3>
                <span class="badge badge-pill badge-default text-uppercase">Default</span>
                <span class="badge badge-pill badge-primary text-uppercase">Primary</span>
                <span class="badge badge-pill badge-success text-uppercase">Success</span>
                <span class="badge badge-pill badge-danger text-uppercase">Danger</span>
                <span class="badge badge-pill badge-warning text-uppercase">Warning</span>
                <span class="badge badge-pill badge-info text-uppercase">Info</span>
            </div>
        </div>
        <h3 class="h4 text-success font-weight-bold mb-4 mt-5">Alerts</h3>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Success!</strong> This is a success alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
            <span class="alert-inner--text"><strong>Info!</strong> This is an info alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
            <span class="alert-inner--text"><strong>Warning!</strong> This is a warning alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-support-16"></i></span>
            <span class="alert-inner--text"><strong>Danger!</strong> This is an error alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endsection
