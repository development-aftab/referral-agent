<?php

namespace App\Http\Controllers\BuyerAndSeller;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BuyerAndSeller;
use Illuminate\Http\Request;

class BuyerAndSellerController extends Controller
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $buyerandseller = BuyerAndSeller::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $buyerandseller = BuyerAndSeller::paginate($perPage);
            }

            return view('buyerAndSeller.buyer-and-seller.index', compact('buyerandseller'));
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('buyerAndSeller.buyer-and-seller.create');
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['image']=$this->storeImage('images',$request->image)??"";
            BuyerAndSeller::create($requestData);
            return redirect('buyerAndSeller/buyer-and-seller')->with('flash_message', 'BuyerAndSeller added!');
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $buyerandseller = BuyerAndSeller::findOrFail($id);
            return view('buyerAndSeller.buyer-and-seller.show', compact('buyerandseller'));
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $buyerandseller = BuyerAndSeller::findOrFail($id);
            return view('buyerAndSeller.buyer-and-seller.edit', compact('buyerandseller'));
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $buyerandseller = BuyerAndSeller::findOrFail($id);
            if ($request->hasFile('image')) {
                $requestData['image']=$this->storeImage('images',$request->image)??"";
                $this->deleteImage($buyerandseller->image)??"";
            }else{
                $requestData['image'] = $buyerandseller->image??"";
            }//end if else.
             $buyerandseller->update($requestData);

             return redirect('buyerAndSeller/buyer-and-seller')->with('flash_message', 'BuyerAndSeller updated!');
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
        $model = str_slug('buyerandseller','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            BuyerAndSeller::destroy($id);

            return redirect('buyerAndSeller/buyer-and-seller')->with('flash_message', 'BuyerAndSeller deleted!');
        }
        return response(view('403'), 403);

    }
}
