<script>

    //search author function
    function searchAuthors(){
        var search = document.getElementById('search-key').value;
        window.location.href ="{{route('dispatcher.author_users', ['search' => ''])}}" + search;
    }
</script>