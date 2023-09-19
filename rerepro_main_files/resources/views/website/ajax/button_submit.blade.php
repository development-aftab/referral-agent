<input type="hidden" name="price" value="{{ $val }}">
@if($val == "0")
          <input type="hidden" name="sub" value="basic">
           <button id="confirm_booking" class="btn btn-outline-success btn_signup_3  custom-btn btn-7"  id="submit" type="submit">
                 <span>  SIGN UP</span>
                </button>
    
@else
            @if($val == 99)
            	  <input type="hidden" name="sub" value="yearly">
            	  <input type="hidden" name="price" value="99">
            @elseif($val == 10)
            	  <input type="hidden" name="sub" value="monthly">
            	  <input type="hidden" name="price" value="10">
            @endif
            <button  class="btn btn-outline-success btn_signup_3  custom-btn btn-7"  type="button" data-bs-toggle="modal"     data-bs-target="#online_personal_training_payment">
                 <span>  SIGN UP </span>
                </button>
 
  
@endif 
