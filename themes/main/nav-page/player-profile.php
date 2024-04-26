
<div class="container-fluid profile">
<div class="row grow w-100 ">
    
    <div class="col-4 bg-dark border border-light  py-3 sidebar sidebar-profile_fetch">
        <label class="profile-img"><img src="" alt=""> 
        <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal">Edit <img src="themes/images/Group.svg" alt=""></button>
</label>
        <label>Name:
        <input type="text" class="fetchName" name="name"  readonly>

        </label>
        <label >UserName:
        <input type="text" class="fetchUserName" name="username"     readonly>

        </label>
    
        <label >Email:
            <input type="email" class="fetchEmail" name="email"   readonly>
        </label>
        <label >Gender:
        <input type="text" class="fetchGender" name="Gender" readonly>

        </label>
        <label >Country:
        <input type="text" class="fetchCountry" name="Country" readonly>

        </label>
        <label >Profession:
        Working<input type="checkbox" class="form-check-input" id="workingCheckbox" name="working">
        Student<input type="checkbox" class="form-check-input" id="studentCheckbox" name="student">
        </label>
        <label >Institute:
        <input type="text" class="fetchInstitute" name="institute" readonly>

        </label>
        <label >Rating:
        <input type="text" class="fetchRating" name="rating" readonly>

        </label>
    
</div>
    <div class="main col-8 bg-dark border border-light main-page   py-3">
        <div class="row">
            <div class="col-md-5 problem-section">
                <h4>Solved Problem</h4>
            </div>
            <div class="col-md-5 expierence-section " ">
                <div class="working-experience " >
                    <p id="workingExperienceTitle" >This is the working experience section.</p>
                </div>
                <div class="student-experience " >
                    <p id="studentExperienceTitle" >This is the student experience section.</p>
                </div>
            </div>
            </div>

            <div class="col-md-10 submission-section">
            <h4>Submission</h4>

            </div>
        </div>
</div>
<div class="row w-100 ">
    <div class="col-4 py-3 bg-dark border border-light ml-2 left_profile_footer"><h5>Rating Badges</h5>    </div>

    <div class="col-7 py-3 bg-dark border border-light ml-2 right_profile_footer">
       <h5>Activity Map</h5>
</div>
</div>
<div class="modal fade editModalProfile" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-body row">
                <div class="col-md-6">
                   <label>Name:
                        <input type="text" class="insertName form-control" name="name"   >
                    </label>
                </div>
                <div class="col-md-6">
                    <label>Phonenumber:
                        <input type="number" class="insertNumber form-control" name="number"   >
                    </label> 
                </div>
                <div class="col-md-12">
                    <label>Address:
                        <input type="text" class="insertAddress form-control" name="address"  disabled >
                    </label> 
                </div>
                <div class="col-md-4">
                    <label>City:
                        <input type="text" class="insertCity form-control" name="city"  disabled >
                    </label>
                </div>
                <div class="col-md-4"> 
                    <label>State:
                        <input type="text" class="insertState form-control" name="state" disabled  >
                    </label> 
                </div>
                <div class="col-md-4">
                    <label>Zipcode:
                        <input type="text" class="insertZipcode form-control" name="zipcode"  disabled >
                    </label>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <label>LinkdIn:
                                <input type="text" class="insertLinkdin form-control" name="linkdin" disabled  >
                            </label>
                        </div>
                        <div class="col">
                            <label>Facebook:
                                <input type="text" class="insertFacebook form-control" name="facebook" disabled  >
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>twitter:
                                <input type="text" class="insertTwitter form-control" name="twitter"  disabled >
                            </label>
                        </div>
                        <div class="col">
                            <label>Tikkiality:
                                <input type="text" class="insertTikkiality form-control" name="tikkiality"  disabled >
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Gender" id="male" value="Male">
                                <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Gender" id="female" value="Female">
                                <label class="form-check-label" for="female">Female</label>
                        </div>
                </div>
                <div class="col-md-4">
                    <label>Profession</label>
                        <select class="form-control fetchCountry" name="Country">
                            <option >select profession</option>
                        </select>
                </div>
                <div class="col-md-4">
                    <label>Country</label>
                        <select class="form-control fetchCountry" name="Country">
                            <option value="USA">Select Country</option>
                            <option value="USA">United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="Canada">Canada</option>
                            <option value="Australia">Australia</option>
                            <option value="India">India</option>
                        </select>
                </div>
                <div class="col-md-4">
                    <label>Institute</label>
                        <select class="form-control fetchInstitute" name="Institute">
                            <option >xyz</option>                           
                        </select>
                </div>
                <div class="col-md-6">  
                    <label><input type="checkbox" class="form-check-input" name="checkbox1">Receive marketing notification</label>                                       
                </div>
                <div class="col-md-6">
                    <label><input type="checkbox" class="form-check-input" name="checkbox1">Receive event notification</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveChanges">Save</button>
            </div>
        </div>
    </div>
