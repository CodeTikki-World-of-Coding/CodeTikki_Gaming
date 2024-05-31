<div class="container-fluid quiz_events">
  <div class="row">
    <div class="col-md-3 col-12 sidebar_event">
        <nav class="  sidebar" >
        <div class="position-sticky pt-5 rounded border-dark ">
            <ul>
              <li class="nav-item ">
                  <button id="backButton"onclick="SameTab()"><img src="themes/images/Group 48095613.svg" alt=""></button>
               </li> <!--onchange="window.location.href=""  -->
            </ul>
</div>
          <div class="position-sticky pt-3 mt-5  rounded border-dark section">
            <ul>
              <li class="nav-item mb-5">   
                <label >Choose select Option</label>       
                  <select id="eventSelector" class="form-select" onchange="loadContent(this.value)">
                    <option value="">Select</option>
                    <option value="themes/main/cpanel/quizMaster/Events/algorithm_arena.php">Algorithm Arena</option>
                    <option value="themes/main/cpanel/quizMaster/Events/code_logic.php">Code Logic ShowDown</option>
                    <option value="themes/main/cpanel/quizMaster/Events/codeCraft_quiz.php">CodeCraft Quiz Series</option>
                    <option value="themes/main/cpanel/quizMaster/Events/byte_battle-royale.php">Byte Battle Royale</option>
                    <option value="themes/main/cpanel/quizMaster/Events/brainy_legends-league.php">Brainy Legends League</option>
                  </select>            
            </ul>
          </div>
          <div class="position-sticky pt-5 mt-5 rounded border-dark section">
            <ul>
              <li class="nav-item mt-5">
                  <a class="nav-link creat-quiz menu active d-flex justify-content-between align-items-center" aria-current="page" href="">
                    Create Quiz
                  </a>
              </li>
            </ul>
</div>
        </nav>
      </div>
    <div class="col-md-9 col-12 mainContentEvent " id="mainContentEvent">
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    

    function SameTab() {
      $('.quizMaster').show();
      $('.quiz_events').hide();


        }
 
  function loadContent(url) {
    if (url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
              $('.mainContentEvent').html(response).show();
                console.log("Content loaded successfully!");
            },
            error: function(xhr, status, error) {
                console.log("Error loading content:", error);
            }
        });
    } else {
        $('#mainContentEvent').empty();
    }
  }

</script>

<!-- Default content goes here -->
      <!-- <div class="row">
        <div class="col-lg-8 col-md-12 left">
          <div class="row">
            <div class="col-lg-11 col-12 first">
              <div class="row">
                <div class="col-md-6 col-12 first-left_side">
                  <h3>WELCOME</h3>
                  <p class="name">khushboo songara</p>
                  <p class="location">Mumbai, Pune</p>
                </div>
                <div class="col-md-6 col-12 images"></div>
              </div>
              <div class="row">
                <div class="col-6 quiz_variation">Quiz Variation</div>
                <div class="col-6 user_growth">User Growth</div>
              </div>
            </div>
            <div class="col-lg-11 col-12 second">
              <div class="row">
                <div class="col-md-5 col-12 first"></div>
                <div class="col-md-5 col-12 second"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 right">
          <div class="row">
            <div class="col-lg-10 col-12 first">
              <div class="row">
                <div class="col-6 task">Task</div>
                <div class="col-6 images"></div>
              </div>
              <div class="row">
                <p>This line should contain</p><br>
                <p>Programming</p><br>
                <p>Programming</p><br>
                <button class="view-more_btn">View More</button>
              </div>
            </div>
            <div class="col-lg-10 col-12 second">
              <div class="row">
                <div class="col-md-6 first-activ-user">
                  <h3>Active User</h3>
                  <span class="active_user"></span>
                </div>
                <div class="col-md-6 second-activ-user"></div>
              </div>
            </div>
            <div class="col-lg-10 col-12 third">
              <p>Total monthly Active user</p>
              <span class="total-user"></span>
            </div>
          </div>
        </div>
      </div> -->