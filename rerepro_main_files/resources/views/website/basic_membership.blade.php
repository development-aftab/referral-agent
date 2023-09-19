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
        @media only screen and (max-width: 425px) {
            .m_s_sec .m_s_table {
                overflow-x: auto;
            }
        }

    </style>

    <div class="m_s_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="m_s_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Premium Membership</th>
                                    <th>Basic (free) Membership</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Search our extensive database of Referral Agents.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td><i class="fas fa-check-double"></i></td>
                                </tr>
                                <tr>
                                    <td>Contact any of our Referral Agents.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td><i class="fas fa-check-double"></i></td>
                                </tr>
                                <tr>
                                    <td>See Referral Agreements of all Referral Agents.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td><i class="fas fa-check-double"></i></td>
                                </tr>
                                <tr>
                                    <td>Market your real estate business on our site.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td><i class="fas fa-check-double"></i></td>
                                </tr>
                                <tr>
                                    <td>See all agents within 30 miles of your referral destination.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td><i class="fas fa-check-double"></i></td>
                                </tr>
                                <tr>
                                    <td>Set up to 5 locations to be listed as a Referral Agent.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Access to premier referral training, tips, and tools.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Get listed as a Premier Referral Agent</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Add a headshot to your profile.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Add a logo to your profile.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Add a bio or “about me” to your profile.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Get Premier Agent workflow and tracking with referrals.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Robust referral lead tracking.</td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Ability to receive discounts and promotions from other Referral Agent partners.
                                    </td>
                                    <td><i class="fas fa-check-double"></i></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection