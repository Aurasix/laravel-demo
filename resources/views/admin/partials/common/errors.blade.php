@if(!empty($errors))
    @if($errors->any())
        <div class="form-error-text-block">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
