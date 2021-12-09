@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('schedules.store')}}">
                    @csrf
                    <div class="d-grid gap-3 col-lg-5 py-2">
                    <!-- <div class="col-md-12">
                    <label>氏名</label>
                    <input type="text" class="form-control col-md-6"name="name"required>
                    </div> -->

                    <div class="col-md-12">
                    <label>名前</label>
                    <select class="form-select form-control mb-3" name="user_id" required>
                    <option selected>選択してください</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-md-12">
                        <label>勤務日</label>
                        <input type="date" class="form-control mb-3" name="workday"required>
                    </div>
                    <div class="col-md-12">
                        <label>開始時刻</label>
                        <input type="time" class="form-control mb-3" name="start_time"required>
                    </div>
                    <div class="col-md-12">
                        <label>終了時刻</label>
                        <input type="time" class="form-control mb-3"name="end_time"required>
                    </div>

                    <div class="col-md-12">
                    <label>備考</label>
                    <textarea name="description" class="form-control col-md-12 mb-3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input class="btn btn-info" type="submit" value="登録する">
                        <a class="btn btn-success" href="{{route('schedules.index')}}">戻る</a>
                    </div>

                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
