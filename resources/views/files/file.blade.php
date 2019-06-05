<div class="file">
    <p><i class='fas fa-file'></i> {{ $file->name . '.' . $file->ext }}</p>

    <a href="/files/{{ $file->id }}" id="f-dwn" title="Download File">
        <i class="fas fa-file-download"></i>
    </a>
</div>
