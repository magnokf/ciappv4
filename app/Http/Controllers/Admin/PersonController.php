<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePerson as PersonRequest;
use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PersonController
 * @package App\Http\Controllers\Admin
 */
class PersonController extends Controller
{
    /**
     * @var Person
     */
    private $Person;

    /**
     * PersonController constructor.
     */
    public function __construct()
    {
        $this->Person = new Person();
    }



    public function search()
    {
        $query=request('search_text');
        $people = Person::where('rg', 'LIKE', '%' . $query . '%')->paginate(5);;
        return view('admin.people.index',compact('people'));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Person $people
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person)
    {

        $applications = $person->applications()->get();

        $users = Auth::user();
        $people = Person::orderBy('rg', 'asc')->paginate(5);
        return view('admin.people.index', [
            'people' => $people,
            'users'=> $users,
            'applications'=>$applications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.create');
    }


    /**
     * @param PersonRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonRequest $request)
    {
        $createPerson = Person::create($request->all());
        $createPerson->save();


        flash("Portador $createPerson->first_name $createPerson->last_name registrado com sucesso !!!")->success();
        return redirect()->route('admin.people.index', [
            'person'=>$createPerson->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = $this->Person->find($id);
        $applications = Application::orderBy('id', 'asc')->where('person_id',$person->rg)->paginate(3);

       return view('admin.people.show', [
           'person'=>$person,
           'applications'=>$applications,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::where('id',$id)->first();
        return view('admin.people.edit',[
            'person'=>$person
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
