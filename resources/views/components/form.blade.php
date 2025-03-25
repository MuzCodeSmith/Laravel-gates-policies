<form action="{{$action}}"  method="{{$method === 'GET' ? 'GET' : 'POST' }}" class="form-box">
    @csrf
    @if($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    {{ $slot }}
</form>

