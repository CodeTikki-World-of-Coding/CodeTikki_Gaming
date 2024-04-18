<?php
include 'setting.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['text']) ? $_POST['text'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    try {
        $verifyStmt = $pdo->prepare("SELECT * FROM User WHERE username = :username ");
        $verifyStmt->bindParam(':username', $username);
        $verifyStmt->execute();
        $user = $verifyStmt->fetch(PDO::FETCH_ASSOC);
  
        if ($user) {
            $hashed_password_from_db = $user['password'];

            if (password_verify($password, $hashed_password_from_db)) {
                
                $_SESSION['userid'] = $user['Id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['mailid'] = $user['email'];
                header("Location: home.php"); // Redirect to dashboard page
                exit();
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            $error_message = "User not found.";
        }
    } catch (\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="./themes/css/style.css" rel="stylesheet">
</head>
<div class="container-fluid login-page">
  <div class="row">
    <div class="col-md-6 logo-pic"><img src="./themes/images/image-removebg-preview (50) 2.png" alt=""></div>
    <div class="col-lg-6 offset-lg-3">
      <div class="login-box">
        <h2 class="text-center mb-4 login-heading">Login Form</h2>
        <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-group form-group_login">
            <input type="text" id="text" name="text" class="form-control" placeholder="Username">
          </div>
          <div class="form-group form-group_login">
            <input type="password" id="password" name="password" class="form-control" placeholder="password">
          </div>
          <div class="form-group form-group_login">
          <button type="submit" class="btn btn_login">Signin</button>
          <label class="or" >OR</label>
                        <button type="button" class="btn btn-register "><a href="registration.php" >Register</a></button>
                    
</div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>

</body>
</html>

