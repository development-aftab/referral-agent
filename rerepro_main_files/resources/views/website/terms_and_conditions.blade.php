@extends('website.layout.master')
@section('content')
    <style>
        .table {
            
            border-radius: 1em;
            overflow: hidden;
            box-shadow: 0px 10px 30px grey;
            border: 1px solid #ff6600;
        }

        .table thead th,
        .table tbody td {
            border: 1px solid #ff6600;
        }
        .table tbody tr td:first-child{
            width: 45%;
        }
        .table tbody tr td:nth-child(2),
        .table tbody tr td:nth-child(3){
            width: 25%;
            color: #ff6600;
        }

        .inner_section_termsCondition .main_heading h2{color: black;}
        .inner_section_termsCondition {padding: 100px 0;}

    </style>

    <div class="m_s_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner_section_termsCondition">
                        <div class="main_heading">
                            <h2>TERMS AND CONDITIONS</h2>
                        </div>
                        <div class="terms_condition_content">
                            <p>
                                It is hereby understood and agreed upon that to be a member of Referral-Agent.com and to give and receive
                                referrals upon this site, the Receiving Broker/Agent must agree to pay out 25% of the gross commission
                                on the commission side they represent (buyer, seller, or both) upon successful completion of sale.
                                This referral fee is to be paid to the Referring Broker/Agent and/or their managing/responsible broker.
                                Payment to be made to Referring Agent’s company (Brokerage) in conjunction with the above referenced purchase
                                transaction (Referral Fee). Such referral fee shall be paid to the Referring within fourteen (14) business days
                                after successful Closing/Settlement. There is no expiration date for this Referral Agreement. If any dispute is
                                made during, before, or after the referral is made it is agreed upon by all parties (Referring Agent, Receiving Agent,
                                and Referral-Agent.com) that Referral-Agent.com will be help harmless and the dispute will be handled solely between
                                the Referral and Referring agents and their respective brokerages. Any agent(s), brokers(s), or brokerages found to be
                                in violation of any of these terms will be permanently banned from use of Referral-Agent.com.  Referral-Agent.com reserves
                                the right to revoke, suspend, or cancel any partner agent’s account at any time and for any reason.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection