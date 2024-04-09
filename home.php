<?php
   include 'setting.php';
   ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./themes/css/style.css" rel="stylesheet">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Code Tikki</title>

</head>
<body>  

<div class="container-fluid main">
<?php include './themes/main/navbar.php'; ?> 

<div class="row " >
            <div class="col-lg-12">
                <?php include './themes/main/homepage.php'; ?> 

            </div>
             
        </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script> 
        $(document).ready(function(){
    $("#navbar-nav a").click(function(e){
        var page = $(this).attr("href");

        // Check if the link contains 'cpanel'
        if (page.includes('cpanel')) {
            // Load Control Panel content in the current tab
            e.preventDefault(); 
            $(".main").load(page); 

        } else {
            // Load other links in the current tab
            e.preventDefault(); 
            $(".row").load(page); 
        }
    });
    // $("#navbar-nav a").click(function(e){
    //     var page = $(this).attr("href");

    //     // Check if the link is the logout link or contains 'cpanel/logout'
    //     if ($(this).hasClass('logout')) {
    //         // Redirect to index.php for logout
    //         window.location.href = "index.php";
    //     } else if (page.includes('cpanel/logout')) {
    //         // Redirect to index.php for logout within cpanel
    //         window.location.href = "index.php";
    //     } else if (page.includes('cpanel')) {
    //         // Load Control Panel content in the current tab
    //         e.preventDefault(); 
    //         $(".main").load(page); 
    //     } else {
    //         // Load other links in the current tab
    //         e.preventDefault(); 
    //         $(".row").load(page); 
    //     }
    // });

    $(".navbar-toggler").click(function(){
            $(".navbar-collapse").toggleClass("show");
        });

   });
   
    </script>
</body>
</html>

