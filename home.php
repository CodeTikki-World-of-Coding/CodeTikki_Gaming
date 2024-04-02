<?php
   include 'setting.php';
   ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./themes/css/style.css" rel="stylesheet">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Code Tikki</title>

</head>
<body>  

<div class="container-fluid main">
<?php include './themes/main/navbar.php'; ?> 
<div class="row " >
            <div class="col-lg-12">
                <?php include './themes/main/homepage.php'; ?> 

            </div>
            <!-- <div class="col-lg-3">
                <!-- Sidebar or additional content -->
                <!-- <h2>Sidebar</h2>
            </div> --> 
        </div>

</div>

    <!-- <div class="main">
        <?php// include 'navbar.php'; ?> 
        <div class="timeline-body">
        <?php //include 'homepage.php'; ?> 
        </div>
    </div>
     -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> 
        // $(document).ready(function(){
        //     $("#navbar-nav a").click(function(e){
        //         e.preventDefault(); 
        //         var page = $(this).attr("href"); 
        //         $(".row").load(page); 
        //     });
        // });
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
});
    </script>
</body>
</html>

 