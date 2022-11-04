<?php

namespace App\Http\Controllers;

use App\Models\PhoneBrands;
use App\Traits\imageUpload;
use Illuminate\Http\Request;
use App\Models\PhoneModels;
use Illuminate\Support\Facades\Auth;
use Image as Imagen;

class PhoneBrandsController extends Controller
{
    //
    use imageUpload;


    public function listamarca()
    {

        $brands = PhoneBrands::all();
        return view('listamarca', compact('brands'));
    }

    public function creaMarca()
    {
        return view('creaMarca');
    }

    public function saveMarca(Request $request)
    {

        $request->validate([
            'brandName' => 'required|string|max:180',
            'origin' => 'required|string|max:100',
        ]);

        $brand = array(

            'brandName' => $request->input('brandName'),
            'origin' => $request->input('origin'),
            'userId' => Auth::id()
        );

        if ($request->file('brandLogo')) {

            $imagen = $request->file('brandLogo');
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
            $image_resize->save(env('UPLOAD_FOLDER'). $newfilename);

            $brand['brandLogo'] = $newfilename;
        
        }

        $Marca = PhoneBrands::create($brand);
        if($Marca){
            return redirect()->route('listamarca')->with(['status' => 'La Marca ha sido guardada'], 200);

        }else{
        return response()->json(['message' => 'Error'], 500);
        }

    }
    public function editMarca($id)
    {
        $marca = PhoneBrands::find($id);
        return view('editMarca', ['marca' => $marca]);
    }

    public function updateMarca(Request $request)
    {

        $request->validate([
            'brandName' => 'required|string|max:180',
            'origin' => 'required|string|max:100',
        ]);

        $id = $request->input('id');

        $brand = PhoneBrands::find($id);
        $brand->brandName =$request->input('brandName'); 
        $brand->origin =$request->input('origin'); 
        $brand->userId =Auth::id(); 
        

        if ($request->file('brandLogo')) {

            $imagen = $request->file('brandLogo');
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
            $image_resize->save(env('UPLOAD_FOLDER'). $newfilename);

            $brand->brandLogo =$newfilename;
        
        }

        $brand->save();
            return redirect()->route('listamarca')->with(['status' => 'La Marca ha sido actualizada'], 200);

    }

}
