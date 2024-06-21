
// $(document).ready(function() {
//     function fetchQuizzes() {
//         $.ajax({
//             url: 'core/main/fetch_quiz.php',
//             type: 'GET',
//             dataType: 'json',
//             success: function(data) {
//                 var now = new Date();
//                 var tomorrow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 365);
                
//                 $('#UpcomingQuiz, #OngoingQuiz, #PastQuiz').empty(); // Clear existing data

//                 Object.keys(data).forEach(function(quizType) {
//                     var quizzes = data[quizType]; // Get the quizzes array for the current quiz type

//                     // Ensure quizzes array is not null or undefined and has valid elements
//                     if (quizzes && Array.isArray(quizzes)) {
//                         quizzes.forEach(function(quiz) {
//                             // Log the quiz object to verify its structure
//                             // console.log('Processing quiz:', quiz);

//                             if (quiz && quiz.quiz_id && quiz.start_date && quiz.end_date) {
//                                 var startDate = new Date(quiz.start_date);
//                                 var endDate = new Date(quiz.end_date);

//                                 var startDateString = startDate.toLocaleDateString(); // Format date as string
//                                 var endDateString = endDate.toLocaleDateString(); // Format date as string

//                                 var row = '<tr>' +
//                                             '<td>' + quiz.quiz_id + '</td>' +
//                                             '<td>' + quizType + '</td>' +
//                                             '<td>' + startDateString + '</td>' + // Show formatted start date
//                                             '<td>' + endDateString + '</td>' + // Show formatted end date
//                                             '<td>' + 'Edit' + '</td>' +
//                                             '<td><button class="btn ' + (quiz.status == 1 ? 'btn-success' : 'btn-secondary') + ' inactive-btn" data-quiz-id="' + quiz.quiz_id + '" data-status="' + quiz.status + '">' + (quiz.status == 1 ? 'Active' : 'Inactive') + '</button></td>' +
//                                           '</tr>';

//                                 // Ensure the comparison for date matching is correct
//                                 if (startDate.toDateString() === tomorrow.toDateString()) {
//                                     $('#UpcomingQuiz').append(row);
//                                 } else if (startDate <= now && endDate >= now) {
//                                     $('#OngoingQuiz').append(row);
//                                 } else if (endDate < now) {
//                                     $('#PastQuiz').append(row);
//                                 }
//                             } else {
//                                 console.log('Quiz data is missing or incomplete:', quiz);
//                             }
//                         });
//                     } else {
//                         console.log('Quiz array for ' + quizType + ' is missing or not an array:', quizzes);
//                     }
//                 });
//             },
//             error: function(error) {
//                 console.log('Error fetching quiz data:', error);
//             }
//         });
//     }

//     // Initial fetch
//     fetchQuizzes();

//     // Add click event listener for the Inactive buttons
//     $(document).on('click', '.inactive-btn', function(event) {
//         event.preventDefault(); // Prevent the default action

//         var button = $(this);
//         var quizId = button.data('quiz-id');
//         var currentStatus = parseInt(button.data('status')); // Ensure status is interpreted as a number
//         var newStatus = currentStatus === 0 ? 1 : 0; // Toggle between 0 and 1

//         // Send AJAX request to update the status
//         $.ajax({
//             url: 'core/main/update_quiz_status.php',
//             type: 'POST',
//             data: {
//                 quiz_id: quizId,
//                 status: newStatus
//             },
//             success: function(response) {
//                 // console.log('Update response:', response);
//                 // Fetch and update the quizzes again after status update
//                 fetchQuizzes();
//             },
//             error: function(error) {
//                 console.log('Error updating quiz status:', error);
//             }
//         });
//     });
// });

$(document).ready(function() {
    function fetchQuizzes() {
        $.ajax({
            url: 'core/main/fetch_quiz.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var now = new Date();
                var oneYearLater = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 365);
                
                $('#UpcomingQuiz, #OngoingQuiz, #UnscheduledQuiz').empty(); // Clear existing data

                Object.keys(data).forEach(function(quizType) {
                    var quizzes = data[quizType]; // Get the quizzes array for the current quiz type

                    // Ensure quizzes array is not null or undefined and has valid elements
                    if (quizzes && Array.isArray(quizzes)) {
                        quizzes.forEach(function(quiz) {
                            // Log the quiz object to verify its structure
                            // console.log('Processing quiz:', quiz);

                            if (quiz && quiz.quiz_id && quiz.start_date && quiz.end_date) {
                                var startDate = new Date(quiz.start_date);
                                var endDate = new Date(quiz.end_date);

                                var startDateString = startDate.toLocaleDateString(); // Format date as string
                                var endDateString = endDate.toLocaleDateString(); // Format date as string

                                var row = '<tr>' +
                                            '<td>' + quiz.quiz_id + '</td>' +
                                            '<td>' + quizType + '</td>' +
                                            '<td>' + startDateString + '</td>' + // Show formatted start date
                                            '<td>' + endDateString + '</td>' + // Show formatted end date
                                            '<td>' + 'Edit' + '</td>' +
                                            '<td><button class="btn ' + (quiz.status == 1 ? 'btn-success' : 'btn-secondary') + ' inactive-btn" data-quiz-id="' + quiz.quiz_id + '" data-status="' + quiz.status + '">' + (quiz.status == 1 ? 'Active' : 'Inactive') + '</button></td>' +
                                          '</tr>';

                                if (quiz.status == 0) {
                                    $('#UnscheduledQuiz').append(row);
                                } else {
                                    if (startDate.toDateString() === oneYearLater.toDateString()) {
                                        $('#UpcomingQuiz').append(row);
                                    } else if (startDate <= now && endDate >= now) {
                                        $('#OngoingQuiz').append(row);
                                    }
                                }
                            } else {
                                console.log('Quiz data is missing or incomplete:', quiz);
                            }
                        });
                    } else {
                        console.log('Quiz array for ' + quizType + ' is missing or not an array:', quizzes);
                    }
                });
            },
            error: function(error) {
                console.log('Error fetching quiz data:', error);
            }
        });
    }

    // Initial fetch
    fetchQuizzes();

    // Add click event listener for the Inactive buttons
    $(document).on('click', '.inactive-btn', function(event) {
        event.preventDefault(); // Prevent the default action

        var button = $(this);
        var quizId = button.data('quiz-id');
        var currentStatus = parseInt(button.data('status')); // Ensure status is interpreted as a number
        var newStatus = currentStatus === 0 ? 1 : 0; // Toggle between 0 and 1

        // Send AJAX request to update the status
        $.ajax({
            url: 'core/main/update_quiz_status.php',
            type: 'POST',
            data: {
                quiz_id: quizId,
                status: newStatus
            },
            success: function(response) {
                // console.log('Update response:', response);
                // Fetch and update the quizzes again after status update
                fetchQuizzes();
            },
            error: function(error) {
                console.log('Error updating quiz status:', error);
            }
        });
    });
});
