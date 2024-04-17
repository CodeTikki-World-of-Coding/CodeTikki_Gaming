$(document).ready(function() {
    function fetchUserInfo() {
        $.ajax({
            url: 'core/main/fetch_player-name.php', // Update the URL to your PHP script
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response && response.name) {
                    $('.player-name').text(response.name); // Update player name in the profile
                } else if (response && response.username) {
                    $('.player-name').text(response.username); // Use username if name is not available
                } else {
                    console.log('No user info received from PHP.');
                }
            },
            error: function(xhr, status, error) {
                console.log('Error fetching user info:', status, error);
            }
        });
    }

    // Call the fetchUserInfo function when the document is ready
    fetchUserInfo();

    $('#uploadButton').click(function() {
        const fileInput = document.getElementById('uploadInput');
        const file = fileInput.files[0];
        if (!file) {
            alert('Please select a file.');
            return;
        }

        // Check file type
        const fileType = file.type;
        if (!(fileType === 'image/jpeg' || fileType === 'image/png')) {
            alert('Please select a JPEG or PNG image file.');
            return;
        }

        // Check file size (maximum 5MB)
        const maxSize = 5 * 1024 * 1024; // 5MB in bytes
        if (file.size > maxSize) {
            alert('File size exceeds the maximum allowed limit (5MB).');
            return;
        }

        const formData = new FormData();
        formData.append('fileToUpload', file);

        $.ajax({
            url: 'core/main/user.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.trim()) {
                    try {
                        const result = JSON.parse(response);
                        if (result.success) {
                            const imagePath = result.filePath;
                            console.log('Image Path:', imagePath); // Add this line for debugging

                            $('#imageContainer').html(`<img src="core/main/${imagePath}" alt="Uploaded Picture" width="200" />`);
                            alert('Image uploaded successfully.');

                        } else {
                            alert(result.message || 'Unknown error occurred.');
                        }
                    } catch (error) {
                        console.log('Error parsing server response:', error);
                        alert('Error parsing server response.');
                    }
                } else {
                    alert('Empty response received from the server.');
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', status, error);
                alert('Error uploading file. Please try again.');
            }
        });
    });
});
