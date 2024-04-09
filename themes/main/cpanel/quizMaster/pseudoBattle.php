<div class="container pseudoBattleQuiz">
<h1>PseudoBattle</h1>
    <form  id="teamForm" class="pseudoForm">
        <button class="pseudo-btn" type="submit">Event version</button>
    </form>

    <div class="registeredTeam">
        
    </div>
</div>
<script>
            $(document).ready(function() {
            $('#teamForm').submit(function(event) {
                event.preventDefault(); // Prevent form submission

                var eventVersion = $('#event_version').val(); // Get selected event version

                // AJAX request to fetch data from PHP
                $.ajax({
                    url: 'core/main/fetch_registered_teams.php',
                    type: 'POST',
                    data: { event_version: eventVersion },
                    success: function(response) {
                        $('.registeredTeam').html(response); // Display the fetched data
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log any errors
                    }
                });
            });
        });

</script>