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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">


    <title>Code Tikki</title>

</head>
<body>  

<div class="container-fluid main" id="mainPageContainer">
<?php include './themes/main/navbar.php'; ?> 

<div class="row  navbarPages" >
            <div class="col-lg-12">
                <?php include './themes/main/homepage.php'; ?> 

            </div>
             
        </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script> 
        $(document).ready(function(){
   
    $("#navbar-nav a").click(function(e){
    var page = $(this).attr("href");

    // Check if the link has class 'icon-codetikki'
    if ($(this).hasClass('icon_codetikki')) {
        window.location.href = page;
        window.location.reload();
    } 
    // Check if the link contains 'cpanel'
    // else if (page.includes('cpanel')) {
    //     // Load Control Panel content in the current tab
    //     e.preventDefault(); 
    //     $(".main").load(page); 
    // } 
    else {
        // Load other links in the current tab
        e.preventDefault(); 
        $(".navbarPages").load(page); 

    }
});

    $(".navbar-toggler").click(function(){
            $(".navbar-collapse").toggleClass("show");
        });

        $('.logout a').click(function(e){
        // e.preventDefault(); 

        $.ajax({
            url: 'logout.php',
            method: 'GET',
            success: function(response) {
                window.location.href = 'index.php';

            },
            error: function(xhr, status, error) {
                console.error('Error logging out:', error);
            }
        });
    });
        


   });
   
    </script>
</body>
</html>

