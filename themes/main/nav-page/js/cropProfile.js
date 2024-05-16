let cropper;

function loadImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const image = document.getElementById('previewImage');
            image.src = e.target.result;
            $('#previewModal').modal('show'); // Show the preview modal
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                autoCropArea: 1,
            });
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function cropImage() {
    event.preventDefault(); 

    if (cropper) {
        const canvas = cropper.getCroppedCanvas();
        const croppedImageDataURL = canvas.toDataURL(); 
        
        $.ajax({
            url: 'core/main/profilePic.php', 
            type: 'POST',
            data: { image: croppedImageDataURL }, 
            success: function(response) {
                console.log('Image cropped and sent to PHP successfully:', response);
                updateProfileImage(response); 
                $('#previewModal').modal('hide'); 
            },
            error: function(xhr, status, error) {
                console.error('Error sending cropped image to PHP:', error);
            }
        });
    }
}

function closeModal() {
    $('#previewModal').modal('hide'); 
    if (cropper) {
        cropper.destroy(); 
        cropper = null;
    }


}

function updateProfileImage() {
    $.ajax({
        url: 'core/main/get_profile_image.php', 
        type: 'GET',
        success: function(response) {
            console.log('Response from server:', response); 
            const profileImageElement = document.getElementById('profileImage');
            if (response.trim() !== '') {
                profileImageElement.src = 'core/main/' + response.trim(); 
            } else {
                profileImageElement.src = 'core/main/uploads/default-profile-image.png';
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching profile image:', error);
            document.getElementById('profileImage').src = 'core/main/uploads/default-profile-image.png';
        }
    });
}

updateProfileImage();
