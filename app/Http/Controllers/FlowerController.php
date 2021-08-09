<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    /**
     * Display suggestions based on query params.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Flower::query();

        //check flowers fk (tags) and keep only the ones sent in request
        if ($request->has('tags')) {
            foreach ($request->tags as $tag){
                $query->whereHas('tags', function ($query) use ($tag) {
                    $query->where('name',$tag);
                });
            }
        }
        //filter by category
        if ($request->has('category')) {
            $query->where('category',$request->category);
        }
        //filter by color
        if ($request->has('color')) {
            $query->where('color','like',"%$request->color%");
        }

        //remove unavailable or out of stock flowers
        if (!$request->has('all')) {
            $query->where('availability',1);
            $query->where('stock','>',0);
        }
        return response($query->get(),200);
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
