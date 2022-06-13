<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use function auth;
use function redirect;
use function view;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
//        dd($companies);
        return view('admin.companies.index', compact('companies'));
//        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        if ($request -> hasFile('logo')){

            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $upload=$file->storeAs('public/logo',$name);
            if(!$upload)
                return redirect()->back()->with('error','Falha ao fazer upload')->withInput();
            $data['logo']=$name;
        }

        Company::Create($data);

        return redirect()->route('companies.index');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
//        dd($company);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();

        $company = Company::find($id);
        if ($request -> hasFile('logo')){
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $upload=$file->storeAs('public/logo',$name);

            if(!$upload)
                return redirect()->back()->with('error','Falha ao fazer upload')->withInput();

            $data['logo']=$name;
        }

        $company->update($data);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('companies.index');
    }



}
