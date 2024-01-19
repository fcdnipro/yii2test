$(document).ready(function() {
    $('.upload-file').on('click', function(e) {
        let formData = new FormData();
        let inputFile = $('#fileuploadform-file'); // Adjust the ID based on your actual input field

        // Append the file from the input field to the FormData object
        console.log(inputFile[0].files[0])
        formData.append('file', inputFile[0].files[0]);
        $.ajax({
            url: '/site/upload-file',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                alert('File upload initiated. Check back later for the download status.');
            },
            error: function(error) {
                console.error(error);
                alert('Error during file upload.');
            }
        });
    });
});

