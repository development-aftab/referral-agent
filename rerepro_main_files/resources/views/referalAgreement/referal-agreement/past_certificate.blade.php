@extends('layouts.master')
@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<style type="text/css">
    .searchListing_section_2 .card.premium_card .Card_icons ul {list-style: none;}
.searchListing_section_2 .card.premium_card .Card_icons ul li i{font-size: 18px; margin-right: 5px;}
.searchListing_section_2 .first_card .first_card_company{width: 30%; flex: 0 0 30%;}
.searchListing_section_2 .first_card .first_card_info{width: 35%; flex: 0 0 35%;}
.searchListing_section_2 .first_card .first_card_info ul{list-style: none; padding-left: 0;}
.searchListing_section_2 .first_card .first_card_info ul li i{font-size: 18px; margin-right: 5px;}
.searchListing_section_1 .form-group.row {max-width: 30%;}
.section_1 .form-group #find_agent {top: 0%;right: 20px;}
.searchListing_section_2 .print_download_btns {padding-bottom: 30px;}
.searchListing_section_2 .print_download_btns a {color: white;}
</style>
@endpush

@section('content')
<!-- SECTION 01 -->
<hr>
<!-- END SECTION 01 -->



<!-- SECTION 02 -->
<section class="searchListing_section_2">
    <div class="container">
        <div class="row">
            {{-- <h4 data-aos="fade-up">Referal Agreements Certificate</h4> --}}
        </div>
          <div class="row">
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
                            height:716px; 
                            padding:20px;
                            text-align:center;
                            /*background: radial-gradient(ellipse at top, #FF9A00, transparent),
            radial-gradient(ellipse at bottom, #FF9A00, transparent);*/
                            background: linear-gradient(143deg, #ff9a006e, #ff9a0026);

                           
                              border: 10px solid #FF9A00;
                           
                          }
                          .body{width:870px;color:black;
                           height:655px;
                           padding:20px;
                           text-align:center;
                            
                              border: 5px solid #FF9A00;
                              background-image: linear-gradient(315deg, #FFFAF3 0%, #FFFAF3 74%)  !important
                              /*-webkit-print-color-adjust: exact; */
                           

                          }
                          @media print {
                             
                              /*body.printing * { display: none; }*/
                            
                              /*body.printing #print-me { display: block; }*/
                              .body{width:750px;
                           height:655px;
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
                          <div class="head" id="printarea">
                          <div class="body">
                                {{-- <img src="http://localhost:8000/storage/uploads/users/no_avatar.jpg" alt="user-img" class="img-circle" style="width: 50px;height: 50px"> --}}
                                 <span style="font-size:50px; text-transform: uppercase; font-weight:bold">Referral Agreement</span>
                                 <br><br>

                                 <div style="display: flex; justify-content: space-between; width: 100%; max-width: 75%; margin: 0 auto;" class="upper_section_certificate">

                              {{--    <div style="display: inline-block; position: relative;">
                                    <h3 style="font-weight: 700; font-size: 21px; color: black; line-height: 30px;">{{ $lead->GetSender->name }}</h3>
                                    <span style="font-size: 14px; border-top: 1px solid black;"><i>Sender Agent</i></span>
                                  </div>

                                 <div style="display: inline-block; position: relative;">
                                    <h3 style="font-weight: 700;  font-size: 21px; color: black; line-height: 30px;">{{ $lead->GetReceiver->name }}</h3>
                                    <span style="font-size: 14px; border-top: 1px solid black;"><i>Receiving Agent</i></span>
                                  </div> --}}

                                  </div>

                                 <br><br>
                                 <span style="font-size:16px; text-align: justify;"><i>It is hereby understood and agreed upon that to be a member of Referral-Agent.com and to give and receive referrals upon this site, the Receiving Broker/Agent must agree to pay out 25% of the gross commission on the commission side they represent (buyer, seller, or both) upon successful completion of sale. This referral fee is to be paid to the Referring Broker/Agent and/or their managing/responsible broker. Payment to be made to Referring Agent’s company (Brokerage) in conjunction with the above referenced purchase transaction (Referral Fee). Such referral fee shall be paid to the Referring within fourteen (14) business days after successful Closing/Settlement. There is no expiration date for this Referral Agreement. If any dispute is made during, before, or after the referral is made, it is agreed upon by all parties (Referring Agent, Receiving Agent, and Referral-Agent.com), that Referral-Agent.com will be help harmless and the dispute will be handled solely between the Referral and Referring agents and their respective brokerages. Any agent(s), brokers(s), or brokerages found to be in violation of any of these terms will be permanently banned from use of Referral-Agent.com.  Referral-Agent.com reserves the right to revoke, suspend, or cancel any partner agent’s account at any time and for any reason.
                                  </i></span>
                                 <br><br>
                                 {{-- <span style="font-size:30px"><b>ali</b></span><br/><br/>
                                 <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
                                 <span style="font-size:30px">zuhair</span> <br/><br/>
                                 <span style="font-size:20px">with score of <b> 000000</b></span> <br/><br/>
                                 <span style="font-size:25px"><b></b></span> <br/> <br/> --}}
                                 <div style="display: inline-block; position: relative;">
                                  @if($lead->sender_sing == 1)
                                    <img style="display: block; width: 150px; height: 70px;" src="{{ $lead->GetSender->profile->signature }}">
                                  @endif  
                                    <span style="font-size: 14px;"><i>Sender Agent Signature</i></span>
                                  </div>
                                 <div style="display: inline-block; margin: 0 60px;"><span style="font-size:25px"><i></i></span><br>
                                 <span style="font-size:25px"><i>{{ date_format($lead->created_at,'d-M-Y') }}</i></span><br></div>
                                 <div style="display: inline-block; position: relative;">
                                   @if($lead->receiver_sing == 1)
                                    <img style="display: block; width: 150px; height: 70px;" src="{{ $lead->GetReceiver->profile->signature }}">
                                   @endif 
                                    <span style="font-size: 14px;"><i>Receiving Agent Signature</i></span>
                                  </div>
                        {{--   <table style="margin-top:40px;float:left">
                          <tr>
                          <td><span><b>$student.getFullName()</b></td>
                          </tr>
                          <tr>
                          <td style="width:200px;float:left;border:0;border-bottom:1px solid #000;"></td>
                          </tr>
                          <tr>
                          <td style="text-align:center"><span><b>Signature</b></td>
                          </tr>
                          </table>
                          <table style="margin-top:40px;float:right">
                          <tr>
                          <td><span><b>$student.getFullName()</b></td>
                          </tr>
                          <tr>
                          <td style="width:200px;float:right;border:0;border-bottom:1px solid #000;"></td>
                          </tr>
                          <tr>
                          <td style="text-align:center"><span><b>Signature</b></td>
                          </tr>
                          </table> --}}
                          
                          </div>
                          </div>
                          </center>

                    </div>
                    <div style="width: 100%; text-align: center; margin-top: 25px;" class="print_download_btns">
                        {{-- <button class="btn btn-info" id="btn">Print Certificate</button> --}}
                        <a class="btn btn-info" href="javascript:genPDF()">Download PDF</a> 
                    </div>
          </div>
            
        </div>
    </div>
</section>


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

   var img=canvas.toDataURL("image/png");
   var doc = new jsPDF("p", "mm", "a4");
   
   doc.addImage(img,'JPEG',15,40, 180, 150);
   doc.save('Certificate.pdf');
   }

   });

  }
  </script>
@endpush