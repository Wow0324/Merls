<script>
    $(document).ready(function() {

        // Attach click event listener to the save button
        $("#edit_profile_save").click(function() {
            // Get the form data
            var formData = $("#edit-profile-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('update_profile')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        $.fancybox.close();
                    }
                    else{
                        document.getElementById("profile-email-error").innerText = response.message.email ? response.message.email : '';
                        document.getElementById("profile-phone-error").innerText = response.message.phone ? response.message.phone : '';
                        document.getElementById("profile-password-error").innerText = response.message.password ? response.message.password : '';
                        document.getElementById("profile-lastname-error").innerText = response.message.last_name ? response.message.last_name : '';
                        document.getElementById("profile-firstname-error").innerText = response.message.first_name ? response.message.first_name : '';
                        document.getElementById("profile-state-error").innerText = response.message.state ? response.message.state : '';
                        document.getElementById("profile-address-error").innerText = response.message.address ? response.message.address : '';
                        document.getElementById("profile-city-error").innerText = response.message.city ? response.message.city : '';
                        document.getElementById("profile-zipcode-error").innerText = response.message.zipcode ? response.message.zipcode : '';
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(1);
                }
            });
        });

        //add property request
        $("#add_property_save").click(function() {
            // Get the form data
            var formData = $("#add-property-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('customer.add_property')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        window.location.href = "{{route('customer.dashboard')}}";
                    }
                    else{
                        toastr['warning'](response.message, '{{__('Warning')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(1);
                }
            });
        });

        //edit property request
        $("#edit-property-save").click(function() {
            // Get the form data
            var formData = $("#edit-property-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('customer.add_property')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });

                        window.location.href = "{{route('customer.dashboard', ['property_id' => ''])}}" + response.property_id;
                    }
                    else{
                        toastr['warning'](response.message, '{{__('Warning')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(1);
                }
            });
        });

        //add authorized users
        $("#add-author-save").click(function() {
            // Get the form data
            var formData = $("#add-author-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('customer.add_author')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        window.location.href = "{{route('customer.dashboard')}}";
                    }
                    else{
                        toastr['warning'](response.message, '{{__('Warning')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(1);
                }
            });
        });

        //add authorized users
        $("#edit-author-save").click(function() {
            // Get the form data
            var formData = $("#edit-author-form").serialize();
            console.log(formData);
            // Send the AJAX request
            $.ajax({
                url: "{{route('customer.add_author')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        var rowId = 'author' + response.author.id;
                        document.getElementById(rowId).cells[0].innerText = response.author.name;
                        document.getElementById(rowId).cells[1].innerText = response.author.phone;
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        $.fancybox.close();
                    }
                    else{
                        toastr['warning'](response.message, '{{__('Warning')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(1);
                }
            });
        });
    });

    //edit authorized users
    function showEditLayout(rowId) {
        // Get the values from the selected row
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("edit-author-id").value = id;
        document.getElementById("edit-author-name").value = name;
        document.getElementById("edit-author-phone").value = phone;
    }

    function initProfileErrorValidation() {
        document.getElementById("profile-email-error").innerText = '';
        document.getElementById("profile-phone-error").innerText = '';
        document.getElementById("profile-password-error").innerText = '';
        document.getElementById("profile-lastname-error").innerText = '';
        document.getElementById("profile-firstname-error").innerText = '';
        document.getElementById("profile-state-error").innerText = '';
        document.getElementById("profile-address-error").innerText = '';
        document.getElementById("profile-city-error").innerText = '';
        document.getElementById("profile-zipcode-error").innerText = '';
    }
</script>