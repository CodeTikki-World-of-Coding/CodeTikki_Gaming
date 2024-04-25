
<div class="container-fluid profile">
<div class="row grow w-100 ">
    
    <div class="col-4 bg-dark border border-light  py-3 sidebar sidebar-profile_fetch">
        <label class="profile-img"><img src="" alt=""></label>
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
        <input type="text" class="fetchGender" name="gender"  readonly>

        </label>
        <label >Country:
        <input type="text" class="fetchCountry" name="country"   readonly>

        </label>
        <label >Profession:
        <input type="text" class="fetchProfession" name="profession"  readonly>

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
            <div class="col-md-5 expierence-section">
            <h4>Work Expierence</h4>

            </div>
            </div>

            <div class="col-md-10 submission-section">
            <h4>Submission</h4>

            </div>
        </div>
</div>
<div class="row w-100 ">
    <div class="col-7 py-3 bg-dark border border-light ml-2 left_profile_footer">    </div>

    <div class="col-4 py-3 bg-dark border border-light ml-2 right_profile_footer">
       
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
            // Fetch data from PHP page
            $.getJSON('core/main/fetch-profile_data.php', function(data) {
                // Populate input fields with fetched data
                $('.fetchName').val(data.name);
                $('.fetchUserName').val(data.username);
                $('.fetchEmail').val(data.email);
                $('.fetchGender').val(data.gender);
                $('.fetchCountary').val(data.country);
                $('.fetchProfession').val(data.profession);
                $('.fetchInstitute').val(data.institute);
                $('.fetchRating').val(data.rating);
            });
        });
    </script>
