<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CountryController extends Controller
{
    public function index()
    {
        return response()->json(Country::get(), 200);
    }

    public function show($id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'dont exist row'], 404);
        }
        return response()->json($country, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alias' => 'required|min:2|max:3',
            'name' => 'required|min:2',
            'name_en' => 'required|min:2',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'alias' => 'min:2|max:3',
            'name' => 'min:2',
            'name_en' => 'min:2',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'dont exist row'], 404);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function destroy(Request $request, $id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'dont exist row'], 404);
        }
        $country->delete($request->all());
        return response('OK', 204);
    }
}
