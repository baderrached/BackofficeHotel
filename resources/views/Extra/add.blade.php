@extends('layouts.app', ['activePage' => 'extraadd', 'titlePage' => __('extraadd')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         
            

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Extra Add') }}</h4>
       
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
                <form method="POST" action="/extrainsert" autocomplete="off" class="form-horizontal"  enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="price" id="input-email" type="number" placeholder="{{ __('Price') }}" value="" required />
                    
                    </div>
                  </div>
                </div>

                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Descreption') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="desc" id="input-email" type="text" placeholder="{{ __('Descreption') }}" value="" required />
                    
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select id="disabledSelect" class="form-control" name="category">
                        
                          <option value="food"> food </option>
                       

                        </select>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                
                    
                
                        <input type="file" class="form-control inputFileVisible" name="image">
                        {{-- <span class="input-group-btn">
                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                <i class="material-icons">attach_file</i>
                            </button>
                        </span> --}}
                   
                  </div>
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