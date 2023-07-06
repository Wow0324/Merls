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
</script>