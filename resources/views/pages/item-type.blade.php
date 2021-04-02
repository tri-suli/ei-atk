<x-layouts.content-container page-name="Item Type" :title="$title">
    <x-layouts.panel-container title="Daftar tipe barang yang sudah tersimpan">
        <x-slot name="actions">
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-itypes">
                    Small modal
                </button>
            </li>
        </x-slot>
        <x-slot name="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th class="text-right">Ditambahkan</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $item->name }}</th>
                            <th class="text-right">{{ $item->created_at->diffForHumans() }}</th>
                            <th class="text-right">
                                <div class="actions-button">
                                    <a type="button" class="btn btn-round btn-info">
                                        <i class="fa fa-bars"></i> Detail
                                    </a>
                                    <a type="button" class="btn btn-round btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a type="button" class="btn btn-round btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade modal-itypes" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel2">Tambah Data Tipe Barang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <x-form.item-type-form />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-layouts.panel-container>
    @push('custom-styles')
        <style>
            .modal {
                top: 100px;
            }
            .actions-button a {
                color: #efefef !important;
                font-weight: 600;
            }
        </style>
    @endpush
</x-layouts.content-container>
