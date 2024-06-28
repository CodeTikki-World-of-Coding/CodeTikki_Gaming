<div class="container-fluid playQuiz">

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    // $(document).ready(function() {
    //     // Get sub_quiz_id from URL query parameter or wherever it is available
    //     var subQuizId = <?php echo isset($_GET['sub_quiz_id']) ? json_encode($_GET['sub_quiz_id']) : 'null'; ?>;
        
    //     if (subQuizId !== null) {
    //         loadQuestion(subQuizId, 0); // Load the first question

    //         $(document).on('click', '#nextButton', function() {
    //             var nextIndex = $(this).data('next-index');
    //             loadQuestion(subQuizId, nextIndex);
    //         });
    //     } else {
    //         $('.playQuiz').text('Sub Quiz ID not provided.');
    //     }
    // });

    // function loadQuestion(subQuizId, questionIndex) {
    //     // AJAX call to send sub_quiz_id and question_index to PHP page
    //     $.ajax({
    //         url: "core/main/fetchPlayQuiz_endUser.php",
    //         type: "GET", // Change to "POST" if needed
    //         data: { sub_quiz_id: subQuizId, question_index: questionIndex },
    //         dataType: "html", // Change as per your response type
    //         success: function(response) {
    //             $('.playQuiz').html(response); // Update container with PHP response
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.error('Error fetching question:', textStatus, errorThrown);
    //         }
    //     });
    // }
    $(document).ready(function() {
    // Get sub_quiz_id from URL query parameter or wherever it is available
    var subQuizId = <?php echo isset($_GET['sub_quiz_id']) ? json_encode($_GET['sub_quiz_id']) : 'null'; ?>;
    
    if (subQuizId !== null) {
        loadQuestion(subQuizId, 0); // Load the first question
        
        // Initialize the timer for 10 minutes (600 seconds)
        var timerDuration = 60; // 10 minutes in seconds
        startTimer(timerDuration);

        $(document).on('click', '#nextButton', function() {
            var nextIndex = $(this).data('next-index');
            loadQuestion(subQuizId, nextIndex);
        });
        // $(document).on('click', '#finishButton', function() {
        //     window.location.href = 'quiz.php'; // Navigate to quiz.php
        // });
        

        $(document).on('click', '#finishButton', function() {
    
        $.ajax({
            url: 'themes/main/nav-page/quiz.php',
            method: 'GET',
            // data: { sub_quiz_id: subQuizId },
            success: function(response) {
                $(".navbarPages").html(response); // Replace .load() with .html() for more control
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error loading play_quiz.php:', textStatus, errorThrown);
            }
        });
    });

    } else {
        $('.playQuiz').text('Sub Quiz ID not provided.');
    }
});

function loadQuestion(subQuizId, questionIndex) {
    // AJAX call to send sub_quiz_id and question_index to PHP page
    $.ajax({
        url: "core/main/fetchPlayQuiz_endUser.php",
        type: "GET", // Change to "POST" if needed
        data: { sub_quiz_id: subQuizId, question_index: questionIndex },
        dataType: "html", // Change as per your response type
        success: function(response) {
            $('.playQuiz').html(response); // Update container with PHP response
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching question:', textStatus, errorThrown);
        }
    });
}

function startTimer(duration) {
    var timer = duration, minutes, seconds;
    var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        $('#timer').text(minutes + ":" + seconds);

        if (--timer < 0) {
            clearInterval(interval);
            $('.playQuiz').html('<div class="finished-container"><p>Thank you! Your exam has finished.</p><button id="finishButton" class="btn btn-primary">Finish</button></div>');
        }
    }, 1000);
}


    </script>
