<?php

namespace App\Http\Controllers;
use App\Models\ScheduleForm;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    // $schedules = DB::table('schedule_forms')
    //     ->select('id',DB::raw('concat(workday,"T",start_time)as start,concat(workday,"T",end_time)as end'))
    //     ->get();

        $id =Auth::id();
        $forms =User::find($id)->scheduleForms();

        $schedules =$forms->select('id',DB::raw('concat(workday,"T",start_time)as start,concat(workday,"T",end_time)as end'))
                          ->get();

        file_put_contents("json-events.json" , $schedules);

        return view('schedules.index',compact('schedules'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =DB::table('users')
                    ->select('id','name')
                    ->get();

        return view('schedules.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new ScheduleForm;

        $schedule->description = $request->input('description');
        $schedule->workday = $request->input('workday');
        $schedule->start_time =$request->input('start_time');
        $schedule->end_time = $request->input('end_time');
        $schedule->user_id = $request->input('user_id');

        $schedule->save();

        return redirect('schedule/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = ScheduleForm::find($id);

        $schedule->workday = $request->input('workday');
        $schedule->save();

        return redirect('schedule/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule =ScheduleForm::find($id);
        $schedule->delete();

        return redirect('schedule/index');
    }
}
