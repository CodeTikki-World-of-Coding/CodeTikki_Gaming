
$(document).ready(function() {
    $.ajax({
        url: 'core/main/fetch_quiz_set.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var now = new Date();
            var tomorrow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1);

            // Check if data is an array before proceeding
            if (Array.isArray(data)) {
                data.forEach(function(item) {
                    var quiz = item.quiz_data;
                    var subQuizArray = item.sub_quiz_data;

                    var startDate = new Date(quiz.start_date);
                    var endDate = new Date(quiz.end_date);

                    // Manually construct the date strings in numeric format
                    var startDateString = (startDate.getMonth() + 1) + '/' + startDate.getDate() + '/' + startDate.getFullYear();
                    var endDateString = (endDate.getMonth() + 1) + '/' + endDate.getDate() + '/' + endDate.getFullYear();
                    var duration = '1 Minute'; // Change this as per your actual duration logic

                    subQuizArray.forEach(function(subQuiz) {
                        var subQuizId = subQuiz.sub_quiz_id;

                        var row = '<tr>' +
                            '<td>' + quiz.quiz_id + '</td>' +
                            '<td>' + 'CT-' + subQuizId + '</td>' + // Display each sub_quiz_id in a separate row
                            '<td>' + quiz.quiz_type + '</td>' +
                            '<td>' + startDateString + '</td>' +
                            '<td>' + duration + '</td>' +
                            '<td>' + endDateString + '</td>' +
                            '<td><button type="button" class="play-btn btn btn-success" data-sub-quiz-id="' + subQuizId + '">Play</button></td>' + 
                            '</tr>';

                        if (startDate.toDateString() === tomorrow.toDateString()) {
                            $('#UpcomingQuiz').append(row);
                        } else if (startDate <= now && endDate >= now) {
                            $('#OngoingQuiz').append(row);
                        } else if (endDate < now) {
                            $('#PastQuiz').append(row);
                        }
                    });
                });
            } else {
                console.log('Data is not an array:', data);
            }
        },
        error: function(error) {
            console.log('Error fetching quiz data:', error);
        }
    }); 
    // $(document).on('click', '.play-btn', function() {
    //     var subQuizId = $(this).data('sub-quiz-id');

    //     // You can send the subQuizId via GET, POST or any other method required
    //     $(".navbarPages").load("themes/main/userQuiz/play_quiz.php", { sub_quiz_id: subQuizId });
    // });

    $(document).on('click', '.play-btn', function() {
        var subQuizId = $(this).data('sub-quiz-id');
    
        $.ajax({
            url: 'themes/main/userQuiz/play_quiz.php',
            method: 'GET',
            data: { sub_quiz_id: subQuizId },
            success: function(response) {
                $(".navbarPages").html(response); // Replace .load() with .html() for more control
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error loading play_quiz.php:', textStatus, errorThrown);
            }
        });
    });
    
});
