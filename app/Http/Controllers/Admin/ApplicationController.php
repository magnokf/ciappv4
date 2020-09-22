<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\Http\Requests\Admin\StoreApplication as ApplicationRequest;
use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class ApplicationController
 * @package App\Http\Controllers\Admin
 */
class ApplicationController extends Controller
{
    /**
     * @var Application
     */
    private $Application;
    protected $Person;


    public function __construct()
    {
        $this->Application = new Application();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Application $applications)
    {
        $users = Auth::user();

        $applications = Application::orderBy('person_id', 'asc')->paginate(5);
        return view('admin.applications.index', [

            'applications'=>$applications,
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Application $application)
    {
        $id = base64_decode(request()->get('person'));

        $person = Person::findOrFail($id);
        $applicant = $person->applications()->get();
        return view('admin.applications.create', compact('person','application'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $createApplication = Application::create($request->all());
        $person_id = $request->get('person_id');
        $createApplication->save();

        flash("Solicitação criada com sucesso")->success();
        $person = Person::all()->firstWhere('id',$person_id);
        $applications = Application::all()->where('person_id', $person_id);


        return view('admin.applications.show', compact('person','applications'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $application = Application::find($id);


        return view('admin.applications.show', compact('application'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    public function search()
    {
        $query=request('search_text');
        $applications = Application::where('person_id', 'LIKE', '%' . $query . '%')->paginate(5);
        $person = Person::all();
        return view('admin.applications.index',compact('applications','person'));
    }
}
