<form action="{{ url($action) }}" method="POST" id="item-type-form" data-parsley-validate="" novalidate="">
    @csrf
    {{ $slot }}
    <label for="itemtype">Nama Tipe</label>
    <input
        type="text"
        id="itemtype"
        name="name"
        data-parsley-id="20"
        class="form-control {{ $errors->any() ? 'parsley-error' : '' }}"
    />
    @if ($errors->any())
        <ul class="parsley-errors-list filled" id="parsley-id-20">
            @foreach ($errors->all() as $error)
                <li class="parsley-required">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</form>