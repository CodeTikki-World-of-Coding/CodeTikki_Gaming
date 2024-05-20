// $(document).ready(function() {
//     $.getJSON('core/main/fetch-profile_data.php', function(data) {
//         if(data) {
//             $('.fetchName').val(data.name || '');
//             $('.fetchUserName').val(data.username || '');
//             $('.fetchEmail').val(data.email || '');
//             $('.fetchGender').val(data.Gender || '');
//             $('.fetchCountry').val(data.Country || '');
//             $('.fetchProfession').val(data.profession || '');
//             $('.fetchInstitute').val(data.institute || '');
//             $('.fetchRating').val(data.rating || '');
//         }
//     });

//     $('.edit-btn').on('click', function() {
//         $('#editModal').modal('show');
//     });

//     $('.saveChanges').on('click', function() {
//         // Validate and sanitize the zipcode input
//         const zipcode = $('.insertZipcode').val().replace(/\D/g, '').slice(0, 6);

//         var formData = {
//             name: $('.insertName').val() || null,
//             phoneNumber: $('.insertNumber').val() || null,
//             gender: $('input[name="Gender"]:checked').val() || null,
//             country: $('.fetchCountry').find('option:selected').val() || null,
//             zipcode: zipcode || null
//         };

//         $.ajax({
//             type: 'POST',
//             url: 'core/main/insert_profiledata.php',
//             data: formData,
//             success: function(response) {
//                 // Handle success response
//                 console.log('Profile data saved successfully:', response);
//                 $('#editModal').modal('hide');

//             },
//             error: function(xhr, status, error) {
//                 // Handle error response
//                 console.error('Error saving data:', error);
//             }
//         });
//     });

//     $('#workingExperienceTitle').hide();
//     $('#workingExperience').hide();

//     $('input[name="working"]').on('change', function() {
//         if ($(this).is(':checked')) {
//             $('#workingExperienceTitle').show();
//             $('#workingExperience').show();
//             $('#studentExperienceTitle').hide();
//             $('#studentExperience').hide();
//         }
//     });

//     $('#studentExperienceTitle').hide();
//     $('#studentExperience').hide();

//     $('input[name="student"]').on('change', function() {
//         if ($(this).is(':checked')) {
//             $('#studentExperienceTitle').show();
//             $('#studentExperience').show();
//             $('#workingExperienceTitle').hide();
//             $('#workingExperience').hide();
//         }
//     });

//     $('[name="number"]').on('input', function () {
//         var whatsapp = $(this).val();
//         if (whatsapp.length > 10) {
//             $('.error-msg_whatsapp').text('WhatsApp number must be exactly 10 digits').css('color', 'red');
//         } else {
//             $('.error-msg_whatsapp').text('');
//         }
//     });

//     $('#profile-img').click(function () {
//         $('#profile-input').click(); // Trigger click on file input
//     });

//     $('#profile-input').change(function () {
//         var file = $(this).prop('files')[0];
//         if (file) {
//             // Display selected image in the profile picture
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 $('#profile-img').attr('src', e.target.result);
//             };
//             reader.readAsDataURL(file);
//         }
//     });

//     $('#zipcode').on('input', function () {
//         const input = $(this);
//         const maxLength = 6;

//         // Ensure the input is numeric and does not exceed maxLength
//         input.val(input.val().replace(/\D/g, '').slice(0, maxLength));
//     });
// });
$(document).ready(function() {
    // Fetch profile data on page load
    $.getJSON('core/main/fetch-profile_data.php', function(data) {
        if(data && typeof data === 'object') {
            $('.fetchName').val(data.name || '');
            $('.fetchUserName').val(data.username || '');
            $('.fetchEmail').val(data.email || '');
            $('.fetchGender').val(data.Gender || '');
            $('.fetchCountry').val(data.Country || '');
            $('.fetchProfession').val(data.profession || '');
            $('.fetchInstitute').val(data.institute || '');
            $('.fetchRating').val(data.rating || '');
        }
    });

    // Show edit modal on edit button click
    $('.edit-btn').on('click', function() {
        $('#editModal').modal('show');
    });

    // Save changes on save button click
    $('.saveChanges').on('click', function() {
        // Validate and sanitize the zipcode input
        const zipcode = $('.insertZipcode').val().replace(/\D/g, '').slice(0, 6);

        var formData = {
            name: $('.insertName').val() || null,
            phoneNumber: $('.insertNumber').val() || null,
            gender: $('input[name="Gender"]:checked').val() || null,
            country: $('.fetchCountry').find('option:selected').val() || null,
            zipcode: zipcode || null
        };

        $.ajax({
            type: 'POST',
            url: 'core/main/insert_profiledata.php',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log('Profile data saved successfully:', response);
                $('#editModal').modal('hide');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error saving data:', error);
            }
        });
    });

    // Toggle working and student experience sections
    $('input[name="working"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('#workingExperienceTitle, #workingExperience').show();
            $('#studentExperienceTitle, #studentExperience').hide();
        }
    });

    $('input[name="student"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('#studentExperienceTitle, #studentExperience').show();
            $('#workingExperienceTitle, #workingExperience').hide();
        }
    });

    // Validate WhatsApp number input
    $('[name="number"]').on('input', function () {
        var whatsapp = $(this).val();
        if (whatsapp.length !== 10) {
            $('.error-msg_whatsapp').text('WhatsApp number must be exactly 10 digits').css('color', 'red');
        } else {
            $('.error-msg_whatsapp').text('');
        }
    });

    // Trigger file input click on profile image click
    $('#profile-img').click(function () {
        $('#profile-input').click();
    });

    // Display selected image in profile picture
    $('#profile-input').change(function () {
        var file = $(this).prop('files')[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Limit zipcode input to numeric and maxLength characters
    $('#zipcode').on('input', function () {
        const input = $(this);
        const maxLength = 6;
        input.val(input.val().replace(/\D/g, '').slice(0, maxLength));
    });
});
