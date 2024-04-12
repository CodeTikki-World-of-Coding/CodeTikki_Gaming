<div class="container pseudoBattle">
<label  class="pseudoBattle-button">
<div class="selectEvent">
        <select id="eventDropdown" >
            <option value="">Select Event</option>
        </select>
    </div>
    <button id="registerButton" >Registeration</button>
    <p id="registeredMessage" style="display: none;">You are registered succesfully!</p>
</label>

</div>
<script>
document.getElementById('registerButton').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    var selectedEvent = document.getElementById('eventDropdown').value;
    var currentDate = new Date().toISOString().slice(0, 10);

    xhr.open('POST', 'core/main/Event_user.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle the response from the server
                var response = xhr.responseText;
                if (response === 'success') {
                    // Hide the register button and show the registered message
                    document.getElementById('registerButton').style.display = 'none';
                    document.getElementById('registeredMessage').style.display = 'block';
                } else {
                    // Handle other responses if needed
                }
            } 
        }
    };
    
    var data = 'EventName=' + selectedEvent + '&date=' + currentDate;
    xhr.send(data);
});

 $(document).ready(function () {

    function fetchEventName() {
        $.ajax({
            url: 'core/main/fetch_event-name.php',
            method: 'GET',
            success: function (response) {
                // Check if the response is not empty and is in the correct format
                if (response.trim() !== '' && response.includes('<option')) {
                    $('#eventDropdown').append(response); // Append the response HTML to the dropdown
                } else {
                    console.error('Invalid response format or empty response.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching event names:', error);
            }
        });
    }


        fetchEventName();
    });
</script>
