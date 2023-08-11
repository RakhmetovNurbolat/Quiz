@if ($errors->any())
    <div class="alert alert-danger small p-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $item)
                <li> {{ $item }} </li>
            @endforeach
        </ul>
    </div>
@endif