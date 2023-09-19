<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 250;

            if (!empty($keyword)) {
                $group = Group::where('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $group = Group::paginate($perPage);
            }

            return view('group.group.index', compact('group'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('group.group.create');
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['image']=$this->storeImage('group',$request->image)??""; 
            Group::create($requestData);
            return redirect('group/group')->with('flash_message', 'Group added!');
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $group = Group::findOrFail($id);
            return view('group.group.show', compact('group'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $group = Group::findOrFail($id);
            return view('group.group.edit', compact('group'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $group = Group::findOrFail($id);
            if ($request->hasFile('image')) {
                $requestData['image']=$this->storeImage('group',$request->image)??"";            
                $this->deleteImage($group->image)??"";
            }else{
                $requestData['image'] = $group->image??"";
            }//end if else.
             $group->update($requestData);

             return redirect('group/group')->with('flash_message', 'Group updated!');
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Group::destroy($id);

            return redirect('group/group')->with('flash_message', 'Group deleted!');
        }
        return response(view('403'), 403);

    }
}
