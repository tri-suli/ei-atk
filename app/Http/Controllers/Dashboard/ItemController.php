<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreItemRequest;
use App\Repositories\Contracts\Eloquent\ItemRepository;
use App\Repositories\Contracts\Eloquent\ItemTypeRepository;

class ItemController extends Controller
{
    /**
     * Item type repository
     *
     * @var ItemTypeRepository
     */
    private $itemType;

    /**
     * Item repository
     *
     * @var ItemRepository
     */
    private $item;

    /**
     * Create a new controller instance
     *
     * @param ItemRepository $item
     * @param ItemTypeRepository $itemType
     */
    public function __construct(ItemRepository $item, ItemTypeRepository $itemType)
    {
        $this->middleware('auth');
        $this->item = $item;
        $this->itemType = $itemType;
    }

    /**
     * Display item's resources
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $items = $this->item->all();
        $types = $this->itemType->exceptTimeStamps();

        return view('pages.item.index', [
            'items' => $items,
            'types' => $types
        ]);
    }

    /**
     * Store new item's record
     *
     * @param   StoreItemRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(StoreItemRequest $request)
    {
        $this->item->create(array_merge(
            ['added_by' => auth()->user()->id],
            $request->except('_token', '_method')
        ));

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Find a record to edit
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(int $id)
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->item->find($id)
        ], 200);
    }

    /**
     * Update existing item's record
     *
     * @param   StoreItemRequest $request
     * @param   int $id
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function update(StoreItemRequest $request, int $id)
    {
        $this->item->update($id, $request->except('_token', '_method'));

        return redirect()->back()->with('message', "Data berhasil diperbarui.");
    }

    /**
     * Delete existing item record
     *
     * @param   int $id
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id)
    {
        $this->item->delete($id);

        return redirect()->back()->with('message', "Data berhasil dihapus.");
    }
}
