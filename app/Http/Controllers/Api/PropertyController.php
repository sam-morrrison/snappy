<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Requests\Storeproperty;
use App\Http\Requests\UpdateProperty;
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
    public function store(Storeproperty $request)
    {
        return Property::updateOrCreate($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProperty $request, Property $property)
    {
        return $property->update($request->validated());
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
