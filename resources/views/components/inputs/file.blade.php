@props(['id', 'name', 'label' => null, 'required' => false])

<div class="mb-4">
    @if ($label)
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
    <div class="relative w-fit">
        <label for="{{ $id }}" class="button primary inline-flex items-center cursor-pointer">
            <i class="mr-2" data-feather="upload"></i>
            Choose File
        </label>
        <input id="{{ $id }}" type="file" name="{{ $name }}"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{ $required ? 'required' : '' }}
            onchange="previewImage(event)" />
    </div>
    <div id="file-preview" class="mt-2" style="display: none;">
        <span id="file-name" class="text-gray-700"></span>
        <embed id="file-preview-embed" type="application/pdf" width="100%" height="500px" />
        <button type="button" onclick="removeImage()" class="ml-2 text-red-500">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<script>
    function previewImage(event) {
        const filePreview = document.getElementById('file-preview');
        const fileName = document.getElementById('file-name');
        const filePreviewEmbed = document.getElementById('file-preview-embed');
        const file = event.target.files[0];

        if (file) {
            fileName.textContent = file.name;
            filePreviewEmbed.src = URL.createObjectURL(file);
            filePreview.style.display = 'block';
        }
    }

    function removeImage() {
        const filePreview = document.getElementById('file-preview');
        const fileInput = document.querySelector('input[type="file"]');
        const filePreviewEmbed = document.getElementById('file-preview-embed');
        fileInput.value = ''; // Clear the file input
        filePreviewEmbed.src = ''; // Clear the preview embed
        filePreview.style.display = 'none'; // Hide the preview
    }
</script>
