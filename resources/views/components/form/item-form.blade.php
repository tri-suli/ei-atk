<form action="{{ url('items') }}" method="POST" id="item-type-form" data-parsley-validate="" novalidate="">
    @csrf
    @if ($isUpdate)
        @method('PUT')
    @endif
    <label for="itype">Tipe Barang</label>
    <input id="itype" type="text" name="type" data-parsley-id="item-type" class="form-control {{ $errors->any() ? 'parsley-error' : '' }}"
    />
    <label for="iname">Nama Barang</label>
    <input id="iname" type="text" name="name" data-parsley-id="item-name" class="form-control {{ $errors->any() ? 'parsley-error' : '' }}"
    />
    <label for="ibrand">Merk</label>
    <input id="ibrand" type="text" name="brand" data-parsley-id="item-brand" class="form-control {{ $errors->any() ? 'parsley-error' : '' }}"
    />
    <label for="iqty">Jumlah</label>
    <input id="iqty" type="number" name="quantity" data-parsley-id="item-qty" class="form-control {{ $errors->any() ? 'parsley-error' : '' }}"
    />
    @if ($errors->any())
        <ul class="parsley-errors-list filled" id="parsley-id-20">
            @foreach ($errors->all() as $error)
                <li class="parsley-required">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</form>