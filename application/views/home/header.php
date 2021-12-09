
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta property="og:title" content="Tempat sewa lapangan buu tangkis dan futsal terdekat" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="SELAP" />
<meta property="og:url" content="http://localhost/playbob" />
<meta property="og:image" content="http://localhost/playbob/images/main/logo.svg" />
<meta name="twitter:card" content="summary">
<meta name="twitter:description" content="">
<meta name="twitter:title" content="Testing — Upload and share your videos.">
<meta name="twitter:site" content="http://localhost/playbob">
<meta name="csrf-token" content="Fz0eh3OY0WFYgwLDfKmrWUrn5HzvFmONjLhmtONK">
<title>SELAP - Sewa Lapangan Futsal dan Bulu Tangkis terdekat!</title>
<link href="<?= base_url('assets/home/') ?>images/main/favicon.ico" rel="shortcut icon">
<link href="<?= base_url('assets/home/') ?>images/main/favicon.ico" type="image/png" rel="icon" sizes="192x192">
<link rel="apple-touch-icon" href="http://localhost/playbob/images/main/favicon.ico" sizes="180x180">
<link href="<?= base_url('assets/home/') ?>libs/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
<link href="<?= base_url('assets/home/') ?>fontawesome/font-awesome.min.css" rel="stylesheet"/>
<link href="<?= base_url('assets/home/') ?>fontawesome/font-awesome-animation.min.css" rel="stylesheet"/>
<link href="<?= base_url('assets/home/') ?>libs/dropzone/dropzone.min.css" rel="stylesheet"/>
<link href="<?= base_url('assets/home/') ?>css/app.css" rel="stylesheet"/>
<link href="<?= base_url('assets/home/') ?>css/app-vendors.css" rel="stylesheet"/>
<link href="<?= base_url('assets/home/') ?>css/ibob.css" rel="stylesheet"/>

</head>
<body>
	<header class="navbar navbar-expand-md navbar-light  p-3  d-print-none  ">
      	<div class=" container ">
       
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
      </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal  me-md-3 ">
         <a href="<?= base_url(); ?>">
         <img src="<?= base_url(); ?>images/main/logo.svg" width="110" height="32" alt="Testing" class="navbar-brand-image">
         </a>       </h1>
      <div class="navbar-nav flex-row order-md-last">
        <li class="nav-item pe-0 pe-md-2 d-mobile-none">
            <a href="<?= base_url('index.php/auth'); ?>" class="btn">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                  <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
               </svg>
               Log in
            </a>
         </li>
                  <li class="nav-item d-mobile-none">
            <a href="<?= base_url('index.php/auth/register'); ?>" class="btn btn-danger">
               
               Create account
            </a>
         </li>
           <li class="nav-item pe-1 d-md-none mobile-icon">
            <a href="<?= base_url('index.php/auth'); ?>">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                  <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
               </svg>
            </a>
         </li>
        </div>
       
      <div class="collapse navbar-collapse order-md-first" id="navbar-menu">
         <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                           <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                           <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">Home</span>
                  </a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <circle cx="12" cy="12" r="9"></circle>
                           <line x1="12" y1="8" x2="12.01" y2="8"></line>
                           <polyline points="11 12 12 12 12 16 13 16"></polyline>
                        </svg>
                     </span>
                     <span class="nav-link-title d-lg-none d-xl-inline-block">About</span>
                  </a>
                  
               </li>
              </ul>
         </div>
      </div>
	</div>
</header>
