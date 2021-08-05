@extends('layouts.app', ['activePage' => 'adminadd', 'titlePage' => __('sparestoadd')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         
            

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Spa Add') }}</h4>
       
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
                <form method="POST" action="/sparesto/add" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" required="true" aria-required="true"/>
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                 
                      <input type="file" class="form-control inputFileVisible" placeholder="image" name="image" >
                     
                   
                </div>

               
                
             


              


              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add ') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
   
    </div>
  </div>
@endsection