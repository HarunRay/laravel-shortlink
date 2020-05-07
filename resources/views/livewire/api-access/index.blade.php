<div>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('token'))
        <div class="alert alert-success" role="alert">
            <label for="access-token">Your API Access Token. Please copy and save it</label>
            <div class="input-group mb-12">
                <input
                    type="text"
                    class="form-control disabled"
                    id="access-token"
                    value="{{ session('token') }}"
                    disabled>
            </div>
        </div>
    @endif

    <livewire:api-access.create>

        <div class="all_access">
            @if($accesses->count() > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Preview</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accesses as $access)
                        <tr>
                            <td>{{$access->name}}</td>
                            <td>{{$access->preview}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No access generated yet</p>
            @endif
        </div>


    {{$accesses->links()}}
</div>
