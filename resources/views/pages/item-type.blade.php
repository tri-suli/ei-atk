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
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Sukses!</strong> {{ session('message') }}.
                </div>
            @endif
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
                                    <a data-id="{{ $item->id }}" data-value="{{ $item->name }}" type="button" class="btn btn-round btn-warning">
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
            <div id="modal-itypes" class="modal fade modal-itypes" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-itypes-title">Tambah Data Tipe Barang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <x-form.item-type-form action="item-types" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="action" type="button" class="btn btn-primary">Simpan</button>
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
    @push('custom-scripts')
        <script>
            $('button[data-toggle="modal"]').click(function () {
                $('#modal-itypes').on('show.bs.modal', function (e) {
                    $('#itemtype').attr('value', '');
                });
            })

            $('#action').click(function (e) {
                $('form').submit()
            });

            $('#modal-itypes').on('hidden.bs.modal', function (e) {
                $('#parsley-id-20').remove();
                $('#itemtype').removeClass('parsley-error');
                $('#itemtype').removeAttr('value');
                $('input[name="_method"]').remove();
                $('#modal-itypes-title').text('Tambah Data Tipe Barang')
                $('form')
                    .attr('action', "{{ url('item-types') }}")
            });

            $('a[type=button]').click(function (e) {
                const self = $(this)
                $('form')
                    .attr('action', `{{ url('item-types') }}/${self.attr('data-id')}`)
                    .append('<input type="hidden" name="_method" value="PUT">')

                $('#modal-itypes-title').text('Edit Data Tipe Barang')
                $('#modal-itypes').on('show.bs.modal', function (e) {
                    $('#itemtype').attr('value', self.attr('data-value'));
                });
                $('#modal-itypes').modal('show')

                e.preventDefault();
                e.stopPropagation();
            })
        </script>
    @endpush
    @if ($errors->any())
        @push('custom-scripts')
            <script>
                $('#modal-itypes').modal('show');
            </script>
        @endpush
    @endif
</x-layouts.content-container>
