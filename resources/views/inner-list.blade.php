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
            @forelse ($datas as $data)
            <tr class="{{ $data['Sno'] ? 'table-active' : '' }}">
                <td>{{ $data['Sno'] }}</td>
                <td>{{ $data['Name'] }}</td>
                <td>{{ $data['Total hours'] ?? '' }}</td>
            </tr>
            @empty
            <tr class="table-active">
                <td colspan="3" class="text-center">No records</td>
            </tr>
            @endforelse
        </tbody>


    </table>



</div>