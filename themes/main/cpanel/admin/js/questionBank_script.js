$(document).ready(function() {
    function fetchQuestions(formData) {
        $.ajax({
            url: 'core/main/updateAdminQuestion.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                console.log("Received data from server:", data); // Log the received data
                console.log("Creators:", data.options);

                $('#question-table tbody').empty();
                if (data && data.questions && Array.isArray(data.questions)) {
                    $.each(data.questions, function(index, question) {
                        console.log("Question ID:", question.QuestionID);
                        console.log("Options:", question.Options); // Log the options
                        var correctOption = question.Options.find(option => option.text.trim() === question.CorrectAnswer.trim());
                        if (correctOption) {
                            correctOption.isCorrect = true;
                        }
                        var row = '<tr>';
                        row += `<td>${question.QuestionID}</td>`;
                        row += `<td>${question.QuestionTitle}</td>`;
                        question.Options.forEach(function(option) {
                            row += `<td class="${option.isCorrect ? 'correct-answer' : ''}">${option.text}</td>`;
                        });
                        row += `<td>${question.Level}</td>`;
                        row += `<td>${question.Attempts}</td>`;
                        row += '</tr>';
                        $('#question-table tbody').append(row);
                    });
                } else {
                    console.log("No questions found.");
                }
                console.log("Creators:", data.creators);
                $('#creator').empty(); 
                $('#creator').append('<option value="">All</option>'); 
                $.each(data.creators, function(index, creator) {
                    $('#creator').append(`<option value="${creator}">${creator}</option>`);
                });

            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function loadAllQuestions() {
        fetchQuestions({});
    }

    $('#filter-form').on('submit', function(event) {
        event.preventDefault(); 
        var formData = {};
        
        var minLevel = $('#min-level').val();
        var maxLevel = $('#max-level').val();
        
        if (minLevel !== '') {
            formData['minLevel'] = minLevel;
        }
        if (maxLevel !== '') {
            formData['maxLevel'] = maxLevel;
        }

        formData['creator'] = $('#creator').val();
        formData['sortBy'] = $('#sort-by').val();
        
        fetchQuestions(formData); 
    });

    loadAllQuestions();
});
