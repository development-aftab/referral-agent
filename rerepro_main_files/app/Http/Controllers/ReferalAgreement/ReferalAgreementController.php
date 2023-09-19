<?php

namespace App\Http\Controllers\ReferalAgreement;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\ReferalAgreement;
use Illuminate\Http\Request;

class ReferalAgreementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $referalagreement = ReferalAgreement::where('status',2)->where('lead_id', 'LIKE', "%$keyword%")
                ->orWhere('sender_id', 'LIKE', "%$keyword%")
                ->orWhere('receiver_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                if(Auth::user()->hasRole('user')){
                   $referalagreement = ReferalAgreement::where('status',2)->orderBy('id','DESC')->paginate($perPage);
                }else{
                        $referalagreement = ReferalAgreement::where(function($query) use ($request) {
                                                $query->where('sender_id',Auth::id())->where('status',2);
                                            })->orWhere(function ($query) use ($request) {
                                                $query->where('receiver_id',Auth::id())->where('status',2);
                                            })->orderBy('created_at', 'ASC')->orderBy('id','DESC')->paginate($perPage);
                }
            }
             $attribute = '';

            return view('referalAgreement.referal-agreement.index', compact('referalagreement','attribute'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('referalAgreement.referal-agreement.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            ReferalAgreement::create($requestData);
            return redirect('referalAgreement/referal-agreement')->with('flash_message', 'ReferalAgreement added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $referalagreement = ReferalAgreement::findOrFail($id);
            return view('referalAgreement.referal-agreement.show', compact('referalagreement'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $referalagreement = ReferalAgreement::findOrFail($id);
            return view('referalAgreement.referal-agreement.edit', compact('referalagreement'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $referalagreement = ReferalAgreement::findOrFail($id);
             $referalagreement->update($requestData);

             return redirect('referalAgreement/referal-agreement')->with('flash_message', 'ReferalAgreement updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('referalagreement','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ReferalAgreement::destroy($id);

            return redirect('referalAgreement/referal-agreement')->with('flash_message', 'ReferalAgreement deleted!');
        }
        return response(view('403'), 403);

    }
}
