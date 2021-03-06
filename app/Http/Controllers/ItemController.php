<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return Item::latest('updated_at')->get();
    }

    public function store(Request $request)
    {
//        $store = (isset($request->item_id)) ? (new $this->model) : $this->model->findOrFail($request->item_id);
        if (!isset($request->item_id)) {
            $store = new $this->model;
            $store->name = $request->item['name'];
        } else {
//            $store = $this->model->findOrFail($request->item_id);
            $store = $this->model->find($request->item_id);
            if (!isset($store)) return 'Item not found!';
            $store->completed = $request->item['completed'] ? true : false;
            $store->completed_at = $request->item['completed'] ? Carbon::now() : null;
        }
        $store->save();
        return $store;
    }

    public function destroy(Request $request, $id)
    {
        $item = $this->model->find($id);
        if (!isset($item)) return 'Item not found!';
        $item->delete();
        return 'Item deleted successfully';
    }
}
