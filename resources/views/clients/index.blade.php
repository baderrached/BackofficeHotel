@extends('layouts.app', ['activePage' => 'clientindex', 'titlePage' => __('Client List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Client liste</h4>
        
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
                    Passeport / Cin
                  </th>
                  
                  <th>
                    gender
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    Reservation nb
                  </th>
                </thead>
                <tbody>
                  @foreach ($client as $clients)
                      
                 
                  <tr>
                    <td>
                      {{$clients->id}} 
                    </td>
                    <td>
                      {{$clients->first_name}} 
                    </td>
                   <td>
                      {{$clients->passeport_cin}} 
                   </td>
                   <td>
                      {{$clients->gender}} 
                    </td>
                    <td>
                      {{$clients->country}} 
                    </td>
                    <td class="text-primary">
                      {{$clients->nb_reservation}} 
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