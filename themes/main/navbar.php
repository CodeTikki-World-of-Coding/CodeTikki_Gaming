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

    
    if ($user && $user['role'] == 'Admin'|| $user['role'] == 'QuizMaster' || $user['role']== 'ContentModerator'|| $user ['role']=='QuestionMaster') {
        echo '<li class="nav-item"><a href="themes/main/nav-page/world_cup.php" class="nav-link">World Cup</a></li>
                <li class="nav-item"><a href="themes/main/nav-page/player-profile.php" class="nav-link">Player Profile</a></li>
                <li class="nav-item"><a href="themes/main/cpanel/content.php" class="nav-link" >Control Panel</a></li>';
    } else {
        echo '<li class="nav-item"><a href="themes/main/nav-page/user-world_cup.php" class="nav-link">World Cup</a></li>
                <li class="nav-item"><a href="themes/main/nav-page/player-profile.php" class="nav-link">Player Profile</a></li>';
    }

    echo '</ul></div></nav>';




?>
