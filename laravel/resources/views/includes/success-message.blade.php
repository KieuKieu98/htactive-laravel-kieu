@if (Session::has('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif