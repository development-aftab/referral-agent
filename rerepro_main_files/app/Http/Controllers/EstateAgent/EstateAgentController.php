<?php

namespace App\Http\Controllers\EstateAgent;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EstateAgent;
use Illuminate\Http\Request;

class EstateAgentController extends Controller
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $estateagent = EstateAgent::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $estateagent = EstateAgent::paginate($perPage);
            }

            return view('estateAgent.estate-agent.index', compact('estateagent'));
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('estateAgent.estate-agent.create');
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['image']=$this->storeImage('images',$request->image)??""; 
            EstateAgent::create($requestData);
            return redirect('estateAgent/estate-agent')->with('flash_message', 'EstateAgent added!');
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $estateagent = EstateAgent::findOrFail($id);
            return view('estateAgent.estate-agent.show', compact('estateagent'));
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $estateagent = EstateAgent::findOrFail($id);
            return view('estateAgent.estate-agent.edit', compact('estateagent'));
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $estateagent = EstateAgent::findOrFail($id);
            if ($request->hasFile('image')) {
                $requestData['image']=$this->storeImage('images',$request->image)??"";            
                $this->deleteImage($estateagent->image)??"";
            }else{
                $requestData['image'] = $estateagent->image??"";
            }//end if else.
             $estateagent->update($requestData);

             return redirect('estateAgent/estate-agent')->with('flash_message', 'EstateAgent updated!');
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
        $model = str_slug('estateagent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            EstateAgent::destroy($id);

            return redirect('estateAgent/estate-agent')->with('flash_message', 'EstateAgent deleted!');
        }
        return response(view('403'), 403);

    }
}
