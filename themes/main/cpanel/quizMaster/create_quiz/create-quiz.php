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
<script src="themes/main/cpanel/quizMaster/create_quiz/js/creat-quiz_script.js"></script>
