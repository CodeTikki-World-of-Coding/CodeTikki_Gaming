<div class="container-fluid quiz-container" >
<form class="row CreatQuizSection" id="rowDaily">
        <div class="col-md-8"><img src="themes/images/cgj 1.png" alt="quiz" class="quiz-image"></div>
        <div class="col-md-5"><label class="daily"><button  onclick="showSecondForm(event)">Daily</button></label></div>
        <div class="col-md-5"><label class="weekly" ><button  >Weekly</button> </label></div>
        <div class="col-md-5"><label class="monthly" ><button >Monthly</button> </label></div>
        <div class="col-md-5"><label class="custom"><button >Custom</button> </label></div>
    </form>
    <form  class="showSecondFormBtn" id="showSecondFormBtn" style="display:none">
    <div class="col-md-12"><label class="automaticBtn" ><button onclick="showAutomatic(event)">AUTOMATIC</button></label></div>
    <div class="col-md-12"><label class="manualBtn"><button >MANUAL</button></label></div>


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
