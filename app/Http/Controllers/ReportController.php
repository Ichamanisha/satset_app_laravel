<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $reports = Auth::user()->reports()->latest()->get();

        return view('reports.index', compact('reports'));
    }

    public function adminIndex()
    {
        $reports = Report::with('user')->latest()->get();

        return view('admin.index', compact('reports'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update([
            'status' => $request->status,
            'admin_feedback' => $request->feedback
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
}
