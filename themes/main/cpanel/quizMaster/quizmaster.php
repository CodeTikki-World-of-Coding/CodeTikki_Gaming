<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<div class="cpanel-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-cpanel ">
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
    <div class="container-fluid">
        <div class="row quizMaster">
            <nav class="col-md-3 col-lg-2 d-md-block  sidebar" id="sidebarCollapse">
                <div class="position-sticky pt-3 mt-4  rounded border-dark section">
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
                <div class="position-sticky pt-3 mt-4  rounded border-dark section">
                    <ul class="nav flex-column">            
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
                        <li class="nav-item dropdown">
                            <a class="nav-link  d-flex justify-content-between align-items-center menu" href="themes/main/cpanel/quizMaster/my_question/my_question.php" id="navbarDropdown"  aria-expanded="false">
                                My Question 
                            </a>                
                        </li>
                    </ul>
                </div>
                <div class="position-sticky pt-3 mt-4  rounded border-dark section">
                    <ul class="nav flex-column">         
                    </ul>
                </div>
            </nav>
                 <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main">
                <div class="container mt-4" id="main-content">
                </div>
            </main>
            <div class="sidebar-toggle d-md-none">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
                    aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
           
    </div>
</div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
<script src="themes/main/cpanel/quizMaster/js/quizmaster_script.js"></script>
<script>// JavaScript to toggle sidebar visibility on icon click
    $(document).ready(function() {
        $('#sidebarCollapse').addClass('d-none d-lg-block');

        // Function to handle sidebar toggle button click
        $('.sidebar-toggle button').click(function() {
            $('#sidebarCollapse').toggleClass('show'); // Toggle the 'show' class on the sidebar collapse element
        });
    });

</script>
