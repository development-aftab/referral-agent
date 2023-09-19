<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral-Agent</title>
</head>

<body>
    <div style=" background-color: #fff;">
      
        <section style="padding: 80px 0;">
            <div style="display: block;">
               
                <!-- <div style=" height: 320px;text-align: center;">
                    <img src="" alt="" style="width: 53%; height: 100%;">
                </div> -->

                <div style="width: 100%; max-width: 50%; color: #000; margin: 0 auto; box-shadow: 0 0 10px lightgray; padding: 50px; border-radius: 10px;">
                    <div>
                        <h3>You have received a lead from a real estate professional on Referral-Agent.com  </h3>
                    </div>
                    <div style="padding: 10px 0;">
                        <h4 style="display: inline-block; margin-bottom: 0; width: 140px; margin-top: 0; word-break: break-word; vertical-align: top;">Your user ID is:</h4>
                        <p style="display: inline-block;margin-bottom: 0; width: 180px; margin-top: 0; word-break: break-word; vertical-align: top;">{{ $data['email'] }}</p>
                    </div>
                   {{--  <div style="display: flex; align-items: center; padding: 10px 0;">
                        <h4 style="margin-bottom: 0; min-width: 180px; margin-top: 0;">Your Password is:</h4>
                        <p style="margin-bottom: 0; margin-top: 0;">{{ $data['password'] }}</p>
                    </div> --}}
                    <div style="">
                        <p style="margin-bottom: 0;">Please log in to see and accept the lead.  Time is of the essence as other agents may have also been shared this lead by the referring party.</p>
                    </div>
                    <div style="">
                        <p style="margin-bottom: 0;">Please tell any other real estate professionals who may accept referrals about our site.</p>
                    </div>
                    <div style="">
                        <p style="margin-bottom: 0;">If you have any questions or comments, please email us at <a href="mailto:admin@referral-agent.com"> admin@referral-agent.com</a>.!</p>
                    </div>
                    <div style="">
                        <p style="margin-bottom: 0;">A link to our terms and conditions can be found <a href="{{ route('terms_and_conditions') }}"> HERE</a>.</p>
                    </div>
                    <div style="margin-top: 50px;">
                        <p>Thanks,</p>
                    </div>
                    <div>
                        <p>The Referral-Agent Team.</p>
                    </div>
                </div>

            </div>
           
        </section>
        
     </div>
</body>

</html>