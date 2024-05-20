<?php
session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($user_id)) {
       
        try {
            $stmt = $pdo->prepare("
                SELECT referred_id, referral_status
                FROM referrals
                WHERE referrer_id = :userId
            ");
            $stmt->bindParam(':userId', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $referrals = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $result = [];
            foreach ($referrals as $referral) {
                $referredUserId = $referral['referred_id'];
                $status = $referral['referral_status'];
                $stmtUser = $pdo->prepare("SELECT name FROM User WHERE Id = :referredUserId");
                $stmtUser->bindParam(':referredUserId', $referredUserId, PDO::PARAM_INT);
                $stmtUser->execute();
                $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);

                if ($userData) {
                    $result[] = [
                        'name' => $userData['name'],
                        'status' => $status
                    ];
                }
            }

            if (!empty($result)) {
                echo json_encode($result);
            } else {
                echo json_encode(['message' => 'No referrals found for the user.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error fetching referral data: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'User ID not found in session.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Use POST method.']);
}
?>
