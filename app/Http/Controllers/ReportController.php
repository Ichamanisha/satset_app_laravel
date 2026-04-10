<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function adminIndex()
    {
        if (auth()->user()->email !== 'admin@gmail.com') {
            abort(403, 'Anda bukan Admin!');
        }

        $reports = Report::with('user')->latest()->get();
        return view('admin.index', compact('reports'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        $report = Report::findOrFail($id);
        $report->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }

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
            'image'       => $photoPath,
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
