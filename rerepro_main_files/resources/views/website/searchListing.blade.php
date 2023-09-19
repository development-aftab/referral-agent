@extends('website.layout.master')
@section('content')

<style type="text/css">
    .searchListing_section_2 .card.premium_card .Card_icons ul {list-style: none; padding: 0px;}
.searchListing_section_2 .card.premium_card .Card_icons ul li i{font-size: 18px; margin-right: 5px;}
.searchListing_section_2 .first_card .first_card_company{width: 30%; flex: 0 0 30%;}
.searchListing_section_2 .first_card .first_card_info{width: 100%; flex: 0 0 100%;padding: 0;}
.searchListing_section_2 .first_card .first_card_info ul{list-style: none; padding-left: 0;}
.searchListing_section_2 .first_card .first_card_info ul li i{font-size: 18px; margin-right: 5px;}
/*.searchListing_section_1 .form-group.row {max-width: 30%;}*/
.section_1 .form-group #find_agent {top: 0%; /*right: 20px;*/}
    .searchListing_section_2 .card_bottom select {
        background-color: transparent;
        border: 1px solid #ff6600;
        border-radius: 7px;
        padding: 5px 7px;
        cursor: pointer;
    }
    .searchListing_section_2 .first_card_paragraph p{
        font-size: 15px;
    }
    .first_card_info ul li {
        white-space: normal;
        word-break: break-all;
    }
    .checkbox_sec {
    display: flex;
    justify-content: space-between;
}
#lead_buyer .input_div{
    margin: 13px 0px;
    display: flex;
    justify-content: space-between;
}
.input_div input {
    
}
.textarea_div{
    display: flex;
}
.textarea_div label{
    padding-right: 5px;
}
#lead_buyer .modal-body{
    padding: 10px 48px;
}
#lead_buyer .modal-header button {
    background-color: white;
    border: 1px solid black;
    padding: 0px 5px;
}
#lead_buyer .modal-footer button{
    background-color: #ff6600;
    color: white;
    border: 1px solid;
}
#lead_buyer .modal-footer button:hover{
    background-color: white;
    color: #ff6600;
}
#lead_buyer .modal-dialog{
    margin: 13.75rem auto;
}
.spinner-border {
    position: absolute;
    top: 34%;
    left: 40%;
    right: auto;
    height: 80px;
    width: 80px;
}
.text-decoration-none{
    color: black;
}

 /* */
    .searchListing_section_2 .first_card { /* height: 200px;*/  padding: 25px 20px 20px;  }

</style>


 
<!-- SECTION 01 -->
<section class="searchListing_section_1" data-aos="zoom-in">
    <div class="container section_1">
        <div class="row">
            <h2>Searching for an agent <br> to refer business</h2>
        </div>
         <div class="form-group row">
                    <div class="input_container">
                        <i class="fas fa-map-marker-alt"></i>
                      
                    </div>
                    <div class="inp_sub col-md-12 col-sm-12 col-12">
                        <input class=" z_code" type="text" placeholder="Search Area" id="auto_selling">
                        <input class="" type="button" id="find_agent" value="FIND AGENTS">
                    </div>
                </div>
    
</section>
<!-- END SECTION 01 -->



