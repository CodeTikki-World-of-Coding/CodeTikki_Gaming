
$(document).ready(function () {
    $(document).on('click', '.menu', function (e) {
        e.preventDefault(); 
        var url = $(this).attr('href'); 
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            success: function (response) {
                $('#main-content').html(response); 
            },
            error: function (xhr, status, error) {
                console.log(error); 
            }
        });
    });
    $(document).on('click', '.nav-item', function () {
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });
    
});
