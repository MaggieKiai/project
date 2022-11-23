<?php

namespace Modules\Dean\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Modules\Application\Entities\Application;
use Modules\Application\Entities\Education;
use Modules\Dean\Entities\CourseTransfer;
use Modules\Dean\Entities\DeanLog;

class DeanController extends Controller
{
    public function transfer(){

        $transfer  =  CourseTransfer::where('dean_status', '!=', 3)
        ->where('registrar_status', null)
        ->get();

        return view('dean::transfers.index')->with(['transfer' => $transfer]);
    }

    public function viewTransfer($id){

         $hashedId = Crypt::decrypt($id);

        $data = CourseTransfer::find($hashedId);
        return view('dean::transfers.viewTransfer')->with(['data' => $data]);
    }

    public function preview($id){

         $hashedId = Crypt::decrypt($id);
        $data = CourseTransfer::find($hashedId);
        return view('dean::transfers.preview')->with(['data' => $data]);
    }

    public function rejectTransfer(Request $request, $id){

         $hashedId = Crypt::decrypt($id);

        $data = CourseTransfer::find($hashedId);
        $data->dean_status = 2;
        $data->dean_remarks = $request->comment;
        $data->save();

        $logs = new DeanLog;
        $logs->application_id = $data->id;
        $logs->user = Auth::guard('user')->user()->name;
        $logs->user_role = Auth::guard('user')->user()->role_id;
        $logs->activity = 'Transfer rejected';
        $logs->comments = $request->comment;
        $logs->save();

        return redirect()->route('dean.transfer')->with('success', 'Transfer declined');
    }

    public function acceptTransfer($id){

         $hashedId = Crypt::decrypt($id);

        $data = CourseTransfer::find($hashedId);
        $data->dean_status = 1;
            if ($data->registrar_status != NULL){
                $data->registrar_status = NULL;
            }
        $data->save();

        $logs = new DeanLog;
        $logs->application_id = $data->id;
        $logs->user = Auth::guard('user')->user()->name;
        $logs->user_role = Auth::guard('user')->user()->role_id;
        $logs->activity = 'Transfer accepted';
        $logs->save();

        return redirect()->route('dean.transfer')->with('success', 'One Transfer approved');
    }

    public function applications(){

        $applications = Application::where('dean_status', '!=', 3)
            ->where('school_id', auth()->guard('user')->user()->school_id)
            ->where('registrar_status', null)
            ->orWhere('registrar_status', 4)
            ->orderBy('id', 'DESC')
            ->get();

        return view('dean::applications.index')->with('apps', $applications);
    }

    public function viewApplication($id){

        $hashedId = Crypt::decrypt($id);

        $app = Application::find($hashedId);
        $school = Education::where('applicant_id', $app->applicant->id)->get();

        return view('dean::applications.viewApplication')->with(['app' => $app, 'school' => $school]);
    }

    public function previewApplication($id){

        $hashedId = Crypt::decrypt($id);

        $app = Application::find($hashedId);
        $school = Education::where('applicant_id', $app->applicant->id)->get();
        return view('dean::applications.preview')->with(['app' => $app, 'school' => $school]);
    }

    public function acceptApplication($id){

        $hashedId = Crypt::decrypt($id);

        $app = Application::find($hashedId);
        $app->dean_status = 1;
            if ($app->registrar_status != NULL){
                $app->registrar_status = NULL;
            }
        $app->save();

        $logs = new DeanLog;
        $logs->application_id = $app->id;
        $logs->user = Auth::guard('user')->user()->name;
        $logs->user_role = Auth::guard('user')->user()->role_id;
        $logs->activity = 'Application accepted';
        $logs->save();

        return redirect()->route('dean.applications')->with('success', '1 applicant approved');
    }

    public function rejectApplication(Request $request, $id){

        $hashedId = Crypt::decrypt($id);

        $app = Application::find($hashedId);
        $app->dean_status = 2;
        $app->dean_comments = $request->comment;
        $app->save();

        $logs = new DeanLog;
        $logs->application_id = $app->id;
        $logs->user = Auth::guard('user')->user()->name;
        $logs->user_role = Auth::guard('user')->user()->role_id;
        $logs->activity = 'Application rejected';
        $logs->comments = $request->comment;
        $logs->save();

        return redirect()->route('dean.applications')->with('success', 'Application declined');
    }

    public function batch(){
        $apps = Application::where('dean_status', '>', 0)
            ->where('school_id', auth()->guard('user')->user()->school_id)
            ->where('registrar_status', null)
            ->where('dean_status', '!=', 3)
            ->where('cod_status', '<=', 2)
            ->orwhere('registrar_status', 4)
            ->get();

        return view('dean::applications.batch')->with('apps', $apps);
    }

    public function batchSubmit(Request $request){

        foreach ($request->submit as $item){
            $app = Application::find($item);
            if ($app->dean_status == 2){
                $app->dean_status = 3;
                $app->cod_status = 3;
            }
            if ($app->dean_status == 1) {
                $app->registrar_status = 0;
            }
            $app->save();

            $logs = new DeanLog;
            $logs->application_id = $app->id;
            $logs->user = Auth::guard('user')->user()->name;
            $logs->user_role = Auth::guard('user')->user()->role_id;

            if ($app->dean_status == 3){

                $logs->activity = 'Your application has been reverted to COD office for review';
            }else{
                $logs->activity = 'Your Application has been forwarded to registry office';
            }

            $logs->save();
        }

        return redirect()->route('dean.batch')->with('success', '1 Batch send to next level of approval');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dean::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dean::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dean::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dean::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
