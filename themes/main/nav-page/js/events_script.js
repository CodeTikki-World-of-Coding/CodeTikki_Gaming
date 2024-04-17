$(document).ready(function(){
    // Function to handle registration button click
    function registerUser(eventName) {
        var registrationDate = new Date().toISOString().slice(0, 10); // Get current date in YYYY-MM-DD format
       

        // Perform AJAX request to register user
        if (eventName.trim() !== '' && registrationDate.trim() !== '') {
        // Perform AJAX request to register user
        $.ajax({
            url: 'core/main/Event_user.php', // URL to handle user registration
            type: 'POST',
            data: { EventName: eventName, RegistrationDate: registrationDate }, // Send both EventName and RegistrationDate
            success: function(response){
                console.log(response); // Log the response from the server
                // You can update the UI or show a message based on the response
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });
    } else {
        console.log('Error: EventName or RegistrationDate is empty.');
    }
}
    $.ajax({
        url: 'core/main/fetch_event-navbar.php', // Assuming this URL fetches event data
        type: 'GET',
        success: function(response){
            var data = JSON.parse(response);
            data.forEach(function(item, index){
                // Extract EventName from the object
                var eventName = item.EventName;

                // Create a button for registration with click event
                var registrationButton = `<button class="btn btn-primary register-btn">Register</button>`;
                
                // Increment index by 1 to start ID from 1
                index += 1;

                // Append data to the table
                $('#dataTable tbody').append(`
                    <tr>
                        <td>${index}</td>
                        <td>${eventName}</td>
                        <td>${registrationButton}</td>
                    </tr>
                `);
            });

            // Add click event listener to registration buttons outside the loop
            $(document).on('click', '.register-btn', function(){
                var eventName = $(this).closest('tr').find('td:nth-child(2)').text().trim();
                registerUser(eventName); // Pass eventName to registerUser function
            });
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText);
        }
    });
});
