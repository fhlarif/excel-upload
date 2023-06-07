@props(['description' => null])
<label {{ $attributes }} class="font-bold text-lg">{{ $slot }}</label>
@if ($description)
    <p class="underline text-gray-500 font-medium hover:text-gray-400 w-fit cursor-pointer">{{ $description }}</p>
@endif
