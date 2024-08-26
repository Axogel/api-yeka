<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cursillo;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        $cursillos = Cursillo::all(); // Fetch all cursillos
        return view('users.create', compact('roles', 'cursillos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'imagen' => 'nullable|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'cursillos' => 'nullable|array',
            'cursillos.*' => 'exists:cursillos,id',
            'role' => 'required|exists:roles,name',
        ], [
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->imagen = $request->input('imagen');
        $user->nombre = $request->input('nombre');
        $user->telefono = $request->input('telefono');
        $user->save();

        // Attach selected cursillos to the user
        if ($request->has('cursillos')) {
            $user->cursillos()->attach($request->input('cursillos'));
        }

        $role = Role::where('name', $request->input('role'))->firstOrFail();
        $user->assignRole($role);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $cursillos = Cursillo::all(); // Fetch all cursillos
        return view('users.edit', compact('user', 'roles', 'cursillos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'imagen' => 'nullable|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'cursillos' => 'nullable|array',
            'cursillos.*' => 'exists:cursillos,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->imagen = $request->input('imagen');
        $user->nombre = $request->input('nombre');
        $user->telefono = $request->input('telefono');
        $user->save();

        // Sync cursillos
        if ($request->has('cursillos')) {
            $user->cursillos()->sync($request->input('cursillos'));
        } else {
            $user->cursillos()->sync([]);
        }

        $role = Role::where('name', $request->input('role'))->firstOrFail();
        $user->syncRoles([$role]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function assignRole($userId, $roleName)
    {
        $user = User::findOrFail($userId);
        $role = Role::where('name', $roleName)->firstOrFail();

        $user->assignRole($role);

        return "Rol '$roleName' asignado a usuario '$user->username' correctamente.";
    }
}
