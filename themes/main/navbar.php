<?php

    include 'setting.php';
    session_start(); 
    
    $username = isset($_POST['text']) ? $_POST['text'] : '';

    function fetchUserID($name, $pdo) {
        try {
            $stmt = $pdo->prepare("SELECT Id FROM User WHERE username = :username ");
            $stmt->bindParam(':username', $name);
            $stmt->execute();
            $user_id = $stmt->fetchColumn();
            return $user_id;
        } catch(PDOException $e) {
            echo "Error fetching user ID: " . $e->getMessage();
            return null;
        }
    }
    $user_id = fetchUserID($username, $pdo);
    $_SESSION['user_id'] = $user_id;

    function fetchEmailID($name, $pdo) {
        try {
            $stmt = $pdo->prepare("SELECT email FROM User WHERE username = :username ");
            $stmt->bindParam(':username', $name);
            $stmt->execute();
            $mail_id = $stmt->fetchColumn();
            return $mail_id;
        } catch(PDOException $e) {
            echo "Error fetching user ID: " . $e->getMessage();
            return null;
        }
    }
    $mail_id = fetchEmailID($username, $pdo);
    $_SESSION['mail_id'] = $mail_id;

    $stmt = $pdo->prepare("SELECT role FROM User WHERE username = :username ");
    $stmt->bindParam(':username', $username );
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_role'] = $user['role'];
    if(isset($_SESSION['user_role'])) {
        $user_role = $_SESSION['user_role'];
    
     echo '<nav class="navbar navbar-expand-lg  " >
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav " id="navbar-nav">
                    <li class="nav-item">
                    <a href="index.php" class="nav-link icon_codetikki">
                        <img class="icon_codetikki" src="themes/images/hbhb 3.png" alt="icon" style="width:60px;">
                    </a>
                </li>';

                    
                    if ($user_role == 'ContentModerator' || $user_role == 'QuestionMaster') {
                        echo    '<li class="nav-item">
                    <a href="themes/main/nav-page/world_cup.php" class="nav-link" title="World Cup">
                        <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
                        <span class="icon-text">World Cup</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/player-profile.php" class="nav-link">
                        <img class="icon" src="themes/images/iconamoon_profile-circle-fill.svg" alt="icon">
                        <span class="icon-text">Player Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/cpanel/content.php" class="nav-link" >
                        <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
                        <span class="icon-text">Control Panel</span>
                    </a>
                </li>
                
            </li> 
                <li class="nav-item ">
                <a href="themes/main/nav-page/events.php" class="nav-link">
                <img class="icon" src="themes/images/mdi_events-check.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li>
            <li class="nav-item ">
            <a href="themes/main/nav-page/referral.php" class="nav-link">
            <img class="icon" src="themes/images/ri_dashboard-fill.svg" alt="icon">
            <span class="icon-text">Referral Dashboard</span>
            </a>
        </li>
            <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/solar_logout-3-bold.svg" alt="icon">
                <span class="icon-text">Logout</span>
                </a>
            </li>
            ';
        } elseif ($user_role == 'Admin') {
            echo    '<li class="nav-item">
                    <a href="themes/main/nav-page/world_cup.php" class="nav-link" title="World Cup">
                        <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
                        <span class="icon-text">World Cup</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/player-profile.php" class="nav-link">
                        <img class="icon" src="themes/images/iconamoon_profile-circle-fill.svg" alt="icon">
                        <span class="icon-text">Player Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/cpanel/admin/adminControlPanel.php" class="nav-link" >
                        <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
                        <span class="icon-text">Control Panel</span>
                    </a>
                </li>
                
            </li> 
                <li class="nav-item ">
                <a href="themes/main/nav-page/events.php" class="nav-link">
                <img class="icon" src="themes/images/mdi_events-check.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li>
            <li class="nav-item ">
            <a href="themes/main/nav-page/referral.php" class="nav-link">
            <img class="icon" src="themes/images/ri_dashboard-fill.svg" alt="icon">
            <span class="icon-text">Referral Dashboard</span>
            </a>
        </li>
            <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/solar_logout-3-bold.svg" alt="icon">
                <span class="icon-text">Logout</span>
                </a>
            </li>
            ';
        
        } elseif ($user_role == 'QuizMaster') {
            echo    '<li class="nav-item">
                    <a href="themes/main/nav-page/world_cup.php" class="nav-link">
                        <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
                        <span class="icon-text">World Cup</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/player-profile.php" class="nav-link">
                        <img class="icon" src="themes/images/iconamoon_profile-circle-fill.svg" alt="icon">
                        <span class="icon-text">Player Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/cpanel/quizMaster/quizmaster.php" class="nav-link" >
                        <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
                        <span class="icon-text">Control Panel</span>
                    </a>
                </li>
                 
                <li class="nav-item ">
                <a href="themes/main/nav-page/events.php" class="nav-link">
                <img class="icon" src="themes/images/mdi_events-check.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li> 
            <li class="nav-item ">
            <a href="themes/main/nav-page/referral.php" class="nav-link">
            <img class="icon" src="themes/images/ri_dashboard-fill.svg" alt="icon">
            <span class="icon-text">Referral Dashboard</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="themes/main/nav-page/quiz.php" class="nav-link">
            <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
            <span class="icon-text">Quiz</span>
            </a>
        </li>
        <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/solar_logout-3-bold.svg" alt="icon">
                <span class="icon-text">Logout</span>
                </a>
            </li>
            ';
    }
     else {
        echo    '<li class="nav-item ">
                    <a href="themes/main/nav-page/user-world_cup.php" class="nav-link" >
                        <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
                        <span class="icon-text">World Cup</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/player-profile.php" class="nav-link">
                        <img class="icon" src="themes/images/iconamoon_profile-circle-fill.svg" alt="icon">
                        <span class="icon-text">Player Profile</span>
                    </a>
                    </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/user_pseudoBattle.php" class="nav-link">
                        <img class="icon" src="themes/images/hammer-solid.svg" alt="icon">
                        <span class="icon-text">Psuedo Battle</span>
                    </a>
                </li>
               
             
                <li class="nav-item ">
                <a href="themes/main/nav-page/events.php" class="nav-link">
                <img class="icon" src="themes/images/mdi_events-check.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li>
            <li class="nav-item ">
            <a href="themes/main/nav-page/referral.php" class="nav-link">
            <img class="icon" src="themes/images/ri_dashboard-fill.svg" alt="icon">
            <span class="icon-text">Referral Dashboard</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="themes/main/nav-page/quiz.php" class="nav-link">
            <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
            <span class="icon-text">Quiz</span>
            </a>
        </li>
        <li class="nav-item logout">
            <a href="logout.php" class="nav-link">
            <img class="icon" src="themes/images/solar_logout-3-bold.svg" alt="icon">
            <span class="icon-text">Logout</span>
            </a>
        </li>
                
               '
                ;
    }

    echo '</ul></div></nav>';
}  
else {
    // Handle the case when user_role is not set in session
    // Redirect the user to login page or handle the case as per your application's logic
    $_SESSION['user_role'] = 'default_role';
    header('Location: index.php');
     exit();

}
?>
