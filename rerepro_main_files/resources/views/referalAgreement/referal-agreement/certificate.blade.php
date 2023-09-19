
 
@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"></h3>
                    @can('view-'.str_slug('Course'))
                        <a class="btn btn-success pull-right"  >
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <center>
                          <style>
                          .signature, .title { 
                            float:left;
                            border-top: 1px solid #000;
                            width: 200px; 
                            text-align: center;
                          }
                          .head{
                            width:930px; 
                            min-height:1015px; 
                            padding:20px;
                            text-align:center;
                            /*background: radial-gradient(ellipse at top, #FF9A00, transparent),
            radial-gradient(ellipse at bottom, #FF9A00, transparent);*/
                            background: linear-gradient(143deg, #ff9a006e, #ff9a0026);

                           
                              border: 10px solid #FF9A00;
                           
                          }
                          .body{width:870px;color:black;
                           min-height:955px;
                           padding:20px;
                           text-align:center;
                            
                              border: 5px solid #FF9A00;
                              background-image: linear-gradient(315deg, #FFFAF3 0%, #FFFAF3 74%)  !important
                              /*-webkit-print-color-adjust: exact; */
                           

                          }
                          .btn-info, .btn-info.disabled {
    background: #ff9a00;
    border: 2px solid #ffe0b2;
}

                          .ackn_div {
                              display: flex;
                              justify-content: space-between;
                              align-items: center;
                          }
                          .lead_info {
                              margin-bottom: 4px;
                          }



                          @media print {
                             
                              /*body.printing * { display: none; }*/
                            
                              /*body.printing #print-me { display: block; }*/
                              .body{width:750px;
                           min-height:955px;
                           padding:20px;
                           text-align:center;
                            
                              border: 5px solid #FF9A00;
                              background-image: linear-gradient(315deg, #FFFAF3 0%, #FFFAF3 74%)  !important
                              -webkit-print-color-adjust: exact; 
                           
                          }
                          }

                          @media screen {
                              /* Hide the special layer from the screen. */
                              #print-me { display: none; }
                          }

                          </style>
                          <div style="width: 100%; text-align: center; margin-top: 25px;" class="print_download_btns">
                        {{-- <button class="btn btn-info" id="btn">Print Certificate</button> --}}
                        <a class="btn btn-info" href="javascript:genPDF()">Download PDF</a> 
                    </div>
                          <div class="head" id="printarea">
                          <div class="body">
                                
                                 <span style="font-size:50px; text-transform: uppercase; font-weight:bold">Referral Agreement</span>
                                 <br>
                                 <div style="display: flex; justify-content: space-between; width: 100%; max-width: 93%; margin: 0 auto;">
                                      <div style="text-align: left; width: 250px; line-height: 25px;">
                                          
                                          <h2 style="margin-bottom: 5px; font-weight: 800; text-transform: uppercase;">Referring Agent Information</h2>
                                          <span style="font-weight: 700">Name: </span>
                                          <span>{{ $lead->GetSender->name }}</span>
                                          <br>
                                          <span style="font-weight: 700">Address: </span>
                                          <span>{{ $lead->GetSender->profile->agent_address }}</span>
                                          <br> 
                                          <span style="font-weight: 700">Brokerage/Company: </span>
                                          <span>{{ $lead->GetSender->profile->brokerage_company }}</span>
                                          <br>
                                          <span style="font-weight: 700">Phone: </span>
                                          <span>{{ $lead->GetSender->profile->phone }}</span>
                                          <br>
                                          <span style="font-weight: 700">Email: </span>
                                          <span>{{ $lead->GetSender->email }}</span>
                                          <br>
                                          <span style="font-weight: 700">License Number: </span>
                                          <span>{{ $lead->GetSender->profile->license_number }}</span>
                                          <br>
                                          <span style="font-weight: 700">License State: </span>
                                          <span>{{ $lead->GetSender->profile->license_state }}</span>
                                          <br>
                                          <span style="font-weight: 700">Agent Website: </span>
                                          <span>{{ $lead->GetSender->profile->agent_website }}</span> 
                                          <br>
                                          <span style="font-weight: 700">Managing Broker: </span>
                                          <span>{{ $lead->GetSender->profile->managing_broker_name }}</span>
                                          
                                         
                                      </div>
                                      <div style="text-align: left; width: 250px; line-height: 25px;">
                                          <h2 style="margin-bottom: 5px; font-weight: 800; text-transform: uppercase;">Receiving Agent Information</h2>
                                          <span style="font-weight: 700">Name: </span>
                                          <span>{{ $lead->GetReceiver->name }}</span>
                                          <br>
                                          <span style="font-weight: 700">Address: </span>
                                          <span>{{ $lead->GetReceiver->profile->agent_address }}</span>
                                          <br> 
                                          <span style="font-weight: 700">Brokerage/Company: </span>
                                          <span>{{ $lead->GetReceiver->profile->brokerage_company }}</span>
                                          <br>
                                          <span style="font-weight: 700">Phone: </span>
                                          <span>{{ $lead->GetReceiver->profile->phone }}</span>
                                          <br>
                                          <span style="font-weight: 700">Email: </span>
                                          <span>{{ $lead->GetReceiver->email }}</span>
                                          <br>
                                          <span style="font-weight: 700">License Number: </span>
                                          <span>{{ $lead->GetReceiver->profile->license_number }}</span>
                                          <br>
                                          <span style="font-weight: 700">License State: </span>
                                          <span>{{ $lead->GetReceiver->profile->license_state }}</span>
                                          <br>
                                          <span style="font-weight: 700">Agent Website: </span>
                                          <span>{{ $lead->GetReceiver->profile->agent_website }}</span>
                                          <br>
                                          <span style="font-weight: 700">Managing Broker: </span>
                                          <span>{{ $lead->GetReceiver->profile->managing_broker_name }}</span>
                                         
                                         
                                      </div>
                                 </div>

                                 <div style="width: 100%; text-align: left; max-width: 93%; margin: 0 auto">
                                  <h2 style="margin-bottom: 5px; font-weight: 800; text-transform: uppercase;">Lead information</h2>
                                     <div class="lead_info">
                                        <span style="font-weight: 700">Name: </span>
                                        <span>{{ $lead->name }}</span>
                                     </div>

                                     <div class="lead_info">
                                        <span style="font-weight: 700">Lead Type: </span>
                                        <span>{{ $lead->lead_type }}</span>
                                     </div>

                                     <div class="lead_info">
                                        <span style="font-weight: 700">Address: </span>
                                        <span>{{ $lead->address }}</span>
                                    </div>

                                     <div class="lead_info">
                                        <span style="font-weight: 700">Phone: </span>
                                        <span>{{ $lead->phone }}</span>
                                    </div>

                                     <div class="lead_info">
                                        <span style="font-weight: 700">Email: </span>
                                        <span>{{ $lead->email }}</span>
                                    </div>

                                     <div class="lead_info">
                                         <span style="font-weight: 700">Comments: </span>
                                         <span style="overflow-wrap: anywhere;">{{ $lead->comments }}</span>
                                     </div>

                                 </div>

                                 <br>

                                 <span style="font-size:16px; text-align: justify;"><i>It is hereby understood and agreed upon that to be a member of Referral-Agent.com and to give and receive referrals upon this site, the Receiving Broker/Agent must agree to pay out 25% of the gross commission on the commission side they represent (buyer, seller, or both) upon successful completion of sale. This referral fee is to be paid to the Referring Broker/Agent and/or their managing/responsible broker. Payment to be made to Referring Agent’s company (Brokerage) in conjunction with the above referenced purchase transaction (Referral Fee). Such referral fee shall be paid to the Referring within fourteen (14) business days after successful Closing/Settlement. There is no expiration date for this Referral Agreement. If any dispute is made during, before, or after the referral is made, it is agreed upon by all parties (Referring Agent, Receiving Agent, and Referral-Agent.com), that Referral-Agent.com will be help harmless and the dispute will be handled solely between the Referral and Referring agents and their respective brokerages. Any agent(s), brokers(s), or brokerages found to be in violation of any of these terms will be permanently banned from use of Referral-Agent.com.  Referral-Agent.com reserves the right to revoke, suspend, or cancel any partner agent’s account at any time and for any reason
                                  .</i></span>

                              <div style="width: 100%; text-align: left; max-width: 93%; margin: 0 auto">
                                  <h2 style="margin-bottom: 5px; font-weight: 800; text-transform: uppercase;">Acknowledged by:</h2>
                                  <div class="ackn_div">
                                      <div>
                                      <span style="font-weight: 700">Referring Agent:</span>
                                      <span>@if($lead->sender_sing == 1)
                                              <img style=" width: 150px; height: 70px;" src="{{ $lead->GetSender->profile->signature }}">
                                          @endif</span>
                                      </div>
                                      <div>
                                      <span style="font-weight: 700">Date:</span>
                                      <span>{{ date_format($lead->created_at,'d-m-Y') }}</span>
                                      </div>
                                  </div>
                                  <div class="ackn_div">
                                      <div>
                                      <span style="font-weight: 700">Phone:</span>
                                      <span>{{ $lead->GetSender->profile->phone }}</span>
                                      </div>
                                      <div>
                                      <span style="font-weight: 700">Email:</span>
                                      <span>{{ $lead->GetSender->email }}</span>
                                      </div>
                                  </div>
                                  <div class="ackn_div">
                                    <div>
                                      <span style="font-weight: 700">Receiving Agent:</span>
                                      <span>@if($lead->receiver_sing == 1)
                                              <img style=" width: 150px; height: 70px;" src="{{ $lead->GetReceiver->profile->signature }}">
                                          @endif</span>
                                    </div>
                                      <div>

                                      <span style="font-weight: 700">Date:</span>
                                      <span>{{ date('d-m-Y',strtotime($lead->recever_date)) }}</span>
                                      </div>
                                  </div>
                                  <div class="ackn_div">
                                      <div>
                                          <span style="font-weight: 700">Phone:</span>
                                          <span>{{ $lead->GetReceiver->profile->phone }}</span>
                                      </div>
                                      <div>
                                          <span style="font-weight: 700">Email:</span>
                                          <span>{{ $lead->GetReceiver->email }}</span>
                                      </div>
                                  </div>

                              </div>

                                 <br><br><br>
                                 {{-- <span style="font-size:30px"><b>ali</b></span><br/><br/>
                                 <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
                                 <span style="font-size:30px">zuhair</span> <br/><br/>
                                 <span style="font-size:20px">with score of <b> 000000</b></span> <br/><br/>
                                 <span style="font-size:25px"><b></b></span> <br/> <br/> --}}
                                 {{--<div style="display: inline-block; position: relative;">--}}
                                  {{--@if($lead->sender_sing == 1)--}}
                                    {{--<img style="display: block; width: 150px; height: 70px;" src="{{ $lead->GetSender->profile->signature }}">--}}
                                  {{--@endif  --}}
                                    {{--<span style="font-size: 14px;"><i>Sender Agent Signature</i></span>--}}
                                  {{--</div>--}}
                                 {{--<div style="display: inline-block; margin: 0 60px;"><span style="font-size:25px"><i></i></span><br>--}}
                                 {{--<span style="font-size:25px"><i>{{ date_format($lead->created_at,'d-M-Y') }}</i></span><br></div>--}}
                                 {{--<div style="display: inline-block; position: relative;">--}}
                                   {{--@if($lead->receiver_sing == 1)--}}
                                    {{--<img style="display: block; width: 150px; height: 70px;" src="{{ $lead->GetReceiver->profile->signature }}">--}}
                                   {{--@endif --}}
                                    {{--<span style="font-size: 14px;"><i>Receiving Agent Signature</i></span>--}}
                                  {{--</div>--}}
                          </div>
                          </div>
                          </center>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  --}}
  <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
  <script type="text/javascript">
    $("#btn").click(function () {
        $("#printarea").print();
    });


  </script>
  <script type="text/javascript" src="//html2canvas.hertzen.com/dist/html2canvas.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script type="text/javascript">
  function genPDF()
  {
   html2canvas($('#printarea'),{
   onrendered:function(canvas){

    var width = canvas.width;
                var height = canvas.height;
                var millimeters = {};
                millimeters.width = Math.floor(width * 0.264583);
                millimeters.height = Math.floor(height * 0.264583);

                var imgData = canvas.toDataURL(
                    'image/png');
                var doc = new jsPDF("p", "mm", "a4");
                doc.deletePage(1);
                doc.addPage(millimeters.width, millimeters.height);
                doc.addImage(imgData, 'PNG', 0, 0);
                doc.save('{{ $lead->GetSender->name }}-and-{{ $lead->GetReceiver->name }}.pdf');
   }

   });

  }
  </script>
@endpush
