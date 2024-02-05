@extends('frontend.layouts.master')

@section('styles')
<style>
    .detailBox {
      width:500px;
      border:1px solid #bbb;
      margin:50px;
  }
  .titleBox {
      background-color:#fdfdfd;
      padding:10px;
  }
  .titleBox label{
    color:#444;
    margin:0;
    display:inline-block;
  }

  .commentBox {
      padding:10px;
      border-top:1px dotted #bbb;
  }
  .commentBox .form-group:first-child, .actionBox .form-group:first-child {
      width:80%;
  }
  .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
      width:80%;
  }
  .actionBox .form-group * {
      width:100%;
  }
  .taskDescription {
      margin-top:10px 0;
  }
  .commentList {
      padding:0;
      list-style:none;
      max-height:200px;
      overflow:auto;
  }
  .commentList li {
      margin:0;
      margin-top:10px;
  }
  .commentList li > div {
      display:table-cell;
  }
  .commenterImage {
      width:30px;
      margin-right:5px;
      height:100%;
      float:left;
  }
  .commenterImage img {
      width:100%;
      border-radius:50%;
  }
  .commentText p {
      margin:0;
  }
  .sub-text {
      color:#aaa;
      font-family:verdana;
      font-size:11px;
  }
  .actionBox {
      border-top:1px dotted #bbb;
      padding:10px;
  }
</style>
@endsection

@section('content')

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
            <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Confused</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!-- news__area_start  -->
    <div class="news__area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Eliminate The Confused </span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$confused->name}} #1
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      {{$confused->description}}.
                    </div>
                  </div>
                </div>
                @foreach($confuseds as $key => $confused)
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_{{$confused->id}}" aria-expanded="false" aria-controls="collapseTwo">
                        {{$confused->name}} #{{ $key + 2 }}
                      </button>
                    </h5>
                  </div>
                  <div id="collapse_{{$confused->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      {{$confused->description}}.
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
        </div>
    </div>
    <!-- news__area_end  -->

    

    <div class="row">
      <div class="col-md-6">
        <div  class="make_donation_area ">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section_title text-center mb-55">
                          <h3><span>Make a Donation</span></h3>
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <form action="{{ route('confused.or.organ.from') }}" class="donation_form" method="POST">
                          @csrf
                          <div class="row align-items-center">
                             
                              <div class="col-md-12">
                                  <div class="single_amount">
                                     <div class="fixed_donat d-flex align-items-center justify-content-between">
                                         <div class="select_prise">
                                             <h4>Select :</h4>
                                         </div>
                                          <div class="single_doonate"> 
                                              <input type="radio" id="blns_1" name="orgen_donate" required value="yes">
                                              <label for="blns_1">Yes</label>
                                          </div>
                                          
                                          <div class="single_doonate"> 
                                              <input type="radio" id="Confused" name="orgen_donate" value="confused">
                                              <label for="Confused">Confused</label>
                                          </div>
                                     </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <div class="donate_now_btn text-center">
                                      <button type="submit" class="boxed-btn4">Donate Now</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              
          </div>
      </div>
      </div>



      <div class="col-md-6">
      <div class="detailBox">
          <div class="titleBox">
            <label>Comment Box</label>
              <button type="button" class="close" aria-hidden="true">&times;</button>
          </div>
          <div class="commentBox">
              
              <p class="taskDescription">Contact us to know more about organ donation search.</p>
          </div>
          <div class="actionBox">
              <ul class="commentList">
                @foreach($comments as $comment)
                  <li>
                      <div class="commenterImage">
                        {{-- <img src="http://placekitten.com/50/50" /> --}}
                      </div>
                      <div class="commentText">
                          <p class="">{{$comment->user->name}} : {{$comment->description}}.</p>
                          <p class="">Admin : @if($comment->replay) {{$comment->replay}} @else No replay @endif .</p> 
                      </div>
                  </li>
                @endforeach
                  
              </ul>
              <form class="form-inline" role="form" action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                      <input class="form-control" name="description" type="text" placeholder="Your comments" required />
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-default">Send</button>
                  </div>
              </form>
          </div>
      </div>
      </div>
    </div>
@endsection    

@section('scripts')
@endsection