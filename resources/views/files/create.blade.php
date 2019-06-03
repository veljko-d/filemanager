<div id="file-create">
    <p>Upload File</p>

    <form action="/files" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file_to_upload" multiple>
        <input type="submit" value="Upload File" name="submit">
    </form>
</div>
