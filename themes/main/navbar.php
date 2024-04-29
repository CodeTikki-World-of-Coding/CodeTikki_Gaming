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
    
     echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto" id="navbar-nav">';

    
                    if ($user && is_array($user) && ($user['role'] == 'Admin' || $user['role'] == 'ContentModerator' || $user['role'] == 'QuestionMaster')) {
                        echo    '<li class="nav-item">
                    <a href="themes/main/nav-page/world_cup.php" class="nav-link" title="World Cup">
                        <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
                        <span class="icon-text">World Cup</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/player-profile.php" class="nav-link">
                        <img class="icon" src="themes/images/user-regular.svg" alt="icon">
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
                <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li>
            <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
                <span class="icon-text">Logout</span>
                </a>
            </li>
            ';
    }elseif($user && is_array($user) &&$user['role']=='QuizMaster' ){
        echo    '<li class="nav-item">
                    <a href="themes/main/nav-page/world_cup.php" class="nav-link">
                        <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
                        <span class="icon-text">World Cup</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="themes/main/nav-page/player-profile.php" class="nav-link">
                        <img class="icon" src="themes/images/user-regular.svg" alt="icon">
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
                <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li> 
            <li class="nav-item ">
            <a href="themes/main/nav-page/referral.php" class="nav-link">
            <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
            <span class="icon-text">Referral Dashboard</span>
            </a>
        </li>
        <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
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
                        <img class="icon" src="themes/images/user-regular.svg" alt="icon">
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
                <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
                <span class="icon-text">Events</span>
                </a>
            </li>
            <li class="nav-item logout">
            <a href="logout.php" class="nav-link">
            <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
            <span class="icon-text">Logout</span>
            </a>
        </li>
                
               '
                ;
    }

    echo '</ul></div></nav>';
   

    // echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    //             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    //                 <span class="navbar-toggler-icon"></span>
    //             </button>
    //             <div class="collapse navbar-collapse" id="navbarNav">
    //                 <ul class="navbar-nav ml-auto" id="navbar-nav">';

    
    // if ($user && $user['role'] == 'Admin'|| $user['role']== 'ContentModerator'|| $user ['role']=='QuestionMaster') {
    //     echo    '<li class="nav-item">
    //                 <a href="themes/main/nav-page/world_cup.php" class="nav-link" title="World Cup">
    //                     <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
    //                     <span class="icon-text">World Cup</span>
    //                 </a>
    //             </li>
    //             <li class="nav-item">
    //                 <a href="themes/main/nav-page/player-profile.php" class="nav-link">
    //                     <img class="icon" src="themes/images/user-regular.svg" alt="icon">
    //                     <span class="icon-text">Player Profile</span>
    //                 </a>
    //             </li>
    //             <li class="nav-item">
    //                 <a href="themes/main/cpanel/content.php" class="nav-link" >
    //                     <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
    //                     <span class="icon-text">Control Panel</span>
    //                 </a>
    //             </li>
                
    //         </li> 
    //             <li class="nav-item ">
    //             <a href="themes/main/nav-page/events.php" class="nav-link">
    //             <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
    //             <span class="icon-text">Events</span>
    //             </a>
    //         </li>
    //         <li class="nav-item logout">
    //             <a href="logout.php" class="nav-link">
    //             <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
    //             <span class="icon-text">Logout</span>
    //             </a>
    //         </li>
    //         ';
    // }elseif($user&&$user['role']=='QuizMaster' ){
    //     echo    '<li class="nav-item">
    //                 <a href="themes/main/nav-page/world_cup.php" class="nav-link">
    //                     <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
    //                     <span class="icon-text">World Cup</span>
    //                 </a>
    //             </li>
    //             <li class="nav-item">
    //                 <a href="themes/main/nav-page/player-profile.php" class="nav-link">
    //                     <img class="icon" src="themes/images/user-regular.svg" alt="icon">
    //                     <span class="icon-text">Player Profile</span>
    //                 </a>
    //             </li>
    //             <li class="nav-item">
    //                 <a href="themes/main/cpanel/quizMaster/quizmaster.php" class="nav-link" >
    //                     <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
    //                     <span class="icon-text">Control Panel</span>
    //                 </a>
    //             </li>
                 
    //             <li class="nav-item ">
    //             <a href="themes/main/nav-page/events.php" class="nav-link">
    //             <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
    //             <span class="icon-text">Events</span>
    //             </a>
    //         </li> 
    //         <li class="nav-item ">
    //         <a href="themes/main/nav-page/referral.php" class="nav-link">
    //         <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
    //         <span class="icon-text">Referral Dashboard</span>
    //         </a>
    //     </li>
    //     <li class="nav-item logout">
    //             <a href="logout.php" class="nav-link">
    //             <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
    //             <span class="icon-text">Logout</span>
    //             </a>
    //         </li>
    //         ';
    // }
    //  else {
    //     echo    '<li class="nav-item ">
    //                 <a href="themes/main/nav-page/user-world_cup.php" class="nav-link" >
    //                     <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
    //                     <span class="icon-text">World Cup</span>
    //                 </a>
    //             </li>
    //             <li class="nav-item">
    //                 <a href="themes/main/nav-page/player-profile.php" class="nav-link">
    //                     <img class="icon" src="themes/images/user-regular.svg" alt="icon">
    //                     <span class="icon-text">Player Profile</span>
    //                 </a>
    //                 </li>
    //             <li class="nav-item">
    //                 <a href="themes/main/nav-page/user_pseudoBattle.php" class="nav-link">
    //                     <img class="icon" src="themes/images/hammer-solid.svg" alt="icon">
    //                     <span class="icon-text">Psuedo Battle</span>
    //                 </a>
    //             </li>
               
             
    //             <li class="nav-item ">
    //             <a href="themes/main/nav-page/events.php" class="nav-link">
    //             <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
    //             <span class="icon-text">Events</span>
    //             </a>
    //         </li>
    //         <li class="nav-item logout">
    //         <a href="logout.php" class="nav-link">
    //         <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
    //         <span class="icon-text">Logout</span>
    //         </a>
    //     </li>
                
    //            '
    //             ;
    // }

    // echo '</ul></div></nav>';
   


?>
