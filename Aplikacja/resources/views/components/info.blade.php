@if (session('status'))
<div class="row w-100 match-height d-flex justify-content-center" style="padding-right: 1rem; padding-left: 1rem;">
    <div class="alert alert-success mb-4 mt-4 col-12 border-0" role="alert">
        {{ session('status') }}
    </div>
</div>
@endif
@if ($errors->any())
<div class="row w-100 match-height d-flex justify-content-center" style="padding-right: 1rem; padding-left: 1rem;">
<div class="alert alert-danger mb-4 mt-4 col-12 border-0" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach
</div>
</div>
@endif