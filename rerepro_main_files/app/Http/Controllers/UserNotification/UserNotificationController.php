<?php

namespace App\Http\Controllers\UserNotification;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\UserNotification;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $usernotification = UserNotification::where('sender_id', 'LIKE', "%$keyword%")
                ->orWhere('receiver_id', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('redirect_url', 'LIKE', "%$keyword%")
                ->orWhere('is_viewed_by_agent', 'LIKE', "%$keyword%")
                ->orWhere('is_viewed_by_admin', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $usernotification = UserNotification::paginate($perPage);
            }

            return view('userNotification.user-notification.index', compact('usernotification'));
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('userNotification.user-notification.create');
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            UserNotification::create($requestData);
            return redirect('userNotification/user-notification')->with('flash_message', 'UserNotification added!');
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $usernotification = UserNotification::findOrFail($id);
            return view('userNotification.user-notification.show', compact('usernotification'));
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $usernotification = UserNotification::findOrFail($id);
            return view('userNotification.user-notification.edit', compact('usernotification'));
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $usernotification = UserNotification::findOrFail($id);
             $usernotification->update($requestData);

             return redirect('userNotification/user-notification')->with('flash_message', 'UserNotification updated!');
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
        $model = str_slug('usernotification','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            UserNotification::destroy($id);

            return redirect('userNotification/user-notification')->with('flash_message', 'UserNotification deleted!');
        }
        return response(view('403'), 403);

    }
}
