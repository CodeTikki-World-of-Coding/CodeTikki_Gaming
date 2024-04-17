
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
                try {
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

function displayQuestions(questionsData) {
    var questionsContainer = document.getElementById('quizQuestions');
    questionsContainer.innerHTML = ''; // Clear previous content

    if (Array.isArray(questionsData)) {
        questionsData.forEach(function(question, index) {
            if (question.QuestionTitle && question.QuestionTitle.trim() !== '') {
                var questionElement = document.createElement('div');
                questionElement.classList.add('question');

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
            } else {
                console.warn('Skipping question with missing or empty title at index ' + index + ':', question);
            }
        });
    } else {
        console.error('Invalid format for questions:', questionsData);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // fetchQuestions();
});
