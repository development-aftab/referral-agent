<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Agent;
use App\User;
use Illuminate\Http\Request;

class AgentController extends Controller
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $agent = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->orWhere('brokerage_company', 'LIKE', "%$keyword%")
                ->orWhere('brokerage_company_phone', 'LIKE', "%$keyword%")
                ->orWhere('brokerage_company_address', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('license_number', 'LIKE', "%$keyword%")
                ->orWhere('license_state', 'LIKE', "%$keyword%")
                ->orWhere('managing_broker_name', 'LIKE', "%$keyword%")
                ->paginate(100);
            } else {
                $agent = User::paginate(100);
            }

            return view('agent.agent.index', compact('agent'));
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('agent.agent.create');
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Agent::create($requestData);
            return redirect('agent/agent')->with('flash_message', 'Agent added!');
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $agent = User::findOrFail($id);
            return view('agent.agent.show', compact('agent'));
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $agent = Agent::findOrFail($id);
            return view('agent.agent.edit', compact('agent'));
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $agent = Agent::findOrFail($id);
             $agent->update($requestData);

             return redirect('agent/agent')->with('flash_message', 'Agent updated!');
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            // Agent::destroy($id);
             User::where('id', $id)->forceDelete();
            return redirect('agent/agent')->with('flash_message', 'Agent deleted!');
        }
        return response(view('403'), 403);

    }
}
