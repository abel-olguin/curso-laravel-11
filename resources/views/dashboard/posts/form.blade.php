<x-forms.input label="Title" id="title" name="title" :value="$post->title ?? ''"/>


<x-forms.input label="Categories" id="categories" name="categories"
               :value=" $categories ?? '' "/>

<input type="hidden" name="description" id="description" value="{{$post->description ?? ''}}">

<div id="editor"></div>
@error('description')
<small class="text-red-700 text-xs">{{ $message }}</small>
@enderror

<button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
    {{__('Save')}}
</button>

