<div class="col-12">

    @foreach (Alert::getMessages() as $type => $messages)
        @foreach ($messages as $message)
            <div class="alert alert-{{ $type == 'error' ? 'danger' : $type }} alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {{ $message }}
            </div>
        @endforeach
    @endforeach

    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            {{ $error }}
        </div>
    @endforeach
    
</div>