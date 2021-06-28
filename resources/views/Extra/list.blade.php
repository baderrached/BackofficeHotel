@extends('layouts.app', ['activePage' => 'extralist', 'titlePage' => __('extralist')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Extra list</h4>
        
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
                   Category
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Price
                  </th>
                
                </thead>
                <tbody>
                  {{-- @foreach ($res as $ress)
                  <tr>
                    <td>
                      {{$ress->id}}
                    </td>
                    <td>
                      {{$ress->user_id}}
                    </td>
                    <td>
                      {{$ress->room_id}}
                    </td>
                    <td>
                      {{$ress->from}}
                    </td>
                    <td>
                      {{$ress->to}}
                    </td>
                    <td class="text-primary">
                      {{$ress->amount}}
                    </td>
                    <td>
                   
                    </td>
                  </tr>
                 @endforeach --}}
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