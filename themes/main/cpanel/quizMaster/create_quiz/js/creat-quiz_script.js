
// function showSecondForm(event) {
//     event.preventDefault();
//     document.getElementById("showSecondFormBtn").style.display = "block";
//     document.getElementById("rowDaily").style.display = "none";
// }

// function showAutomatic(event) {
//     event.preventDefault();
//     document.getElementById("quizModal").style.display = "block";
//     document.getElementById("showSecondFormBtn").style.display = "none";
// }

// function closeModal() {
//     document.getElementById("quizModal").style.display = "none";
// }

// function fetchQuestionsAndGenerateQuiz(event) {
//     event.preventDefault(); // Prevent form submission

//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 try {
//                     var questions = JSON.parse(xhr.responseText);
//                     generateQuizSets(questions);
//                 } catch (error) {
//                     console.error('Error parsing JSON:', error);
//                 }
//             } else {
//                 console.error('Failed to fetch questions. Status code:', xhr.status);
//             }
//         }
//     };
//     xhr.open('GET', 'core/main/fetch_automatic-quiz.php', true);
//     xhr.send();
// }

// function shuffleArray(array) {
//     for (var i = array.length - 1; i > 0; i--) {
//         var j = Math.floor(Math.random() * (i + 1));
//         var temp = array[i];
//         array[i] = array[j];
//         array[j] = temp;
//     }
//     return array;
// }

// function generateQuizSets(questions) {
//     for (var i = 0; i < 5; i++) { // Generate 5 quiz sets
//         var quizSet = createQuizSet(questions, i); // Pass the index 'i' to createQuizSet
//         sendQuizSetToServer(quizSet);
//     }
// }

// function createQuizSet(questionsData) {
//     var quizData = {
//         num_questions: 10, // Number of questions per quiz set
//         questions: []
//     };
//     var filteredQuestions = questionsData.filter(function(question) {
//         return parseInt(question.Level) >= 0 && parseInt(question.Level) <= 200;
//     });
//     shuffleArray(filteredQuestions);

//     for (var i = 0; i < quizData.num_questions && i < filteredQuestions.length; i++) {
//         createQuizQuestion(filteredQuestions[i], quizData);
//     }


//     return quizData;
// }

// function createQuizQuestion(question, quizData) {
//     var quizQuestion = {
//         question_id: question.QuestionID,
//         question_title: question.QuestionTitle,
//         option1: question.Option1,
//         option2: question.Option2,
//         option3: question.Option3,
//         option4: question.Option4,
//         correct_answer: question.CorrectAnswer,
//         Level: question.Level
//     };
//     quizData.questions.push(quizQuestion);
// }

// function sendQuizSetToServer(quizSetData) {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 var quizSetInfo = JSON.parse(xhr.responseText); // Parse the response JSON
//                 displayQuizSet(quizSetInfo); // Call the function to display the quiz set with the parsed data
//             } else {
//                 console.error('Failed to send quiz set. Status code:', xhr.status);
//             }
//         }
//     };
//     xhr.open('POST', 'core/main/generate_quiz-automatic.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/json');
//     xhr.send(JSON.stringify(quizSetData));
// }

// function displayQuizSet(quizSetInfo) {
//     const container = document.getElementById('quizSet');
//     if (!container) {
//         console.error('Container element not found!');
//         return;
//     }

//     // Create a container for the quiz set
//     const setDiv = document.createElement('div');
//     setDiv.classList.add('questions');

//     // Display quiz set name
//     const setName = document.createElement('h2');
//     setName.textContent = `Quiz Set `; // Display "Quiz Set 1", "Quiz Set 2", etc.
//     setDiv.appendChild(setName);

//     // Display quiz set level
//     const setLevel = document.createElement('p');
//     setLevel.textContent = `Level: ${quizSetInfo.Level}`;
//     setDiv.appendChild(setLevel);

//     // Display quiz set questions
//     const questionsList = document.createElement('ul');
//     quizSetInfo.questions.forEach((question, questionIndex) => {
//         const questionItem = document.createElement('li');
        
//         // Display question number
//         const questionNumber = document.createElement('span');
//         questionNumber.textContent = `Question ${questionIndex + 1}:`;
//         questionItem.appendChild(questionNumber);

//         // Loop through question properties and display them with styling
//         for (const key in question) {
//             if (question.hasOwnProperty(key)) {
//                 const propertyItem = document.createElement('span');
//                 propertyItem.textContent = ` ${question[key]}`;
                
//                 // Add a class based on the key or data value
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
//                         // Add a generic class if no specific class is needed
//                         propertyItem.classList.add('generic-property');
//                 }
                
//                 questionItem.appendChild(propertyItem);
//             }
//         }

