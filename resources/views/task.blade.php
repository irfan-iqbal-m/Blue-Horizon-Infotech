@extends('layout.app')

@section('title', 'Task')

@section('content')
<div class="container">
    <div class="row m-2 justify-content-center">
        <h2>Manage Tasks</h2>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Project Name</th>
                <th scope="col">Task Name</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($datas as $data)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{$data->project->name}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->status_id==1 ? 'Active':'Inactive'}}</td>
            </tr>

            @empty
            <tr>
                <th colspan="3">No Records</th>
            </tr>
            @endforelse

        </tbody>
    </table>

</div>
@endsection