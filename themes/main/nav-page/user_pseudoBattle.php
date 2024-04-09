<div class="container pseudoBattle">
    <label  class="pseudoBattle-button"><button id="registerButton" >Registeration</button>
    <p id="registeredMessage" style="display: none;">You are registered succesfully!</p>
</label>

</div>
<script>
    document.getElementById('registerButton').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
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
                } else {
                    // Handle errors if the request fails
                }
            }
        };
        // Get the current date and format it as needed
        var currentDate = new Date().toISOString().slice(0, 10);
        var data = 'date=' + currentDate;
        xhr.send(data);
        console.log(data);
    });
</script>
