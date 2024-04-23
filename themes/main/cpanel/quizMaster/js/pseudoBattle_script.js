$(document).ready(function () {
    $('.registeredTeam').hide();
    $('.showEventContainer').hide();
    $('#teamContainer-content').hide();
    $('.quiz_set-container').hide(); 

    $('#teamForm').submit(function (event) {
        event.preventDefault(); 
        $('.registeredTeam').show();
        $('#teamForm').hide();
    });

    $('#teamContainer').click(function () {
        $('#teamContainer-content').show();
        $('#teamContainer').hide();
        $('.analyticsContainer').hide();
        $('.rewardContainer').hide();
        $('.quizSetContainer').hide();
    });

    $('#backBtn').click(function () {
        $('#teamContainer-content').hide();
        $('#teamContainer').show();
        $('.analyticsContainer').show();
        $('.rewardContainer').show();
        $('.quizSetContainer').show();
    });

    $('.quizSetContainer h2').click(function () {
        $('#teamContainer-content').hide();
        $('#teamContainer').hide();
        $('.quizSetContainer').hide();
        $('.analyticsContainer').hide();
        $('.rewardContainer').hide();
        $('.quiz_set-container').show();
        $('.questionContainer').show();
        fetchQuestion();
    });

    $('#confirmBtn').click(function () {
        const eventDate = $('#eventDate').val();
        if (eventDate) {
            const currentMonth = new Date().getMonth() + 1;
            const formattedMonth = currentMonth.toString().padStart(2, '0');
            $.ajax({
                url: 'core/main/Event.php',
                method: 'POST',
                data: { eventDate: eventDate, currentMonth: formattedMonth },
                success: function (response) {
                    alert(response);
                    $('#createEventModal').modal('hide');
                    fetchEventNames();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            alert('Please enter event date.');
        }
    });

    $('#closeModalBtn').click(function () {
        $('#createEventModal').modal('hide');
    });

    function fetchEventNames() {
        $.ajax({
            url: 'core/main/fetch_event-name.php',
            method: 'GET',
            success: function (response) {
                $('#teamDropdown').append(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetchEventNames();

    $('#teamDropdown').change(function () {
        const selectedValue = $(this).val();
        if (selectedValue === 'create') {
            $('#createEventModal').modal('show');
            $(this).val('');
        } else if (selectedValue !== '' && selectedValue !== 'create') {
            $.ajax({
                url: 'core/main/fetch_registered_teams.php',
                type: 'POST',
                data: { selectedEvent: selectedValue },
                success: function (response) {
                    console.log(response);
                    $('.registeredTeam').hide();
                    $('.showEventContainer').show().find('.teamList').html(response);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching event data:', error);
                }
            });
        }
    });

    $('#setRequirementsForm').submit(function (event) {
        event.preventDefault();
        const minLevel = parseInt($('#minLevel').val());
        const maxLevel = parseInt($('#maxLevel').val());
        generateQuizSetsAndInsert(minLevel, maxLevel);
    });
    
    function generateQuizSetsAndInsert(minLevel, maxLevel) {
        $.ajax({
            url: 'core/main/dailyQuiz.php',
            type: 'POST',
            data: {
                minLevel: minLevel,
                maxLevel: maxLevel
            },
            success: function (response) {

            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

    function fetchQuestion() {
        $.ajax({
            url: 'core/main/fetch_quiz-set.php',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#questionContainer').html('');

                    for (let i = 0; i < response.quizSetData.length; i++) {
                        const quizSet = response.quizSetData[i];
                        const quizSetContainer = $('<div class="quizSetContainer"></div>'); // Create a new container for the quiz set
                        quizSetContainer.append('<div class="quizSet">CT[Event Version] ' + quizSet.QuizSetID + '</div>');

                        $.each(quizSet.Questions, function(qIndex, question) {
                            var questionHtml = '<div class="question">';
                            questionHtml += '<h5>Q.No ' + (qIndex + 1) + ': ' + question.QuestionTitle + '</h5>';
                            questionHtml += '<ul>';
                            questionHtml += '<li>A) ' + question.Option1 + '</li>';
                            questionHtml += '<li>B) ' + question.Option2 + '</li>';
                            questionHtml += '<li>C) ' + question.Option3 + '</li>';
                            questionHtml += '<li>D) ' + question.Option4 + '</li>';
                            questionHtml += '</ul>';
                            questionHtml += '</div>';

                            quizSetContainer.append(questionHtml);
                        });

                        $('#questionContainer').append(quizSetContainer);
                    }
                    } else {
                        $('#questionContainer').html('<p>' + response.message + '</p>');
                    }
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        }
    $('#minLevel').on('input', function () {
        const minLevelValue = parseInt($(this).val());
        const maxLevelValue = parseInt($('#maxLevel').val());

        if (maxLevelValue <= minLevelValue) {
            $('#maxLevel').attr('min', minLevelValue + 1); 
            $('#maxLevel')[0].reportValidity(); 
            $('#createButton').prop('disabled', true); 
        } else {
            $('#maxLevel').attr('min', minLevelValue + 1); 
            $('#createButton').prop('disabled', false); 
        }
    });

    $('#maxLevel').on('input', function () {
        const minLevelValue = parseInt($('#minLevel').val());
        const maxLevelValue = parseInt($(this).val());

        if (maxLevelValue <= minLevelValue) {
            $(this).attr('min', minLevelValue + 1); 
            $(this)[0].reportValidity(); 
            $('#createButton').prop('disabled', true); 
        } else {
            $(this).attr('min', minLevelValue + 1); 
            $('#createButton').prop('disabled', false); 
        }
    });


});
