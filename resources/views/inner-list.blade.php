<div class="col-12 row m-2">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Hours</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)

            <tr class="table-active">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->tasks->sum('task_hours') }}</td>
            </tr>
            @foreach ($project->tasks as $task)
            <tr class="">
                <td></td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->task_hours }}</td>
            </tr>
            @endforeach

            @empty
            <tr class="table-active">
                <td colspan="3" class="text-center">No records</td>
            </tr>
            @endforelse
        </tbody>


    </table>



</div>