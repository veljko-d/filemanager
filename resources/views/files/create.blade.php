<div id="">
    <form action="/files" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file_to_upload" multiple>
        <input type="submit" value="Upload File" name="submit">
    </form>
</div>
