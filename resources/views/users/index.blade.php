@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">All Users</div>
        @if ($users->count() > 0)
            <table class="card-body ">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td >
                                @if (!$user->isAdmin())
                                    <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Make Admin</button>
                                    </form>
                                @else
                                    <form action="{{route('users.make-user',$user->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Make User</button>
                                    </form>
                                @endif
                            </td>
                            <td class="d-flex float-end">
                                <form class=" ml-2 form-group" action="{{route('users.destroy',$user->id)}}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </table>
        @else
            <div class="card-body text-center">
                <h4>No Users Yet.</h4>
            </div>
        @endif
    </div>

@endsection
