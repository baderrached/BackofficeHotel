@extends('layouts.app', ['activePage' => 'adminindex', 'titlePage' => __('Spa and Resto List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Spa liste</h4>

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
                                            Image
                                        </th>
                                        <th>
                                            Hotel
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                    </thead>
                                    <tbody>
                                        @foreach ($spa as $spas)
                                            <tr>
                                                <td>
                                                    {{ $spas->id }}
                                                </td>
                                                <td>
                                                    {{ $spas->name }}
                                                </td>
                                                <td>
                                                    <img alt="img" src="images/{{ $spas->image }}" />
                                                </td>
                                                <td>
                                                    {{ $spas->hotel_name }}
                                                </td>
                                                <td>
                                                    @if ($spas->status == "inactive")
                                                    <form method="get"
                                                        action="{{ route('spa.restore', $spas->id) }}">
                                                        @csrf
                                                        <input hidden value={{ $spas->id }} name="id" />
                                                        <button type="submit" rel="tooltip"
                                                            class="btn btn-success btn-round">
                                                            <i class="material-icons">restore</i>
                                                        </button>
                                                    </form>
                                                @endif

                                                @if($spas->status == "active")
                                                <form method="get" action="{{ route('spa.delete' , $spas->id) }}" >
                                                  @csrf
                                                  <input hidden value={{$spas->id}} name="id"/>
                                                  <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                                                    <i class="material-icons">delete</i>
                                                  </button>
                                                </form>
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
