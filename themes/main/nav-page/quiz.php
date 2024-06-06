<div class="container-fluid quizPage">
    <div class="row">
        <div class="col-md-12 OngoingQuiz pl-5"><h2>Ongoing Quiz </h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Code</th>
                            <th class="bg-primary text-white">Name</th>
                            <th class="bg-primary text-white">Start</th>
                            <th class="bg-primary text-white">Duration</th>
                            <th class="bg-primary text-white">Ends in</th>
                        </tr>
                    </thead>
                    <tbody id="OngoingQuiz"></tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 UpcomingQuiz"><h2>Upcoming Quiz</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Code</th>
                            <th class="bg-primary text-white">Name</th>
                            <th class="bg-primary text-white">Start</th>
                            <th class="bg-primary text-white">Duration</th>
                            <th class="bg-primary text-white">Ends in</th>
                        </tr>
                    </thead>
                    <tbody id="UpcomingQuiz"></tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 PastQuiz"><h2>Past Quiz</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Code</th>
                            <th class="bg-primary text-white">Name</th>
                            <th class="bg-primary text-white">Start</th>
                            <th class="bg-primary text-white">Duration</th>
                            <th class="bg-primary text-white">Ends in</th>
                        </tr>
                    </thead>
                    <tbody id="PastQuiz"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $.ajax({
        url: 'core/main/fetch_quiz.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var now = new Date();
            var tomorrow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1);

            data.forEach(function(quiz) {
                var startDate = new Date(quiz.start_date);
                var endDate = new Date(quiz.ends_date);

                var row = '<tr>' +
                            '<td>' + quiz.sub_quiz_id + '</td>' +
                            '<td>' + 'CT-Daily-' + quiz.sub_quiz_id + '</td>' +
                            '<td>' + quiz.start_date.split(' ')[0] + '</td>' +
                            '<td>1 Minute</td>' + // Hardcoded duration
                            '<td>' + quiz.end_date.split(' ')[0] + '</td>' +
                          '</tr>';

                if (startDate.toDateString() === tomorrow.toDateString()) {
                    $('#UpcomingQuiz').append(row);
                } else if (startDate <= now && endDate >= now) {
                    $('#OngoingQuiz').append(row);
                } else if (endDate < now) {
                    $('#PastQuiz').append(row);
                }
            });
        },
        error: function(error) {
            console.log('Error fetching quiz data:', error);
        }
    });
});
</script>
