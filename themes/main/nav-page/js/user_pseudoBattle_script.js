document.getElementById('registerButton').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    var selectedEvent = document.getElementById('eventDropdown').value;
    var currentDate = new Date().toISOString().slice(0, 10);

    xhr.open('POST', 'core/main/Event_user.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response === 'success') {
                    document.getElementById('registerButton').style.display = 'none';
                    document.getElementById('registeredMessage').style.display = 'block';
                } else {
                }
            } 
        }
    };
    
    if (selectedEvent.trim() !== '' && currentDate.trim() !== '') {
        var data = 'EventName=' + selectedEvent + '&RegistrationDate=' + currentDate;
        xhr.send(data);
    } else {
        console.log('Error: EventName or RegistrationDate is empty.');
    }
});

$(document).ready(function() {
    function fetchEventName() {
        $.ajax({
            url: 'core/main/fetch_event-name.php',
            method: 'GET',
            success: function(response) {
                if (response.trim() !== '' && response.includes('<option')) {
                    $('#eventDropdown').append(response); 
                } else {
                    console.error('Invalid response format or empty response.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching event names:', error);
            }
        });
    }

    fetchEventName();
});
