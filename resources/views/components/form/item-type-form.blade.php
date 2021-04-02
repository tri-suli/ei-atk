<form action="{{ $action }}" method="POST" id="demo-form" data-parsley-validate="" novalidate="">
    @csrf
    <label for="fullname">Nama Tipe</label>
    <input type="text" id="fullname" class="form-control parsley-error" name="fullname" required="" data-parsley-id="20">
    <ul class="parsley-errors-list filled" id="parsley-id-20">
        <li class="parsley-required">This value is required.</li>
    </ul>
</form>