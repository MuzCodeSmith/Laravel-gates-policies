    @if($label)
    <label for="{{$name}}"><b>{{$label}}</b></label>
    @endif
    <input type="{{$type}}" placeholder="{{$placeholder}}" value="{{$value}}" name="{{$name}}" id="{{$id}}" >
    @if ($errors->has($name))
    <span class="error">{{ $errors->first($name) }}</span>
    <br>
    <br>
    @endif