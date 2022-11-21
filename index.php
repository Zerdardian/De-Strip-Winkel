<?php
    session_start();

    /**
     * Before adding or changing things. Please read.
     * Adding pages can be done in the /assets/pages/. For a single page, /singlepages/
     * For functions and multiple pages, /functions/ pages. Continue writing page functions through there as well so they are always loaded when required.
     * 
     * Add related data in .env or the .env.example if required!
     * 
     * Thank you for reading.
     */

    // Composer load
    include_once "./vendor/autoload.php";
    // Setup basis preloaded files
    include_once "./assets/php/basis.php";
    // Include functions
    include_once "./assets/php/functions.php";
    // Setup core
    include_once "./assets/php/core.php";