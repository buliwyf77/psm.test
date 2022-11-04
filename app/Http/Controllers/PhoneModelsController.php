<?php

namespace App\Http\Controllers;

use App\Models\PhoneBrands;
use App\Models\PhoneModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image as Imagen;


class PhoneModelsController extends Controller
{
    public function listamodelo()
    {

        $models = PhoneModels::all();
        return view('listamodelo', compact('models'));
    }

    public function creaModelo()
    {
        $brands = PhoneBrands::all();
        return view('creaModelo', compact('brands'));
    }

    public function saveModelo(Request $request)
    {

        $request->validate([
            'phoneName' => 'required|string|max:180',
            'overview' => 'required|string|max:10000',
            'quantity' => 'required|numeric|between:0,5000',
        ]);

        $model = array(

            'phoneName' => $request->input('phoneName'),
            'overview' => $request->input('overview'),
            'quantity' => $request->input('quantity'),
            'brandId' => $request->input('brandId'),
            'userId' => Auth::id()
        );

        if ($request->file('modelLogo')) {

            $imagen = $request->file('modelLogo');
            $filename = $imagen->getClientOriginalName();
            $extension = $imagen->getClientOriginalExtension();
            $uid = uniqid();
            $newfilename = $uid . '.' . $extension;

            $image_resize = Imagen::make($imagen->getRealPath());
            $image_resize->orientate();
            $image_resize->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image_resize->save(env('UPLOAD_FOLDER') . $newfilename);

            $model['modelLogo'] = $newfilename;
        }





        $Modelo = PhoneModels::create($model);
        if ($Modelo) {
            return redirect()->route('lista')->with(['status' => 'El Teléfono ha sido guardado'], 200);
        } else {
            return response()->json(['message' => 'Error'], 500);
        }
    }


    public function editModelo($id)
    {
        $brands = PhoneBrands::all();
        $modelo = PhoneModels::find($id);
        return view('editModelo', ['modelo' => $modelo, 'brands' => $brands]);
    }

    public function updateModelo(Request $request)
    {

        $request->validate([
            'phoneName' => 'required|string|max:180',
            'overview' => 'required|string|max:10000',
            'quantity' => 'required|numeric|between:0,5000',
        ]);

        $id = $request->input('id');

        $model = PhoneModels::find($id);

        $model->phoneName = $request->input('phoneName');
        $model->overview = $request->input('overview');
        $model->quantity = $request->input('quantity');
        $model->brandId = $request->input('brandId');
        $model->userId = Auth::id();

        if ($request->file('modelLogo')) {

            $imagen = $request->file('modelLogo');
            $filename = $imagen->getClientOriginalName();
            $extension = $imagen->getClientOriginalExtension();
            $uid = uniqid();
            $newfilename = $uid . '.' . $extension;

            $image_resize = Imagen::make($imagen->getRealPath());
            $image_resize->orientate();
            $image_resize->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image_resize->save(env('UPLOAD_FOLDER') . $newfilename);

            $model->modelLogo = $newfilename;
        }

        $model->save();
        return redirect()->route('listamodelo')->with(['status' => 'El Télefono ha sido actualizada'], 200);
    }

    public function changeInventory($id, $action)
    {
        $model = PhoneModels::find($id);

        switch ($action) {
            case 'plus':
                $model->quantity = $model->quantity + 1;
                break;
            case 'minus':
                if ($model->quantity>0){
                $model->quantity = $model->quantity - 1;
                }
                break;
        }
        $model->save();

        return $model->quantity;
    }
}
