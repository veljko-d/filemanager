<div id="file-create">
    <p><i class="fa fa-upload"></i> Upload File</p>

    <form action="/files" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file_to_upload" multiple>
        <input type="text" name="folder_id" size="2" @isset($folder) value="{{ $folder->id }}" @endisset readonly>
        <input type="submit" value="Upload File" name="submit">
    </form>
</div>
