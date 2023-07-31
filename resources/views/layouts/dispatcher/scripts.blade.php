<script>

    //search author function
    function searchAuthors(){
        var search = document.getElementById('search-key').value;
        window.location.href ="{{route('dispatcher.author_users', ['search' => ''])}}" + search;
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

    //search Property function
    function searchProperty(){
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
            window.location.href ="{!! route('dispatcher.properties', ['status' => true, 'search' => '']) !!}" + encodeURIComponent(search);
        }
    }
</script>