@extends('layouts.app', ['activePage' => 'roomindex', 'titlePage' => __('Rooms List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Rooms liste</h4>
        
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
                    Hotel
                  </th>
                  <th>
                    Type
                  </th>
                  <th>
                    Nb Adulte
                  </th>
                  <th>
                    Nb Children
                  </th>
                  
                  <th>
                    Price
                  </th>
                  <th>
                    Descreption
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    
                  </th>
                </thead>
                <tbody>
                  @foreach($room as $rooms)
                  <tr>
                    <td>
                     {{$rooms->id}}
                    </td>
                    <td>
                      {{$rooms->room_name}}
                    </td>
                    <td>
                      {{$rooms->hotel_name}}
                    </td>
                    <td>
                      {{$rooms->type}}
                    </td>
                    <td>
                      {{$rooms->nb_adulte}}
                    </td>
                    <td>
                      {{$rooms->nb_children}}
                    </td>
                 
                    <td>
                      {{$rooms->price}}
                    </td>

                    <td>
                      {{$rooms->descreption}}
                    </td>

                  

              
                 

                    <td>
                     <img src="{{$rooms->image}}" height="45" width="45"  />
                    </td>



                    <td>
                      <a class="" href="Update/room/{{$rooms->id}}">
                      <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                        <i class="material-icons">edit</i>
                      </button>
                      </a>


                    @if($rooms->activated == 'active')
                    <form method="get" action="{{ route('room.delete' , $rooms->id) }}" >
                      @csrf
                      <input hidden value={{$rooms->id}} name="id"/>
                      <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                        <i class="material-icons">delete</i>
                      </button>
                      @endif


                      @if($rooms->activated == 'inactive')
                      <form method="get" action="{{ route('room.restore' , $rooms->id) }}" >
                        @csrf
                        <input hidden value={{$rooms->id}} name="id"/>
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