@if($alert = session()->pull('alert'))
<div class="alert alert-success mb-0 rouded-0 text-center small py-0">
    {{ $alert }}
</div>
@endif 