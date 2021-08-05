@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Hotel Edit')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         
            

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Hotel Edit') }}</h4>
       
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                @foreach ($hotel as $hotels)
                {{-- modifier action --}}
                <form method="POST" action="/hoteledit/{{$hotels->id}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$hotels->name}}" required="true" aria-required="true"/>
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Location') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="location" id="input-email" type="text" placeholder="{{ __('location') }}" value="{{$hotels->location}}" required />
                    
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                <img src="/images/{{$hotels->image}}">
                    
                
                        <input type="file" class="form-control inputFileVisible" name="image" value="{{$hotels->image}}">
                        
                   
                  </div>
                </div>




              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update ') }}</button>
              </div>
            </div>
          </form>
          @endforeach
        </div>
      </div>
   
    </div>
  </div>
@endsection