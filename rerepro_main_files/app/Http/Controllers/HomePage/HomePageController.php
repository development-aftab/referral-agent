<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $homepage = HomePage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $homepage = HomePage::paginate($perPage);
            }

            return view('homePage.home-page.index', compact('homepage'));
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('homePage.home-page.create');
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['image']=$this->storeImage('homepage',$request->image)??"";
            HomePage::create($requestData);
            return redirect('homePage/home-page')->with('flash_message', 'HomePage added!');
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $homepage = HomePage::findOrFail($id);
            return view('homePage.home-page.show', compact('homepage'));
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $homepage = HomePage::findOrFail($id);
            return view('homePage.home-page.edit', compact('homepage'));
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $homepage = HomePage::findOrFail($id);
            if ($request->hasFile('image')) {
                $requestData['image']=$this->storeImage('homepage',$request->image)??"";            
                $this->deleteImage($homepage->image)??"";
            }else{
                $requestData['image'] = $homepage->image??"";
            }//end if else.
             $homepage->update($requestData);

             return redirect('homePage/home-page')->with('flash_message', 'HomePage updated!');
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
        $model = str_slug('homepage','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            HomePage::destroy($id);

            return redirect('homePage/home-page')->with('flash_message', 'HomePage deleted!');
        }
        return response(view('403'), 403);

    }
}
