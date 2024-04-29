$(document).ready(function(){
    function registerUser(eventName) {
        var registrationDate = new Date().toISOString().slice(0, 10); 
       

        if (eventName.trim() !== '' && registrationDate.trim() !== '') {
        $.ajax({
            url: 'core/main/Event_user.php', 
            type: 'POST',
            data: { EventName: eventName, RegistrationDate: registrationDate }, 
            success: function(response){
                console.log(response); 
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
        url: 'core/main/fetch_event-navbar.php', 
        type: 'GET',
        success: function(response){
            var data = JSON.parse(response);
            data.forEach(function(item, index){
                var eventName = item.EventName;

                var registrationButton = `<button class="btn btn-primary register-btn">Register</button>`;
                
                index += 1;

                $('#dataTable tbody').append(`
                    <tr>
                        <td>${index}</td>
                        <td>${eventName}</td>
                        <td>${registrationButton}</td>
                    </tr>
                `);
            });

            $(document).on('click', '.register-btn', function(){
                var eventName = $(this).closest('tr').find('td:nth-child(2)').text().trim();
                registerUser(eventName); 
            });
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText);
        }
    });
});
