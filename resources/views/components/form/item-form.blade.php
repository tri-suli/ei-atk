<form action="{{ url('items') }}" method="POST" id="item-type-form" data-parsley-validate="" novalidate="">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
            Tipe Barang
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="type_id" id="type_id" class="form-control {{ $errors->has('type_id') ? 'parsley-error' : '' }}">
                <option value=""></option>
                @foreach ($types as $item)
                <option value="{{ $item->id }}" {{ $type === $item->id ? "selected" : null }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('type_id'))
                <ul class="parsley-errors-list filled" id="parsley-id-20">
                    @foreach ($errors->get('type_id') as $error)
                        <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
        <div class="col-md-3 col-sm-3">
            <input
                type="text"
                id="brand"
                name="brand"
                value="{{ $brand }}"
                class="form-control {{ $errors->has('brand') ? 'parsley-error' : '' }}"
                placeholder="Merk"
            />
            @if ($errors->has('brand'))
                <ul class="parsley-errors-list filled" id="parsley-id-20">
                    @foreach ($errors->get('brand') as $error)
                        <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-md-3 col-sm-3">
            <input
                type="number"
                id="quantity"
                name="quantity"
                class="form-control {{ $errors->has('quantity') ? 'parsley-error' : '' }}"
                placeholder="Jumlah"
            />
            @if ($errors->has('quantity'))
                <ul class="parsley-errors-list filled" id="parsley-id-20">
                    @foreach ($errors->get('quantity') as $error)
                        <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">
            Deskripsi
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea
                name="description"
                id="description"
                class="form-control {{ $errors->has('description') ? 'parsley-error' : '' }}"
                cols="15"
                rows="5"
            >{{ $description }}</textarea>
            @if ($errors->has('description'))
                <ul class="parsley-errors-list filled" id="parsley-id-20">
                    @foreach ($errors->get('description') as $error)
                        <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button hidden class="btn btn-primary" type="button">Cancel</button>
            <button class="btn btn-primary" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>