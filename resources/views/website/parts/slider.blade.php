<div id="top" class="starter_container bg">
    <div class="follow_container">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="top-title"> Atareeg</h2>
            <h2 class="white second-title">" Best in the city "</h2>
            <hr>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('insert_message'))
                <hr>
                <div class="alert alert-danger">
                    <ul>
                        {{session()->get('insert_message')}}
                    </ul>
                </div>
                <hr>
            @endif

        </div>
    </div>
</div>