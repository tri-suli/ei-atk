<x-layouts.content-container page-name="Item" title="Barang">
    @include('pages.item.create')
    <x-layouts.panel-container title="List Barang">
        <x-slot name="actions">
            <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </x-slot>
        <x-slot name="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                        <th>Brand</th>
                        <th class="text-right">Jumlah</th>
                        <th>Ditambahkan Oleh</th>
                        <th>History</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->type->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->brand }}</td>
                            <td class="text-right">{{ $item->quantity }}</td>
                            <td>{{ $item->user->profile->fullname }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="actions-button">
                                    <a type="button" class="btn btn-round btn-info">
                                        <i class="fa fa-bars"></i> Detail
                                    </a>
                                    <a onclick="handleEditCLick({{ $item->id }})" type="button" class="btn btn-round btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a onclick="handleDeleteClick({{ $item->id }})" type="button" class="btn btn-round btn-danger">
                                        <form id="form-delete-{{ $item->id }}" hidden action="{{ url("items/{$item->id}") }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-layouts.panel-container>
    @push('custom-scripts')
        <script>
            const $form = $('form')
            const $btnCancel = $('button[type=button]')
            const $btnReset = $('button[type=reset]')

            function handleEditCLick (itemId) {
                $.ajax({
                    url: `items/${itemId}`,
                    success: function (res, msg) {
                        const data = res.data;
                        const values = [data.type_id, data.brand, data.quantity, data.description];
                        
                        $form
                            .attr('action', `{{ url('items') }}/${itemId}`)
                            .each(function () {
                                const form = $(this);
                                
                                form
                                    .find(':input')
                                    .filter(function (key) {
                                        return key >= 1 && key < 5;
                                    })
                                    .each(function (index, target) {
                                        $(this).val(values[index])
                                    })
                            }) 
                        
                        if (! $('input[value=PUT]').get().length) {
                            $form.append('<input type="hidden" name="_method" value="PUT">')
                            $btnCancel.attr('hidden', false)
                        }
                    }
                });
            }

            function handleDeleteClick (id) {
                const decision = prompt('Apakah anda yakin akan menghapus data ini ?', 'ya atau tidak')

                if (decision === 'ya') {
                    $('#form-delete-' + id).submit()
                }
            }

            $btnReset.click(function () {
                $form.attr({ action: "{{ url('items') }}"})
            });

            $btnCancel.click(function () {
                $('input[value=PUT]').remove()
                $(this).attr('hidden', true)
                $btnReset.trigger('click')
            });
        </script>
    @endpush
</x-layouts.content-container>