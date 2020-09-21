<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest as Request;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use VerifiesEmails;

    private $User;

    public function __construct()
    {


        $this->User = new User();
    }

    public function home()
    {
        return view('admin.home');
    }

    public function team()
    {
        $users = User::where('client', 1)->get();
        return view('admin.users.team', [
            'users' => $users
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->admin == 1){
            $users = $this->User->all();

            return view('admin.users.index')->with('users', $users);
        }
        $users = User::where('id', auth()->id())->get();
        return view('admin.users.index')->with('users', $users);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'rg' => $request->get('rg'),
            'password'=>Hash::make($request->get('password')),

        ]);
        $user->save();
        $user->sendEmailVerificationNotification();
        if ($user) {
            session()->flash('success', 'usuário criado com sucesso! Favor verificar sua caixa de email '.$request->email  );

            return redirect()
                ->back()
                ->withInput();

        }

        session()->flash('error', 'Houve erro!');

        return redirect()
            ->back()
            ->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user=$this->User->find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

//        if(auth('web')->user()->id != $id)
//        {
//            session()->flash('error', 'proibido editar outro usuário!');
//            return redirect()->route('admin.users.index');
//
//        }

        $user = User::where('id', $id)->first();
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
 */
public function update(Request $request, User $user)
    {

        $user->setAdminAttribute($request->admin);
        $user->setClientAttribute($request->client);

        $user->fill($request->all());

        $user->save();



        if ($user->wasChanged('email'))
        {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            $user->save();

            session()->flash('success', 'email do usuário foi atualizado com sucesso! Verifique seu endereço de e-mail e refaça o login');
            return redirect()->route('login');
        }
        elseif ($user->wasChanged('admin'))
        {
            session()->flash('success', 'admin atualizado com sucesso!');

            return redirect()
                ->back()
                ->withInput();
        }
        elseif ($user->wasChanged('client'))
        {
            session()->flash('success', 'agente atualizado com sucesso!');

            return redirect()
                ->back()
                ->withInput();
        }
        session()->flash('error', 'Não houve alteração dos dados!');

        return redirect()
            ->back()
            ->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth('web')->user()->id == $id)
        {
            session()->flash('error', 'proibido auto exclusão!');
            return redirect()->route('admin.users.index');
        }
        elseif (auth('web')->user()->admin != 1  )
        {
            session()->flash('error', 'Proibido para agentes! Somente Administradores.');
            return redirect()->route('admin.users.index');
        }

            User::findOrFail($id)->delete();
            session()->flash('success', 'Usuário foi excluido com sucesso!');

            return redirect()
                ->back();





    }

}
