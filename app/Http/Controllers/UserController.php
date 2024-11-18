<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return view("admin.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'date_of_birth' => 'required|date|before:2010-01-01',
            'role' => 'required|string|',
            'street' => 'nullable|string|max:15',
            'housenumber' => 'nullable|string|max:10',
            'zip-code' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:15',
            'country' => 'nullable|string|max:15',
            
        ]);

        User::create($request->all());

        return redirect()->route("users.index")->with("success", "User succesvol created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view("admin.users.show", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view("admin.users.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'date_of_birth' => 'required|date|before:2010-01-01',
            'role' => 'required|string|',
            'street' => 'nullable|string|max:15',
            'housenumber' => 'nullable|string|max:10',
            'zip-code' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:15',
            'country' => 'nullable|string|max:15',
            
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
    
 
        $user->delete();
        
       
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
