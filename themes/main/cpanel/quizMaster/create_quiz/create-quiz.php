<div class="container-fluid quiz-container" >
    <form class="row CreatQuizSection" id="rowDaily">
        <div class="col-md-8"><img src="themes/images/cgj 1.png" alt="quiz" class="quiz-image"></div>
        <div class="col-md-5"><label class="daily"><button type="button"   onclick="showSecondForm(event)">Daily</button></label></div>
        <div class="col-md-5"><label class="weekly" ><button type="button"  onclick="showThirdForm(event)" >Weekly</button> </label></div>
        <div class="col-md-5"><label class="monthly" ><button type="button"  onclick="showFourthForm(event)">Monthly</button> </label></div>
        <div class="col-md-5"><label class="custom"><button >Custom</button> </label></div>
    </form>
    <form  class="showSecondFormBtn" id="showSecondFormBtn" style="display:none">
        <div class="col-md-12"><label class="automaticBtn" ><button type="button"  onclick="showAutomatic(event)">AUTOMATIC</button></label></div>
        <div class="col-md-12"><label class="manualBtn"><button >MANUAL</button></label></div>
    </form>
    <form  class="showThirdFormBtn" id="showThirdFormBtn" style="display:none">
        <div class="col-md-12"><label class="automaticBtn" ><button type="button"  onclick="showWeeklyAutomatic(event)">AUTOMATIC</button></label></div>
        <div class="col-md-12"><label class="manualBtn"><button >MANUAL</button></label></div>
    </form>
    <form  class="showFourthFormBtn" id="showFourthFormBtn" style="display:none">
        <div class="col-md-12"><label class="automaticBtn" ><button type="button"  onclick="showMonthlyAutomatic(event)">AUTOMATIC</button></label></div>
        <div class="col-md-12"><label class="manualBtn"><button >MANUAL</button></label></div>
    </form>


    <!-- Modal structure for daily button -->
    <div class="modal modalCreateQuiz" id="quizModalDaily" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title">Quiz Name</h5>
                    <button type="button" class="close-btn" onclick="closeModalBtn(event)" id="custom-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quizForm">
                        <div class="form-group">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-6 heading">Number of Question</div>
                                        <div class="col-6">: 10 Questions</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Number of Set</div>
                                        <div class="col-6">: 5</div>
                                    </div>                                
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Total Scores</div>
                                        <div class="col-6">: 50</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Time Limit</div>
                                        <div class="col-6">: 1 Hour 30 Minutes</div>
                                    </div>                               
                                </li>
                            </ul>
                        </div>
                        <button type="button" onclick="generateBtn(event)" class="btn btn-primary generateBtn">Generate</button>
                    </form>
                </div>            
            </div>
        </div>
    </div>
    <div class="modal modalCreateQuiz" id="quizModalDaily2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title">Quiz Name</h5>
                    <button type="button" class="close-btn" onclick="closeModalBtn2(event)" id="custom-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quizForm">
                        <div class="form-group">
                            <p id="quizIdGenerateSuccessfull">Your Quiz ID has been generated.</p>
                            <p>Please note down the Quiz ID.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4 QuizSetId" id="QuizSetId"></div>
                            <div class="col-md-4 text-primary copyHere"><img src="themes/images/ant-design_copy-filled.png" alt="">Copy here</div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary Done">Done</button>
                            </div>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </div>
    <!-- Daily button modal structur end-->

    <!-- Modal structure for Weekly button -->
    <div class="modal modalCreateQuiz" id="quizModalWeekly" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title">Quiz Name</h5>
                    <button type="button" class="close-btn" onclick="closeModalWeeklyBtn(event)" id="custom-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quizForm">
                        <div class="form-group">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-6 heading">Number of Question</div>
                                        <div class="col-6">: 20 Questions</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Number of Set</div>
                                        <div class="col-6">: 5</div>
                                    </div>                                
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Total Scores</div>
                                        <div class="col-6">: 100</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Time Limit</div>
                                        <div class="col-6">: 1 Hour 30 Minutes</div>
                                    </div>                               
                                </li>
                            </ul>
                        </div>
                        <button type="button" onclick="generateBtn(event)" class="btn btn-primary generateBtn">Generate</button>
                    </form>
                </div>            
            </div>
        </div>
    </div>
    <div class="modal modalCreateQuiz" id="quizModalWeekly2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title">Quiz Name</h5>
                    <button type="button" class="close-btn" onclick="closeModalWeeklyBtn2(event)" id="custom-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quizForm">
                        <div class="form-group">
                            <p id="quizIdGenerateSuccessfull">Your Quiz ID has been generated.</p>
                            <p>Please note down the Quiz ID.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4 QuizSetId" id="WeeklyQuizSetId"></div>
                            <div class="col-md-4 text-primary copyHere"><img src="themes/images/ant-design_copy-filled.png" alt="">Copy here</div>
                            <div class="col-md-4"><button type="submit" class="btn btn-primary Done">Done</button>
                            </div>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </div>
    <!-- Weekly button modal structur end-->

    <!-- Modal structure for monthly button -->
    <div class="modal modalCreateQuiz" id="quizModalMonthly" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title">Quiz Name</h5>
                    <button type="button" class="close-btn" onclick="closeModalMonthlyBtn(event)" id="custom-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quizForm">
                        <div class="form-group">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-6 heading">Number of Question</div>
                                        <div class="col-6">: 30 Questions</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Number of Set</div>
                                        <div class="col-6">: 5</div>
                                    </div>                                
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Total Scores</div>
                                        <div class="col-6">: 100</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-6 ">Time Limit</div>
                                        <div class="col-6">: 1 Hour 30 Minutes</div>
                                    </div>                               
                                </li>
                            </ul>
                        </div>
                        <button type="button" onclick="generateBtn(event)" class="btn btn-primary generateBtn">Generate</button>
                    </form>
                </div>            
            </div>
        </div>
    </div>
    <div class="modal modalCreateQuiz" id="quizModalMonthly2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title">Quiz Name</h5>
                    <button type="button" class="close-btn" onclick="closeModalMonthlyBtn2(event)" id="custom-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quizForm">
                        <div class="form-group">
                            <p id="quizIdGenerateSuccessfull">Your Quiz ID has been generated.</p>
                            <p>Please note down the Quiz ID.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4 QuizSetId" id="MonthlyQuizSetId"></div>
                            <div class="col-md-4 text-primary copyHere"><img src="themes/images/ant-design_copy-filled.png" alt="">Copy here</div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary Done">Done</button>
                            </div>
                        </div>
                    </form>
                </div>           
            </div>
        </div>
    </div>
    <!-- Monthly button modal structur end-->

</div>


<script src="themes/main/cpanel/quizMaster/create_quiz/js/creat-quiz-daily_script.js"></script>
<script src="themes/main/cpanel/quizMaster/create_quiz/js/creat-quiz-weekly_script.js"></script>
<script src="themes/main/cpanel/quizMaster/create_quiz/js/creat-quiz-monthly_script.js"></script>


<script>
    function closeModalBtn(event) {
    event.preventDefault();
    document.getElementById("quizModalDaily").style.display = "none";

}
    function closeModalBtn2(event) {
    event.preventDefault();
    document.getElementById("quizModalDaily2").style.display = "none";

}
    function closeModalWeeklyBtn(event) {
    event.preventDefault();
    document.getElementById("quizModalWeekly").style.display = "none";

}
    function closeModalWeeklyBtn2(event) {
    event.preventDefault();
    document.getElementById("quizModalWeekly2").style.display = "none";

}
    function closeModalMonthlyBtn(event) {
    event.preventDefault();
    document.getElementById("quizModalMonthly").style.display = "none";

}
    function closeModalMonthlyBtn2(event) {
    event.preventDefault();
    document.getElementById("quizModalMonthly2").style.display = "none";

}

</script>