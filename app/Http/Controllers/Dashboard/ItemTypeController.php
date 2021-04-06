<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoringItemTypesRequest;
use App\Repositories\Contracts\Eloquent\ItemTypeRepository;

class ItemTypeController extends Controller
{
    /**
     * Item type repository instance
     *
     * @var ItemTypeRepository
     */
    private $itemType;

    /**
     * Create a new controller instance
     *
     * @param ItemTypeRepository $itemType
     */
    public function __construct(ItemTypeRepository $itemType)
    {
        $this->middleware('auth');
        $this->itemType = $itemType;
    }

    /**
     * Display page resources
     *
     * @return void
     */
    public function index()
    {
        return view('pages.item-type', [
            'title' => 'Tipe Barang',
            'collection' => $this->itemType->all()
        ]);
    }

    /**
     * Storing new item types record into database
     *
     * @param StoringItemTypesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoringItemTypesRequest $request)
    {
        $this->itemType->create($request->except('_token'));

        return redirect()->back()->with('message', "Data berhasil ditambahkan.");
    }

     /**
     * Update existing item types record
     *
     * @param   StoringItemTypesRequest $request
     * @param   int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(StoringItemTypesRequest $request, int $id)
    {
        $this->itemType->update($id, $request->except('_method','_token'));

        return redirect()->back()->with('message', "Data berhasil diperbarui.");
    }
}
