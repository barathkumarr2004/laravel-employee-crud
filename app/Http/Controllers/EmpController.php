<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emp;

class EmpController extends Controller
{
    // List + Edit form rendume ithula thaan
public function index(Request $request)
{
    $query = Emp::query();

    // Search
    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Sort
    if ($request->sort == "asc") {
        $query->orderBy('name', 'asc');
    } elseif ($request->sort == "desc") {
        $query->orderBy('name', 'desc');
    }

    $emps = $query->get();

    return view('crud.index', compact('emps'));
}

    // Save panna
    public function store(Request $request)
    {
        Emp::create($request->all());
        return redirect('/');
    }

    // Edit click pannum pothu same page ku data oda anuppu
    public function edit($id)
    {
        $emps = Emp::all(); // Table ku list venum
        $emp = Emp::find($id); // Form ku edit data venum
        return view('crud.index', compact('emps', 'emp'));
    }

    // Update pannurathu
    public function update(Request $request, $id)
    {
        $emp = Emp::find($id);
        $emp->update($request->all());
        return redirect('/');
    }

    // Delete pannurathu
    public function delete($id)
    {
        Emp::find($id)->delete();
        return redirect('/');
    }
}