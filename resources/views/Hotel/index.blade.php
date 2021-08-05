@extends('layouts.app', ['activePage' => 'hotelindex', 'titlePage' => __('Hotel List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Hotel liste</h4>
        
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Number of rooms
                  </th>
                  <th>
                    Location
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  @foreach($hotel as $hotels)
                  <tr>
                    <td>
                      {{$hotels->id}}
                    </td>
                    <td>
                      {{$hotels->name}}
                    </td>
                    <td class="text-primary">
                      {{$hotels->room}}
                    </td>
                    <td>
                      {{$hotels->location}}
                    </td>

                    <td>
                     <img  src="/images/{{$hotels->image}}" />
                    </td>
                   
                      <td>
                        <a href="Update/Hotel/{{$hotels->id}}" >
                        
                          <input hidden value={{$hotels->id}} name="id"/>
                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                          <i class="material-icons">edit</i>
                        </button>
                        </a>
  
  
                      @if($hotels->status == 'active')
                      <form method="get" action="{{ route('hotel.delete' , $hotels->id) }}" >
                        @csrf
                        <input hidden value={{$hotels->id}} name="id"/>
                        <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                          <i class="material-icons">delete</i>
                        </button>
                        @endif
  
  
                        @if($hotels->status == 'inactive')
                        <form method="get" action="{{ route('hotel.restore' , $hotels->id) }}" >
                          @csrf
                          <input hidden value={{$hotels->id}} name="id"/>
                          <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                            <i class="material-icons">restore</i>
                          </button>
                          @endif
  
  
  
  
  
  
                      </td>
                    
                    
                  </tr>
               @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
</div>
@endsection