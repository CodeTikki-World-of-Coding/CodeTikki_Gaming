
<div class="container-fluid quiz_events">
  <div class="row">
    <div class="col-md-3 col-12 sidebar">
        <label >Choose your Events</label>
        <!-- <select class="form-control" id="selectOption">
          <option  >Select Events</option>
          <option value="algorithm" >Algorithm Arena</option>
          <option value="code_logic" >Code Logic ShowDown</option>
          <option value="codeCraft_quiz" >CodeCraft Quiz Series</option>
          <option value="byte_battle" >Byte Battle Royale</option>
          <option value="brainy_legends">Brainy Legends League</option>
        </select> -->
        <select id="mySelect" onchange="myFunction()">
  <option value="option1">Option 1</option>
  <option value="option2">Option 2</option>
  <option value="option3">Option 3</option>
</select>
<p id="demo"></p>


    </div>
    <div class="col-md-9 col-12 main" id="mainContent">
      <!-- Default content goes here -->
      <div class="row">
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
      </div>
    </div>
    <div class="col-md-9 col-12 main-content" id="main-Content" style="display: none;"></div>
  </div>
</div>

<script>
  function myFunction() {
    var x = document.getElementById("mySelect");
    var i = x.selectedIndex;
    document.getElementById("demo").innerHTML = x.options[i].text;
  }

  </script>
