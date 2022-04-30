@props([
    'title' => 'Message',
    'message' => 'undefined',
])

<div {{ $attributes->merge(['class' => "border-l-4 p-4 w-full"]) }} role="alert">
    <p><b>{{ $title }}</b>: {{ $message }}</p>
</div>