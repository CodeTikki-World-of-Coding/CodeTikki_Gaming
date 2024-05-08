<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./themes/css/style.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #000000  , #29209614 ) !important; /* Adjust colors as needed */
        }
    </style>
</head>
<body>
<div class="container mt-5 registration-page">
        <div class="row registration-row">
            <div class="col-md-6 form-col">
                <form class="registration-form p-2" action="core/main/register.php" method="POST">
                    <div class="mb-1">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required minlength="6" maxlength="14" pattern="[a-zA-Z][a-zA-Z0-9]{5,13}" oninput="validateUsername(this)" onchange="convertToLowercase(this)">
                        <div id="usernameFeedback" class="feedback text-danger fs-6"></div>
                    </div>

                    <div class="mb-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required minlength="8" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$" oninput="validatePassword(this)">
                        <div id="passwordFeedback" class="feedback text-danger fs-6"></div>
                    </div>
                    <div class="mb-1">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required oninput="validateConfirmPassword(this)">
                        <div id="confirmPasswordFeedback" class="feedback text-danger fs-6"></div>
                    </div>
                    <div class="mb-1">
                        <label for="referralCode" class="form-label">Referral Code (Optional)</label>
                        <input type="text" class="form-control" name="referralCode">
                    </div>
                    
                    <div class="mb-1 form-check">
                        <input type="checkbox" class="form-check-input" id="agreeTerms" name="agreeTerms" required>
                        <label class="form-check-label " for="agreeTerms">I agree to the terms and privacy policy</label>
                    </div>
                    <div class="mb-1 button-group">
                        <button type="submit" class="btn ">Register</button>
                        <a href="#" class="btn btn-link">Forgot Password?</a>
                        <p>OR Login With </p>
                        <div class="social_media">
                            <a href=""> <img src="themes/images/image 34.svg" alt="Google"></a>
                            <a href=""><img src="themes/images/image 33.svg" alt="github"></a>
                            <a href=""><img src="themes/images/image 35.svg" alt="Facebook"></a>
                        </div>
                    </div>
                    <div id="successMessage" class="feedback text-success fs-5"></div>

                </form>
            </div>
            <div class="col-md-6 girl-image">
                <img src="themes/images/https_/lottiefiles.com/animations/login-blue-zSJxUZS7i4.svg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        function validateUsername(input) {
    var feedbackElement = document.getElementById('usernameFeedback');
    var username = input.value;

    if (username.length < 6) {
        feedbackElement.textContent = 'Username must be at least 6 characters long.';
        return;
    }

    if (username.indexOf(' ') !== -1) {
        feedbackElement.textContent = 'Username cannot contain spaces.';
        return;
    }

    if (/^\d/.test(username)) {
        feedbackElement.textContent = 'Username cannot start with a number.';
        return;
    }

    if (!/^[a-zA-Z0-9]*$/.test(username)) {
        feedbackElement.textContent = 'Username can only contain letters and numbers (no special characters).';
        return;
    }

    if (username.length > 14) {
        feedbackElement.textContent = 'Username cannot exceed 14 characters.';
        return;
    }

    feedbackElement.textContent = '';
}

        function convertToLowercase(input) {
            input.value = input.value.toLowerCase();
        }

        function validatePassword(input) {
            var feedbackElement = document.getElementById('passwordFeedback');
            if (input.validity.patternMismatch) {
                feedbackElement.textContent = 'Password must contain at least one letter, one number, one special character, and be at least 6 characters long.';
            } else {
                feedbackElement.textContent = '';
            }
        }

        function validateConfirmPassword(input) {
            var password = document.getElementById('password').value;
            var confirmPassword = input.value;
            var feedbackElement = document.getElementById('confirmPasswordFeedback');
            if (password !== confirmPassword) {
                feedbackElement.textContent = 'Passwords do not match.';
            } else {
                feedbackElement.textContent = '';
            }
        }
    
    $(document).ready(function() {
    $('.registration-form').submit(function(event) {
        event.preventDefault(); 

        $.ajax({
            url: 'core/main/register.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    alert(jsonResponse.message); 
                    window.location.href = "index.php";
                } else {
                    alert(jsonResponse.message); 
                }
            },
            error: function() {
                alert('An error occurred. Please try again later.'); 
            }
        });
    });
});

    </script>

</body>
</html>
