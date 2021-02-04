<?php

namespace App\Http\Controllers;

use App\{Person, Rol, Group, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PersonRequest;
use Alert;
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::roles();
        $groups = Group::groups();

        return view('partials.register', compact('rols', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' =>  $request->rol
        ]);

        Person::create([
            'name' => $request->name_p,
            'surname' => $request->surname,
            'phone_number' => $request->phone_number,
            'code' => md5($request->email),
            'adress' => $request->adress,
            'user_id' => $user->id, 
            'gruop_id' => $request->group
        ]);

        alert()->success('Registro exitoso','Registrado correctamente');
        return redirect()->to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $rols = Rol::roles();
        $groups = Group::groups();
        $person = $person->load('user','group', 'user.rol');

        return view('partials.update', compact('rols', 'groups', 'person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person)
    {
        $person->update([
            'name' => $request->name_p,
            'surname' => $request->surname,
            'phone_number' => $request->phone_number,
            'code' => md5($request->email),
            'adress' => $request->adress,
            'gruop_id' => $request->group
        ]);

        $user = User::findOrFail($person->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' =>  $request->rol
        ]);

        alert()->success('Actualización exitosa','Datos actualizados correctamente');
        return redirect()->to('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        User::destroy($person->user_id);

        alert()->success('Eliminación exitosa','Registrados borrados correctamente');
        return redirect()->to('home');
    }
}
