<?php

namespace App\Http\Controllers\PaymentDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PaymentDetail;
use Illuminate\Http\Request;

class PaymentDetailController extends Controller
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $paymentdetail = PaymentDetail::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('receipt_url', 'LIKE', "%$keyword%")
                ->orWhere('invoice_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $paymentdetail = PaymentDetail::orderBy('id', 'ASC')->groupBy('user_id')->paginate($perPage);
            }
            $type = 0;
            return view('paymentDetail.payment-detail.index', compact('paymentdetail','type'));
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('paymentDetail.payment-detail.create');
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            PaymentDetail::create($requestData);
            return redirect('paymentDetail/payment-detail')->with('flash_message', 'PaymentDetail added!');
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $paymentdetail = PaymentDetail::findOrFail($id);
            return view('paymentDetail.payment-detail.show', compact('paymentdetail'));
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $paymentdetail = PaymentDetail::findOrFail($id);
            return view('paymentDetail.payment-detail.edit', compact('paymentdetail'));
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $paymentdetail = PaymentDetail::findOrFail($id);
             $paymentdetail->update($requestData);

             return redirect('paymentDetail/payment-detail')->with('flash_message', 'PaymentDetail updated!');
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
        $model = str_slug('paymentdetail','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            PaymentDetail::destroy($id);

            return redirect('paymentDetail/payment-detail')->with('flash_message', 'PaymentDetail deleted!');
        }
        return response(view('403'), 403);

    }
}
