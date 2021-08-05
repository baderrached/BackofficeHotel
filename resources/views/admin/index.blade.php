@extends('layouts.app', ['activePage' => 'adminindex', 'titlePage' => __('Admin List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Admin liste</h4>

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
                                            Email
                                        </th>
                                        <th>
                                            Hotel
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $admins)
                                            <tr>
                                                <td>
                                                    {{ $admins->id }}
                                                </td>
                                                <td>
                                                    {{ $admins->name }}
                                                </td>
                                                <td>
                                                    {{ $admins->email }}
                                                </td>
                                                <td>
                                                    {{ $admins->hotel_name }}
                                                </td>
                                                <td>
                                                    <a href="Update/admin/{{ $admins->id }}">

                                                        <input hidden value={{ $admins->id }} name="id" />
                                                        <button type="button" rel="tooltip"
                                                            class="btn btn-success btn-round">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                    </a>

                                                    @if ($admins->deleted_at != null)
                                                        <form method="get"
                                                            action="{{ route('admin.restore', $admins->id) }}">
                                                            @csrf
                                                            <input hidden value={{ $admins->id }} name="id" />
                                                            <button type="submit" rel="tooltip"
                                                                class="btn btn-success btn-round">
                                                                <i class="material-icons">restore</i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($admins->deleted_at == NULL)
                                                    <form method="get" action="{{ route('admin.delete' , $admins->id) }}" >
                                                      @csrf
                                                      <input hidden value={{$admins->id}} name="id"/>
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
