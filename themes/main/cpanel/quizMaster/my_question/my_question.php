<div class="container myQuestion-container">
    <div class="heading-row mt-3 mb-3 row">
        <div class="col-md-6 heading">
            <span><img src="themes/images/back.svg" alt=""></span>
        <h1>MY QUESTIONS</h1>
        </div>
        <div class="col-md-4 input-group search-box">
             <input type="text" class="form-control " placeholder="Search for questions..." aria-label="Search for questions..." aria-describedby="searchButton">
             <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="searchButton"><img src="themes/images/search-icon.svg" alt=""></button>
            </div>
        </div>
        <div class="col-md-2"><span><img src="themes/images/notification.svg" alt=""></span>
        </div>
    </div>
    <div class="row criteria">
        <div class="col total-question">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="row total-question-count">7
                    </div>
                    <div class="row">Total Questions</div>
                </div>
            </div>
        </div>
        <div class="col accepted">
            <div class="row">
                <div class="col-md-4"><img src="themes/images/Check.svg" alt=""></div>
                <div class="col-md-8">
                    <div class="row accepted-count">7
                    </div>
                    <div class="row accepted-text">Accepted</div>
                </div>
            </div>  
        </div>
        <div class="col decline">
            <div class="row">
                <div class="col-md-4"><img src="themes/images/delete.svg" alt=""></div>
                <div class="col-md-8">
                    <div class="row decline-count">7
                    </div>
                    <div class="row decline-text">Decline</div>
                </div>
            </div>
        </div>
        <div class="col pending">
            <div class="row">
                <div class="col-md-4"><img src="themes/images/timer 1.jpg" alt=""></div>
                <div class="col-md-8">
                    <div class="row pending-count">7
                    </div>
                    <div class="row pending-text">Pending</div>
                </div>
            </div>
        </div>
    </div>
    <h3>SUBMISSIONS</h3>
    <table id="questionList" class="table mt-4 questionList">
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
                    <div class="form-group">
                        <label for="correctAnswere">Correct Answere</label>
                        <input type="text" class="form-control" id="correctAnswere" name="correctAnswere" required>
                    </div>
                    <button type="button" id="saveChangesBtn" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="themes/main/cpanel/quizMaster/my_question/js/my_question-script.js"></script>