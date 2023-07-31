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
                url: "{{route('admin.add_property')}}",
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
                        window.location.href = "{{route('admin.properties')}}";
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
                url: "{{route('admin.add_property')}}",
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

                        window.location.href = "{{route('admin.properties', ['property_id' => ''])}}" + response.property_id;
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

        //delete property
        $("#delete-property-save").click(function() {
            // Get the form data
            var formData = $("#delete-property-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.delete_property')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    var rowId = 'property' + response.property_id;
                    
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        var rowId = 'property' + response.property_id;
                        const trElement = document.getElementById(rowId);
                        if (trElement) {
                            const parentElement = trElement.parentNode;
                            parentElement.removeChild(trElement);
                        }
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

        //add authorized users
        $("#add-author-save").click(function() {
            // Get the form data
            var formData = $("#add-author-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.add_author')}}",
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
                        window.location.href = "{{route('admin.author_users')}}";
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
                url: "{{route('admin.add_author')}}",
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
        

        //delete authorized users
        $("#delete-author-save").click(function() {
            // Get the form data
            var formData = $("#delete-author-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.delete_author')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    var rowId = 'author' + response.author_id;
                    document.getElementById(rowId)
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        var rowId = 'author' + response.author_id;
                        const trElement = document.getElementById(rowId);
                        if (trElement) {
                            const parentElement = trElement.parentNode;
                            parentElement.removeChild(trElement);
                        }
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

        //approve property status
        $("#property-status-save").click(function(){
            // Get the form data
            var formData = $("#property-status-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.approve_property')}}",
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
                        window.location.href = "{{route('admin.detail_property', ['property_id' => ''])}}" + response.property_id;
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

        //add jurisdiction values
        $("#jurisdiction-edit-save").click(function() {
            // Get the form data
            var formData = $("#jurisdiction-edit-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.edit_jurisdiction')}}",
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
                        // console.log(response.jurisdiction);
                        $("#jurisdiction-value").text(response.jurisdiction);
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

        //approve customer status
        $("#customer-status-save").click(function(){
            // Get the form data
            var formData = $("#customer-status-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.approve_customer')}}",
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

                        var rowId = 'customer' + response.customer_id;
                        document.getElementById(rowId).setAttribute('data-status', response.customer_status);
                        document.getElementById(rowId).cells[2].innerText = response.customer_status==0 ? 'Pending' : (response.customer_status == 1 ? 'Approved' : 'Denied');
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

        //delete customer
        $("#delete-customer-save").click(function() {
            // Get the form data
            var formData = $("#delete-customer-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.delete_customer')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    var rowId = 'customer' + response.customer_id;
                    document.getElementById(rowId)
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        var rowId = 'customer' + response.customer_id;
                        const trElement = document.getElementById(rowId);
                        if (trElement) {
                            const parentElement = trElement.parentNode;
                            parentElement.removeChild(trElement);
                        }
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

        //add customer
        $("#add-customer-save").click(function() {
            // Get the form data
            var formData = $("#add-customer-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.add_customer')}}",
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
                        window.location.href = "{{route('admin.customers')}}";
                    }
                    else{
                        document.getElementById("customer-email-add-error").innerText = response.message.email ? response.message.email : '';
                        document.getElementById("customer-phone-add-error").innerText = response.message.phone ? response.message.phone : '';
                        document.getElementById("customer-password-add-error").innerText = response.message.password ? response.message.password : '';
                        document.getElementById("customer-lastname-add-error").innerText = response.message.last_name ? response.message.last_name : '';
                        document.getElementById("customer-firstname-add-error").innerText = response.message.first_name ? response.message.first_name : '';
                        document.getElementById("customer-state-add-error").innerText = response.message.state ? response.message.state : '';
                        document.getElementById("customer-address-add-error").innerText = response.message.address ? response.message.address : '';
                        document.getElementById("customer-city-add-error").innerText = response.message.city ? response.message.city : '';
                        document.getElementById("customer-zipcode-add-error").innerText = response.message.zipcode ? response.message.zipcode : '';
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(error);
                }
            });
        });

        //edit customer
        $("#edit-customer-save").click(function() {
            // Get the form data
            var formData = $("#edit-customer-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.add_customer')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        console.log(response);
                        var rowId = 'customer' + response.customer.id;
                        document.getElementById(rowId).cells[0].innerText = response.customer.email;
                        document.getElementById(rowId).cells[1].innerText = response.customer.phone;
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
                        document.getElementById("customer-email-error").innerText = response.message.email ? response.message.email : '';
                        document.getElementById("customer-phone-error").innerText = response.message.phone ? response.message.phone : '';
                        document.getElementById("customer-password-error").innerText = response.message.password ? response.message.password : '';
                        document.getElementById("customer-lastname-error").innerText = response.message.last_name ? response.message.last_name : '';
                        document.getElementById("customer-firstname-error").innerText = response.message.first_name ? response.message.first_name : '';
                        document.getElementById("customer-state-error").innerText = response.message.state ? response.message.state : '';
                        document.getElementById("customer-address-error").innerText = response.message.address ? response.message.address : '';
                        document.getElementById("customer-city-error").innerText = response.message.city ? response.message.city : '';
                        document.getElementById("customer-zipcode-error").innerText = response.message.zipcode ? response.message.zipcode : '';
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(1);
                }
            });
        });
       
        //delete dispatcher
        $("#delete-dispatcher-save").click(function() {
            // Get the form data
            var formData = $("#delete-dispatcher-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.delete_dispatcher')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    var rowId = 'dispatcher' + response.dispatcher_id;
                    document.getElementById(rowId)
                    // Handle the response from the server
                    if(response.status == 'success'){
                        toastr['success'](response.message, '{{__('Success')}}!!', {
                            closeButton: true,
                            positionClass: 'toast-top-right',
                            progressBar: true,
                            newestOnTop: true,
                            rtl: isRtl
                        });
                        var rowId = 'dispatcher' + response.dispatcher_id;
                        const trElement = document.getElementById(rowId);
                        if (trElement) {
                            const parentElement = trElement.parentNode;
                            parentElement.removeChild(trElement);
                        }
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

        //add dispatcher
        $("#add-dispatcher-save").click(function() {
            // Get the form data
            var formData = $("#add-dispatcher-form").serialize();
            
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.add_dispatcher')}}",
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
                        window.location.href = "{{route('admin.dispatchers')}}";
                    }
                    else{
                        document.getElementById("dispatcher-email-add-error").innerText = response.message.email ? response.message.email : '';
                        document.getElementById("dispatcher-phone-add-error").innerText = response.message.phone ? response.message.phone : '';
                        document.getElementById("dispatcher-password-add-error").innerText = response.message.password ? response.message.password : '';
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(error);
                }
            });
        });

        //edit dispatcher
        $("#edit-dispatcher-save").click(function() {
            // Get the form data
            var formData = $("#edit-dispatcher-form").serialize();
            // Send the AJAX request
            $.ajax({
                url: "{{route('admin.add_dispatcher')}}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if(response.status == 'success'){
                        var rowId = 'dispatcher' + response.dispatcher.id;
                        document.getElementById(rowId).cells[0].innerText = response.dispatcher.email;
                        document.getElementById(rowId).cells[1].innerText = response.dispatcher.phone;
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
                        document.getElementById("dispatcher-email-error").innerText = response.message.email ? response.message.email : '';
                        document.getElementById("dispatcher-phone-error").innerText = response.message.phone ? response.message.phone : '';
                        document.getElementById("dispatcher-password-error").innerText = response.message.password ? response.message.password : '';
                    }
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(error);
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

    //delete authorized users
    function showDeleteLayout(rowId) {
        // Get the values from the selected row
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("delete-author-id").value = id;
        document.getElementById("delete-author-name").value = name;
        document.getElementById("delete-author-phone").value = phone;
    }

    //delete authorized users
    function showAuthorLayout(rowId) {
        // Get the values from the selected row
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("show-author-name").value = name;
        document.getElementById("show-author-phone").value = phone;
    }

    //search author function
    function searchAuthors(){
        var search = document.getElementById('search-key').value;
        if(search == ''){
            toastr['warning']('Please enter author name.', '{{__('Warning')}}!!', {
                closeButton: true,
                positionClass: 'toast-top-right',
                progressBar: true,
                newestOnTop: true,
                rtl: isRtl
            });
        }
        else{
            window.location.href ="{{route('admin.author_users', ['search' => ''])}}" + search;
        }
    }

    //set edit jurisdiction value
    function showEditJurisdictionLayout(){
        var jurisdiction = document.getElementById('jurisdiction-value').innerText;
        document.getElementById("edit-jurisdiction-value").innerText = jurisdiction;
    }

    //search customers function
    function searchCustomers(){
        var search = document.getElementById('search-key').value;
        if(search == ''){
            toastr['warning']('Please enter customer name.', '{{__('Warning')}}!!', {
                closeButton: true,
                positionClass: 'toast-top-right',
                progressBar: true,
                newestOnTop: true,
                rtl: isRtl
            });
        }
        else{
            window.location.href ="{{route('admin.customers', ['search' => ''])}}" + search;
        }
    }

    //search Property function
    function searchProperty(){
        var search = document.getElementById('search-key').value;
        if(search == ''){
            toastr['warning']('Please enter property name.', '{{__('Warning')}}!!', {
                closeButton: true,
                positionClass: 'toast-top-right',
                progressBar: true,
                newestOnTop: true,
                rtl: isRtl
            });
        }
        else{
            window.location.href ="{!! route('admin.properties', ['status' => true, 'search' => '']) !!}" + encodeURIComponent(search);
        }
    }

    //edit customers users
    function showEditCustomerLayout(customerId) {
        initCustomerErrorValidation();
        $.ajax({
            url: "{{route('admin.get_customer')}}",
            type: "POST",
            data: {
                "customer_id" : customerId,
                "_token" : '{{csrf_token()}}'
            },
            success: function(response) {
                // Handle the response from the server
                if(response.status == 'success'){
                    var customer = response.customer;
                    console.log(customer.id);
                    document.getElementById("edit-customer-id").value = customer.id;
                    document.getElementById("edit-customer-email").value = customer.email;
                    document.getElementById("edit-customer-phone").value = customer.phone;
                    document.getElementById("edit-customer-firstname").value = customer.first_name;
                    document.getElementById("edit-customer-lastname").value = customer.last_name;
                    document.getElementById("edit-customer-address").value = customer.address;
                    document.getElementById("edit-customer-city").value = customer.city;
                    document.getElementById("edit-customer-state").value = customer.state;
                    document.getElementById("edit-customer-zipcode").value = customer.zipcode;
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
                console.error(error);
            }
        });
    }

    //delete authorized users
    function showDeleteCustomerLayout(rowId) {
        // Get the values from the selected row
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("delete-customer-id").value = id;
        document.getElementById("delete-customer-name").value = name;
        document.getElementById("delete-customer-phone").value = phone;
    }

    //delete authorized users
    function showCustomerLayout(customerId) {
        $.ajax({
            url: "{{route('admin.get_customer')}}",
            type: "POST",
            data: {
                "customer_id" : customerId,
                "_token" : '{{csrf_token()}}'
            },
            success: function(response) {
                // Handle the response from the server
                if(response.status == 'success'){
                    var customer = response.customer;
                    document.getElementById("show-customer-email").value = customer.email;
                    document.getElementById("show-customer-phone").value = customer.phone;
                    document.getElementById("show-customer-firstname").value = customer.first_name;
                    document.getElementById("show-customer-lastname").value = customer.last_name;
                    document.getElementById("show-customer-address").value = customer.address;
                    document.getElementById("show-customer-city").value = customer.city;
                    document.getElementById("show-customer-state").value = customer.state;
                    document.getElementById("show-customer-zipcode").value = customer.zipcode;
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
                console.error(error);
            }
        });
    }

    //approve customers
    function showApproveCustomerLayout(rowId) {
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        var status = document.getElementById(rowId).getAttribute('data-status');
        // Populate the form fields with the values

        document.getElementById("customer-status-id").value = id;
        document.getElementById("customer-status-email").innerText = name;
        document.getElementById("customer-status-approved").value = status;
    }

    //search dispatchers function
    function searchDispatchers(){
        var search = document.getElementById('search-key').value;
        if(search == ''){
            toastr['warning']('Please enter dispatcher name.', '{{__('Warning')}}!!', {
                closeButton: true,
                positionClass: 'toast-top-right',
                progressBar: true,
                newestOnTop: true,
                rtl: isRtl
            });
        }
        else{
            window.location.href ="{{route('admin.dispatchers', ['search' => ''])}}" + search;
        }
    }

    //edit dispatchers users
    function showEditDispatcherLayout(rowId) {
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("edit-dispatcher-id").value = id;
        document.getElementById("edit-dispatcher-email").value = name;
        document.getElementById("edit-dispatcher-phone").value = phone;
        document.getElementById("dispatcher-email-error").innerText = '';
        document.getElementById("dispatcher-phone-error").innerText = '';
        document.getElementById("dispatcher-password-error").innerText = '';
    }

    //delete authorized users
    function showDeleteDispatcherLayout(rowId) {
        // Get the values from the selected row
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("delete-dispatcher-id").value = id;
        document.getElementById("delete-dispatcher-name").value = name;
        document.getElementById("delete-dispatcher-phone").value = phone;
    }

    //delete authorized users
    function showDispatcherLayout(rowId) {
        var name = document.getElementById(rowId).cells[0].innerText;
        var phone = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("show-dispatcher-email").value = name;
        document.getElementById("show-dispatcher-phone").value = phone;
    }

    function showPropertyAddLayout(){
        document.getElementById("property-title").innerText = "Add New Property";
        document.getElementById("property-id").value = 0;
        document.getElementById("property-name").value = '';
        document.getElementById("property-address").value = '';
        document.getElementById("property-jurisdiction").value = '';
        document.getElementById("property-approve").value = 0;
        document.getElementById("property-button").style.display='block';
    }
    function showPropertyEditLayout(propertyId) {
        $.ajax({
            url: "{{route('admin.get_property')}}",
            type: "POST",
            data: {
                "property_id" : propertyId,
                "_token" : '{{csrf_token()}}'
            },
            success: function(response) {
                // Handle the response from the server
                if(response.status == 'success'){
                    var property = response.property;
                    document.getElementById("property-title").innerText = "Edit Property";
                    document.getElementById("property-id").value = property.id;
                    document.getElementById("property-name").value = property.name;
                    document.getElementById("property-address").value = property.address;
                    document.getElementById("property-jurisdiction").value = property.jurisdiction;
                    document.getElementById("property-approve").value = property.approved;
                    document.getElementById("property-customer").value = property.user_id;
                    document.getElementById("property-button").style.display='block';
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
                console.error(error);
            }
        });
    }

    //delete authorized users
    function showDeletePropertyLayout(rowId) {
        // Get the values from the selected row
        var name = document.getElementById(rowId).cells[0].innerText;
        var address = document.getElementById(rowId).cells[1].innerText;
        var id = document.getElementById(rowId).getAttribute('data-id');
        // Populate the form fields with the values

        document.getElementById("delete-property-id").value = id;
        document.getElementById("delete-property-name").value = name;
        document.getElementById("delete-property-address").value = address;
    }

    function showPropertyLayout(propertyId) {
        $.ajax({
            url: "{{route('admin.get_property')}}",
            type: "POST",
            data: {
                "property_id" : propertyId,
                "_token" : '{{csrf_token()}}'
            },
            success: function(response) {
                // Handle the response from the server
                if(response.status == 'success'){
                    var property = response.property;
                    document.getElementById("property-title").innerText = "Show Property";
                    document.getElementById("property-id").value = property.id;
                    document.getElementById("property-name").value = property.name;
                    document.getElementById("property-address").value = property.address;
                    document.getElementById("property-jurisdiction").value = property.jurisdiction;
                    document.getElementById("property-approve").value = property.approved;
                    document.getElementById("property-button").style.display='none';
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
                console.error(error);
            }
        });
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

    function initCustomerErrorValidation() {
        document.getElementById("customer-email-error").innerText = '';
        document.getElementById("customer-phone-error").innerText = '';
        document.getElementById("customer-password-error").innerText = '';
        document.getElementById("customer-lastname-error").innerText = '';
        document.getElementById("customer-firstname-error").innerText = '';
        document.getElementById("customer-state-error").innerText = '';
        document.getElementById("customer-address-error").innerText = '';
        document.getElementById("customer-city-error").innerText = '';
        document.getElementById("customer-zipcode-error").innerText = '';
    }

    function initCustomerAddErrorValidation() {
        document.getElementById("add-customer-phone").value = '';
        document.getElementById("add-customer-password").value = '';
        document.getElementById("add-customer-passwordconfirmation").value = '';
        document.getElementById("add-customer-firstname").value = '';
        document.getElementById("add-customer-lastname").value = '';
        document.getElementById("add-customer-address").value = '';
        document.getElementById("add-customer-city").value = '';
        document.getElementById("add-customer-state").value = '';
        document.getElementById("add-customer-zipcode").value = '';
        document.getElementById("customer-email-add-error").innerText = '';
        document.getElementById("customer-phone-add-error").innerText = '';
        document.getElementById("customer-password-add-error").innerText = '';
        document.getElementById("customer-lastname-add-error").innerText = '';
        document.getElementById("customer-firstname-add-error").innerText = '';
        document.getElementById("customer-state-add-error").innerText = '';
        document.getElementById("customer-address-add-error").innerText = '';
        document.getElementById("customer-city-add-error").innerText = '';
        document.getElementById("customer-zipcode-add-error").innerText = '';
    }

    function initDispatcherAddErrorValidation(){
        document.getElementById("add-dispatcher-email").value = '';
        document.getElementById("add-dispatcher-phone").value = '';
        document.getElementById("add-dispatcher-password").value = '';
        document.getElementById("add-dispatcher-passwordconfirmation").value = '';
        document.getElementById("dispatcher-email-add-error").innerText = '';
        document.getElementById("dispatcher-phone-add-error").innerText = '';
        document.getElementById("dispatcher-password-add-error").innerText = '';
    }
</script>