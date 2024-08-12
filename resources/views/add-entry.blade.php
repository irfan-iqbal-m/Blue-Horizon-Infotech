@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row m-2 justify-content-center">
        <h2>Add Time Entry</h2>
    </div>
    <div class="d-flex justify-content-end m-3" data-kt-user-table-toolbar="base">
        <a href="{{route('entry')}}" class="btn firebrick-light-button btn-primary">
            <i class=""></i>Back
        </a>
    </div>
    <div class="modal-body mx-xl-8">
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('store')}}">
            <div class="fv-row mb-6">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label class="fs-6 fw-semibold form-label mb-2 required" for="task_id">Task</label>
                        <select class="form-control form-control-solid" name="task_id" required>
                            <option value="">Select Task</option>
                            @foreach($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->project->name }} {{ $task->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label class="fs-6 fw-semibold form-label mb-2 required" for="hours">Hours</label>
                        <input class="form-control form-control-solid" type="number" id="hours" name="hours" min="0" value="0" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label class="fs-6 fw-semibold form-label mb-2 required" for="date">Date</label>
                        <input class="form-control form-control-solid" type="date" id="date" name="date" placeholder="{{ __('Select expiration date') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label class="fs-6 fw-semibold form-label mb-2" for="description">Description</label>
                        <textarea type=" text" id="description" name="description" class="form-control form-control-solid" required></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>

            </div>
        </form>
    </div>
</div>

@endsection