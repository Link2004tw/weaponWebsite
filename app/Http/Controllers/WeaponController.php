<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Weapon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('weapon.index', ['weapons' => Weapon::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weapon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2',
            'type' => 'required',
            'origin' => 'required',
            'production' => 'required',
            'release_date' => 'required',
            'cartridge' => 'required',
            'description' => 'required',
        ]);
        $photoName = $request->file('photo')->getClientOriginalName();
        $photoSize = $request->file('photo')->getSize();
        $request->file('photo')->storeAs('public/images/', $photoName);
        $photoDetails = [
            'name' => $photoName,
            'size' => $photoSize,
        ]; 
        $weapon = Weapon::create($data);
        $photo = $weapon->photo()->create($photoDetails);
        return redirect()->route('weapons.show', ['weapon' => $weapon])->with('success', 'Weapon Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weapon $weapon)
    {
        return view('weapon.show', ['weapon' => $weapon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weapon $weapon)
    {
        return view('weapon.edit', ['weapon' => $weapon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weapon $weapon)
    {
        $data = $request->validate([
            'name' => 'required|min:2',
            'type' => 'required',
            'origin' => 'required',
            'production' => 'required',
            'release_date' => 'required',
            'cartridge' => 'required',
            'description' => 'required',
        ]);
        $weapon->update($data);
        $photoName = $request->file('photo')->getClientOriginalName();
        $photoSize = $request->file('photo')->getSize();
        $request->file('photo')->storeAs('public/images/', $photoName);
        $photoDetails = [
            'name' => $photoName,
            'size' => $photoSize,
        ]; 
        
        $weapon->photo()->update($photoDetails);
        return redirect()->route('weapons.show', ['weapon' => $weapon])->with('success', 'Weapon Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weapon $weapon)
    {
        $weapon->delete();
        return redirect()->route('weapons.index');
    }
}