<!-- SECTION 02 -->
<section class="searchListing_section_2">
    <div class="container">
        <div class="row">
            <h4 data-aos="fade-up">We have found {{ count($agents) }} agent in the search area</h4>
        </div>
            <?php
             $row = 'fade-left';
            ?>
            <div class="row">
            @foreach ($agents as $element)
                @if($element->GetUser->status != 1) @continue @endif
              @if($element->sub == 'p' )  
                    <div data-aos="flip-up" class="col-md-12">
                        <div class="card premium_card">
                            <div class="card_tag">
                                <p><i class="fas fa-star"></i><span>Premium</span></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 company_details_col">
                                        <div class="Company_logo">
                                            <div class="logo">
                                                <img class="img-fluid" src="{{ asset('website') }}/{{ @$element->GetUser->profile->logo }}" alt="">
                                            </div>
                                            <div class="profile_image">
                                                <img class="img-fluid" src="{{ asset(('storage/uploads/users/'))}}/{{ @$element->GetUser->profile->pic }}" alt="">
                                            </div>
                                        </div>
                                        <div class="Card_icons">
                                            <ul>
                                                <li>

                                                    <i class="fas fa-user-tie"></i>
                                                    <span>{{ $element->GetUser->name }}</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-briefcase"></i>
                                                    <span>{{ @$element->GetUser->profile->brokerage_company }}</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    <span><a class='text-decoration-none' href="mailto:{{ $element->GetUser->email }}">{{ $element->GetUser->email }}</a></span>
                                                </li>
                                            </ul>

                                            {{-- <i class="fas fa-user-tie">
                                                <p>{{ $element->GetUser->name }}</p>
                                            </i>

                                            <i class="fas fa-briefcase">
                                                <p>{{ $element->GetUser->profile->brokerage_company }}</p>
                                            </i>
                                            <i class="fas fa-briefcase">
                                                <p>{{ $element->GetUser->email }}</p>
                                            </i> --}}
                                        </div>
                                        <div class="Card_icons">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-phone-alt"></i>
                                                    <span><a class='text-decoration-none' href="tel:{{ @$element->GetUser->profile->phone }}">{{ $element->GetUser->profile->phone }}</a></span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-phone-office"></i>
                                                    <span><a class='text-decoration-none' href="tel:{{ @$element->GetUser->profile->brokerage_company_phone }}">{{ $element->GetUser->profile->brokerage_company_phone }}</a></span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-globe"></i>
                                                    <span><a class='text-decoration-none' href="{{ @$element->GetUser->profile->agent_website }}" target="_blank">{{ $element->GetUser->profile->agent_website }}</a></span>
                                                </li>
                                            </ul>

                                            {{-- <i class="fas fa-user-tie">
                                                <p>{{ $element->GetUser->profile->phone }}</p>
                                            </i>
                                            <i class="fas fa-briefcase">
                                                <p>{{ $element->GetUser->profile->brokerage_company_phone }}</p>
                                            </i>
                                            <i class="fas fa-briefcase">
                                                <p>{{ $element->GetUser->profile->agent_website }}</p>
                                            </i> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 first_card_paragraph">
                                        <h5>About Us</h5>
                                        <p>{{ @$element->GetUser->profile->about_us }}</p>
                                    </div>
                                </div>
                              @if(Auth::user())     
                                <div class="card_bottom">
                                    <select >
                                          {{-- $zip = App\AgentZipcode::where('agent_id',$element->GetUser->id)->where('state',$element->state)->groupBy('zipcode')->get(); --}}
                                        <?php
                                          $zip = App\AgentZipcode::where('agent_id',$element->GetUser->id)->groupBy('zipcode')->get();
                                          $i = 0
                                        ?>
                                        @foreach ($zip as $zips)
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option  @if($zips->state == $element->state) selected @endif value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                   @if($element->agent_id != Auth::id())    
                                    @if(isset($zipcodeUsed) && $search =='singal' && $zipcodeUsed<3)
                                        <p class="card_bottom_paragraph">Send A Referral</p>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 buyer_button"><span> Buyer </span> </a>
                                        <a data-agent="{{ $element->GetUser->id }}" class="btn btn-outline-success btn_cards custom-btn btn-7 seller_button"><span> Seller </span> </a>
                                    @elseif($search =='multi' && $i>0)
                                        <p class="card_bottom_paragraph">Send A Referral</p>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 buyer_button"><span> Buyer </span> </a>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 seller_button"><span> Seller </span> </a>
                                    @else
                                       Your request limit exceed for this particular Area
                                    @endif
                                   @endif
                                </div>
                              @else
                                <div class="card_bottom">
                                      <select >
                                        <?php
                                          $zip = App\AgentZipcode::where('agent_id',$element->GetUser->id)->groupBy('zipcode')->get();
                                          $i = 0
                                        ?>
                                        @foreach ($zip as $zips)
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option  @if($zips->state == $element->state) selected @endif value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>    
                              @endif
                                  @if(Auth::user())
                                     @if(in_array($element->GetUser->id, $past_agreement))
                                         <div class="view_aggrement">
                                            <a href="{{ route('agent_agerments_modal') }}/{{ $element->GetUser->id }}" class="Agreements_class">View Agreements</a>
                                         </div>
                                     @endif 
                                     <div class="view_aggrement">
                                         <a href="{{ route('referral_agreement') }}/{{ $element->GetUser->id }}" class="Agreements_class">Referral Agreement</a>
                                     </div>   
                                  @endif
                                  
                            </div>
                        </div>
                        <br><br>
                    </div>
              @else
              <?php
             
             if($row == 'fade-right'){
                $row = 'fade-left';
             }else{
                $row = 'fade-right';
             }
              ?>
                    <div class="col-md-3" data-aos="{{ $row }}">
                        <div class="card first_card">
                            <div class="card_tag">
                                <p><i class="fas fa-star"></i><span>Basic</span></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    {{--<div class="col-md-4 first_card_company">--}}
                                        {{-- <div class="Company_logo">--}}
                                            {{--<img class="img-fluid" src="{{ asset('website') }}/assets/img/Mask Group 5.png" alt="">--}}
                                        {{--</div> --}}
                                    {{--</div>--}}
                                    <div class="col-md-4 offset-md-0 offset-2 col-4 first_card_info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user-tie"></i>
                                                <span>{{ $element->GetUser->name }}</span>
                                            </li>
                                           
                                            <li>
                                                <i class="fas fa-envelope"></i>
                                                <span><a class='text-decoration-none' href="mailto:{{ $element->GetUser->email }}">{{ $element->GetUser->email }}</a></span>
                                            </li>
                                            <li>
                                                <i class="fas fa-phone-alt"></i>
                                                <span><a class='text-decoration-none' href="tel:{{ @$element->GetUser->profile->phone }}">{{ $element->GetUser->profile->phone }}</a></span>
                                            </li>
                                        </ul>

                                    </div>
                                   {{--  <div class="col-md-4 offset-md-0 offset-2 col-4 first_card_info">
                                        <ul>
                                            
                                            <li>
                                                <i class="fas fa-briefcase"></i>
                                                <span>{{ $element->GetUser->profile->brokerage_company_phone }}</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-user-tie"></i>
                                                <span>{{ $element->GetUser->profile->agent_website }}</span>
                                            </li>
                                        </ul>

                                       
                                    </div> --}}
                                </div>
                            @if(Auth::user()) 
                                <div class="card_bottom">
                                    <select >
                                          {{-- $zip = App\AgentZipcode::where('agent_id',$element->GetUser->id)->where('state',$element->state)->groupBy('zipcode')->get(); --}}
                                        <?php
                                          $zip = App\AgentZipcode::where('agent_id',$element->GetUser->id)->groupBy('zipcode')->get();
                                          $i = 0
                                        ?>
                                        @foreach ($zip as $zips)
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option @if($zips->state == $element->state) selected @endif value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                   @if($element->agent_id != Auth::id())       
                                    @if(isset($zipcodeUsed) && $search =='singal' && $zipcodeUsed<3)
                                        <p class="card_bottom_paragraph">Send A Referral</p>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 buyer_button"><span> Buyer </span> </a>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 seller_button"><span> Seller </span> </a>
                                    @elseif($search =='multi' && $i>0)
                                        <p class="card_bottom_paragraph">Send A Referral</p>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 buyer_button"><span> Buyer </span> </a>
                                        <a data-agent="{{ $element->GetUser->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 seller_button"><span> Seller </span> </a>
                                    @else
                                       Your request limit exceed for this particular Area
                                    @endif
                                   @endif   
                                </div>
                            @else
                                <div class="card_bottom">
                                    <select >
                                        <?php
                                          $zip = App\AgentZipcode::where('agent_id',$element->GetUser->id)->groupBy('zipcode')->get();
                                          $i = 0
                                        ?>
                                        @foreach ($zip as $zips)
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                             <option @if($zips->state == $element->state) selected @endif value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                        @endforeach
                                    </select>
                                </div>    
                                
                            @endif    
                                    @if(Auth::user())
                                     @if(in_array($element->GetUser->id, $past_agreement))
                                         <div class="view_aggrement">
                                            <a href="{{ route('agent_agerments_modal') }}/{{ $element->GetUser->id }}" class="Agreements_class">View Agreements</a>
                                         </div>
                                     @endif    
                                         <div class="view_aggrement">
                                           <a href="{{ route('referral_agreement') }}/{{ $element->GetUser->id }}" class="Agreements_class">Referral Agreement</a>
                                         </div>
                                  @endif
                            </div>
                        </div><br><br>
                    </div>
             @endif
            @endforeach
          </div>
            
        </div>
    </div>
</section>



@if(isset($agentsradios))
<!-- SECTION 02 -->
<section class="searchListing_section_2">
    <div class="container">
            @if(count($agent_count) != 0)
                <div class="row">
                    <h4 data-aos="fade-up">We have also found {{ count($agent_count) }} more agents in the radius of 30 miles</h4>
                </div>
            @endif  
            <?php
             $row = 'fade-left';
            ?>
            <div class="row">
            <?php
             $already = array();
            ?>    
            @foreach ($agentsradios as $element)
               @if(in_array($element->agent_id,$already)) @continue @endif
               @if(in_array($element->agent_id,$agents_avable)) @continue @endif
               <?php
                 $agent = App\User::where('id',$element->agent_id)->first();
                 array_push($already,$element->agent_id);
               ?>
                   @if($agent->status != 1) @continue @endif

              @if($element->sub == 'p' )
                    <div data-aos="flip-up" class="col-md-12">
                        <div class="card premium_card">
                            <div class="card_tag">
                                <p><i class="fas fa-star"></i><span>Premium</span></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 company_details_col">
                                        <div class="Company_logo">
                                            <div class="logo">
                                                <img class="img-fluid" src="{{ asset('website') }}/{{ @$agent->profile->logo }}" alt="">
                                            </div>
                                            <div class="profile_image">
                                                <img class="img-fluid" src="{{ asset(('storage/uploads/users/'))}}/{{ @$agent->profile->pic }}" alt="">
                                            </div>
                                        </div>
                                        <div class="Card_icons">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-user-tie"></i>
                                                    <span>{{ $agent->name }}</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-briefcase"></i>
                                                    <span>{{ @$agent->profile->brokerage_company }}</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    <span><a class='text-decoration-none' href="mailto:{{ $agent->email }}">{{ $agent->email }}</a></span>
                                                </li>
                                            </ul>

                                            {{-- <i class="fas fa-user-tie">
                                                <p>{{ $agent->name }}</p>
                                            </i>

                                            <i class="fas fa-briefcase">
                                                <p>{{ $agent->profile->brokerage_company }}</p>
                                            </i>
                                            <i class="fas fa-briefcase">
                                                <p>{{ $agent->email }}</p>
                                            </i> --}}
                                        </div>
                                        <div class="Card_icons">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-phone-alt"></i>
                                                    <span><a class='text-decoration-none' href="tel:{{ @$agent->profile->phone }}">{{ $agent->profile->phone }}</a></span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-phone-office"></i>
                                                    <span><a class='text-decoration-none' href="tel:{{ @$agent->profile->brokerage_company_phone }}">{{ $agent->profile->brokerage_company_phone }}</a></span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-globe"></i>
                                                    <span><a class='text-decoration-none' href="{{ @$agent->profile->agent_website }}" target="_blank">{{ $agent->profile->agent_website }}</a></span>
                                                </li>
                                            </ul>

                                            {{-- <i class="fas fa-user-tie">
                                                <p>{{ $agent->profile->phone }}</p>
                                            </i>
                                            <i class="fas fa-briefcase">
                                                <p>{{ $agent->profile->brokerage_company_phone }}</p>
                                            </i>
                                            <i class="fas fa-briefcase">
                                                <p>{{ $agent->profile->agent_website }}</p>
                                            </i> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 first_card_paragraph">
                                        <h5>About Us</h5>
                                        <p>{{ @$agent->profile->about_us }}</p>
                                    </div>
                                </div>
                              @if(Auth::user())
                                <div class="card_bottom">
                                    <select >
                                        <?php
                                         $i = 0
                                        ?>
                                        @foreach ($agentsradios as $zips)

                                            @if($zips->agent_id != $element->agent_id) @continue @endif
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                  @if($element->agent_id != Auth::id())       
                                    @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$element->zipcode)->where('status',0)->count()<3) 
                                        <p class="card_bottom_paragraph">Send A Referral</p>
                                        <a data-agent="{{ $agent->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 buyer_button"><span> Buyer </span> </a>
                                        <a data-agent="{{ $agent->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 seller_button"><span> Seller </span> </a>
                                    @else
                                       Your request limit exceed for this particular Area
                                    @endif
                                  @endif
                                </div>
                              @else
                                <div class="card_bottom">
                                    <select >
                                        <?php
                                         $i = 0
                                        ?>
                                        @foreach ($agentsradios as $zips)

                                            @if($zips->agent_id != $element->agent_id) @continue @endif
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                 </div>    
                              @endif    
                               @if(Auth::user())
                                     @if(in_array($agent->id, $past_agreement))
                                         <div class="view_aggrement">
                                            <a href="{{ route('agent_agerments_modal') }}/{{ $agent->id }}" class="Agreements_class">View Agreements</a>
                                         </div>
                                     @endif    
                                     <div class="view_aggrement">
                                         <a href="{{ route('referral_agreement') }}/{{ $agent->id }}" class="Agreements_class">Referral Agreement</a>
                                     </div>
                                  @endif
                            </div>
                        </div>
                        <br><br>
                    </div>
              @else
              <?php
             
             if($row == 'fade-right'){
                $row = 'fade-left';
             }else{
                $row = 'fade-right';
             }
              ?>
                    <div class="col-md-3" data-aos="{{ $row }}">
                        <div class="card first_card">
                            <div class="card_tag">
                                <p><i class="fas fa-star"></i><span>Basic</span></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    {{--<div class="col-md-4 first_card_company">--}}
                                        {{-- <div class="Company_logo">
                                            <img class="img-fluid" src="{{ asset('website') }}/assets/img/Mask Group 5.png" alt="">
                                        </div> --}}
                                    {{--</div>--}}
                                    <div class="col-md-4 offset-md-0 offset-2 col-4 first_card_info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user-tie"></i>
                                                <span>{{ $agent->name }}</span>
                                            </li>
                                           
                                            <li>
                                                <i class="fas fa-envelope"></i>
                                                <span><a class='text-decoration-none' href="mailto:{{ $agent->email }}">{{ $agent->email }}</a></span>
                                            </li>
                                            <li>
                                                <i class="fas fa-phone-alt"></i>
                                                <span><a class='text-decoration-none' href="tel:{{ @$agent->profile->phone }}">{{ @$agent->profile->phone }}</a></span>
                                            </li>
                                        </ul>

                                    </div>
                                   {{--  <div class="col-md-4 offset-md-0 offset-2 col-4 first_card_info">
                                        <ul>
                                            
                                            <li>
                                                <i class="fas fa-briefcase"></i>
                                                <span>{{ $agent->profile->brokerage_company_phone }}</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-user-tie"></i>
                                                <span>{{ $agent->profile->agent_website }}</span>
                                            </li>
                                        </ul>

                                       
                                    </div> --}}
                                </div>
                              @if(Auth::user())
                               <div class="card_bottom">
                                    <select >
                                        <?php
                                         $i = 0
                                        ?>
                                        @foreach ($agentsradios as $zips)

                                            @if($zips->agent_id != $element->agent_id) @continue @endif
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                  @if($element->agent_id != Auth::id())       
                                    @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$element->zipcode)->where('status',0)->count()<3) 
                                        <p class="card_bottom_paragraph">Send A Referral</p>
                                        <a data-agent="{{ $agent->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 buyer_button"><span> Buyer </span> </a>
                                        <a data-agent="{{ $agent->id }}"  class="btn btn-outline-success btn_cards custom-btn btn-7 seller_button"><span> Seller </span> </a>
                                    @else
                                       Your request limit exceed for this particular Area
                                    @endif
                                  @endif
                                </div>
                              @else
                                <div class="card_bottom">
                                    <select >
                                        <?php
                                         $i = 0
                                        ?>
                                        @foreach ($agentsradios as $zips)

                                            @if($zips->agent_id != $element->agent_id) @continue @endif
                                            {{-- @if(isset($zipcode) && $zipcode != $zips->zipcode) @continue @endif --}}
                                            @if(App\ReferalAgreement::where('sender_id',Auth::id())->where('zipcode',$zips->zipcode)->where('status',0)->count()<3) 
                                            <option value="{{ $zips->zipcode }}">{{ $zips->address }}</option>
                                            <?php $i++ ?>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>      
                              @endif    
                                  @if(Auth::user())
                                     @if(in_array($agent->id, $past_agreement))
                                         <div class="view_aggrement">
                                            <a href="{{ route('agent_agerments_modal') }}/{{ $agent->id }}" class="Agreements_class">View Agreements</a>
                                         </div>
                                     @endif    
                                         <div class="view_aggrement">
                                           <a href="{{ route('referral_agreement') }}/{{ $agent->id }}" class="Agreements_class">Referral Agreement</a>
                                         </div>
                                  @endif
                            </div>
                        </div><br><br>
                    </div>
             @endif
            @endforeach
          </div>
            
        </div>
    </div>
 </section>
