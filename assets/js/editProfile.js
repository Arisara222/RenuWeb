$(document).ready(function() {
    var u_id = $('#inpUserId').val();
    showProfile(u_id);
});

    function showProfile(u_id) {
       
        $.ajax({
            url: API_URL + "Manage_account/showProfile",
            type: 'GET',
            data: {
                u_id: u_id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
               
                $('#empCode').val(response[0].sa_emp_code);
                $('#pwdhidden').val(response[0].sa_emp_password);
                $('#firstName').val(response[0].sa_firstname);
                $('#lastName').val(response[0].sa_lastname);
                $('#email').val(response[0].sa_email);
                $('#HBD').val(response[0].sad_birth_date);
                $('#inputAddress').val(response[0].sad_address);
                $('#profileImagePreview').attr('src','http://127.0.0.1/api/uploads/'+response[0].sad_picture);      
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }   
        });
    }

    $('#profileImage').on('change', function(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            $('#profileImagePreview').attr('src', e.target.result);
          };
          reader.readAsDataURL(file);
        }
    });
    
    $('#btnSaveEdit').click(function(e) {
        e.preventDefault();
        // Create a FormData object and append form data
        var formData = new FormData();
        formData.append('sa_id',$('#inpUserId').val());
        formData.append('sa_emp_code',$('#empCode').val());
        formData.append('sa_emp_password',$('#password').val());
        formData.append('sa_emp_password_old',$('#pwdhidden').val());
        formData.append('sa_firstname',$('#firstName').val());
        formData.append('sa_lastname',$('#lastName').val());
        formData.append('sa_email',$('#email').val());
        formData.append('sad_birth_date',$('#HBD').val());
        formData.append('sad_address',$('#inputAddress').val());
        formData.append('file_image', $('#profileImage')[0].files[0]);

        $.ajax({
          url: API_URL + "Manage_account/editProfile",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            if(response.status != false){
           Swal. fire({
            icon: 'success',
            title: 'Success !',
            html: 'Edit Profile success',
           });
        }else{
            Swal. fire({
                icon: 'error',
                title: 'Error !',
                html: 'Password not change',
               });
        }
          },
          error: function(xhr, status, error) {
            // Handle the error response
            console.error('Form submission failed:', error);
            // You can display an error message to the user
          }
        });
      });