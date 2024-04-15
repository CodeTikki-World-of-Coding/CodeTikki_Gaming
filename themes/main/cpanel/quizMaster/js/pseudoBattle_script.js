$(document).ready(function () {
    $('.registeredTeam').hide();
    $('.showEventContainer').hide();
    $('#teamContainer-content').hide(); 

    // Show the registeredTeam container when the button is clicked
    $('#teamForm').submit(function (event) {
        event.preventDefault(); // Prevent form submission
        $('.registeredTeam').show();
        $('#teamForm').hide();
    });

    // Show teamContainer-content when teamContainer is clicked
    $('#teamContainer').click(function () {
        $('#teamContainer-content').show();
        $('#teamContainer').hide();
        $('.analyticsContainer').hide();
        $('.rewardContainer').hide();            
    });
    // Close teamContainer-content when close button is clicked
    $('#backBtn').click(function () {
    $('#teamContainer-content').hide();
    $('#teamContainer').show();
    $('.analyticsContainer').show();
        $('.rewardContainer').show();
    });

    // Event listener for the confirm button in the modal
    $('#confirmBtn').click(function () {
        const eventDate = $('#eventDate').val();
        if (eventDate) {
            const currentMonth = new Date().getMonth() + 1;
            const formattedMonth = currentMonth.toString().padStart(2, '0');
            $.ajax({
                url: 'core/main/Event.php',
                method: 'POST',
                data: { eventDate: eventDate, currentMonth: formattedMonth },
                success: function (response) {
                    alert(response);
                    $('#createEventModal').modal('hide');
                    fetchEventNames();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            alert('Please enter event date.');
        }
    });

    $('#closeModalBtn').click(function () {
        $('#createEventModal').modal('hide');
    });
    //fetch event-version name
    function fetchEventNames() {
        $.ajax({
            url: 'core/main/fetch_event-name.php',
            method: 'GET',
            success: function (response) {
                $('#teamDropdown').append(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetchEventNames();
     //dropdown menues 
    $('#teamDropdown').change(function () {
        const selectedValue = $(this).val();
        if (selectedValue === 'create') {
            $('#createEventModal').modal('show');
            $(this).val('');
        } else if (selectedValue !== '' && selectedValue !== 'create') {
            $.ajax({
                url: 'core/main/fetch_registered_teams.php',
                type: 'POST',
                data: { selectedEvent: selectedValue }, 
                success: function (response) {
                    console.log(response);
                    $('.registeredTeam').hide(); 
                    $('.showEventContainer').show().find('.teamList').html(response);


                },
                error: function (xhr, status, error) {
                    console.error('Error fetching event data:', error); 
                }
            });
        }
    });
    $('#teamDropdown').change(function () {
        const selectedValue = $(this).val();
        if (selectedValue === 'create') {
            $('#createEventModal').modal('show');
            $(this).val('');
        } else if (selectedValue !== '' && selectedValue !== 'create') {
            $.ajax({
                url: 'core/main/fetch_allTeamMember.php',
                type: 'POST',
                data: { selectedEvent: selectedValue }, 
                success: function (response) {
                    console.log(response);
                    $('.registeredTeam').hide(); 
                    $('.showEventContainer').show().find('.allTeamMember').html(response);


                },
                error: function (xhr, status, error) {
                    console.error('Error fetching event data:', error); 
                }
            });
        }
    });
    
});