<?php

namespace App\Http\Controllers;

use App\Models\Koli;
use App\Models\Connote;
use App\Models\Package;
use App\Http\Resources\PackageResource;
use App\Http\Requests\PackageStoreRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::all();

        return apiResponse(SUCCESS_MSG, PackageResource::collection($package));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageStoreRequest $request)
    {
        $validatedRequest = $request->validated();

        $validatedRequest['transaction_id'] = generateUUID();
        $validatedRequest['connote']['connote_id'] = generateUUID();
        $validatedRequest['connote']['transaction_id'] = $validatedRequest['transaction_id'];

        Package::create($validatedRequest);
        $connote = Connote::create($validatedRequest['connote']);

        foreach ($validatedRequest['koli_data'] as $key => $value) {
            $validatedRequest['koli_data'][$key]['koli_id'] = generateUUID();
            $validatedRequest['koli_data'][$key]['connote_id'] = $connote->connote_id;
            $validatedRequest['koli_data'][$key]['koli_code'] = $connote->connote_code . '.' . $key + 1;
            $validatedRequest['koli_data'][$key]['awb_url'] = AWB_URL . $validatedRequest['koli_data'][$key]['koli_code'];

            Koli::create($validatedRequest['koli_data'][$key]);
        }

        return apiResponse(SUCCESS_MSG, ['transaction_id' => $validatedRequest['transaction_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        if ($package) {
            return apiResponse(SUCCESS_MSG, new PackageResource($package));
        }

        return apiResponse(NOTFOUND_MSG);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PackageStoreRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        $package = Package::find($id);
        if ($package) {
            $package->update($validatedRequest);

            return apiResponse(SUCCESS_MSG, new PackageResource($package));
        }

        return apiResponse(NOTFOUND_MSG);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        if ($package) {
            $package->connote->koli()->delete();
            $package->connote->delete();
            $package->delete();

            return apiResponse(SUCCESS_MSG);
        }

        return apiResponse(NOTFOUND_MSG);
    }
}
