<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'title' => 'Item Type',
            'collection' => $this->itemType->all()
        ]);
    }
}
