<?php

namespace App\Http\Controllers;

use App\Http\Resources\Paginator;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pageNo = request('pageNo', 1);
        $propsPerPage = request('perPage', 100);

        $propsToSkip = ($pageNo * $propsPerPage) - $propsPerPage;

        //Get only the required page of properties
        $properties = Property::skip($propsToSkip)
            ->take($propsPerPage)
            ->get();

        //pass that to the 'Paginator'
        return new Paginator($properties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = request()->validate([
            'name'  => 'required|string|max:20|unique:properties,name',
            'price' => 'integer',
            'type'  => 'string|in:Flat,Detached House,Attached House'
         ]);

        //errors?

        return Property::updateOrCreate($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {

        request()->validate([
            'price' => 'integer',
            'type'  => 'string|in:Flat,Detached House,Attached House'
        ]);

        $success = $property->update([
            'name' => request('name'),
            'price' => request('price'),
            'type' => request('type')
        ]);

        return $success;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        return $property->delete();
    }
}
