@props([
    'dbparameter' => 'No especificado',
    'numberofregisters' => 0,
    'icon' => ''
])

<div {{$attributes->merge(['class' => "relative w-full p-10 rounded-md shadow-md border-l-8 border-gray-700"])}}>
    <h3 class="font-bold text-2xl text-stone-200 text-center">{{$dbparameter}}</h3>
    <span class="absolute top-0 right-2 text-4xl font-bold text-white">
        @php echo $icon; @endphp
        {{$numberofregisters}}
    </span>
</div>