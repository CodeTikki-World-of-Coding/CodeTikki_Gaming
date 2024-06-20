
<div class=" profile">
<div class="row  ">
    
    <div class="col-4   sidebar sidebar-profile_fetch">
        <div class="profile-img">
            <img src="" alt="" id="profileImage">
            <button class="profile-btn"  onclick="document.getElementById('profile-input').click();">
                <img class="camera-icon"  src="themes/images/photo-icon.svg" alt="">
            </button>
            <input type="file" id="profile-input" style="display: none;" accept="image/*" onchange="loadImage(event)">
        </div>
         
        <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal">Edit <img src="themes/images/Group.svg" alt=""></button>
        <label><span>Name:</span>
        <input type="text" class="fetchName" name="name"  readonly>

        </label>
        <label >UserName:
        <input type="text" class="fetchUserName" name="username"     readonly>

        </label>
    
        <label ><span>Email:</span>
            <input type="email" class="fetchEmail" name="email"   readonly>
        </label>
        <label ><span>Gender:</span>
        <input type="text" class="fetchGender" name="Gender" readonly>

        </label>
        <label > <span>Country:</span>
        <input type="text" class="fetchCountry" name="Country" readonly>

        </label>
        <label > Profession:
        Working<input type="checkbox" class="form-check-input" id="workingCheckbox" name="working">
        Student<input type="checkbox" class="form-check-input" id="studentCheckbox" name="student">
        </label>
        <label > <span>Institute:</span>
        <input type="text" class="fetchInstitute" name="institute" readonly>

        </label>
        <label > <span>Rating:</span>
        <input type="text" class="fetchRating" name="rating" readonly>

        </label>
    
        <label > <span>Devision:</span>
        <input type="text" class="fetchDevision" name="division" readonly>

        </label>
    
</div>
    <div class="main col-8  main-page   ">
        <div class="row">
            <div class="col-md-7 problem-section">
                <h6>Solved Problem</h6>
                <div class="row">
                    <div class="col-md-4"><img src="themes/images/Group 78.png" alt=""></div>
                    <div class="col-md-6 problem-img">
                        <ul>
                            <li>Easy
                                 <img src="themes/images/Rectangle 903.png" alt="">
                            </li>
                            <li>
                                Medium
                                 <img src="themes/images/Rectangle 904.png" alt="">
                            </li>
                            <li>
                                Hard
                                 <img src="themes/images/Rectangle 905.png" alt="">
                            </li>
                            <li>
                                Legendary
                                 <img src="themes/images/Rectangle 909.png" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 expierence-section " >
                <div class="working-experience "id="workingExperienceTitle" style="display: none;">
                    <h6>Working</h6> 
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="themes/images/Rectangle 1182.png" alt="">
                            </div>
                            <div class="col-md-8">
                                 <h6>Product Designer</h6>
                                 <p>Microsoft</p>
                                 <p>july 2022- Present .1 year 4 months</p>
                            </div>
                        </div>
                    </div>
                    <div class="graphic">
                    <div class="row">
                            <div class="col-md-3">
                                <img src="themes/images/Rectangle 1184.png" alt="">
                            </div>
                            <div class="col-md-8">
                                 <h6>Graphic Designer</h6>
                                 <p>Accenture</p>
                                 <p>july 2020- 1 year 6 months</p>
                            </div>
                        </div>
                    </div>
               </div>
                <div class="student-experience "id="studentExperienceTitle" style="display: none;">
                <h6>Student</h6> 
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="themes/images/Rectangle 1182.png" alt="">
                            </div>
                            <div class="col-md-8">
                                 <h6>Product Designer</h6>
                                 <p>Microsoft</p>
                                 <p>july 2022- Present .1 year 4 months</p>
                            </div>
                        </div>
                    </div>
                    <div class="graphic">
                    <div class="row">
                            <div class="col-md-3">
                                <img src="themes/images/Rectangle 1184.png" alt="">
                            </div>
                            <div class="col-md-8">
                                 <h6>Graphic Designer</h6>
                                 <p>Accenture</p>
                                 <p>july 2020- 1 year 6 months</p>
                            </div>
                        </div>
                    </div>                </div>
            </div>
            </div>

            <div class=" submission-section">
            <h6>Submission</h6>
            <div class="row">
                <div class="col-md-6"><img class="pie-img" src="themes/images/Group 79.png" alt=""></div>
                <div class="col-md-6">
                    <ul>
                        <li>
                           <img src="themes/images/Ellipse 247.png" alt=""> wrong_answers
                        </li>
                        <li>
                        <img src="themes/images/Ellipse 248.png" alt=""> solutions_accepted    
                        </li>
                        <li>
                        <img src="themes/images/Ellipse 249.png" alt=""> compile_error
                        </li>
                        <li>
                        <img src="themes/images/Ellipse 250.png" alt=""> time_limit_exceeded
                        </li>
                        <li>
                        <img src="themes/images/Ellipse 251.png" alt=""> runtime_error
                        </li>
                        <li>
                        <img src="themes/images/Ellipse 252.png" alt=""> solutions_partially accepted
                        </li>
                        <li>
                        <img src="themes/images/Ellipse 253.png" alt=""> compile_error
                        </li>
                    </ul>
                </div>
            </div>

            </div>
        </div>
