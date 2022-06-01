<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Module;
use App\Models\Worker;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Throwable;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }

    public function index()
    {
        abort_if(Gate::denies('dashboard-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $workers = Worker::all();
        return view('worker.index',compact('workers'));
    }

    public function create()
    {
        $modules = Module::whereIn('id',[1,2,3,4])->get();
        return view('worker.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $uniqueName = Worker::where('name',$request->name)->first();
        if (isset($uniqueName->name) and isset($request->name))
        {
            return to_route('worker.index')->with('errorMessage', 'Worker With this Name Already exists. Please Try another name');
        }
            else {
                $accountHeadData = array
                (
                    'name' => "Worker-$request->name",
                    'parent_id' => 10
                );
                AccountHead::updateOrCreate($accountHeadData);
                $workerHeadID = AccountHead::where('name', "worker-$request->name")->pluck('id')->last();

                $request['account_head_id'] = $workerHeadID;
                Worker::create($request->all());

                return WorkerController::index()->with('message', 'Worker Registration Successful');
                }
    }

    public function show(Worker $worker)
    {

    }

    public function edit(Worker $worker)
    {
        $modules = Module::whereIn('id',[1,2,3,4])->get();
        return view('worker.edit',compact('worker','modules'));
    }

    public function update(Request $request, Worker $worker)
    {
        $accountHeadData = array
        (
            'name' => "Worker-$request->name",
            'parent_id' => 10
        );
        $worker->accountHeads()->update($accountHeadData);
        $workerHeadID = AccountHead::where('name',"worker-$request->name")->pluck('id')->last();
        $request['account_head_id'] = $workerHeadID;

        $worker->update($request->all());
        return WorkerController::index()->with('message','Worker Update Successful');
    }

    public function destroy(Worker $worker)
    {
        try {
            //dont delete the entry which contains error or foreign key constraint
            $worker->delete();
            $worker->accountHeads()->delete();
            return redirect()->back()->with('errorMessage','Worker Deleted');
        }catch (Throwable $e){
            return redirect()->back()->with('errorMessage','Can\'t Delete this Worker Because It consists of Transactions, But You Can Edit It');
        }
    }
}
