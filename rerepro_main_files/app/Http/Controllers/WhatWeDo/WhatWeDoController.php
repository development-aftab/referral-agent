<?php

namespace App\Http\Controllers\WhatWeDo;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\WhatWeDo;
use Illuminate\Http\Request;

class WhatWeDoController extends Controller
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $whatwedo = WhatWeDo::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $whatwedo = WhatWeDo::paginate($perPage);
            }

            return view('whatWeDo.what-we-do.index', compact('whatwedo'));
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('whatWeDo.what-we-do.create');
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['image']=$this->storeImage('whatwedo',$request->image)??""; 
            WhatWeDo::create($requestData);
            return redirect('whatWeDo/what-we-do')->with('flash_message', 'WhatWeDo added!');
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $whatwedo = WhatWeDo::findOrFail($id);
            return view('whatWeDo.what-we-do.show', compact('whatwedo'));
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $whatwedo = WhatWeDo::findOrFail($id);
            return view('whatWeDo.what-we-do.edit', compact('whatwedo'));
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $whatwedo = WhatWeDo::findOrFail($id);
            if ($request->hasFile('image')) {
                $requestData['image']=$this->storeImage('whatwedo',$request->image)??"";            
                $this->deleteImage($whatwedo->image)??"";
            }else{
                $requestData['image'] = $whatwedo->image??"";
            }//end if else.
             $whatwedo->update($requestData);

             return redirect('whatWeDo/what-we-do')->with('flash_message', 'WhatWeDo updated!');
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
        $model = str_slug('whatwedo','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            WhatWeDo::destroy($id);

            return redirect('whatWeDo/what-we-do')->with('flash_message', 'WhatWeDo deleted!');
        }
        return response(view('403'), 403);

    }
}
