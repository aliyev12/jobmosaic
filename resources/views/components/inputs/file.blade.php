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
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{ $required ? 'required' : '' }} />
    </div>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
