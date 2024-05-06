$(document).ready(function() {
    function fetchQuestions(formData) {
        $.ajax({
            url: 'core/main/updateAdminQuestion.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                console.log("Received data from server:", data); 
                $('#question-table tbody').empty();
                if (data && data.questions && Array.isArray(data.questions)) {
                    $.each(data.questions, function(index, question) {
                        var row = `
                            <tr>
                                <td>${question.QuestionID}</td>
                                <td>${question.QuestionTitle}</td>
                                <td>${question.Option1}</td>
                                <td>${question.Option2}</td>
                                <td>${question.Option3}</td>
                                <td>${question.Option4}</td>
                                <td>${question.CorrectAnswer}</td>
                                <td>${question.Level}</td>
                                <td>${question.Attempts}</td>
                            </tr>
                        `;
                        $('#question-table tbody').append(row);
                    });
                } else {
                    console.log("No questions found.");
                }
                console.log(data.creators);
                $('#creator').empty(); 
                $('#creator').append('<option value="">All</option>'); 

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