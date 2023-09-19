<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $socialmedia = SocialMedia::where('icon', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $socialmedia = SocialMedia::paginate($perPage);
            }

            return view('socialMedia.social-media.index', compact('socialmedia'));
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('socialMedia.social-media.create');
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            SocialMedia::create($requestData);
            return redirect('socialMedia/social-media')->with('flash_message', 'SocialMedia added!');
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $socialmedia = SocialMedia::findOrFail($id);
            return view('socialMedia.social-media.show', compact('socialmedia'));
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $socialmedia = SocialMedia::findOrFail($id);
            return view('socialMedia.social-media.edit', compact('socialmedia'));
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $socialmedia = SocialMedia::findOrFail($id);
             $socialmedia->update($requestData);

             return redirect('socialMedia/social-media')->with('flash_message', 'SocialMedia updated!');
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SocialMedia::destroy($id);

            return redirect('socialMedia/social-media')->with('flash_message', 'SocialMedia deleted!');
        }
        return response(view('403'), 403);

    }
}