//         questionsList.appendChild(questionItem);
//     });
//     setDiv.appendChild(questionsList);

//     // Append the quiz set container to the main container
//     container.appendChild(setDiv);
// }

// // Event listener for form submission
// document.getElementById("quizForm").addEventListener("submit", function(event) {
//     event.preventDefault();
//     fetchQuestionsAndGenerateQuiz(event);
//     closeModal();
//     document.getElementById("quizSet").style.display = "block"; // Show the quiz set container
//     document.getElementById("showSecondFormBtn").style.display = "none";

// });

// // Event listeners for showing forms
// document.getElementById("showSecondFormBtn").addEventListener("click", showSecondForm);

function showSecondForm(event) {
    event.preventDefault();
    document.getElementById("showSecondFormBtn").style.display = "block";
    document.getElementById("rowDaily").style.display = "none";
}

function showAutomatic(event) {
    event.preventDefault();
    document.getElementById("quizModal").style.display = "block";
    document.getElementById("showSecondFormBtn").style.display = "none";
}

function closeModal() {
    document.getElementById("quizModal").style.display = "none";
}

function fetchQuestionsAndGenerateQuiz(event) {
    event.preventDefault(); // Prevent form submission

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                try {
                    var questions = JSON.parse(xhr.responseText);
                    generateQuizSets(questions);
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

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

function generateQuizSets(questions) {
    for (var i = 0; i < 5; i++) { // Generate 5 quiz sets
        var quizSet = createQuizSet(questions, i); // Pass the index 'i' to createQuizSet
        sendQuizSetToServer(quizSet);
    }
}

function createQuizSet(questionsData) {
    var quizData = {
        num_questions: 10, // Number of questions per quiz set
        questions: []
    };
    var filteredQuestions = questionsData.filter(function(question) {
        return parseInt(question.Level) >= 0 && parseInt(question.Level) <= 200;
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
                var quizSetInfo = JSON.parse(xhr.responseText); // Parse the response JSON
                displayQuizSet(quizSetInfo); // Call the function to display the quiz set with the parsed data
            } else {
                console.error('Failed to send quiz set. Status code:', xhr.status);
            }
        }
    };
    xhr.open('POST', 'core/main/generate_quiz-automatic.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(quizSetData));
}

function displayQuizSet(quizSetInfo) {
    const container = document.getElementById('quizSet');
    if (!container) {
        console.error('Container element not found!');
        return;
    }

    // Create a container for the quiz set
    const setDiv = document.createElement('div');
    setDiv.classList.add('questions');

    // Display quiz set name
    const setName = document.createElement('h2');
    
    setName.textContent = `Quiz Set `; // Display "Quiz Set 1", "Quiz Set 2", etc.
    setDiv.appendChild(setName);

    // Display quiz set level
    const setLevel = document.createElement('p');
    setLevel.textContent = `Level: ${quizSetInfo.Level}`;
    setDiv.appendChild(setLevel);

    // Display quiz set questions
    const questionsList = document.createElement('ul');
    quizSetInfo.questions.forEach((question, questionIndex) => {
        const questionItem = document.createElement('li');
        
        // Display question number
        const questionNumber = document.createElement('span');
        questionNumber.textContent = `Question ${questionIndex + 1}:`;
        questionItem.appendChild(questionNumber);

        // Loop through question properties and display them with styling
        for (const key in question) {
            if (question.hasOwnProperty(key)) {
                const propertyItem = document.createElement('span');
                propertyItem.textContent = ` ${question[key]}`;
                
                // Add a class based on the key or data value
                switch (key) {
                    case 'QuestionTitle':
                        propertyItem.classList.add('question-title');
                        break;
                    case 'Pseudocode':
                        propertyItem.classList.add('pseudocode');
                        break;
                    case 'Option1':
                    case 'Option2':
                    case 'Option3':
                    case 'Option4':
                        propertyItem.classList.add('option');
                        break;
                    default:
                        // Add a generic class if no specific class is needed
                        propertyItem.classList.add('generic-property');
                }
                
                questionItem.appendChild(propertyItem);
            }
        }

        questionsList.appendChild(questionItem);
    });
    setDiv.appendChild(questionsList);

    // Append the quiz set container to the main container
    container.appendChild(setDiv);
}

// Event listener for form submission
document.getElementById("quizForm").addEventListener("submit", function(event) {
    event.preventDefault();
    fetchQuestionsAndGenerateQuiz(event);
    closeModal();
    document.getElementById("quizSet").style.display = "block"; // Show the quiz set container
    document.getElementById("showSecondFormBtn").style.display = "none";

});

// Event listeners for showing forms
document.getElementById("showSecondFormBtn").addEventListener("click", showSecondForm);
