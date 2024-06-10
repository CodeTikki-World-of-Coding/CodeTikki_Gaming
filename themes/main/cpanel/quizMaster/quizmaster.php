<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="cpanel-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-cpanel">
        <div class="container">

            <a class="navbar-brand" href="#">            
                <img src="themes/images/image-removebg-preview (50) 2.png" alt="Logo" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>            
        </div>
    </nav>        
    <div class="container-fluid">
        <div class="row quizMaster">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar" id="sidebarCollapse">
                <div class="position-sticky pt-3 mt-4 rounded border-dark section">
                    <ul class="nav flex-column nav-margin">
                        <li class="nav-item">
                            <div class="d-flex align-items-center">
                                <img src="themes/images/ri_dashboard-fill (1).svg" alt="logo" class="me-1 ms-1" style="width: 20px;">
                                <a class="nav-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/dashboard.php">
                                    Dashboard
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="d-flex align-items-center">
                            <img src="themes/images/mingcute_bank-fill.svg" alt="logo" class="me-1 ms-1" style="width: 20px;">
                                <a class="nav-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/questionBank.php">
                                    Question Bank
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="d-flex align-items-center">
                                <img src="themes/images/gridicons_trophy.png" alt="" class="me-1 ms-1" style="width: 20px;">
                                <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-expanded="false">
                                    World Cup <img src="themes/images/ooui_next-ltr.svg" alt="arrow" class="arrow-w">
                                </a>
                                <ul class="dropdown-menu world-cup dropdown-menu-end" aria-labelledby="navbarDropdown3" style="left: auto; right: 0;">
                                    <li><a class="menu" href="#">Add question</a></li>
                                    <li>
                                        <a class="nav-link menu bowler" href="themes/main/cpanel/bowler-type.php" role="button" aria-expanded="false">
                                            Bowler Type 
                                        </a>                
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="position-sticky pt-3 mt-4 rounded border-dark section">
                    <ul class="nav flex-column">  
                    <li class="nav-item">
                            <div class="d-flex align-items-center">
                            <img src="themes/images/fluent_brain-circuit-20-filled.svg" alt="logo" class="me-1 ms-1" style="width:20px">
                                <a class="nav-link events-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/quizMaster/Events/Quiz_events.php">
                                    Events
                                </a>
                            </div>
                        </li>          
                        <li class="nav-item">
                            <div class="d-flex align-items-center">
                                <img src="themes/images/fa6-brands_battle-net.svg" alt="logo" class="me-1 ms-1" style="width:20px">
                                <a class="nav-link menu active d-flex justify-content-between align-items-center" aria-current="page" href="themes/main/cpanel/quizMaster/pseudoBattle.php">
                                    PseudoBattle
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="d-flex align-items-center">
                                <img src="themes/images/ion_create.svg" alt="logo" class="me-1 ms-1" style="width:20px">
                                <a class="nav-link d-flex justify-content-between align-items-center menu" href="themes/main/cpanel/quizMaster/create_quiz/create-quiz.php" id="navbarDropdown" aria-expanded="false">
                                    Create quiz 
                                </a>  
                            </div>              
                        </li>
                        
                    </ul>
                </div>
                <div class="position-sticky pt-3 mt-4 rounded border-dark section">
                    <ul class="nav flex-column"> 
                        <li class="nav-item dropdown">
                            <div class="d-flex align-items-center">
                                <img src="themes/images/mdi_frequently-asked-questions.svg" alt="logo" class="me-1 ms-1" style="width:20px">
                                <a class="nav-link d-flex justify-content-between align-items-center menu" href="themes/main/cpanel/quizMaster/my_question/my_question.php" id="navbarDropdown" aria-expanded="false">
                                    My Question 
                                </a>
                            </div>                
                        </li>        
                    </ul>
                </div>
            </nav>
            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 main">
                <div class="col-md-9 col-lg-10 " id="main-content">
                <button class="bg-transparent" id="backButton"onclick="SameTab()"><img src="themes/images/Group 48095613.svg" alt=""></button>

                </div>
            </main>
            <div class="sidebar-toggle d-md-none">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
                    aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="mainContent" id="mainContent">
        </div>   
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="themes/main/cpanel/quizMaster/js/quizmaster_script.js"></script>
<script>
    // JavaScript to toggle sidebar visibility on icon click
    $(document).ready(function() {
        $('#sidebarCollapse').addClass('d-none d-lg-block');

        // Function to handle sidebar toggle button click
        $('.sidebar-toggle button').click(function() {
            $('#sidebarCollapse').toggleClass('show'); // Toggle the 'show' class on the sidebar collapse element
        });

        // Function to handle Events link click
        $(document).on('click', '.events-link', function(e) {
            e.preventDefault();
            $('.quizMaster').hide();
            $('#mainContent').load($(this).attr('href')); // Load the content into the main area
        });
    });
    function SameTab() {
    setTimeout(function() {
        location.reload();
    }, 1000); 

        }
        
</script>
