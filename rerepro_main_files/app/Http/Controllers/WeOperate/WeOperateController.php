<?php

namespace App\Http\Controllers\WeOperate;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\WeOperate;
use Illuminate\Http\Request;

class WeOperateController extends Controller
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $weoperate = WeOperate::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $weoperate = WeOperate::paginate($perPage);
            }

            return view('weOperate.we-operate.index', compact('weoperate'));
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('weOperate.we-operate.create');
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            WeOperate::create($requestData);
            return redirect('weOperate/we-operate')->with('flash_message', 'WeOperate added!');
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $weoperate = WeOperate::findOrFail($id);
            return view('weOperate.we-operate.show', compact('weoperate'));
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $weoperate = WeOperate::findOrFail($id);
            return view('weOperate.we-operate.edit', compact('weoperate'));
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $weoperate = WeOperate::findOrFail($id);
             $weoperate->update($requestData);

             return redirect('weOperate/we-operate')->with('flash_message', 'WeOperate updated!');
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
        $model = str_slug('weoperate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            WeOperate::destroy($id);

            return redirect('weOperate/we-operate')->with('flash_message', 'WeOperate deleted!');
        }
        return response(view('403'), 403);

    }
}
