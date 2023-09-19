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

        .inner_section_privacyPolicy{padding: 100px 0;}
        .inner_section_privacyPolicy .main_heading {padding-bottom: 20px;}
        .inner_section_privacyPolicy .main_heading h2 {color: black;}
        .inner_section_privacyPolicy .privacy_policy_content .inner_heading h4 {font-weight: 900;}

    </style>

    <div class="m_s_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner_section_privacyPolicy">
                        <div class="main_heading">
                            <h2>Privacy Policy</h2>
                        </div>
                        <div class="privacy_policy_content">
                            <div class="content_sec1">
                                <p>This privacy policy ("policy") will help you understand how Referral-Agent.com</p>
                                <p>Referral-Agent.com uses and protects the data you provide to us when you visit and use Referral-Agent.com.</p>
                                <p>We reserve the right to change this policy at any given time, of which you will be promptly updated.
                                    If you want to make sure that you are up to date with the latest changes, we advise you to frequently visit this page.</p>
                            </div>
                            <div class="content_sec2">
                                <div class="inner_heading">
                                    <h4>What User Data We Collect</h4>
                                </div>
                                <div class="inner_content">
                                    <p>When you visit the website, we may collect the following data:</p>
                                    <ul>
                                        <li>Your IP address.</li>
                                        <li>Your contact information and email address.</li>
                                        <li>Other information such as interests and preferences.</li>
                                        <li>Data profile regarding your online behavior on our website.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content_sec3">
                                <div class="inner_heading">
                                    <h4>Why We Collect Your Data</h4>
                                </div>
                                <div class="inner_content">
                                    <p>We are collecting your data for several reasons:</p>
                                    <ul>
                                        <li>To better understand your needs.</li>
                                        <li>To improve our services and products.</li>
                                        <li>To send you promotional emails containing the information we think you will find interesting.</li>
                                        <li>To contact you to fill out surveys and participate in other types of market research.</li>
                                        <li>To customize our website according to your online behavior and personal preferences.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content_sec4">
                                <div class="inner_heading">
                                    <h4>Safeguarding and Securing the Data</h4>
                                </div>
                                <div class="inner_content">
                                    <p>Referral-Agent.com is committed to securing your data and keeping it confidential.
                                        Referral-Agent.com has done all in its power to prevent data theft, unauthorized access,
                                        and disclosure by implementing the latest technologies and software, which help us safeguard all
                                        the information we collect online.
                                    </p>
                                </div>
                            </div>
                            <div class="content_sec5">
                                <div class="inner_heading">
                                    <h4>Our Cookie Policy</h4>
                                </div>
                                <div class="inner_content">
                                    <p>
                                        Once you agree to allow our website to use cookies, you also agree to use the data
                                        it collects regarding your online behavior (analyze web traffic, web pages you spend the
                                        most time on, and websites you visit).
                                    </p>
                                    <p>
                                        The data we collect by using cookies is used to customize our website to your needs.
                                        After we use the data for statistical analysis, the data is completely removed from our systems.
                                    </p>
                                    <p>
                                        Please note that cookies don't allow us to gain control of your computer in any way.
                                        They are strictly used to monitor which pages you find useful and which you do not so that we
                                        can provide a better experience for you.
                                    </p>
                                    <p>
                                        If you want to disable cookies, you can do it by accessing the settings of your internet browser.
                                        (Provide links for cookie settings for major internet browsers).
                                    </p>
                                </div>
                            </div>
                            <div class="content_sec6">
                                <div class="inner_heading">
                                    <h4>Links to Other Websites</h4>
                                </div>
                                <div class="inner_content">
                                    <p>
                                        Our website contains links that lead to other websites. If you click on these links
                                        Referral-Agent.com is not held responsible for your data and privacy protection.
                                        Visiting those websites is not governed by this privacy policy agreement. Make sure to
                                        read the privacy policy documentation of the website you go to from our website.
                                    </p>
                                </div>
                            </div>
                            <div class="content_sec7">
                                <div class="inner_heading">
                                    <h4>Restricting the Collection of your Personal Data</h4>
                                </div>
                                <div class="inner_content">
                                    <p>
                                        At some point, you might wish to restrict the use and collection of your personal data. You can achieve this by doing the following:
                                    </p>
                                    <p>
                                        When you are filling the forms on the website, make sure to check if there is a box which you can
                                        leave unchecked, if you don't want to disclose your personal information.
                                    </p>
                                    <p>
                                        If you have already agreed to share your information with us, feel free to contact us via email
                                        and we will be more than happy to change this for you.
                                    </p>
                                    <p>
                                        Referral-Agent.com will not lease, sell or distribute your personal information to any third parties,
                                        unless we have your permission. We might do so if the law forces us. Your personal information will be
                                        used when we need to send you promotional materials if you agree to this privacy policy.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection