@extends('layouts.app', ['activePage' => 'spares', 'titlePage' => __('Spa and Resto REservation')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Spa and resto reservation</h4>

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
                                            Day
                                        </th>
                                        <th>
                                            Time
                                        </th>
                                        <th>
                                            Room_id
                                        </th>

                                    </thead>
                                    <tbody>
                                        @foreach ($spa as $spas)
                                            <tr>
                                                <td>
                                                    {{ $spas->id }}
                                                </td>
                                                <td>
                                                    {{ $spas->user_name }}
                                                </td>
                                             
                                                <td>
                                                    {{ $spas->day }}
                                                </td>
                                                <td>
                                                    {{ $spas->time }}
                                                </td>
                                                <td>
                                                    {{ $spas->room_id }}
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
