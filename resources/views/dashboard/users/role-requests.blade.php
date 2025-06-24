@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Role Change Requests</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Requested Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->requested_role }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <form action="{{ route('admin.updateRequest', $request->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button name="status" value="approved" class="btn btn-success">Approve</button>
                                <button name="status" value="rejected" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection