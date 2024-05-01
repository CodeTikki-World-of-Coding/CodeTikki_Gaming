$(document).ready(function() {
    $('#add').click(function() {
        $('#container').hide();
        $('#Form').show();
    });

    $('.add-question-btn').click(function() {
        var clonedForm = $('#questionForm').clone(true); 
        clonedForm.find('input[type="text"], textarea').val('');
        var questionNumber = $('.question-number').length + 1;
        clonedForm.find('.question-number').text(questionNumber);
        clonedForm.attr('id', 'questionForm' + questionNumber);
        $('#clone-container').append(clonedForm);
        $('.view-preview-btn').show();
    });

    $('#submit').click(function(event) {
        event.preventDefault();

        try {
            var currentDate = new Date().toISOString().slice(0, 10);
            console.log(currentDate);
            $('input[name="currentDate"]').val(currentDate);
            
            var allFormData = new FormData();
            var originalFormData = new FormData($('#questionForm')[0]);
            originalFormData.forEach(function(value, key) {
                allFormData.append(key, value);
            });
            $('.question-form').not('#questionForm').each(function(index, form) {
                var formData = new FormData($(form)[0]); 
                formData.forEach(function(value, key) {
                    allFormData.append('cloned_' + key + '_' + index, value); 
                });
            });
            $.ajax({
                url: "core/main/question_bank.php",
                type: "POST",
                data: allFormData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                }
            });
            $('#questionForm')[0].reset();
            $('#clone-container').empty(); // Remove cloned forms
            $('.view-preview-btn').hide(); // Hide "View Preview" button
        } catch (error) {
            console.error('An error occurred:', error);
        }
    });
});
