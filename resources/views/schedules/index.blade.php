@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                index
                </div>
            </div>
        </div> -->

        <div id='wrap'>

        <div id='external-events'>
        <h4>Draggable Events</h4>

        <div id='external-events-list'>
            <div class='fc-event'>出勤予定</div>
            <div class='fc-event'>My Event 2</div>
            <div class='fc-event'>My Event 3</div>
            <div class='fc-event'>My Event 4</div>
            <div class='fc-event'>My Event 5</div>
        </div>

        <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remove after drop</label>
        </p>
        </div>

        <div id='calendar'></div>

        <div style='clear:both'></div>

        </div>

    </div>
</div>
@endsection
