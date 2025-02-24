<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10);
        return Inertia::render('Dashboard', [
            "items" => $items
        ]);
    }

    public function create()
    {
        return Inertia::render('CreateItem');
    }

    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('item_photo')) {
            $filePath = $request->file('item_photo')->store('item_photos', 'public');
            $data['item_photo'] = $filePath;
        }
        try {
            Item::create($data);
            return redirect()->route('dashboard')->banner('Item created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('dashboard')->dangerBanner('Action Failed!.');
        }
    }

    public function updateStatus(Request $request, Item $item)
    {
        $data = $request->validate([
            'status' => 'nullable|integer',
        ]);

        $item->status = $data['status'];
        $item->save();

        return redirect()->back()->banner('Success!');
    }

    public function edit(Item $item)
    {
        return Inertia::render('EditItem', [
            'item' => $item
        ]);
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $data = $request->validated();
        try {
            $item->update($data);
            return redirect()->route('dashboard')->banner('Item Updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->dangerBanner('Action Failed!.');
        }
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();
            return redirect()->back()->banner('Item deleted!');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->dangerBanner('Action Failed!.');
        }
    }
}
