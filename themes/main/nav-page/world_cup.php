<?php
session_start();
?>
<div class="register-main__page">
    <div class="register-page" id="register-content">
        <div class="page-content">
            <h1>CodeTikki Coding World Cup</h1>
            <p>Where Code meets Cricket: Unleash your skills in the Ultimate Coding World Cup</p>
        </div>
        <div class="register-box" id="register-box">
            <h1>Registration</h1>
            <input id="register" type="submit" value="Register" >
        </div>
        <form method="post" action="../../../core/main/form_handler.php" id="world-cup-form" class="hidden">
            <div class="form-inner">
                <span>
                    <label>UserID1:</label>
                    <input type="text" name="text" value="<?php echo htmlspecialchars($_SESSION['userid']); ?>" readonly >
                </span>
                <span>
                    <label>MailID1:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['mailid']); ?>"   readonly >
                </span>
                <input type="submit" id="next-btn" value="Next">
            </div>
        </form>
        <form method="post" action="core/main/varify_handler.php"  id="verify-phone-form" class="hidden">
            <div class="form-inner">
                <label>Enter Your WhatsAPP No:</label>
                    <input type="phone" name="phone" id="phone">
                    <input type="submit" id="confirm-btn" value="Confirm" >
                    <input type="submit" id="change-btn" value="Change" >
            </div>
        </form>
        <form method="post" action="core/main/subject_handler.php" id="select-subject" class="hidden">
            <div class="form-inner">
                <h4>VERIFY YOUR SUBJECTS</h4>
                <div class="checkbox-container">
        
                <div class="first">
                <div class="ckbutton">
                    <label>  
                        <input class="subject" name="subject[html]" type="checkbox" value="html"  onclick="addSubject('html')"  >
    					<span>HTML</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[css]" type="checkbox" value="css"  onclick="addSubject('css')" >
    					<span>CSS</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[javascript]" type="checkbox" value="javascript"  onclick="addSubject('javascript')" >
    					<span>Javascript</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[java]" type="checkbox" value="java"  onclick="addSubject('java')" >
    					<span>Java</span>
                    </label>
                </div>
                </div>
                <div class="second">
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[C++]" type="checkbox" value="C++"  onclick="addSubject('C++')" >
    					<span>C++</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[Python]" type="checkbox" value="Python"   onclick="addSubject('Python')">
    					<span>Python</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[React]" type="checkbox" value="React"  onclick="addSubject('React')" >
    					<span>React</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[Angular]" type="checkbox" value="Angular"  onclick="addSubject('Angular')" >
    					<span>Angular</span>
                    </label>
                </div>
                </div>
                </div>
                <input type="submit" id="confirm-subject-btn" value="Confirm" >
                <input type="submit" id="change-btn" value="Change" >                   
            </div>
            <div id="selected-subjects-container" class="selected-subjects-container">    
            </div>
        </form>
        <form  id="confirm-form" class="hidden">
            <div class="form-inner">
                <h3>Congratulations</h3>
                <p>you have successfully regitered</p>
                    <input type="submit" id="confirm-final-btn" value="Confirm" >
                    <input type="submit" id="change-final-btn" value="Change" >
            </div>
        </form>
        <form  id="register-page" class="hidden">
            <div class="form-inner">
                <h2 > Registered</h2>

            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    
    document.getElementById('register').addEventListener('click', function() {
        document.getElementById('register-box').classList.add('hidden');
        document.getElementById('world-cup-form').classList.remove('hidden');
    });

    document.getElementById('next-btn').addEventListener('click', function() {

        event.preventDefault(); // Prevent default form submission
        document.getElementById('world-cup-form').classList.add('hidden');
        document.getElementById('verify-phone-form').classList.remove('hidden');
        

    });
$(document).ready(function() {
    $('#confirm-btn').click(function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        // Get form data
        var formData = {
            'phone': $('#phone').val(),
        };

        // Send form data to PHP script using AJAX
        $.ajax({
            type: 'POST',
            url: 'core/main/varify_handler.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function(data) {
            console.log(data);
          //  alert('Form submitted successfully!');
            document.getElementById('verify-phone-form').classList.add('hidden');
            document.getElementById('select-subject').classList.remove('hidden');
        })
        .fail(function(xhr, status, error) {
            console.error(xhr.responseText); // Log the full response from the server
            console.error(error); // Log the JavaScript error message
            alert('Error submitting form! Please try again later.'); // Display a generic error message to the user
        });
    });
});

$(document).ready(function() {
    var selectedSubjects = []; // Array to store selected subjects
    
    function addSubject(subject) {
        var existingSubjectCount = selectedSubjects.filter(function(item) {
            return item === subject;
        }).length;
        
        if (existingSubjectCount < 3) {
            if (selectedSubjects.length < 11) {
                selectedSubjects.push(subject);
                updateSelectedSubjectsDisplay();
            } else {
                alert("You can't select more than 11 subjects.");
            }
        } else {
            alert("You can't add the same subject more than 3 times.");
        }
    }
    
    function updateSelectedSubjectsDisplay() {
    var selectedSubjectsContainer = $('#selected-subjects-container');
    selectedSubjectsContainer.empty(); // Clear previous content
    
    selectedSubjects.forEach(function(subject, index) {
        var subjectNumber = index + 1; // Add 1 to the index to make it 1-based
        selectedSubjectsContainer.append('<span>' + subjectNumber + '. ' + subject + '</span>');
    });
}

    
    // Click event handler for checkboxes
    $('.subject').click(function() {
        if ($(this).is(":checked")) {
            var subject = $(this).val();
            addSubject(subject);
        }
    });

    $('#confirm-subject-btn').click(function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        if (selectedSubjects.length === 11) { // Check if exactly 11 subjects are selected
            // Send form data to PHP script using AJAX
            $.ajax({
                type: 'POST',
                url: 'core/main/subject_handler.php',
                data: { subject: selectedSubjects.join(',') },
                dataType: 'json',
                encode: true
            })
            .done(function(data) {
                console.log(data);
                // Reset selected subjects after successful submission
                selectedSubjects = [];
                updateSelectedSubjectsDisplay();
                document.getElementById('select-subject').classList.add('hidden');
                document.getElementById('confirm-form').classList.remove('hidden');            })
            .fail(function(xhr, status, error) {
                console.error(xhr.responseText); // Log the full response from the server
                console.error(error); // Log the JavaScript error message
                alert('Error submitting form! Please try again later.'); // Display a generic error message to the user
            });
        } else {
            alert("Please select exactly 11 subjects.");
        }
    });
});
$(document).ready(function() {
    $('#confirm-final-btn').click(function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        // Hide the confirm form and show the register page
        $('#confirm-form').addClass('hidden');
        $('#register-page').removeClass('hidden');
    });
});



</script> 