</div> 


<div class="player-profile hidden" id="player-profile-content">
    <div class="player-profile_inner">
    <div class="profile-pic" id="imageContainer"></div>

    
        <div class="profile-info">
        <div class="uploadProfile">
        <form id="uploadForm" enctype="multipart/form-data" action="core/main/user.php" method="POST">
        <input type="file" id="uploadInput" name="fileToUpload" accept="image/jpeg, image/png" />
        <button type="button" id="uploadButton">Upload</button>
    </form>
</div>
            <div class="profile-logo-box"> Player Profile </div>
            <div class="player-name"></div>
            <div class="countary-name">India</div>
            <div class="divider"></div>
            <div class="match-data">
                <div class="matches-count">
                    <span>MATCHES</span>
                    <span class="match-number"></span>
                </div>
                <div class="run-count">
                    <span>RUNS</span>
                    <span class="run-number"></span>
                </div>
                <div class="six-count">
                    <span>SIX</span>
                    <span class="six-number"></span>
                </div>
                <div class="four-count">
                    <span>RUNS</span>
                    <span class="run-number"></span>
                </div>
                <div class="average-score">
                    <span>AVERAGE</span>
                    <span class="average_score-number"></span>
                </div>
                <div class="full-century">
                    <span>FULL-CENTURY</span>
                    <span class="full_century-number"></span>
                </div>
                <div class="troffy-won">
                    <span>TROFFY-WON</span>
                    <span class="troffy_won-number"></span>
                </div>            
            </div>
        </div>
    </div>
 </div>

<script src="themes/main/nav-page/js/player-profile_script.js"></script>
<script>
        $(document).ready(function() {
            $.getJSON('core/main/fetch-profile_data.php', function(data) {

                $('.fetchName').val(data.name);
                $('.fetchUserName').val(data.username);
                $('.fetchEmail').val(data.email);
                $('.fetchGender').val(data.Gender);
                $('.fetchCountry').val(data.Country);
                $('.fetchProfession').val(data.profession);
                $('.fetchInstitute').val(data.institute);
                $('.fetchRating').val(data.rating);
            });
            $('.edit-btn').on('click', function() {
        $('#editModal').modal('show');
    });
    //         $('.closeBtn').on('click', function() {
    //     $('#editModal').modal('hide');
    // });

    $('.saveChanges').on('click', function() {
        var formData = {
            name: $('.insertName').val() || null, // Set to null if empty
            phoneNumber: $('.insertNumber').val() || null, // Set to null if empty
            gender: $('input[name="Gender"]:checked').val() || null, // Set to null if no gender selected
            country: $('.fetchCountry').find('option:selected').val() || null // Get the selected country value from the dropdown
        };


        $.ajax({
            type: 'POST',
            url: 'core/main/insert_profiledata.php',
            data: formData,
            success: function(response) {

               
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error saving data:', error);
            }
        });
    });
    $('#workingExperienceTitle').hide();
                $('#workingExperience').hide();

    $('input[name="working"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('#workingExperienceTitle').show();
                $('#workingExperience').show();
                $('#studentExperienceTitle').hide();
                $('#studentExperience').hide();
        }});
        $('#studentExperienceTitle').hide();
                $('#studentExperience').hide();
        // Function to show or hide the Student Experience section
        $('input[name="student"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('#studentExperienceTitle').show();
                $('#studentExperience').show();
                $('#workingExperienceTitle').hide();
                $('#workingExperience').hide();

            }
        });



        });
    </script>
