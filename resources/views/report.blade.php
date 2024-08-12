@extends('layout.app')

@section('title', 'Report')

@section('content')
<div class="container">
    <div class="row m-2 justify-content-center">
        <h2>Report</h2>
    </div>

    <div class="flex justify-center m-2 col-11">
        <input id="search-input" type="text" name="search" value="{{$search??''}}" placeholder="Search project name " class="form-control col-10" />
    </div>
    <div class="mt-16">
        <div id="listContainer">
            <!-- @include('inner-list') -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Function to perform AJAX search
        function performSearch() {
            var search = $('#search-input').val();
            console.log("jj");
            $.ajax({
                url: "{{ route('search') }}",
                method: 'POST',
                data: {
                    search: search,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#listContainer').html(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Bind the keyup event to the input field
        $('#search-input').on('keyup', function() {
            performSearch();
        });

        // Perform search if there is any value in the input field on page load
        performSearch();
    });
</script>
@endsection