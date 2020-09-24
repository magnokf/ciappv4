<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\Http\Requests\Admin\StoreApplication as ApplicationRequest;
use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


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
    /**
     * @var
     */



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
        foreach ($applications as $application){
            $person = Person::where('rg',$application->person_id)->first() ;
        }

        return view('admin.applications.index', [

            'applications'=>$applications,
            'person'=>$person,
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
        $person = Person::firstWhere('rg',$person_id);
        $applications = Application::where('person_id', $person_id)->paginate(5);



        return redirect()->route('admin.applications.index',[
            'person'=>$person,
            'applications'=>$applications
        ]);

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
        $person = Person::where('rg',$application->person_id)->first() ;

        return view('admin.applications.show_app', compact('application', 'person'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $person = Person::where('rg',$application->person_id)->first() ;
        return view('admin.applications.edit', compact('application', 'person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $user = Auth::user();
        //$application = Application::find($id);
        $application->update($request->validated());
        /*$application->report = $request->get('report');
        $application->nota_def_cbmerj = $request->get('nota_def_cbmerj');
        $application->nota_sigma_cbmerj = $request->get('nota_sigma_cbmerj');
        $application->nota_craf_cbmerj = $request->get('nota_craf_cbmerj');*/

        //$application->update($request->all());
        flash("Solicitação atualizada com sucesso pelo Usuário:")->success();
        return redirect()->route('admin.applications.index');
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


}
