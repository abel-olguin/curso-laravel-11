<x-forms.input label="Title" id="title" name="title" :value="$post->title ?? ''"/>

<x-forms.input label="Description" id="description" name="description" :value="$post->description ?? ''"/>

<button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
    {{_('Save')}}
</button>

