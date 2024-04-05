<head>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
</head> 
    <div class="cpanel-container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-cpanel ">
            <div class="container">
                <a class="navbar-brand" href="home.php">            
                    <img src="themes/images/image-removebg-preview (50) 2.png" alt="Logo" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>            
            </div>
        </nav>
        <!-- Content for demonstration purposes -->
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky pt-3 mt-4 bg-white rounded border-dark section">
                        <ul class="nav flex-column nav-margin">
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <img src="themes/images/battle-net.svg" alt="logo" class="me-1 ms-1" style="width:30px">
                                        <a class="nav-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/quizMaster/pseudoBattle.php">
                                        PseudoBattle
                                        </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  d-flex justify-content-between align-items-center menu" href="themes/main/cpanel/quizMaster/create_quiz/create-quiz.php" id="navbarDropdown"  aria-expanded="false">
                                    Create quiz <img src="themes/images/ooui_next-ltr.svg" alt=" arrow" >
                                </a>                
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3 mt-4 bg-white rounded border-dark section">
                        <ul class="nav flex-column">            
                            
                        </ul>
                    </div>
                    <div class="position-sticky pt-3 mt-4 bg-white rounded border-dark section">
                        <ul class="nav flex-column">
         
                        </ul>
                    </div>
                </nav>
                 <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main">
                    <div class="container mt-4" id="main-content">
                        <h1>Main Page Content</h1>
                        <p>This is the main content area.</p>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <!-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
     -->
<script>
    //         $(document).ready(function () {
    //             $('.menu').click(function (e) {
    //                 e.preventDefault(); // Prevent default link behavior
    //                 var url = $(this).attr('href'); // Get the URL from the clicked menu item
    //             $.ajax({
    //                 url: url,
    //                 type: 'GET',
    //                 dataType: 'html',
    //                 success: function (response) {
    //                     $('#main-content').html(response); // Update main-content area with response
    //                 },
    //                 error: function (xhr, status, error) {
    //                     console.log(error); // Log any errors to the console
    //                 }
    //             });
    //         });
    //     });
    // $(document).ready(function () {
    //     $('.nav-item').click(function () {
    //         $('.nav-item').removeClass('active');
    //         $(this).addClass('active');
    //     });
    // });

    $(document).ready(function () {
            // Add event listener for menu items with class .menu
            $(document).on('click', '.menu', function (e) {
                e.preventDefault(); // Prevent default link behavior
                var url = $(this).attr('href'); // Get the URL from the clicked menu item
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function (response) {
                        $('#main-content').html(response); // Update main-content area with response
                    },
                    error: function (xhr, status, error) {
                        console.log(error); // Log any errors to the console
                    }
                });
            });

            // Add event listener for nav-items to handle active class
            $(document).on('click', '.nav-item', function () {
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
            });
           

        });

    </script>

