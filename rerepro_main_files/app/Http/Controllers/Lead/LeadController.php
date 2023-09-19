<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Lead;
use App\LeadImage;
use Illuminate\Http\Request;
use Storage;
class LeadController extends Controller
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
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $lead = Lead::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('zipcode', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $lead = Lead::paginate($perPage);
            }

            return view('lead.lead.index', compact('lead'));
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
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('lead.lead.create');
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
      // return   $request->all();
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['agent_id']= Auth::id();
           $lead = Lead::create($requestData);
            foreach ($request->images as $key => $value) {
              $image=Storage::disk('website')->put('uploads/leads',$value['lead_image']);
              LeadImage::create(['lead_id'=>$lead->id,'image'=>$image]);
            }
            return redirect('lead/lead')->with('flash_message', 'Lead added!');
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
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $lead = Lead::findOrFail($id);
            return view('lead.lead.show', compact('lead'));
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
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $lead = Lead::findOrFail($id);
            $leadImage = LeadImage::where('lead_id',$id)->get();
            return view('lead.lead.edit', compact('lead','leadImage'));
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
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $lead = Lead::findOrFail($id);
             $lead->update($requestData);
            if(isset($request->images)){
             foreach ($request->images as $key => $value) {
              $image=Storage::disk('website')->put('uploads/leads',$value['lead_image']);
              LeadImage::create(['lead_id'=>$id,'image'=>$image]);
              }
            }  
             return redirect('lead/lead')->with('flash_message', 'Lead updated!');
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
        $model = str_slug('lead','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Lead::destroy($id);

            return redirect('lead/lead')->with('flash_message', 'Lead deleted!');
        }
        return response(view('403'), 403);

    }
}