@endif
<div id="div_modal"></div>

<div class="modal fade" id="lead_seller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lead Information:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="spinner-border text-warning"></div>
         <div class="mb-3">
            <input type="hidden" id="agent_id_salar" name="">
            <input type="hidden" id="zipcode_salar" name="">
            <input type="hidden" id="area_salar" name="">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="email" class="form-control"  id="Name_salar" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address</label>
            <input type="email" class="form-control" id="Address_salar" placeholder="Address">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="email" class="form-control" id="Phone_salar" placeholder="Phone">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email_salar" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
            <textarea class="form-control" id="Comments_salar" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submit_lead_salar">Submit</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="lead_buyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lead Information:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="spinner-border text-warning"></div>
        <div class="mb-3">
            <input type="hidden" id="agent_id_buyer" name="">
            <input type="hidden" id="zipcode_buyer" name="">
            <input type="hidden" id="area_buyer" name="">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="email" class="form-control"  id="Name_buyer" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address</label>
            <input type="email" class="form-control" id="Address_buyer" placeholder="Address">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="email" class="form-control" id="Phone_buyer" placeholder="Phone">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email_buyer" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
            <textarea class="form-control" id="Comments_buyer" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button type="button" class="btn submit_lead_buyer">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
 <script type="text/javascript">
    $('.spinner-border').hide();
     $(document).on('click','.submit_lead_buyer',function(e){
           $('.spinner-border').show();
           agent_id = $('#agent_id_buyer').val();
           zipcode = $('#zipcode_buyer').val();
           area = $('#area_buyer').val();
           Name_buyer = $('#Name_buyer').val();
           Address_buyer = $('#Address_buyer').val();
           Phone_buyer = $('#Phone_buyer').val();
           Email_buyer = $('#Email_buyer').val();
           Comments_buyer = $('#Comments_buyer').val();
            
         $.ajax({
              url: "{{ route('buyer_lead_send') }}",
              type: 'get',
              data: {
                'agent_id' : agent_id,
                'zipcode' : zipcode,
                'area' : area,
                'name':Name_buyer,
                'address':Address_buyer,
                'phone':Phone_buyer,
                'email':Email_buyer,
                'comments':Comments_buyer,
              },
              success: function(response){
                   $('.spinner-border').hide();
                    swal({
                        icon: 'success',
                        title: 'Buying Agreement Sended',
                        showConfirmButton: false,
                        timer: 45000
                    }).then(
                        location.reload()
                    )
              }
           });
      });  
     $(document).on('click','.submit_lead_salar',function(e){
          $('.spinner-border').show();
           agent_id = $('#agent_id_salar').val();
           zipcode = $('#zipcode_salar').val();
           area = $('#area_salar').val();
           Name_salar = $('#Name_salar').val();
           Address_salar = $('#Address_salar').val();
           Phone_salar = $('#Phone_salar').val();
           Email_salar = $('#Email_salar').val();
           Comments_salar = $('#Comments_salar').val();
          $.ajax({
              url: "{{ route('saller_lead_send') }}",
              type: 'get',
              data: {
                'agent_id' : agent_id,
                'zipcode' : zipcode,
                'area' : area,
                'name':Name_salar,
                'address':Address_salar,
                'phone':Phone_salar,
                'email':Email_salar,
                'comments':Comments_salar,
              },
              success: function(response){
                $('.spinner-border').hide();
                 swal({
                        icon: 'success',
                        title: 'Selling Agreement Sended',
                        showConfirmButton: false,
                        timer: 45000
                    }).then(
                        location.reload()
                    )
              }
           });
      });  
     $(document).on('click','.buyer_button',function(e){
           agent_id = $(this).attr('data-agent');
           zipcode = $(this).closest('.card_bottom').find('select').val();
           area = $(this).closest('.card_bottom').find('select option:selected').text();
            $('#agent_id_buyer').val(agent_id);
            $('#zipcode_buyer').val(zipcode);
            $('#area_buyer').val(area);
           $('#lead_buyer').modal('show');
           
     });   
     $(document).on('click','.seller_button',function(e){
           agent_id = $(this).attr('data-agent');
           zipcode = $(this).closest('.card_bottom').find('select').val();
           area = $(this).closest('.card_bottom').find('select option:selected').text();
            $('#agent_id_salar').val(agent_id);
            $('#zipcode_salar').val(zipcode);
            $('#area_salar').val(area);
            $('#lead_seller').modal('show');
           
     }); 
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");
     });
      pin='';
      state='';
      latitude='';
      longitude='';
      google.maps.event.addDomListener(window, 'load', initializes);
       function initializes() {
        var acOptions = {
         types: ['(cities)'],
         componentRestrictions: {country: "us"}
        };
         var input = document.getElementById('auto_selling');
         var autocomplete = new google.maps.places.Autocomplete(input,acOptions);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
             $('#latitudeauto_selling').val(place.geometry['location'].lat());
             $('#longitudeauto_selling').val(place.geometry['location'].lng());

             $("#lat_area").removeClass("d-none");
             $("#long_area").removeClass("d-none");

//             for (var i = 0; i < place.address_components.length; i++) {
//               for (var j = 0; j < place.address_components[i].types.length; j++) {
//                          console.log(place.address_components[i].types);
//                 if (place.address_components[i].types[j] == "postal_code") {
//                   $('#postal_code').val(place.address_components[i].long_name) 

//                 }
//               }
//             }
             
                address = place.formatted_address;
                latitude = place.geometry.location.lat();
                longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
             var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    if (results[0]) {
//                         var address = results[0].formatted_address;
//                             pin = results[0].address_components[results[0].address_components.length - 1].long_name;
//                         var country = results[0].address_components[results[0].address_components.length - 2].long_name;
//                             state = results[0].address_components[results[0].address_components.length - 3].short_name;;
//                         var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                        for (var i = 0; i < results[0].address_components.length; i++) {
                              for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                                   if(results[0].address_components[i].types[j] == 'administrative_area_level_1'){
                                       state = results[0].address_components[i].short_name;
                                       
                                   }else if(results[0].address_components[i].types[j] == 'postal_code'){
                                        pin = results[0].address_components[i].long_name;
                                       
                                   }else if(results[0].address_components[i].types[j] == 'administrative_area_level_2'){
                                       var city = results[0].address_components[i].long_name;
                                       
                                   }else if(results[0].address_components[i].types[j] == 'country'){
                                       var country = results[0].address_components[i].long_name;
                                   }
                              }
                        }
                    }
                }
            });
         });
     }

      $(document).on('click','#find_agent',function(e){
        if(state == '' || pin == '' || latitude == '' || longitude == '' ){
             swal({
                icon: 'error',
                title: 'Please Enter Area',
                showConfirmButton: false,
                timer: 4500
             })
        }else{
            window.location.replace("{{ route('search_leads_state_zip') }}/"+state+"/"+pin+"/"+latitude+"/"+longitude);
       }
      });  
      // $(document).on('click','.Agreements_class',function(e){
      //       id =  $(this).attr('data-id');
      //         $.ajax({
      //             url: "{{ route('agent_agerments_modal') }}",
      //             type: 'get',
      //             data: {
      //               'id':id
      //             },
      //             success: function(response){
      //                 $('#div_modal').html(response);
      //             }
      //          });
      // });  
     // $(document).on('click','#find_agent',function(e){
     //    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU"></script> --}}
     //    var currentLocation = $('#location').val();
     //    var currentZipCode = $('#zip_code').val();
     //     if(currentZipCode == ''){
     //         swal({
     //            icon: 'error',
     //            title: 'Please Enter zipcode',
     //            showConfirmButton: false,
     //            timer: 4500
     //         })
     //     }else{
     //        var latitude = '';
     //        var longitude = '';
     //        var geocoder = new google.maps.Geocoder();
     //        geocoder.geocode({ 
     //           componentRestrictions: { 
     //               country: 'US', 
     //               postalCode: currentZipCode
     //           } 
     //        }, function (results, status) {
     //            if (status == google.maps.GeocoderStatus.OK) {
     //                latitude = results[0].geometry.location.lat();
     //                longitude = results[0].geometry.location.lng();
     //                console.log(latitude + ", " + longitude);
     //                window.location.replace("{{ route('search_leads_state_zip') }}/"+currentLocation+"/"+currentZipCode+"/"+latitude+"/"+longitude);
     //            } else {
     //                alert("Request failed.")
     //            }
     //        });
     //      }
     //  });  
 </script>
@endpush