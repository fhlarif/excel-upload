@props(['style' => 'primary'])
@php
    
    switch ($style) {
        case 'secondary':
            $class = 'text-red-700 border-red-700 hover:bg-red-800 focus:ring-red-300';
    
            break;
    
        default:
            $class = 'text-blue-700 border-blue-700 hover:bg-blue-800 focus:ring-blue-300';
    
            break;
    }
    
@endphp
<button {{ $attributes }}
    class="hover:text-white w-full border focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 {{ $class }}">{{ $slot }}</button>
