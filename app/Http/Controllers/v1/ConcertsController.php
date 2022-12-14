<?php

namespace App\Http\Controllers\v1;

use App\Models\Concert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConcertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sortDirection = 'asc';

        $data = Concert::with(['location', 'shows' => function ($query) use ($sortDirection) {
            $query->orderBy('start', $sortDirection);
        }])->orderBy('artist', 'asc')->get();
        return [
            "concerts" => $data,
        ];
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
        $checkIfConcertExists = Concert::find($id);
        if(!$checkIfConcertExists) {
            return response()->json([
                "error" => "A concert with this ID does not exist",
            ], 404);
        }
        
        $sortDirection = 'asc';

        $data = Concert::with(['location', 'shows' => function ($query) use ($sortDirection) {
            $query->orderBy('start', $sortDirection);
        }])->orderBy('artist', 'asc')->find($id);
        return [
            "concert" => $data,
        ];
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
