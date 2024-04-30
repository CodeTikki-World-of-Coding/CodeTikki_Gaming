

 <div class="container">
    <h1 class="mt-4">My Questions</h1>
    <table id="questionList" class="table mt-4">
    </table>
</div>
<div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQuestionModalLabel">Edit Question</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="questionIdDisplay"></label>
                    <span id="questionIdDisplay"></span>
                </div>

                <form id="editQuestionForm">
                    <input type="hidden" id="questionId" name="questionId">
                    <div class="form-group">
                        <label for="questionTitle">Question Title</label>
                        <input type="text" class="form-control" id="questionTitle" name="questionTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="questionLevel">Level</label>
                        <input type="text" class="form-control" id="questionLevel" name="questionLevel" required>
                    </div>
                    <div class="form-group">
                        <label for="option1">Option 1</label>
                        <input type="text" class="form-control" id="option1" name="option1" required>
                    </div>
                    <div class="form-group">
                        <label for="option2">Option 2</label>
                        <input type="text" class="form-control" id="option2" name="option2" required>
                    </div>
                    <div class="form-group">
                        <label for="option3">Option 3</label>
                        <input type="text" class="form-control" id="option3" name="option3" required>
                    </div>
                    <div class="form-group">
                        <label for="option4">Option 4</label>
                        <input type="text" class="form-control" id="option4" name="option4" required>
                    </div>
                    <button type="button" id="saveChangesBtn" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>

fetch('core/main/fetch_myQuestion.php')
    .then(response => response.text())
    .then(html => {
        // Get the element where you want to display the questions
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

    // Get the question ID from the form
    const questionId = document.getElementById('questionId').value;

    // Append the question ID to the form data
    formData.append('questionId', questionId);

    fetch('core/main/update_question.php', {
        method: 'POST', // Specify the request method
        body: formData // Set the form data as the request body
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

    </script>
