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
        @can('admin-higher')
            
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-8 col-sm-12">
                                     
                            <!-- 更新 -->
                            <form method="POST" action="{{ route('schedules.update')}}">    
                            @csrf
                                <div class="col-md-12">
                                    <label>勤務日</label>
                                    <input type="date" id="start"class="form-control mb-3" name="workday"required>
                                    <input type="hidden" id="id" name="id"value="">
                                    <button type="submit"class="btn btn-info text-nowrap">更新</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <!-- 削除 -->        
                <form id="delete-task-form" method="POST" action="{{ route('schedules.delete')}}">
                @csrf
                <input type="hidden" name="id">
                <button type="submit"class="btn btn-danger text-nowrap" id="delete-task">削除</button>
                </form>
                
            </div>
            </div>
        </div>
        </div>
        @endcan
        <div id='calendar'></div>

        <div style='clear:both'></div>

        </div>

    </div>
</div>
@endsection
