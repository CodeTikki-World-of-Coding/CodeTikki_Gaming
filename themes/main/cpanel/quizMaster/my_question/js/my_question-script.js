fetch('core/main/fetch_myQuestion.php')
    .then(response => response.text())
    .then(html => {
        const questionList = document.getElementById('questionList');

        questionList.innerHTML = html;

        function editQuestion(questionId) {
            $('#editQuestionModal').modal('show');
            
            const questionIdDisplay = document.getElementById('questionIdDisplay');
            questionIdDisplay.innerText = "Question ID: " + questionId;
            document.getElementById('questionId').value = questionId;

           
    }

        questionList.addEventListener('click', function(event) {
            const target = event.target;
            if (target.classList.contains('edit-button')) {
                const questionId = target.getAttribute('data-question-id');
                editQuestion(questionId);
            }
        });
    })
    .catch(error => console.error('Error fetching questions:', error));
   
    document.getElementById('saveChangesBtn').addEventListener('click', function() {
    const formData = new FormData(document.getElementById('editQuestionForm'));

    const questionId = document.getElementById('questionId').value;

    formData.append('questionId', questionId);

    fetch('core/main/update_question.php', {
        method: 'POST', 
        body: formData 
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
