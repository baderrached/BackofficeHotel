@extends('layouts.app', ['activePage' => 'extraindex', 'titlePage' => __('Extra Menu')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Intervention Demande</h4>
        
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
                    Status
                  </th>
              
                </thead>
                <tbody>
                  @foreach($inter as $inters)
                  <tr>
                    <td>
                      {{$inters->id}}
                    </td>
                    <td>
                      {{$inters->user_name}}
                    </td>
                    <td>
                      {{$inters->room_id}}     
                    </td>

                  @if($inters->status == 0)
                 <td>
                  <form method="get"
                  action="{{ route('interv.done', $inters->id) }}">
                  @csrf
                  <input hidden value={{ $inters->id }} name="id" />
                  <button type="submit" rel="tooltip"
                      class="btn btn-success btn-round">
                      Done
                      <i class="material-icons"></i>
                  </button>
              </form>
            </td>

                  @endif



                  @if($inters->status == 1)
                    <td> Done </td>

                  @endif
                   
               
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