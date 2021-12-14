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
                                    <label>開始時刻</label>
                                    <input type="time" class="form-control mb-3" name="start_time"required>
                                    <label>終了時刻</label>
                                    <input type="time" class="form-control mb-3" name="end_time"required>
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
        <!-- fullcalendar -->
        @if($terminal==='pc')
        pc
        <div id='calendar'></div>
        <div style='clear:both'></div>
        <!-- calendar.io -->
        @else
        スマホ
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-7243260-2']);
            _gaq.push(['_trackPageview']);
  
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
  
          </script>
        <div class="container_io">	
			<!-- Codrops top bar -->
			<div class="codrops-top clearfix">
				
			</div><!--/ Codrops top bar -->
			<div class="custom-calendar-wrap custom-calendar-full">
				<div class="custom-header clearfix">
					<h2>Calendario</h2>
					<h3 class="custom-month-year">
						<span id="custom-month" class="custom-month"></span>
						<span id="custom-year" class="custom-year"></span>
						<nav>
							<span id="custom-prev" class="custom-prev"></span>
							<span id="custom-next" class="custom-next"></span>
							<span id="custom-current" class="custom-current" title="Go to current date"></span>
						</nav>
					</h3>
				</div>
				<div id="calendar_io" class="fc-calendar-container"></div>
			</div>
		</div><!-- /container -->
        

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.calendario.js"></script>
		<script type="text/javascript" src="../../js/data.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				var cal = $( '#calendar_io' ).calendario({
						onDayClick : function( $el, $contentEl, dateProperties ) {

							for( var key in dateProperties ) {
								console.log( key + ' = ' + dateProperties[ key ] );
							}

						},
						caldata : codropsEvents
					} ),
					$month = $( '#custom-month' ).html( cal.getMonthName() ),
					$year = $( '#custom-year' ).html( cal.getYear() );

				$( '#custom-next' ).on( 'click', function() {
					cal.gotoNextMonth( updateMonthYear );
				} );
				$( '#custom-prev' ).on( 'click', function() {
					cal.gotoPreviousMonth( updateMonthYear );
				} );
				$( '#custom-current' ).on( 'click', function() {
					cal.gotoNow( updateMonthYear );
				} );

				function updateMonthYear() {				
					$month.html( cal.getMonthName() );
					$year.html( cal.getYear() );
				}

				// you can also add more data later on. As an example:
				/*
				someElement.on( 'click', function() {
					
					cal.setData( {
						'03-01-2013' : '<a href="#">testing</a>',
						'03-10-2013' : '<a href="#">testing</a>',
						'03-12-2013' : '<a href="#">testing</a>'
					} );
					// goes to a specific month/year
					cal.goto( 3, 2013, updateMonthYear );
				} );
				*/
			
			});
		</script>
        <script src="//tympanus.net/codrops/adpacks/demoad.js"></script>

        @endif
        </div>

    </div>
</div>
@endsection