</div>
<div class="row  ">
    <div class="col-3 py-3 bg-dark border border-light ml-2 left_profile_footer"><h6>Rating Badges</h6> 
        <div class="row">
            <div class="col-md-6"><img src="themes/images/Group 56.png" alt=""></div>
            <div class="col-md-6"><img src="themes/images/Group 57.png" alt=""></div>
        </div>
    </div>

    <div class="col-8 py-3 border border-light ml-2 right_profile_footer">
       <h6>Activity Map</h6>
       <div class="row">
        <div class="col"><img src="themes/images/Group 63.png" alt="">November</div>
        <div class="col"><img src="themes/images/Group 64.png" alt="">December</div>
        <div class="col"><img src="themes/images/Group 65.png" alt="">January</div>
        <div class="col"><img src="themes/images/Group 66.png" alt="">Febrary</div>
        <div class="col"><img src="themes/images/Group 67.png" alt="">March</div>
        <div class="col"><img src="themes/images/Group 68.png" alt="">April</div>
        <div class="col"><img src="themes/images/Group 69.png" alt="">May</div>
        <div class="col"><img src="themes/images/Group 70.png" alt="">June</div>
       </div>
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
                    <label>WhatsApp No:
                    <input type="tel" class="insertNumber form-control" name="number" pattern="[0-9]{10}"  >
                    <span class="text-danger error-msg_whatsapp"></span>
                    </label> 
                </div>
                <div class="col-md-12">
                    <label>Address:
                        <input type="text" class="insertAddress form-control" name="address"   >
                    </label> 
                </div>
                <div class="col-md-4">
                    <label>City:
                        <input type="text" class="insertCity form-control" name="city"   >
                    </label>
                </div>
                <div class="col-md-4"> 
                    <label>State:
                        <input type="text" class="insertState form-control" name="state"   >
                    </label> 
                </div>
                <div class="col-md-4">
                    <label>Pin code:
                    <input type="text" class="insertZipcode form-control" name="zipcode" pattern="[0-9]{6}" maxlength="6" id="zipcode">
                    </label>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <label>LinkdIn:
                                <input type="url" class="insertLinkdin form-control" name="linkdin"   >
                            </label>
                        </div>
                        <div class="col">
                            <label>Facebook:
                                <input type="url" class="insertFacebook form-control" name="facebook"   >
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>twitter:
                                <input type="url" class="insertTwitter form-control" name="twitter"  disabled >
                            </label>
                        </div>
                        <div class="col">
                            <label>Tikkiality:
                                <input type="url" class="insertTikkiality form-control" name="tikkiality"  disabled >
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
                    <label>Profession:
                        <select class="form-control" name="profession"  >
                            <option value="">Select Profession</option>
                            <option value="Developer">Developer</option>
                            <option value="Student">Student</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-4">
                    <label>Country</label>
                        <select class="form-control fetchCountry" name="Country">
                            <option >Select Country</option>
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
 <!-- //profile photo modal  -->

<div class="modal fade crop-modal" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content crop-modal-content">
            <div class="modal-header crop-modal-header">
                <h5 class="modal-title" id="previewModalLabel">Image Preview</h5>
            </div>
            <div class="modal-body text-center">
                <img id="previewImage" src="" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cropImage()">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Preview the cropped image before upload -->
<div id="preview-container" class="text-center mt-4">
    <img id="cropped-image-preview" class="img-fluid" src="">
    <button class="btn btn-success mt-2" onclick="uploadImage()">Upload</button>
</div>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="themes/main/nav-page/js/cropProfile.js"></script>
<script src="themes/main/nav-page/js/player-profile_script.js"></script>
<script src="themes/main/nav-page/js/insertAndFetch_data.js"></script>
