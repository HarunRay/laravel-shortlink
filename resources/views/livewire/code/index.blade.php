<div>
    <livewire:code.create>

        <table class="table table-striped">
            <thead>
            <tr>
                {{--                <th scope="col">#</th>--}}
                <th scope="col">Shortcode Link</th>
                <th scope="col">Full Link</th>
            </tr>
            </thead>
            <tbody>
            @foreach($links as $link)
                    <tr>
                        {{--    <th scope="row">{{$link->id}}</th>--}}
                        <td><a href="{{url($link->code)}}" target="_blank">{{url($link->code)}}</a></td>
                        <td><a href="{{$link->link}}" target="_blank">{{$link->link}}</a></td>
                    </tr>

            @endforeach
            </tbody>
        </table>


    {{$links->links()}}
</div>
