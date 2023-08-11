<div>
    
    @isset($link)
        <div class="mb-2">
            {{ $link }}
        </div>
    @endisset
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h2 mb-5">
                {{ $slot }}
            </h1>
        </div>
        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset
    </div>
    <x-errors/>
</div>