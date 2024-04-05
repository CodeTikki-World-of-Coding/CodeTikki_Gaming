<div class="container quiz-container" >
<form class="row" id="rowDaily">
        <div class="col-md-12"><img src="themes/images/icon-quiz-removebg-preview 1.png" alt="quiz" class="quiz-image"></div>
        <div class="col-md-12"><h3 class="welcome">WELCOME</h3></div>
        <div class="col-md-12"><label><button onclick="showSecondForm(event)">Daily</button></label></div>
        <div class="col-md-12"><label  >Weekly</label></div>
        <div class="col-md-12"><label >Monthly</label></div>
        <div class="col-md-12"><label >Custom</label></div>
    </form>
    <form id="secondForm" style="display:none">
    <div class="col-md-12"><label><button onclick="showAutomatic(event)">Automatic</button></label></div>
    <div class="col-md-12"><label><button >manual</button></label></div>


</form>
<form id="thirdForm" style="display:none">
    <div class="quizQuestions" id="quizQuestions"></div>

</form>

</div>
<script>
               function showSecondForm(event) {
                event.preventDefault(); 
        document.getElementById("secondForm").style.display = "block";
        document.getElementById("rowDaily").style.display = "none";

    }
    function showAutomatic(event) {
    event.preventDefault(); 
    document.getElementById("thirdForm").style.display = "block";
    document.getElementById("secondForm").style.display = "none";

    generateAutomaticQuiz();
}
function generateAutomaticQuiz() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Response:', xhr.responseText);                try {
                    var questions = JSON.parse(xhr.responseText);
                    displayQuestions(questions);
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            } else {
                console.error('Failed to fetch questions. Status code:', xhr.status);
            }
        }
    };
    xhr.open('GET', 'core/main/dailyQuiz.php', true);
    xhr.send();
}

function fetchQuestions() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var questionsData = JSON.parse(xhr.responseText);
                displayQuestions(questionsData);
            } else {
                console.error('Failed to fetch questions. Status code:', xhr.status);
            }
        }
    };
    xhr.open('GET', 'path/to/your/php/script.php', true); 
    xhr.send();
}


function displayQuestions(questionsData) {
   // console.log('Received questionsData:', questionsData); // Log the received data

    var questionsContainer = document.getElementById('quizQuestions');
    questionsContainer.innerHTML = ''; // Clear previous content

    if (Array.isArray(questionsData)) {
       // console.log('Number of questions:', questionsData.length); // Log the number of questions

        questionsData.forEach(function(question, index) {
           // console.log('Processing question:', question); // Log each question object

            // Check if QuestionTitle is defined, not null, and not empty
            if (question.QuestionTitle && question.QuestionTitle.trim() !== '') {
                var questionElement = document.createElement('div');
                questionElement.classList.add('question');
                
                // Log the QuestionTitle before assigning it
              //  console.log('QuestionTitle:', question.QuestionTitle);

                questionElement.innerHTML = '<h2>Question ' + (index + 1) + '</h2>' +
                    '<p>' + question.QuestionTitle + '</p>';

                var optionsList = document.createElement('ul');
                for (var i = 1; i <= 4; i++) { // Assuming you have Option1 to Option4 in your JSON data
                    var option = question['Option' + i];
                    if (option) {
                        var optionItem = document.createElement('li');
                        optionItem.textContent = option;
                        optionsList.appendChild(optionItem);
                    }
                }
                questionElement.appendChild(optionsList);
                questionsContainer.appendChild(questionElement);

               // console.log('Question element:', questionElement); // Log the question element
            } else {
                console.warn('Skipping question with missing or empty title at index ' + index + ':', question);
                // Optionally, you can skip processing or display a warning message for this question
                // Example: console.warn('Skipping question with missing or empty title:', question);
            }
        });
    } else {
        console.error('Invalid format for questions:', questionsData);
    }
}

// Fetch questions and options when the page loads
document.addEventListener('DOMContentLoaded', function() {
    fetchQuestions();
});
               </script>
