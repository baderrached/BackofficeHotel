@extends('layouts.app', ['activePage' => 'extraindex', 'titlePage' => __('Extra Menu')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Extra Menu</h4>
        
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
                      {{$extras->id}}
                    </td>
                    <td>
                      {{$extras->name}}
                    </td>
                    <td>
                      {{$extras->category}}     
                    </td>
                    
                    <td>
                      {{$extras->descreption}}     
                    </td>
                    <td class="text-primary">
                      {{$extras->price}}
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