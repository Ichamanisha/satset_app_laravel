<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('image')->store('reports', 'public');

        Report::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Aduan berhasil dikirim!');
    }
}
