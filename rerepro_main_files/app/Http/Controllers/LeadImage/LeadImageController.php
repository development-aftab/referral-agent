<?php

namespace App\Http\Controllers\LeadImage;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\LeadImage;
use Illuminate\Http\Request;

class LeadImageController extends Controller
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $leadimage = LeadImage::where('lead_id', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $leadimage = LeadImage::paginate($perPage);
            }

            return view('leadImage.lead-image.index', compact('leadimage'));
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('leadImage.lead-image.create');
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            LeadImage::create($requestData);
            return redirect('leadImage/lead-image')->with('flash_message', 'LeadImage added!');
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $leadimage = LeadImage::findOrFail($id);
            return view('leadImage.lead-image.show', compact('leadimage'));
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $leadimage = LeadImage::findOrFail($id);
            return view('leadImage.lead-image.edit', compact('leadimage'));
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $leadimage = LeadImage::findOrFail($id);
             $leadimage->update($requestData);

             return redirect('leadImage/lead-image')->with('flash_message', 'LeadImage updated!');
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
        $model = str_slug('leadimage','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            LeadImage::destroy($id);

            return redirect('leadImage/lead-image')->with('flash_message', 'LeadImage deleted!');
        }
        return response(view('403'), 403);

    }
}
