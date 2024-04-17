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

