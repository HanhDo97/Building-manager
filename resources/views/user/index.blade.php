@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Active</h3>
        <div class="row">
            <div class="col">
                <table class="table table-dark"c border="1px">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @foreach($users as $key => $user)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex">
                                            <div class="pr-1">
                                                <a href="{{ route('users.edit' , $user->id) }}" class="btn btn-info">Reset
                                                    Pass</a>
                                            </div>
                                            <div class="pr-1">
                                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
