<div class="container quiz-container" >
<form class="row" id="rowDaily">
        <div class="col-md-12"><img src="themes/images/icon-quiz-removebg-preview 1.png" alt="quiz" class="quiz-image"></div>
        <div class="col-md-12"><h3 class="welcome">WELCOME</h3></div>
        <div class="col-md-12"><label><button onclick="showSecondForm(event)">Daily</button></label></div>
        <div class="col-md-12"><label  >Weekly</label></div>
        <div class="col-md-12"><label >Monthly</label></div>
        <div class="col-md-12"><label >Custom</label></div>
    </form>
    <form id="showSecondFormBtn" style="display:none">
    <div class="col-md-12"><label><button onclick="showAutomatic(event)">Automatic</button></label></div>
    <div class="col-md-12"><label><button >manual</button></label></div>


</form>
<!-- <form id="thirdForm" style="display:none">
    <div class="quizQuestions" id="quizQuestions"></div>

</form> -->
<!-- Modal structure -->
<div class="modal" id="quizModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quiz Questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="quizForm">
                    <!-- Form inputs for quiz questions go here -->
                    <div class="form-group">
                        <h3>Quiz Set</h3>
                        <label for="questionInput">Quiz Set Name </label>

                    </div>
                    <!-- Additional form inputs for options, etc. -->
                    <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
    <div id="quizSet"></div>
</div>
<script src="themes/main/cpanel/quizMaster/create_quiz/js/creat-quiz_script.js"></script>
