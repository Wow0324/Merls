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
        window.location.href ="{{route('admin.author_users', ['search' => ''])}}" + search;
    }

    //set edit jurisdiction value
    function showEditJurisdictionLayout(){
        var jurisdiction = document.getElementById('jurisdiction-value').innerText;
        console.log("sdfds", jurisdiction);
        document.getElementById("edit-jurisdiction-value").innerText = jurisdiction;
    }

    //search customers function
    function searchCustomers(){
        var search = document.getElementById('search-key').value;
        window.location.href ="{{route('admin.customers', ['search' => ''])}}" + search;
    }

    //edit customers users
    function showEditCustomerLayout(customerId) {
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
        window.location.href ="{{route('admin.dispatchers', ['search' => ''])}}" + search;
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

    
</script>