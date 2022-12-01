<html>

<head>
    <title>GeeksforGeeks</title>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

</head>

<body>
@if(Session::has('image'))
    {{ Session::get('image')}}
    <a href="logout">Sign Out</a>

@else
    please signin

    @endif
    </div>
<input type="file" name="avatar" id="avatar"/>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="avatar"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
        server: {
            url: 'http://127.0.0.1:8000/',
            process: {
                url: 'upload',
                method: 'POST',
                withCredentials: false,
                headers: { 'X-CSRF-TOKEN':'{{csrf_token()}}'},
                timeout: 7000,
                onload: null,
                onerror: null,
                ondata: null,

            },
            revert: {
                url: 'upload-delete',
                headers: { 'X-CSRF-TOKEN':'{{csrf_token()}}'},
                timeout: 7000,
            },


        }
    });
</script>
</body>

</html>
