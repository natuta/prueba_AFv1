@props(['id' => null, 'name' => null])
<label class="block mt-4">
    <span class="text-gray-700">Escoja una opcion</span>
        <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
        <select name="$name" id="$id" {{ $attributes->merge(['class' => 'custom-select dropdown-primary custom-select-lg my-xl-auto form-control'])  }}>
            {{ $slot }}
        </select>
</label>
