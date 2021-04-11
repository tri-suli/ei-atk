<x-layouts.panel-container title="Form Barang">
    <x-slot name="actions">
        <li>
            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
    </x-slot>
    <x-slot name="content">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> {{ session('message') }}
            </div>
        @endif
        <x-form.item-form
            type="{{ old('type_id') }}"
            description="{{ old('description') }}"
            brand="{{ old('brand') }}"
            quantity="{{ old('quantity') }}"
            :types="$types"
        />
    </x-slot>
</x-layouts.panel-container>
