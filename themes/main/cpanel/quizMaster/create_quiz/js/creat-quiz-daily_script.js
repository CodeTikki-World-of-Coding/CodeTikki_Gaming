function showSecondForm(event) {
    event.preventDefault();
    document.getElementById("showSecondFormBtn").style.display = "block";
    document.getElementById("rowDaily").style.display = "none";
}

function showAutomatic(event) {
    event.preventDefault();
    document.getElementById("quizModalDaily").style.display = "block";
}


function closeModal() {
    document.getElementById("quizModalDaily").style.display = "none";
}

function fetchQuizIdAndGenerateSets(questions) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var quizId = xhr.responseText;
                displayQuizId(quizId); 
                generateQuizSets(questions, quizId);

            } else {
                console.error('Failed to fetch quiz ID. Status code:', xhr.status);
            }
        }
    };
    xhr.open('GET', 'core/main/create_daily_quiz_id.php', true);
    xhr.send();
}

function fetchQuestionsAndGenerateQuiz(event) {
    event.preventDefault(); 

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                try {
                    var questions = JSON.parse(xhr.responseText);
                    fetchQuizIdAndGenerateSets(questions);
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            } else {
                console.error('Failed to fetch questions. Status code:', xhr.status);
            }
        }
    };
    xhr.open('GET', 'core/main/fetch_automatic-quiz.php', true);
    xhr.send();
}
function organizeAndSendSets(questions) {
    var setsByLevel = {
        '0-200': [],
        '200-400': [],
        '400-600': [],
        '600-800': [],
        '800-1000': []
    };

    questions.forEach(function(question) {
        var level = parseInt(question.Level);
        if (level >= 0 && level < 200) {
            setsByLevel['0-200'].push(question);
        } else if (level >= 200 && level < 400) {
            setsByLevel['200-400'].push(question);
        } else if (level >= 400 && level < 600) {
            setsByLevel['400-600'].push(question);
        } else if (level >= 600 && level < 800) {
            setsByLevel['600-800'].push(question);
        } else if (level >= 800 && level <= 1000) {
            setsByLevel['800-1000'].push(question);
        }
    });

    for (var levelRange in setsByLevel) {
        if (setsByLevel.hasOwnProperty(levelRange)) {
            var questionsForSet = setsByLevel[levelRange];
            if (questionsForSet.length > 0) {
                var quizId = createQuizId();
                var quizSet = createQuizSet(questionsForSet, quizId);
                sendQuizSetToServer(quizSet);
            }
        }
    }
}

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

function generateQuizSets(questions, quizId) {
    var setsByLevel = {
        '0-200': [],
        '200-400': [],
        '400-600': [],
        '600-800': [],
        '800-1000': []
    };

    questions.forEach(function(question) {
        var level = parseInt(question.Level);
        if (level >= 0 && level < 200) {
            setsByLevel['0-200'].push(question);
        } else if (level >= 200 && level < 400) {
            setsByLevel['200-400'].push(question);
        } else if (level >= 400 && level < 600) {
            setsByLevel['400-600'].push(question);
        } else if (level >= 600 && level < 800) {
            setsByLevel['600-800'].push(question);
        } else if (level >= 800 && level <= 1000) {
            setsByLevel['800-1000'].push(question);
        }
    });

    for (var levelRange in setsByLevel) {
        if (setsByLevel.hasOwnProperty(levelRange)) {
            var questionsForSet = setsByLevel[levelRange];
            if (questionsForSet.length > 0) {
                var quizSet = createQuizSet(questionsForSet, quizId, levelRange);
                sendQuizSetToServer(quizSet);
            }
        }
    }

}

function createQuizSet(questionsData, quizId, levelRange) {
    var quizData = {
        quiz_id: quizId, 
        level: levelRange,
        num_questions: 10,
        questions: []
    };
    var filteredQuestions = questionsData.filter(function(question) {
        var level = parseInt(question.Level);
        return level >= 0 && level <= 1000; 
    });

    shuffleArray(filteredQuestions);

    for (var i = 0; i < quizData.num_questions && i < filteredQuestions.length; i++) {
        createQuizQuestion(filteredQuestions[i], quizData);
    }

    return quizData;
}

function createQuizQuestion(question, quizData) {
    var quizQuestion = {
        question_id: question.QuestionID,
        question_title: question.QuestionTitle,
        option1: question.Option1,
        option2: question.Option2,
        option3: question.Option3,
        option4: question.Option4,
        correct_answer: question.CorrectAnswer,
        Level: question.Level
    };
    quizData.questions.push(quizQuestion);
}

function sendQuizSetToServer(quizSetData) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var quizSetInfo = JSON.parse(xhr.responseText); 
            } else {
                console.error('Failed to send quiz set. Status code:', xhr.status);
            }
        }
    };
    xhr.open('POST', 'core/main/generate_quiz-automatic.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(quizSetData));
}


document.getElementById("showSecondFormBtn").addEventListener("click", showSecondForm);

function generateBtn(event) {
    event.preventDefault();
    fetchQuestionsAndGenerateQuiz(event);
    document.getElementById("quizModalDaily2").style.display = "block"; 
   document.getElementById("quizModalDaily").style.display = "none";

}

function displayQuizId(quizId) {
    const quizSetIdContainer = document.getElementById('QuizSetId');
    if (!quizSetIdContainer) {
        console.error('QuizSetId container not found!');
        return;
    }
    quizSetIdContainer.textContent = `Quiz ID: ${quizId}`;
    quizSetIdContainer.style.display = 'block';
}






//display quiz set code
// document.getElementById("quizForm").addEventListener("submit", function(event) {
//     event.preventDefault();
//     fetchQuizIdAndGenerateSets(questions);
//     closeModal();
//     document.getElementById("QuizSetId").style.display = "block"; 
//     document.getElementById("showSecondFormBtn").style.display = "none";

// });
// function displayQuizSet(quizSetInfo) {
//     const container = document.getElementById('quizSet');
//     if (!container) {
//         console.error('Container element not found!');
//         return;
//     }

//     const setDiv = document.createElement('div');
//     setDiv.classList.add('questions');

//     const setName = document.createElement('h2');
//     setName.textContent = `Quiz Set `; 
//     setDiv.appendChild(setName);

//     const setLevel = document.createElement('p');
//     setLevel.textContent = `Level: ${quizSetInfo.level}`;
//     setDiv.appendChild(setLevel);
     
//     const questionsList = document.createElement('ul');
//     quizSetInfo.questions.forEach((question, questionIndex) => {
//         const questionItem = document.createElement('li');

//         const questionNumber = document.createElement('span');
//         questionNumber.textContent = `Question ${questionIndex + 1}:`;
//         questionItem.appendChild(questionNumber);

//         for (const key in question) {
//             if (question.hasOwnProperty(key)) {
//                 const propertyItem = document.createElement('span');
//                 propertyItem.textContent = ` ${question[key]}`;
                
//                 switch (key) {
//                     case 'QuestionTitle':
//                         propertyItem.classList.add('question-title');
//                         break;
//                     case 'Pseudocode':
//                         propertyItem.classList.add('pseudocode');
//                         break;
//                     case 'Option1':
//                     case 'Option2':
//                     case 'Option3':
//                     case 'Option4':
//                         propertyItem.classList.add('option');
//                         break;
//                     default:
//                         propertyItem.classList.add('generic-property');
//                 }
                
//                 questionItem.appendChild(propertyItem);
//             }
//         }

//         questionsList.appendChild(questionItem);
//     });
//     setDiv.appendChild(questionsList);

//     container.appendChild(setDiv);
// }


