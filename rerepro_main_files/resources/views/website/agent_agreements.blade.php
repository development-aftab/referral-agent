@extends('website.layout.master')
@section('content')

<style type="text/css">
    .searchListing_section_2 .card.premium_card .Card_icons ul {list-style: none;}
.searchListing_section_2 .card.premium_card .Card_icons ul li i{font-size: 18px; margin-right: 5px;}
.searchListing_section_2 .first_card .first_card_company{width: 30%; flex: 0 0 30%;}
.searchListing_section_2 .first_card .first_card_info{width: 35%; flex: 0 0 35%;}
.searchListing_section_2 .first_card .first_card_info ul{list-style: none; padding-left: 0;}
.searchListing_section_2 .first_card .first_card_info ul li i{font-size: 18px; margin-right: 5px;}
.searchListing_section_1 .form-group.row {max-width: 30%;}
.section_1 .form-group #find_agent {top: 0%;right: 20px;}
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
                    <div class="inp_sub col-md-12 col-sm-9 col-9">
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
            <h4 data-aos="fade-up">Referal Agreements</h4>
        </div>
          <div class="row">
             <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Area</th><th>ZipCode</th><th>Lead Type</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referalagreement as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->zipcode }}</td><td>{{ $item->lead_type }}</td><td>@if($item->status == 0) Pending @elseif($item->status == 3) Canceled @elseif($item->status == 4) Rejected @elseif($item->status == 2) Fully Executed Referral Agreement @endif</td>
                                    <td>
                                     <a href="{{ url('web_get_certificate/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Agreement
                                                </button>
                                     </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
             </table>
          </div>
            
        </div>
    </div>
</section>


@endsection