<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domains = Domain::all();
        return view('domain.index')->with('domains', $domains);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domain.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'domain_name' => 'required|max:225',
            'expiry_date' => 'required',
            'registrar' => 'required|max:225',
            'contact_email' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('domain/create')
                ->withInput()
                ->withErrors($validator);
        }
        $domain = Domain::create([
            'domain_name' => $request->input('domain_name'),
            'expiry_date' => $request->date('expiry_date'),
            'registrar' => $request->input('registrar'),
            'auto_renew' => $request->boolean('auto_renew'),
            'contact_email' => $request->input('contact_email')
        ]);
        $domain->save();
        Session::flash('domain_create', 'Domain is created.');
        return redirect('/domain/create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $domain = Domain::find($id);
        return view('domain.show')->with('domain', $domain);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $domain = Domain::find($id);
        return view('domain.edit')->with('domain', $domain);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'domain_name' => 'required|max:225',
            'expiry_date' => 'required',
            'registrar' => 'required|max:225',
            'contact_email' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('domain/'.$id.'/create')
                ->withInput()
                ->withErrors($validator);
        }
        // Create The Category
        $domain = Domain::find($id);
        $domain->domain_name = $request->Input('domain_name');
        $domain->expiry_date = $request->Input('expiry_date');
        $domain->registrar = $request->Input('registrar');
        $domain->auto_renew = $request->boolean('auto_renew');
        $domain->contact_email = $request->Input('contact_email');
        $domain->save();
        Session::flash('domain_update', 'Domain is updated.');
        return redirect(route('domain.index'));
    }

   


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $domain = Domain::find($id);
        $domain->delete();
        Session::flash('domain_delete', 'Domain is deleted.');
        return redirect('domain');
    }
}
