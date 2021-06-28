@extends('layouts.app', ['activePage' => 'extraindex', 'titlePage' => __('Extra List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Extra liste</h4>
        
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Client Name
                  </th>
                  <th>
                    Room ID
                  </th>
                  <th>
                    Descreption
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Status
                  </th>
                </thead>
                <tbody>
                  @foreach($extra as $extras)
                  <tr>
                    <td>
                      {{$extras->ID}}
                    </td>
                    <td>
                      {{$extras->name}}
                    </td>
                    <td>
                      {{$extras->room_id}}     
                    </td>
                    
                    <td>
                      {{$extras->descreption}}     
                    </td>
                    <td class="text-primary">
                      {{$extras->price}}
                    </td>
                  
                   
                    <td>
                      {{$extras->status}}
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