@if (session('status'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismis="alert">x</button>
        <strong>{{session('status')}}</strong>
    </div>

@endif
