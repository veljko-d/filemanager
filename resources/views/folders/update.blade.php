<button type="submit" id="f-del-upd" title="Rename folder" onclick="document.getElementById('id02').style.display='block'">
    <i class='far fa-edit'></i>
</button>




<div id="id02" class="modal">
    <form class="modal-content animate" action="/folders/{{ $folder->id }}" method="POST">
        @method('PATCH')
        @csrf

        <p><i class="fas fa-edit"></i> Rename Folder</p>

        <div class="folder-input">
            <input type="text" name="folder_name" placeholder="Folder Name" required>

            <button type="submit">Rename Folder</button>
            <button type="button" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
        </div>
    </form>
</div>
