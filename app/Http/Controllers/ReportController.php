<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Auth::user()->reports()->latest()->get();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'location'    => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        Auth::user()->reports()->create([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'photo'       => $photoPath,
        ]);

        return redirect()->route('reports.index')
            ->with('success', 'Aduan berhasil dikirim!');
    }

    public function show(Report $report)
    {
        if ($report->user_id !== Auth::id()) {
            abort(403);
        }
        return view('reports.show', compact('report'));
    }
}