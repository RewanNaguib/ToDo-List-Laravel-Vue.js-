<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\Item\ItemResource;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderByDesc('created_at')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        
        $item = new Item;
        $item->name=$request->item["name"];
        $item->save();
        return response([
            'data'=> new ItemResource($item)
        ],Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {
        if($item)
        {
            $item->update($request->all());
            $item->name=$request->item["name"];
            $item->completed=$request->item["completed"]? true : false;
            $item->completed_at=$request->item["completed"]? Carbon::now() : null;
            $item->save();

            return response([
                'data'=> new ItemResource($item),
            ],Response::HTTP_CREATED);
        
        }
        
        return "item does not exist";

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item)
        {
            $item->delete();
            return "item is sucessfully deleted";
        }
        return "item does not exist";
    }
}
