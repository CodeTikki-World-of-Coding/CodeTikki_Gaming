<?php
    include 'setting.php';
    session_start();        
    $userid = $_SESSION['userid'];
    $stmt = $pdo->prepare("SELECT role FROM User WHERE Id = :id ");
    $stmt->bindParam(':id', $userid );
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
       
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto" id="navbar-nav">';

    
    if ($user && $user['role'] == 'Admin'|| $user['role']== 'ContentModerator'|| $user ['role']=='QuestionMaster') {
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
                <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
                <span class="icon-text">Logout</span>
                </a>
            </li>';
    }elseif($user&&$user['role']=='QuizMaster' ){
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
                <li class="nav-item logout">
                <a href="logout.php" class="nav-link">
                <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
                <span class="icon-text">Logout</span>
                </a>
            </li> 
                <li class="nav-item ">
                <a href="themes/main/nav-page/events.php" class="nav-link">
                <img class="icon" src="themes/images/calendar-days-solid.svg" alt="icon">
                <span class="icon-text">Events</span>
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
   
//     include 'setting.php';
// session_start();
// $userid = $_SESSION['userid'];
// $stmt = $pdo->prepare("SELECT role FROM User WHERE Id = :id ");
// $stmt->bindParam(':id', $userid );
// $stmt->execute();
// $user = $stmt->fetch(PDO::FETCH_ASSOC);

// echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
//             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
//                 <span class="navbar-toggler-icon"></span>
//             </button>
//             <div class="collapse navbar-collapse" id="navbarNav">
//                 <ul class="navbar-nav ml-auto" id="navbar-nav">';

// if ($user && isset($user['role'])) {
//     if ($user['role'] == 'Admin' || $user['role'] == 'ContentModerator' || $user['role'] == 'QuestionMaster') {
//         echo '<li class="nav-item">
//                     <a href="themes/main/nav-page/world_cup.php" class="nav-link" title="World Cup">
//                         <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
//                         <span class="icon-text">World Cup</span>
//                     </a>
//                 </li>
//                 <li class="nav-item">
//                     <a href="themes/main/nav-page/player-profile.php" class="nav-link">
//                         <img class="icon" src="themes/images/user-regular.svg" alt="icon">
//                         <span class="icon-text">Player Profile</span>
//                     </a>
//                 </li>
//                 <li class="nav-item">
//                     <a href="themes/main/cpanel/content.php" class="nav-link" >
//                         <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
//                         <span class="icon-text">Control Panel</span>
//                     </a>
//                 </li>
//                 <li class="nav-item logout">
//                     <a href="logout.php" class="nav-link">
//                         <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
//                         <span class="icon-text">Logout</span>
//                     </a>
//                 </li>';
//     } elseif ($user['role'] == 'QuizMaster') {
//         echo '<li class="nav-item">
//                     <a href="themes/main/nav-page/world_cup.php" class="nav-link">
//                         <img class="icon" src="themes/images/trophy-solid.svg" alt="icon">
//                         <span class="icon-text">World Cup</span>
//                     </a>
//                 </li>
//                 <li class="nav-item">
//                     <a href="themes/main/nav-page/player-profile.php" class="nav-link">
//                         <img class="icon" src="themes/images/user-regular.svg" alt="icon">
//                         <span class="icon-text">Player Profile</span>
//                     </a>
//                 </li>
//                 <li class="nav-item">
//                     <a href="themes/main/cpanel/quizMaster/quizmaster.php" class="nav-link" >
//                         <img class="icon" src="themes/images/gear-solid.svg" alt="icon">
//                         <span class="icon-text">Control Panel</span>
//                     </a>
//                 </li>
//                 <li class="nav-item logout">
//                     <a href="logout.php" class="nav-link">
//                         <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
//                         <span class="icon-text">Logout</span>
//                     </a>
//                 </li>';
//     }
// } else {
//     echo '<li class="nav-item ">
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
//             </li>
//             <li class="nav-item">
//                 <a href="themes/main/nav-page/user_pseudoBattle.php" class="nav-link">
//                     <img class="icon" src="themes/images/hammer-solid.svg" alt="icon">
//                     <span class="icon-text">Psuedo Battle</span>
//                 </a>
//             </li>
//             <li class="nav-item logout">
//                 <a href="logout.php" class="nav-link">
//                     <img class="icon" src="themes/images/right-from-bracket-solid.svg" alt="icon">
//                     <span class="icon-text">Logout</span>
//                 </a>
//             </li>';
// }

// echo '</ul></div></nav>';


?>
