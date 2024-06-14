$(document).ready(function() {
    $.ajax({
        url: 'core/main/fetch_quiz.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var now = new Date();
            var tomorrow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1);
            Object.keys(data).forEach(function(quizType) {
                var quizArray = data[quizType];
                
                quizArray.forEach(function(quiz) {
                    var startDate = new Date(quiz.start_date);
                    var endDate = new Date(quiz.end_date);

                    var row = '<tr>' +
                                '<td>' + quiz.sub_quiz_id + '</td>' +
                                '<td>' + 'CT-' + quizType + '-' + quiz.sub_quiz_id + '</td>' +
                                '<td>' + quizType + '</td>' +
                                '<td>' + quiz.start_date.split(' ')[0] + '</td>' +
                                '<td>1 Minute</td>' + 
                                '<td>' + quiz.end_date.split(' ')[0] + '</td>' +
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
        },
        error: function(error) {
            console.log('Error fetching quiz data:', error);
        }
    });
});
