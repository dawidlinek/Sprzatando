@if ($errors->any())
<div class="alert alert-danger mb-2 mt-4 col-10 mx-auto border-0 p-2" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach
</div>
@endif