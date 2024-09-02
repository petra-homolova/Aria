<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="fixed-top">
     <nav class="navbar navbar-expand-lg p-0">
         <div class="container-fluid">
             <div class="row w-100 px-3">
                 <div class="col-md-5">
                     <a class="navbar-brand text-center" href="<?php echo esc_url(home_url('/')); ?>">
                         <!-- SVG Icon -->
                         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                             <circle cx="11" cy="11" r="6"></circle>
                             <line x1="16.6" y1="16.6" x2="21" y2="21"></line>
                         </svg>                            
                     </a>
                 </div>
                 <div class="col-md-2 d-flex justify-content-center">
                     <ul class="navbar-nav">
                         <li class="nav-item">
                             <a class="nav-link logo logo-navbar p-1" href="<?php echo esc_url(home_url('/')); ?>">ARIA</a>
                         </li>
                     </ul>
                 </div>
                 <div class="col-md-5 d-flex justify-content-end">
                     <ul class="navbar-nav p-0 d-flex align-items-center">
                         <li class="nav-item">
                             <a class="nav-link mr-2" href="#">
                                 <!-- SVG Icon -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                     <circle cx="12" cy="7" r="4"></circle>
                                 </svg>                                    
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link mr-2" href="#">
                                 <!-- SVG Icon -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.17L12 21.35z"></path>
                                 </svg>                            
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link mr-2" href="#">
                                 <!-- SVG Icon -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M6 9l6-7 6 7"></path>
                                     <path d="M21 9h-18l1 13h16l1-13z"></path>
                                     <circle cx="9" cy="21" r="1"></circle>
                                     <circle cx="15" cy="21" r="1"></circle>
                                 </svg>
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </nav>
     <!-- Second Navbar -->
<nav class="navbar navbar-second navbar-expand-lg p-0 pb-1">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'secondary',
                'menu_class'     => 'navbar-nav mx-auto',
                'container'      => false,
            ));
            ?>
        </div>
    </div>
</nav>
</header>