@extends('layouts.app', ['activePage' => 'Reservation', 'titlePage' => __('Reservation List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Reservation liste</h4>
        
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
                    Room_ID
                  </th>
                  <th>
                    From
                  </th>
                  <th>
                    To
                  </th>
                  <th>
                    Amount
                  </th>
                </thead>
                <tbody>
                  @foreach ($res as $ress)
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
                      <form method="POST" action="{{ route('res.edit') }}" >
                        @csrf
                        <input hidden value={{$ress->id}} name="id"/>
                        <input hidden value={{$ress->status}} name="status"/>
                        @if($ress->status == 0)
                          <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                            <span>Check in</span>
                          </button>
                        @elseif($ress->status == 1)
                          <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                            <span>Check Out</span>
                          </button>
                        
                        @endif
                     
                      </form>
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