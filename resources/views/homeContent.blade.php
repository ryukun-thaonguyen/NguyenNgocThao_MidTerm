<div id="vnt-content" style="margin-top: 115px;margin-left: 80px">
    <div class="lasttourHome mda-item-type-16" style="padding-top:15px;">
       <div class="contentHome">
           <div class="slideFluid width1 ">
               <div class="owl-stage-outer">
                   <div class="owl-stage" style="">
                           @foreach ($tours as $t )
                           <div class="item">
                               <div class="mda-box-type">
                                   <div class="mda-img-box">
                                       <a href="">
                                           <img class="lazyload" src="{{ $t->image }}" style="display: inline-block;">
                                           <div class="mda-box-lb">{{ $t->typetour }}</div>
                                       </a>
                                   </div>
                                   <div class="mda-img-box-info clearfix">
                                       <div class="mda-img-box-wrap">
                                           <p class="mda-time">Lịch trình: {{ $t->schedule }}</p>
                                           <p class="mda-time">Khởi hành: {{ $t->depart }}</p>
                                           <p class="mda-time">Số chỗ còn nhận: {{ $t->numberPeople }}</p>
                                           <p class="mda-price mda-distcoun">
                                               <span class="mda-dis">{{ number_format($t->price) }}VND</span> </p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endforeach
                   </div>
               </div>
           </div>
       </div>
</div>
</div>
