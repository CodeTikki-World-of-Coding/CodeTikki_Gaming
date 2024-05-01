<div class="container mt-5">
    <h2>Question Bank</h2>
    <div class="row mb-3">
      <div class="col-md-3">
        <label for="min-level">Minimum Level:</label>
        <input type="number" id="min-level" class="form-control" min="100" max="900" step="100">
      </div>
      <div class="col-md-3">
        <label for="max-level">Maximum Level:</label>
        <input type="number" id="max-level" class="form-control" min="100" max="900" step="100">
      </div>
      <div class="col-md-3">
        <label for="creator">Creator:</label>
        <select id="creator" class="form-control">
          <option value="">All</option>
          <!-- Populate with user data dynamically -->
        </select>
      </div>
      <div class="col-md-3">
        <label for="sort-by">Sort By:</label>
        <select id="sort-by" class="form-control">
          <option value="asc">Level (Ascending)</option>
          <option value="desc">Level (Descending)</option>
        </select>
      </div>
    </div>
    <!-- Table -->
    <table id="question-table" class="table table-striped">
      <thead>
        <tr>
          <th>Question ID</th>
          <th>Question Title</th>
          <th>Option 1</th>
          <th>Option 2</th>
          <th>Option 3</th>
          <th>Option 4</th>
          <th>Correct Option</th>
          <th>Level</th>
          <th>Attempts</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <script>
  
function fetchQuestions() {
    var minLevel = parseInt($('#min-level').val()) || 0;
    var maxLevel = parseInt($('#max-level').val()) || 1000;
    var creator = $('#creator').val();
    var sortBy = $('#sort-by').val();

    fetch('core/main/updateAdminQuestion.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        minLevel: minLevel,
        maxLevel: maxLevel,
        creator: creator,
        sortBy: sortBy
      })
    })
    .then(response => response.json())
    .then(data => {
      $('#question-table tbody').empty();
      $('#creator').empty();
      var usernames = new Set();

      $('#creator').append('<option value="">All</option>');

      data.forEach(question => {
        if (question.Username && !usernames.has(question.Username)) {
                $('#creator').append(`<option value="${question.Username}">${question.Username}</option>`);
                usernames.add(question.Username);
            }


        $('#question-table tbody').append(`
          <tr>
            <td>${question.QuestionID}</td>
            <td>${question.QuestionTitle}</td>
            <td>${question.Option1}</td>
            <td>${question.Option2}</td>
            <td>${question.Option3}</td>
            <td>${question.Option4}</td>
            <td>${question.CorrectAnswer}</td>
            <td>${question.Level}</td>
            <td>${question.attempts}</td>
          </tr>
        `);
        

      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  $('#min-level, #max-level, #creator, #sort-by').change(function() {
    fetchQuestions();
  });

  fetchQuestions();

</script>