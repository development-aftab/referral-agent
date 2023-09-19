<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\LeadImage;
use App\Lead;
use App\UserNotification;
use App\ReferalAgreement;
use App\PaymentDetail;
use App\EstateAgent;
use App\HomePage;
use App\WeOperate;
use App\WhatWeDo;
use App\Group;
use App\AgentZipcode;
use App\BuyerAndSeller;

use Illuminate\Support\Facades\Auth;
use Storage;
use Session;
use DB;
use View;
use Mail;
use Carbon\Carbon;
use \Stripe\Stripe;
use \Stripe\Customer;
use \Stripe\ApiOperations\Create;
use \Stripe\Charge;
use PDF;
use File;
class WebsiteController extends Controller{
   
    
    public function index(Request $request){
     $home = HomePage::first();
     $weoperate = WeOperate::first();
     $whatwedo = WhatWeDo::first();
     $group = Group::get();
     $estateagent = EstateAgent::first();
     $buyerandseller = BuyerAndSeller::first();
       return view('website.index',compact('home','weoperate','whatwedo','group','estateagent','buyerandseller'));
    }//end index function. 
    public function requestType($type){
       Session::forget('request_type_plan');
       return Session::put('request_type_plan',$type);
    }//end index function.  
    public function pakages(){
       return view('website.pakages');
    }//end index function. 
    public function checkEmail(Request $request){
      if(User::where('email',$request->email)->first()){
           return response()->json(['msg'=>'taken']); 
      }else{
           return response()->json(['msg'=>'not_taken']);
      }
    }//end cleanBulk function.
    public function searchLeadsState($stat){
        
         $search = 'multi';
         
         $agents =  AgentZipcode::where('state',$stat)->where('status',1)->groupBy('agent_id')->orderBy('sub','DESC')->get();
         $agreement = ReferalAgreement::where(function($query){
                                  $query->where('sender_id',Auth::id())->where('receiver_sing',1)->where('sender_sing',1)->where('status',2);
                                })->orWhere(function ($query){
                                     $query->where('receiver_id',Auth::id())->where('receiver_sing',1)->where('sender_sing',1)->where('status',2);
                                })->get();
          $sent =   $agreement->pluck('receiver_id')->toArray();   
          $recevied =  $agreement->pluck('sender_id')->toArray(); 
          $past_agreement =  array_merge($sent,$recevied); 
          
         return view('website.searchListing',compact('agents','search','past_agreement'));
      
    }//end index function.  
    public function searchLeadsStateZip($stat,$zipcode,$lat,$lon){
        try{

            $search = 'singal';
            $zipcodeUsed = ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zipcode)->where('status',0)->count();
            $agents =  AgentZipcode::where('state',$stat)->where('status',1)->where('zipcode',$zipcode)->groupBy('agent_id')->orderBy('sub','DESC')->get();
            $agents_avable =  AgentZipcode::where('state',$stat)->where('status',1)->where('zipcode',$zipcode)->pluck('agent_id')->toArray();
            $agreement = ReferalAgreement::where(function($query){
                $query->where('sender_id',Auth::id())->where('receiver_sing',1)->where('sender_sing',1)->where('status',2);
            })->orWhere(function ($query){
                $query->where('receiver_id',Auth::id())->where('receiver_sing',1)->where('sender_sing',1)->where('status',2);
            })->get();
            $sent =   $agreement->pluck('receiver_id')->toArray();
            $recevied =  $agreement->pluck('sender_id')->toArray();
            $past_agreement =  array_merge($sent,$recevied);
            $count = count($agents);
            $agentsradios = $this->findNearestRestaurants($lat,$lon,$radius = 30);
            $agent_count = array();
            foreach ($agentsradios as $element){
                if(in_array($element->agent_id,$agent_count) || in_array($element->agent_id,$agents_avable))  {

                }else{
                    array_push($agent_count,$element->agent_id);
                }
            }



            if(count($agent_count)== 0 && count($agents_avable) == 0){
                return $this->searchLeadsState($stat);
            }else{

                return view('website.searchListing',compact('agents_avable','agents','zipcode','zipcodeUsed','search','past_agreement','agentsradios','agent_count'));
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error_log', 'Invalid Data Input!');;
        }//end

        
    }//end index function.
    public function mailchipSubcription(Request $request,$email){
        try{
//            $email = 'development.aftab@gmail.com';
            $list_id = 'fa4de5d30e';
            $authToken = '3eeded2685026d39a604fecdf7b4875e-us14';
            $postData = array(
                "email_address" => $email??'development.aftab@gmail.com',
                "status" => "subscribed",
            );
            $ch = curl_init('https://us14.api.mailchimp.com/3.0/lists/'.$list_id.'/members/');
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: apikey '.$authToken,
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            ));
            $response = curl_exec($ch);
            $result = json_decode($response);
              
