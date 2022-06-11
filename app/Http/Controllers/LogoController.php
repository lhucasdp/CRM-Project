<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\LogoPhoto;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function App\Http\Controllers\Admin\flash;
use function redirect;


class LogoController extends Controller
{
    public function removeLogo(Request $request){
        $file = $request->file('logo');
//            dd($file);
        $name = $file->getClientOriginalName();
//            dd($name);
        $upload=$file->storeAs('public/logo',$name);
//            dd($upload);
        if(!$upload)
            return redirect()->back()->with('error','Falha ao fazer upload')->withInput();
//            dd($name);
        Company::Destroy([
            "logo" => $upload
        ]);

        return redirect()->route('companies.edit');

    }


}
