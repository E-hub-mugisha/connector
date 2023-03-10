<div>
    <div class="container">
        <h1>Laravel Send Email to Multiple Users - ItSolutionStuff.com</h1>
        @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif

        <button class="btn btn-success send-email">Send Email</button>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}"></td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".send-email").click(function() {
            var selectRowsCount = $("input[class='user-checkbox']:checked").length;

            if (selectRowsCount > 0) {

                var ids = $.map($("input[class='user-checkbox']:checked"), function(c) {
                    return c.value;
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.send.email') }}",
                    data: {
                        ids: ids
                    },
                    success: function(data) {
                        alert(data.success);
                    }
                });

            } else {
                alert("Please select at least one user from list.");
            }
            console.log(selectRowsCount);
        });
    </script>}
</div>