            if ($result->status=='subscribed'){
                return ['type'=>'success','msg'=>'Successfully Subscribed'];
            }else{
                return ['type'=>'error','msg'=>$result->title??''];
            }//end if.
        }catch (\Exception $e){
            return ['type'=>'error','msg'=>'Unable to process request try again'];
        }//end
    }
   
    public function searchLeads(){
      $leads  = Lead::orderBy('sub','DESC')->get();
      return view('website.searchListing',compact('leads'));
    }//end index function. 
    public function pastReferral(){
      // $lead = ReferalAgreement::where('id',$id)->get();
       $agreement = ReferalAgreement::where(function($query){
                                  $query->where('sender_id',Auth::id())->where('receiver_sing',1)->where('sender_sing',1)->where('status',2);
                                })->orWhere(function ($query){
                                     $query->where('receiver_id',Auth::id())->where('receiver_sing',1)->where('sender_sing',1)->where('status',2);
                                })->get();
        $sent =   $agreement->pluck('receiver_id')->toArray();   
        $recevied =  $agreement->pluck('sender_id')->toArray();
        $margeids =  array_merge($sent,$recevied);
        $ids = array_diff($margeids,[Auth::id()]);
      $users =  User::whereIn('id',$ids)->get();
         return view('referalAgreement.referal-agreement.past_users',compact('users'));
    }//end index function. 
    public function pastAgermentsView($id){
      $referalagreement = ReferalAgreement::where(function($query) use ($id) {
                                  $query->where('sender_id',$id)->where('status',2);
                                })->orWhere(function ($query) use ($id) {
                                    $query->where('receiver_id',$id)->where('status',2);
                                })->orderBy('created_at', 'ASC')->get();
     return view('referalAgreement.referal-agreement.past_agerments_view',compact('referalagreement'));
    }//end index function.
    public function termsAndConditions(){
      return view('website.terms_and_conditions');
    }//end index function. 
    public function privacyPolicy(){
      return view('website.privacy_policy');
    }//end index function.
    public function whatWeDoMore(){
      return view('website.What_We_Do');
    }//end index function.
    public function reasonsToJoin(){
      return view('website.What_We_Do');
    }//end index function. 
    public function pastCertificate($id){
       $lead = ReferalAgreement::where('id',$id)->first();
      return view('referalAgreement.referal-agreement.past_certificate',compact('lead'));
    }//end index function.
    public function agentAgermentsModal($id){
      $referalagreement = ReferalAgreement::where(function($query) use ($id) {
                                  $query->where('sender_id',$id)->where('status',2);
                                })->orWhere(function ($query) use ($id) {
                                    $query->where('receiver_id',$id)->where('status',2);
                                })->orderBy('created_at', 'ASC')->get();
      return (string) view('website.agent_agreements',compact('referalagreement')); 
    }//end index function. 
    public function webGetCertificate($id){
        $lead = ReferalAgreement::where('id',$id)->first();
       return view('website.web_certificate_show',compact('lead'));
    }//end index function. 
    public function referralAgreement($id){
        $lead = User::where('id',$id)->first();
       return view('website.referral_agreement',compact('lead'));
    }//end index function.
    public function agentStatus($id,$status){
      if($status == 1){
         $status = 2;
      }else{
         $status = 1;
      }
      User::where('id',$id)->update(['status'=>$status]);
      AgentZipcode::where('agent_id',$id)->update(['status'=>$status]);
      return back()->with('flash_message', 'Agent Updated');
    }//end index function. 
    public function getCertificate($id){
        $lead = ReferalAgreement::where('id',$id)->first();
       return view('referalAgreement.referal-agreement.certificate',compact('lead'));
    }//end index function. 
    public function LeadSend(){
        $referalagreement = ReferalAgreement::where('sender_id',Auth::id())->where('status','!=',2)->paginate(10);
        $attribute = 'Send';
        return view('referalAgreement.referal-agreement.index', compact('referalagreement','attribute'));
    }//end index function.  
    public function LeadRecevied(){
        $referalagreement = ReferalAgreement::where('receiver_id',Auth::id())->where('receiver_sing',1)->where('status',0)->paginate(10);
        $attribute = 'Recevied';
        return view('referalAgreement.referal-agreement.index', compact('referalagreement','attribute'));
    }//end index function. 
    public function dashboard(Request $request){
      if(Auth::user()->hasRole('agent')){ 
          if(Auth::user()->request == 1 && Auth::user()->status == 1 ){
           $receviedcount = ReferalAgreement::where('receiver_id',Auth::id())->where('receiver_sing',1)->where('status',0)->count();
           $pending = ReferalAgreement::where('sender_id',Auth::id())->where('status',0)->count();
           
           $reqagreement = ReferalAgreement::where('receiver_id',Auth::id())->where('receiver_sing',0)->where('status',0)->get();
           $referalagreement = ReferalAgreement::where(function($query) use ($request) {
                                  $query->where('sender_id',Auth::id())->where('status',2);
                                })->orWhere(function ($query) use ($request) {
                                    $query->where('receiver_id',Auth::id())->where('status',2);
                                })->orderBy('created_at', 'ASC')->get();
                               
           return view('dashboard.index',compact('referalagreement','reqagreement','receviedcount','pending'));

          }elseif (Auth::user()->status == 2) {
            Session::put('user_deactivate','1');
           return redirect('logout')->with('error_log', 'Please wait for admin approval!');
          }
      }else{
        $pendingcount = ReferalAgreement::where('status',0)->count();
        $receviedcount = ReferalAgreement::where('status',2)->count();
        $totalearing = PaymentDetail::sum('amount');
        $reqagreement = ReferalAgreement::orderBy('id','DESC')->get();
        $user_count = User::whereHas(
                      'roles', function($q){
                          $q->where('id',3);
                      }
                )->count();
        $user = User::whereHas(
                      'roles', function($q){
                          $q->where('id',3);
                      }
                )->get();
        return view('dashboard.index',compact('receviedcount','reqagreement','user_count','user','pendingcount','totalearing'));
      }  
    }//end index function.
     public function signUp($pak,$price){
       return view('website.sign_up',compact('pak','price'));
    }//end index function. 
     public function benefitsOfMembership(){
       return view('website.basic_membership');
    }//end index function. 
    public function acceptAgent($id){
        User::where('id',$id)->update(['request'=>'1']);
         return back();
    }//end index function. 
    public function buyerLeadSend(Request $request){
       ReferalAgreement::create(['sender_id'=>Auth::id(),'receiver_id'=>$request->agent_id,'Location'=>$request->area,'zipcode'=>$request->zipcode,'sender_sing'=>0,'receiver_sing'=>0,'status'=>0,'lead_type'=>'Buying','name'=>$request->name,'address'=>$request->address,'phone'=>$request->phone,'email'=>$request->email,'comments'=>$request->comments]);
       UserNotification::create(['sender_id'=>Auth::id(),'receiver_id'=>$request->agent_id,'type'=>'buyerleadsend','description'=>'Agent send lead request','redirect_url'=>'dashboard','is_viewed_by_agent'=>0,'is_viewed_by_admin'=>1]);
       try {
          $user = User::where('id',$request->agent_id)->first();
           $data = [
               'no_reply'      => 'info@Referral-Agent.com',
               'email'         => $user->email,
               'name'          => $user->name,
               'subject'       => 'You have a new lead on Referral-Agent.com'
            ];
            $result = Mail::send('website.email.new_lead_templete',['data' => $data], function ($message) use ($data) {
               $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
           });
           $data_me = [
             'no_reply'      => 'info@Referral-Agent.com',
             'email'         => Auth::user()->email,
             'name'          => Auth::user()->name,
             'subject'       => 'You have a new lead on Referral-Agent.com'
           ];
           $result = Mail::send('website.email.set_lead_by_me',['data_me' => $data_me], function ($message) use ($data_me) {
             $message->from($data_me['no_reply'])->to($data_me['email'])->subject($data_me['subject']);
           });
        } catch (\Exception $e) {
           return $e->getMessage();
        }
       return response(['result'=>'success','msg'=>'Successful']);
    }//end index function.
    public function sallerLeadSend(Request $request){
       ReferalAgreement::create(['sender_id'=>Auth::id(),'receiver_id'=>$request->agent_id,'Location'=>$request->area,'zipcode'=>$request->zipcode,'sender_sing'=>0,'receiver_sing'=>0,'status'=>0,'lead_type'=>'Selling','name'=>$request->name,'address'=>$request->address,'phone'=>$request->phone,'email'=>$request->email,'comments'=>$request->comments]);
       UserNotification::create(['sender_id'=>Auth::id(),'receiver_id'=>$request->agent_id,'type'=>'sallerleadsend','description'=>'Agent send lead request','redirect_url'=>'dashboard','is_viewed_by_agent'=>0,'is_viewed_by_admin'=>1]);
        try {
          $user = User::where('id',$request->agent_id)->first();
           $data = [
               'no_reply'      => 'info@Referral-Agent.com',
               'email'         => $user->email,
               'name'          => $user->name,
               'subject'       => 'You have a new lead on Referral-Agent.com'
            ];
            $result = Mail::send('website.email.new_lead_templete',['data' => $data], function ($message) use ($data) {
               $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
           });
            $data_me = [
               'no_reply'      => 'info@Referral-Agent.com',
               'email'         => Auth::user()->email,
               'name'          => Auth::user()->name,
               'subject'       => 'You have sent a new lead on Referral-Agent.com'
            ];
            $result = Mail::send('website.email.set_lead_by_me',['data_me' => $data_me], function ($message) use ($data_me) {
               $message->from($data_me['no_reply'])->to($data_me['email'])->subject($data_me['subject']);
           });
        } catch (\Exception $e) {
           return $e->getMessage();
        }

       return response(['result'=>'success','msg'=>'Successful']);
    }//end index function. 
    public function rejectAgent($id){
        User::where('id',$id)->forceDelete();
         return back();
    }//end index function. 
     public function getPaymentButton(Request $request){
      $val= $request->val;
        return (string) view('website.ajax.button_submit',compact('val'));
    }//end index function. 
    public function userNotification(){
        if(Auth::user()->hasRole('agent')){
         $noti =  UserNotification::where('receiver_id',Auth::id())->where('is_viewed_by_agent',0)->get();
        }else{
         $noti = UserNotification::where('is_viewed_by_admin',0)->get();
        }
         return (string) view('website.ajax.notification',compact('noti')); 
        
    }//end index function.
    public function removeImageLead($id){
        LeadImage::where('id',$id)->delete();
         return response(['result'=>'success','msg'=>'Successful']);
    }//end index function.
    public function leadCancel($id){
        ReferalAgreement::where('id',$id)->update(['status'=>3]);
        $Referal= ReferalAgreement::where('id',$id)->first();
        UserNotification::create(['sender_id'=>$Referal->sender_id,'receiver_id'=>$Referal->receiver_id,'type'=>'leadcanceled','description'=>'Agent request canceled','redirect_url'=>'dashboard','is_viewed_by_agent'=>0,'is_viewed_by_admin'=>1]);
         return back()->with('flash_message', 'Lead is canceled!');
    }//end index function.
     public function leadSendAccept($id){
        ReferalAgreement::where('id',$id)->update(['status'=>2,'sender_sing'=>1]);
        $Referal= ReferalAgreement::where('id',$id)->first();
        UserNotification::create(['sender_id'=>$Referal->sender_id,'receiver_id'=>$Referal->receiver_id,'type'=>'makeageement','description'=>'Agent create agreement','redirect_url'=>'/referalAgreement/referal-agreement','is_viewed_by_agent'=>0,'is_viewed_by_admin'=>0]);
         return back()->with('flash_message', 'Lead Agreement Created!');
    }//end index function.
    public function leadReceverAccept($id){
        ReferalAgreement::where('id',$id)->update(['receiver_sing'=>1,'recever_date'=>Carbon::parse(Carbon::now())->format("Y-m-d")]);
        $Referal= ReferalAgreement::where('id',$id)->first();
        UserNotification::create(['sender_id'=>$Referal->receiver_id,'receiver_id'=>$Referal->sender_id,'type'=>'agentacceptlead','description'=>'Agent request accepted','redirect_url'=>'Lead_send','is_viewed_by_agent'=>0,'is_viewed_by_admin'=>1]);
        try {
           $me = User::where('id',$Referal->sender_id)->first();
           $user = User::where('id',$Referal->receiver_id)->first();
           $data = ['Sender' =>$me->name,'Receiver' =>$user->name,'Area' =>$Referal->location,'ZipCode' =>$Referal->zipcode,'Lead_Type' =>$Referal->lead_type];
           $pdf = PDF::loadView('website.ajax.lead_pdf', $data);
           $pdf->download('leadinfomation.pdf');
           $data = [
               'no_reply'      => 'info@Referral-Agent.com',
               'email'         => $user->email,
               'name'          => $user->name,
               'subject'       => 'You have accepted a new lead on Referral-Agent.com'
            ];

            $result = Mail::send('website.email.lead_accepted',['data' => $data], function ($message) use ($data,$pdf) {
               $message->from($data['no_reply'])->to($data['email'])->cc('development.aftab@gmail.com')->subject($data['subject'])->attachData($pdf->output(),'leadInformation.Pdf');
           });
            $data_me = [
               'no_reply'      => 'info@Referral-Agent.com',
               'email'         => $me->email,
               'name'          => $me->name,
               'subject'       => 'You have successfully passed a new lead on Referral-Agent.com!'
            ];
            $result = Mail::send('website.email.lead_accepted_by_me',['data_me' => $data_me], function ($message) use ($data_me,$pdf) {
               $message->from($data_me['no_reply'])->to($data_me['email'])->subject($data_me['subject'])->attachData($pdf->output(),'leadInformation.Pdf');
           });
        } catch (\Exception $e) {
           return $e->getMessage();
        }

         return redirect('lead_recevied')->with('flash_message', 'Please Wait For Sender!');
    }//end index function.
    public function leadReceverReject($id){
        ReferalAgreement::where('id',$id)->update(['status'=>4]);
        $Referal= ReferalAgreement::where('id',$id)->first();
        UserNotification::create(['sender_id'=>$Referal->receiver_id,'receiver_id'=>$Referal->sender_id,'type'=>'agentrejectlead','description'=>'Agent request rejected','redirect_url'=>'Lead_send','is_viewed_by_agent'=>0,'is_viewed_by_admin'=>1]);
         return back()->with('flash_message', 'Lead Agreement Rejected!');
    }//end index function.
    public function signUpProcess(Request $request){

     
     extract($request->all());
      $usersimage='';
      if($sub != 'basic'){
      try {  
      
         $stripe = new \Stripe\StripeClient('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');
          $date = explode('/', $request->card_expiry);
          $token = $stripe->tokens->create([
              'card' => [
                'number' => $request->card_number,
                'exp_month' =>(int)$date[0],
                'exp_year' =>(int)$date[1],
                'cvc' => $request->cvv,
              ],
            ]);
           Stripe::setApiKey('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');
                    $customer = Customer::create(array(
                        'email' => $request->strip_email,
                        'source' => $token['id']
                    ));
         
           $stripe_charge = Charge::create(array(
              'customer' => $customer->id,
              'amount' =>  $price*100,
              'currency' => 'usd'
           )); 
        if (isset($stripe_charge)) {
           if($sub == 'yearly'){
              $startdate = Carbon::parse(Carbon::now())->format("Y-m-d");
              $enddate = Carbon::parse($startdate)->addYear()->format("Y-m-d");
           }elseif($sub == 'monthly'){
              $startdate = Carbon::parse(Carbon::now())->format("Y-m-d");
              $enddate = Carbon::parse($startdate)->addMonths()->format("Y-m-d");
           }
           if ($request->hasFile('profle_image')) {
              $file = $request->file('profle_image');
              $extension = $file->extension()?: 'png';
              $destinationPath = public_path() . '/storage/uploads/users/';
              $safeName = str_random(10) . '.' . $extension;
              $file->move($destinationPath, $safeName);
              $usersimage = $safeName;
              $usersimage = str_replace('uploads/users','',$usersimage);
          }
          if ($request->hasFile('company_logo')) {
                    $company_logo=Storage::disk('website')->put('images',$request->company_logo??'');           
          }else{
            $company_logo = '';
          }
          $user =   User::create(['name'=>$name,'email'=>$email,'password'=>bcrypt($password),'show_pass'=>$password]);
          PaymentDetail::create(['user_id'=>$user->id,'amount'=>$price,'receipt_url'=>$stripe_charge->receipt_url]);
          Profile::create(
            [
              'number'=>$request->card_number,
              'exp_month'=>(int)$date[0],
              'exp_year'=>(int)$date[1],
              'cvc'=>$request->cvv,
              'strip_email'=>$request->strip_email,
              'user_id'=>$user->id,
              'subscription'=>$sub,
              'startdate'=>$startdate,
              'enddate'=>$enddate,
              'about_us'=>$request->about_us,
              'logo'=>$company_logo??'','pic'=>$usersimage??'','phone'=>$request->phone,'brokerage_company'=>$request->brokerage_company,'brokerage_company_address'=>$request->brokerage_company_address,'license_number'=>$request->license_number,'managing_broker_name'=>$request->managing_broker_name,'agent_address'=>$request->agent_address,'agent_website'=>$request->agent_website,'brokerage_company_phone'=>$request->brokerage_company_phone,'license_state'=>$request->license_state,'signature'=>$request->signature,'lat'=>$latitude??"",'lng'=>$longitude??"",'state'=>array_reverse(explode(',', $agent_address))[1]??"",'country'=>array_reverse(explode(',', $agent_address))[0]]);
          AgentZipcode::create(['city'=>$city,'lat'=>$latitude,'lng'=>$longitude,'address'=>$request->agent_address,'state'=>$state??"",'zipcode'=>$postal_code,'agent_id'=>$user->id,'sub'=>'p']);
          $user->roles()->attach([1 => ['role_id' => 3, 'user_id' => $user->id]]);
           
          try {  
               $data = [
                'no_reply'      => 'info@Referral-Agent.com',
                'password'      => $password,
                'email'         => $request->email,
                'name'          => $request->name,
                'subject'       => 'Thank you for enrolling with Referral-Agent.com'
               ];
               $result = Mail::send('website.email.templete',['data' => $data], function ($message) use ($data) {
                  $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
               });
              $this->sendEmailToAdmin($request->name,$request->email);
               return redirect()->route('login');
          } catch (\Exception $e) {
              return redirect()->route('login');
          }  
           
           
          // if(Auth::attempt(['email'=>$email,'password'=>$password])){
          // }//end if.

        }else{
          return redirect()->back()->with('error_log', 'card is invalid!');
        }
      } catch (\Exception $e) {
               // return $e->getMessage();
            return redirect()->back()->with('error_log',$e->getMessage());
      }
      }else{
              $startdate = 0;
              $enddate = 0;
         if ($request->hasFile('profle_image')) {
              $file = $request->file('profle_image');
              $extension = $file->extension()?: 'png';
              $destinationPath = public_path() . '/storage/uploads/users/';
              $safeName = str_random(10) . '.' . $extension;
              $file->move($destinationPath, $safeName);
              $usersimage = $safeName;
              $usersimage = str_replace('uploads/users','',$usersimage);
          }
          if ($request->hasFile('company_logo')) {
                    $company_logo=Storage::disk('website')->put('images',$request->company_logo??'');           
          }
          $user =   User::create(['name'=>$name,'email'=>$email,'password'=>bcrypt($password),'show_pass'=>$password]);
          
          Profile::create(['user_id'=>$user->id,'subscription'=>$sub,'startdate'=>$startdate,'enddate'=>$enddate,'about_us'=>$request->about_us,'logo'=>$company_logo??'','pic'=>$usersimage??'','phone'=>$request->phone,'brokerage_company'=>$request->brokerage_company,'brokerage_company_address'=>$request->brokerage_company_address,'license_number'=>$request->license_number,'managing_broker_name'=>$request->managing_broker_name,'agent_address'=>$request->agent_address,'agent_website'=>$request->agent_website,'brokerage_company_phone'=>$request->brokerage_company_phone,'license_state'=>$request->license_state,'signature'=>$request->signature,'lat'=>$latitude,'lng'=>$longitude,'state'=>array_reverse(explode(',', $agent_address))[1]??"",'country'=>array_reverse(explode(',', $agent_address))[0]]);
          AgentZipcode::create(['city'=>$city,'lat'=>$latitude,'lng'=>$longitude,'address'=>$request->agent_address,'state'=>$state??"",'zipcode'=>$postal_code,'agent_id'=>$user->id,'sub'=>'n']);
          $user->roles()->attach([1 => ['role_id' => 3, 'user_id' => $user->id]]);
          try {  
               $data = [
                'no_reply'      => 'info@Referral-Agent.com',
                'password'      => $password,
                'email'         => $request->email,
                'name'          => $request->name,
                'subject'       => 'Thank you for enrolling with Referral-Agent.com'
               ];
               $result = Mail::send('website.email.templete',['data' => $data], function ($message) use ($data) {
                  $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
               });
              $this->sendEmailToAdmin($request->name,$request->email);

               return redirect()->route('login');
          } catch (\Exception $e) {
              return redirect()->route('login');
          }  
          // if(Auth::attempt(['email'=>$email,'password'=>$password])){
          //            return redirect()->route('dashboard');
          // }//end if.
        
      }

       

    }//end index function.
   
   private function findNearestRestaurants($latitude, $longitude, $radius = 1000){
$restaurants =       \DB::table("agent_zipcodes")
                     ->select("*", \DB::raw("3956 * acos(cos(radians(".$latitude."))
                     * cos(radians(agent_zipcodes.lat)) 
                     * cos(radians(agent_zipcodes.lng) - radians(".$longitude.")) 
                     + sin(radians(".$latitude.")) 
                     * sin(radians(agent_zipcodes.lat))) AS distance"))
                     ->where('lat','!=',$latitude)
                     ->where('lng','!=',$longitude)
                     ->where('status',1)
                     ->having('distance', '<', 30)
                     ->orderBy('sub','DESC')
                     ->get();




        return $restaurants;
    }
    public function viewRemove($id){
      if(Auth::user()->hasRole('user')){
        return UserNotification::where('id',$id)->update(['is_viewed_by_admin'=>1]);
      }else{
        return UserNotification::where('id',$id)->update(['is_viewed_by_agent'=>1]);
      }
    }  
    public function showPayments($id){
          $paymentdetail = PaymentDetail::where('user_id',$id)->paginate(100);
          $type = 1;
          return view('paymentDetail.payment-detail.index', compact('paymentdetail','type'));
    }  
    public function Unsubscribe($id){
      Profile::where('user_id',$id)->update(['subscription'=>'basic','startdate'=>'0','enddate'=>'0']);
      AgentZipcode::where('agent_id',$id)->update(['sub'=>'n']);
      $area =  AgentZipcode::where('agent_id',$id)->get();
      foreach ($area as $key => $value) {
         if($key!=0){
          AgentZipcode::where('id',$value->id)->forceDelete();
         }
      }
      try {
          $user = User::where('id',$id)->first();
           $data = [
               'no_reply'      => 'info@Referral-Agent.com',
               'email'         => $user->email,
               'name'          => $user->name,
               'subject'       => 'Sorry to see you leave Referral-Agent.com'
            ];
            $result = Mail::send('website.email.leave_unsb',['data' => $data], function ($message) use ($data) {
               $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
           });
            
        } catch (\Exception $e) {
           return $e->getMessage();
        }
      return back()->with('flash_message', 'Unsubscribe Successful!');
    } 
    public function getSubscribe(Request $request){
      extract($request->all());
      $stripe = new \Stripe\StripeClient('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');
          $date = explode('/', $request->card_expiry);
          $token = $stripe->tokens->create([
              'card' => [
                'number' => $request->card_number,
                'exp_month' =>(int)$date[0],
                'exp_year' =>(int)$date[1],
                'cvc' => $request->cvv,
              ],
            ]);
           Stripe::setApiKey('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');
                    $customer = Customer::create(array(
                        'email' => $request->strip_email,
                        'source' => $token['id']
                    ));
         
           $stripe_charge = Charge::create(array(
              'customer' => $customer->id,
              'amount' =>  $price*100,
              'currency' => 'usd'
           )); 
      if (isset($stripe_charge)) {
           if($price == '99'){
              $sub = 'yearly';
              $startdate = Carbon::parse(Carbon::now())->format("Y-m-d");
              $enddate = Carbon::parse($startdate)->addYear()->format("Y-m-d");
           }elseif($price == '10'){
              $sub = 'monthly';
              $startdate = Carbon::parse(Carbon::now())->format("Y-m-d");
              $enddate = Carbon::parse($startdate)->addMonths()->format("Y-m-d");
           }
          Profile::where('user_id',Auth::id())->update(['subscription'=>$sub,'startdate'=>$startdate,'enddate'=>$enddate,'number'=>$request->card_number,'exp_month'=>(int)$date[0],'exp_year'=>(int)$date[1],'cvc'=>$request->cvv,'strip_email'=>$request->strip_email]);
          AgentZipcode::where('agent_id',Auth::id())->update(['sub'=>'p']);
          PaymentDetail::create(['user_id'=>Auth::id(),'amount'=>$price,'receipt_url'=>$stripe_charge->receipt_url]);
          return back()->with('flash_message', 'subscribe Successful!');
      }else{
          return back()->with('error_log', 'card is invalid!');
      }     
      
    } 


    public function ReSubscriptionPayment(){
      $users = Profile::get();
      foreach ($users as $key => $value) {
        if($value->subscription=='monthly' || $value->subscription=='yearly'){
          if(Carbon::parse(Carbon::now())->format("Y-m-d")>$value->enddate ){
                  if($value->subscription=='monthly'){
                    $price = '10';
                  }else{
                    $price = '100';
                  }
                  try {   
                         $stripe = new \Stripe\StripeClient('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');
                         
                          $token = $stripe->tokens->create([
                              'card' => [
                                'number' => $value->number,
                                'exp_month' =>(int)$value->exp_month,
                                'exp_year' =>(int)$value->exp_year,
                                'cvc' => $value->cvv,
                              ],
                            ]);
                           Stripe::setApiKey('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');
                                    $customer = Customer::create(array(
                                        'email' => $value->strip_email,
                                        'source' => $token['id']
                                    ));
                         
                           $stripe_charge = Charge::create(array(
                              'customer' => $customer->id,
                              'amount' =>  $price*100,
                              'currency' => 'usd'
                           )); 
                      if (isset($stripe_charge)) {
                           if($price == '100'){
                              $sub = 'yearly';
                              $startdate = Carbon::parse(Carbon::now())->format("Y-m-d");
                              $enddate = Carbon::parse($startdate)->addYear()->format("Y-m-d");
                           }elseif($price == '10'){
                              $sub = 'monthly';
                              $startdate = Carbon::parse(Carbon::now())->format("Y-m-d");
                              $enddate = Carbon::parse($startdate)->addMonths()->format("Y-m-d");
                           }
                          Profile::where('user_id',$value->user_id)->update(['subscription'=>$sub,'startdate'=>$startdate,'enddate'=>$enddate]);
                          PaymentDetail::create(['user_id'=>$value->user_id,'amount'=>$price,'receipt_url'=>$stripe_charge->receipt_url]);
                          AgentZipcode::where('agent_id',$value->user_id)->update(['sub'=>'p']);
                      }else{
                          
                      } 
                  }catch(\Exception $e){
                        echo  $e->getMessage().'---'.$value->user->name.'----'.$value->user->id;
                        Profile::where('user_id',$value->user->id)->update(['subscription'=>'basic','startdate'=>'0','enddate'=>'0']);
                        AgentZipcode::where('agent_id',$value->user->id)->update(['sub'=>'n']);
                        $area =  AgentZipcode::where('agent_id',$value->user->id)->get();
                        foreach ($area as $key => $value) {
                           if($key!=0){
                            AgentZipcode::where('id',$value->id)->forceDelete();
                           }
                        }
                        // try {
                        //     $user = User::where('id',$value->user->id)->first();
                        //      $data = [
                        //          'no_reply'      => 'info@Referral-Agent.com',
                        //          'email'         => $user->email,
                        //          'name'          => $user->name,
                        //          'subject'       => 'Sorry to see you leave Referral-Agent.com'
                        //       ];
                        //       $result = Mail::send('website.email.leave_unsb',['data' => $data], function ($message) use ($data) {
                        //          $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
                        //      });
                              
                        //   } catch (\Exception $e) {
                        //      // return $e->getMessage();
                        //   }
                    // die();
                  }//end try catch.  
            }
        }
        
      }
      return true;
    }  

    public function desktopViewHtml(){
      return (string )view('website.ajax.desktop_view_html');
    }
    public function mobileViewHtml(){
      return (string )view('website.ajax.mobile_view_html');
    }

    //sending new registration email to admin.
    public function sendEmailToAdmin($userName,$userEmail){
        $customMessage = "New enrolled user details
        Name:   $userName,
        Email:  $userEmail
            ";
        try{
            $email = $userEmail;
            Mail::raw($customMessage, function ($message) use($email){
                $message->to('matt@referral-agent.com')->bcc(['development.aftab@gmail.com'])->subject('New user enrolled');
            });
            return true;
        }catch (\Exception $e){
            return false;
        }

    }//end sendEmailToAdmin function.
    //sending new registration email to admin.


    function testing(){
        var_dump($this->sendEmailToAdmin('Developer Testing','development.aftab@gmail.com'));
        die;
         // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
         // $pdf = PDF::loadView('website.ajax.lead_pdf', $data);
         // $pdf->download('itsolutionstuff.pdf');

        try {
             $data = [
                 'no_reply'      => 'info@Referral-Agent.com',
                 'password'      => '123456',
                 'email'         => 'zuhi@yopmail.com',
                 'name'          => 'zuhi',
                 'subject'       => 'Thank you for enrolling with Referral-Agent.com'
              ];
              return  view('website.email.templete',compact('data'));
            //   $result = Mail::send('website.email.templete',['data' => $data], function ($message) use ($data) {
            //      $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
            //  });
            // var_dump($result);
           } catch (\Exception $e) {
               return $e->getMessage();
           }
    }

}//end class.
