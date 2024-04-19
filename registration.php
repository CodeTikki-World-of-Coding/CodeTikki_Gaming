<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./themes/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5 registration-page">
        <div class="row registration-row">
            <div class="col-md-6 form-col">
                <form class="registration-form p-5" action="core/main/register.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required minlength="6" maxlength="14" pattern="[a-zA-Z][a-zA-Z0-9]{5,13}" oninput="validateUsername(this)" onchange="convertToLowercase(this)">
                        <div id="usernameFeedback" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required minlength="8" pattern="^(?!(.)\1{2,}).*">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="referralCode" class="form-label">Referral Code (Optional)</label>
                        <input type="text" class="form-control" name="referralCode">
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="agreeTerms" name="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">I agree to the terms and privacy policy</label>
                    </div>
                    <button type="submit" class="btn ">Register</button>
                    <a href="#" class="btn btn-link">Forgot Password?</a>
                </form>
            </div>
            <div class="col-md-6">
                <img src="themes/images/https_/lottiefiles.com/animations/login-blue-zSJxUZS7i4.svg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateUsername(input) {
            var feedbackElement = document.getElementById('usernameFeedback');
            if (input.validity.patternMismatch) {
                feedbackElement.textContent = 'Username must start with a letter and can only contain letters and numbers (no symbols or spaces).';
                input.setCustomValidity(''); // Clear any custom validity message
            } else if (input.validity.tooShort) {
                feedbackElement.textContent = 'Username must be at least 6 characters long.';
                input.setCustomValidity(''); // Clear any custom validity message
            } else {
                feedbackElement.textContent = '';
                input.setCustomValidity(''); // Clear any custom validity message
            }
        }

        function convertToLowercase(input) {
            input.value = input.value.toLowerCase();
        }
    </script>

</body>
</html>
