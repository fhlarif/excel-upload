@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
        <span class="font-medium">Success!</span> {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
        <span class="font-medium">Warning!</span> {{ session('warning') }}
    </div>
@endif
