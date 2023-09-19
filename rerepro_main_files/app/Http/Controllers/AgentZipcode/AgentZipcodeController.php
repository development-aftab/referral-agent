<?php

namespace App\Http\Controllers\AgentZipcode;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\AgentZipcode;
use Illuminate\Http\Request;

class AgentZipcodeController extends Controller
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
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 500;

            if (!empty($keyword)) {
                $agentzipcode = AgentZipcode::where('address', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('zipcode', 'LIKE', "%$keyword%")
                ->orWhere('agent_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $count = AgentZipcode::where('agent_id',Auth::id())->count();
                $agentzipcode = AgentZipcode::paginate(50);
            }

            return view('agentZipcode.agent-zipcode.index', compact('agentzipcode','count'));
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
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('agentZipcode.agent-zipcode.create');
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
        // return $request->all();die;
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->sub=='basic'){
                $sub='n';
            }else{
                $sub='p';
            }

           AgentZipcode::create(['city'=>$request->city,'lat'=>$request->lat,'lng'=>$request->lng,'address'=>$request->address,'state'=>$request->state,'zipcode'=>$request->zipcode,'agent_id'=>Auth::id(),'sub'=>$sub]);
            return redirect('agentZipcode/agent-zipcode')->with('flash_message', 'AgentZipcode added!');
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
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $agentzipcode = AgentZipcode::findOrFail($id);
            return view('agentZipcode.agent-zipcode.show', compact('agentzipcode'));
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
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $agentzipcode = AgentZipcode::findOrFail($id);
            return view('agentZipcode.agent-zipcode.edit', compact('agentzipcode'));
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
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $agentzipcode = AgentZipcode::findOrFail($id);

             $agentzipcode->update(['city'=>$request->city,'lat'=>$request->lat,'lng'=>$request->lng,'address'=>$request->address,'state'=>$request->state,'zipcode'=>$request->zipcode,'agent_id'=>Auth::id()]);

             return redirect('agentZipcode/agent-zipcode')->with('flash_message', 'AgentZipcode updated!');
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
        $model = str_slug('agentzipcode','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            // AgentZipcode::destroy($id);
             AgentZipcode::where('id',$id)->forceDelete();
            return redirect('agentZipcode/agent-zipcode')->with('flash_message', 'AgentZipcode deleted!');
        }
        return response(view('403'), 403);

    }
}
