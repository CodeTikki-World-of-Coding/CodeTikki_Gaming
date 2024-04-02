<head>
    <style>
        .container{
            margin:0 auto;
            text-align:center;
            align-items:center;
        }
       .welcome{
        color:#FF4D00;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Horizontal offset, vertical offset, blur radius, color */
        font-weight:800;

       }
       label{
        width:484px;
        height: 100px;
        border-color:#FF4D00 !important;
        border:1px solid;
        border-radius:5px;
        margin:15px;
        /* padding-top:4%; */
        font-size:45px;
        font-weight:700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Horizontal offset, vertical offset, blur radius, color */
        color:#FF4D00;
        cursor: pointer;
            display: inline-block; /* Added display property */
            line-height: 100px; /* Centered text vertically */

       }
       #dailyContent {
            margin-top: 20px;
            display: none; /* Hide the daily content initially */
        }
    </style>
</head>

<div class="container">
<div class="row" id="rowWithDaily">
        <div class="col-md-12"><img src="../../../../CodeTikki_Gaming/themes/images/icon-quiz-removebg-preview 1.png" alt="quiz" class="quiz-image"></div>
        <div class="col-md-12"><h3 class="welcome">WELCOME</h3></div>
        <div class="col-md-12"><label onclick="toggleDailyContent()">Daily</label></div>
        <div class="col-md-12"><label >Weekly</label></div>
        <div class="col-md-12"><label >Monthly</label></div>
        <div class="col-md-12"><label >Custom</label></div>
    </div>
    <div id="dailyContent"></div>

</div>
<script>
            function toggleDailyContent() {
            const rowWithDaily = document.getElementById('rowWithDaily');
            const dailyContent = document.getElementById('dailyContent');

            if (rowWithDaily.style.display === 'none') {
                rowWithDaily.style.display = 'block';
                dailyContent.style.display = 'none';
            } else {
                rowWithDaily.style.display = 'none';
                dailyContent.style.display = 'block';
                // AJAX request to fetch and display daily content
                fetch('../../../../CodeTikki_Gaming/themes/main/cpanel/create-quiz/daily-quiz.php')
                    .then(response => response.text())
                    .then(data => {
                        dailyContent.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error fetching daily content:', error);
                    });
            }
        }
    </script>
