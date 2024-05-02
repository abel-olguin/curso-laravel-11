@props([
    'id'    => 'input',
    'label' => 'Input',
    'type'  => 'text',
    'name'  => 'input',
    'placeholder'  => '',
    'value'  => '',
    'required'  => false,
    'readonly'  => false,
])

<div>
    <label for="{{$id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{$label}}
        @if($required)
            <small class="text-red-700 font-bold">*</small>
        @endif
    </label>

    <input type="{{$type}}" name="{{$name}}" id="{{$id}}"
           placeholder="{{$placeholder}}"
           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700
           dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           value="{{old($name, $value)}}"
        @required($required)
        @readonly($readonly)
        {{$attributes}}
    >

    @error($name)
    <small class="text-red-700 text-xs">{{ $message }}</small>
    @enderror
</div>
