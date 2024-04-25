<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head> 
    <div class="cpanel-container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-cpanel ">
            <div class="container">
                <a class="navbar-brand" href="#">            
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
            <div class="row adminCpanel">
                <nav class="col-md-3 col-lg-2 d-md-block  sidebar">
                    <div class="position-sticky pt-3 mt-4 bg-white rounded border-dark section">
                        <ul class="nav flex-column nav-margin">
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <img src="themes/images/mdi-light_view-dashboard.svg" alt="logo" class="me-1 ms-1">
                                        <a class="nav-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/dashboard.php">
                                        Dashboard
                                        </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <a class="nav-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/questionBank.php">
                                        Question Bank
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="d-flex align-items-center">
                                    <img src="themes/images/Vector.svg" alt="" class="me-1 ms-1">
                                    <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        World Cup <img src="themes/images/ooui_next-ltr.svg" alt="arrow" class=" arrow-w">
                                    </a>
                                    <ul class="dropdown-menu world-cup  dropdown-menu-end" aria-labelledby="navbarDropdown3"  style="left: auto; right: 0;">
                                        <li><a class="menu" href="#">Add question</a></li>
                                        <li>
                                            <a class="nav-link menu  bowler" href="themes/main/cpanel/bowler-type.php" role="button" aria-expanded="false">
                                                Bowler Type 
                                            </a>                
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3 mt-4 bg-white rounded border-dark section">
                        <ul class="nav flex-column">            
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Approve quiz <img src="themes/images/ooui_next-ltr.svg" alt="arrow arrow">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                                    <li><a class="submenu-link" href="#">Product 1</a></li>
                                    <li><a class="submenu-link" href="#">Product 2</a></li>
                                    <li><a class="submenu-link" href="#">Product 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3 mt-4 bg-white rounded border-dark section">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="#">Option 3
                                    <img src="themes/images/ooui_next-ltr.svg" alt="arrow">
                                </a>
                            </li>          
                        </ul>
                    </div>
                </nav>
                 <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main">
                    <div class="container mt-4" id="main-content">
                        
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
<script>
            $(document).ready(function () {
                $('.menu').click(function (e) {
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
        });
    $(document).ready(function () {
        $('.nav-item').click(function () {
            $('.nav-item').removeClass('active');
            $(this).addClass('active');
        });
    });


    </script>

