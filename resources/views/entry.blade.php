@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row m-2 justify-content-center">
        <h2>Time Entry</h2>
    </div>
    <div class="d-flex justify-content-end m-3" data-kt-user-table-toolbar="base">
        <a href="{{route('add-entry')}}" class="btn firebrick-light-button btn-primary">
            <i class="fa-solid fa-plus"></i>Add Entry
        </a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Project Name</th>
                <th scope="col">Task Name</th>
                <th scope="col">Hours</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($datas as $data)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{$data->task->project->name}}</td>
                <td>{{$data->task->name}}</td>
                <td>{{$data->hours}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->description}}</td>
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