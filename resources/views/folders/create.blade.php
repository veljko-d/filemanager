<div class="">
    <form action="/folders" method="POST">
        @csrf

        <input type="text" name="folder_name">
        <input type="text" name="parent_id">
        <input type="submit" value="New Folder" />
    </form>
</div>
