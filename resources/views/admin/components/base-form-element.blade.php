<div class="form-group">
    <label for="{{$id}}">{{$title}}</label>
<input type="{{$type}}" name="{{$name}}" class="@error($name) is-invalid  @enderror{{$class}}" id="{{$id}}"  placeholder="{{$slot}}">
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
