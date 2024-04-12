<div class="container" id="container">
    <button type="button" class="btn  btn-add mt-4" id="add">Add New Question</button>
</div>
<div class="form-container" style="display:none"  id="Form">
    <form method="post" action="core/main/question_bank.php"  id="questionForm" class="row g-3 border rounded question-form" >
        <div class="row g-3">
            <div class="col-md-6"><label >Level</label><input type="number" id="level" name="level" class="form-control" placeholder="Enter Level" required>
            </div>
            <div class="col-md-6"><label for="time">Time:</label><span id="currentTime"></span>
            </div>
            <div class="col-md-12">
                <label for="text" class="form-label "><span class="question-number ">1</span>Question:</label>
                    <textarea id="question-1" name="question" class="form-control" rows="2" required></textarea>
            </div>
            <div class="col-md-12 mb-4">
                <label for="text" class="form-label">Pseudo Code:</label>
                    <textarea id="question-2" name="pseudoCode" class="form-control" rows="3" required></textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Answere:</label>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" id="option1" name="option1" class="form-control" placeholder="Option 1" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="option2" name="option2" class="form-control" placeholder="Option 2" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="option3" name="option3" class="form-control" placeholder="Option 3" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="option4" name="option4" class="form-control" placeholder="Option 4" required>
                        </div>
                    </div>
            </div>
            <div class="col-md-12 mb-4">
                <label for="text" class="form-label">Correct Answere:</label>
                    <textarea id="question-3" name="correctAnswere" class="form-control" rows="2" required></textarea>
            </div>
            <div class="col-md-12">
                <label for="question-type" class="form-label">Question Type:</label>
                    <select id="select-type" name="selectType" class="form-select" required>
                        <option >Select Options:</option>
                        <option value="FCI">Find Correct Input - Identify the correct input values for a code snippet.</option>
                        <option value="FCO">Find Correct Output - Determine the correct output of a code snippet.</option>
                        <option value="FV">Find Variable Value - Determine the value of a specific variable.</option>
                        <option value="HV">Find the Variable with Highest Values - Identify variable with highest value.</option>
                        <option value="NLE">Number of Times Loop Will Execute - Calculate loop iteration count.</option>
                        <option value="TC">Time Complexity - Assess understanding of algorithm time complexity.</option>
                    </select>
            </div> 
        </div>   
    </form>
    <div class="col-12" id="clone-container">
    </div>
    <div class="col-12">
        <button type="button" class="btn add-question-btn btn-add mt-4">Add New Question</button>
        <button type="submit" id="submit" class="btn submit-btn btn-submit mt-4">Submit</button>
        <button type="button" class="btn view-preview-btn btn-view mt-4" style="display: none;">View Preview</button>
    </div>
</div>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="themes/main/cpanel/js/questionBank_script.js"></script>