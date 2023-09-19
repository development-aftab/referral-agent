    @foreach ($noti as $element)
      @if($element->type == 'agentacceptlead') 
        <li>
            <div class="message-center">
                <a  class='anchor' href="{{ url($element->redirect_url) }}" data-id='{{ $element->id }}' data-url='{{ url($element->redirect_url) }}'>
                    <div class="user-img">
                        <img src="{{asset('website')}}/images/noti.jpg" alt="user" class="img-circle">
                        
                    </div>
                    <div class="mail-contnet">
                        <h5>Lead Request Accepted</h5>
                        <span class="mail-desc">{{ $element->description }}</span>
                        
                    </div>
                </a>
              
            </div>
        </li>
      @elseif($element->type == 'agentrejectlead')
        <li>
            <div class="message-center">
                <a class='anchor' href="{{ url($element->redirect_url) }}" data-id='{{ $element->id }}' data-url='{{ url($element->redirect_url) }}'>
                    <div class="user-img">
                        <img src="{{asset('website')}}/images/noti.jpg" alt="user" class="img-circle">
                        
                    </div>
                    <div class="mail-contnet">
                        <h5>Lead Request Rejected</h5>
                        <span class="mail-desc">{{ $element->description }}</span>
                        
                    </div>
                </a>
              
            </div>
        </li>
      @elseif($element->type == 'buyerleadsend')
         <li>
            <div class="message-center">
                <a class='anchor' href="{{ url($element->redirect_url) }}" data-id='{{ $element->id }}' data-url='{{ url($element->redirect_url) }}'>
                    <div class="user-img">
                        <img src="{{asset('website')}}/images/noti.jpg" alt="user" class="img-circle">
                        
                    </div>
                    <div class="mail-contnet">
                        <h5>You Have New  Request</h5>
                        <span class="mail-desc">{{ $element->description }}</span>
                        
                    </div>
                </a>
              
            </div>
        </li>
      @elseif($element->type == 'leadcanceled')
         <li>
            <div class="message-center">
                <a class='anchor' href="{{ url($element->redirect_url) }}" data-id='{{ $element->id }}' data-url='{{ url($element->redirect_url) }}'>
                    <div class="user-img">
                        <img src="{{asset('website')}}/images/noti.jpg" alt="user" class="img-circle">
                        
                    </div>
                    <div class="mail-contnet">
                        <h5>Agent lead Canceled  </h5>
                        <span class="mail-desc">{{ $element->description }}</span>
                        
                    </div>
                </a>
              
            </div>
        </li>
      @elseif($element->type == 'makeageement')
         <li>
            <div class="message-center">
                <a class='anchor' href="{{ url($element->redirect_url) }}" data-id='{{ $element->id }}' data-url='{{ url($element->redirect_url) }}'>
                    <div class="user-img">
                        <img src="{{asset('website')}}/images/noti.jpg" alt="user" class="img-circle">
                        
                    </div>
                    <div class="mail-contnet">
                        <h5>Agent Make Agreement</h5>
                        <span class="mail-desc">{{ $element->description }}</span>
                        
                    </div>
                </a>
              
            </div>
        </li>
        @elseif($element->type == 'sallerleadsend')
         <li>
            <div class="message-center">
                <a class='anchor' href="{{ url($element->redirect_url) }}" data-id='{{ $element->id }}' data-url='{{ url($element->redirect_url) }}'>
                    <div class="user-img">
                        <img src="{{asset('website')}}/images/noti.jpg" alt="user" class="img-circle">
                        
                    </div>
                    <div class="mail-contnet">
                        <h5>You Have New  Request</h5>
                        <span class="mail-desc">{{ $element->description }}</span>
                        
                    </div>
                </a>
              
            </div>
        </li>
      @endif
        
    @endforeach    

<li>
    <a class="text-center" >
        <strong>See notifications</strong>
        <i class="fa fa-angle-right"></i>
    </a>
</li>