@extends('layouts.app', ['activePage' => 'extralist', 'titlePage' => __('Extra Demande')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Extra Demande</h4>
        
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
                   Orders
                  </th>
                <th>
                  Action
              </th>
                
                </thead>
                <tbody>
                  @foreach($extra as $extras)
                  <tr>
                    <td>
                      {{$extras->id}}
                    </td>
                    <td>
                      {{$extras->user_name}}
                    </td>
                    <td>
                      {{$extras->orders}}
                    </td>
                    {{-- @foreach ($$extras->orders as $orders)
                        
                   
                    <td>
                      {{$orders->name}}     
                    </td>
                    @endforeach --}}
                    <td>
                      @if ($extras->status == "pending")
                      <form method="get"
                          action="{{ route('extra.done', $extras->id) }}">
                          @csrf
                          <input hidden value={{ $extras->id }} name="id" />
                          <button type="submit" rel="tooltip"
                              class="btn btn-success btn-round">
                              Done
                              <i class="material-icons"></i>
                          </button>
                      </form>
                  @endif

                  @if($extras->status == "Done")
                     <span> Done </span>
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