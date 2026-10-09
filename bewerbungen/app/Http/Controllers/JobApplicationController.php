<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::all();

        $stats = [
            'Total' => $applications->count(),
            'Interview' => $applications->where('status', 'interview')->count(),
            'Offer' => $applications->where('status', 'offer')->count(),
            'Rejected' => $applications->where('status', 'rejected')->count(),
        ];

        return view('applications.index', [
            'applications' => $applications,
            'stats' => $stats,
        ]);
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'city' => 'required',
            'status' => 'required|in:open,interview,rejected,offer',
        ]);

        JobApplication::create($validated);

        return redirect('/applications');
    }

    public function edit($id)
    {
        $application = JobApplication::find($id);

        return view('applications.edit', [
            'application' => $application,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'city' => 'required',
            'status' => 'required|in:open,interview,rejected,offer',
        ]);

        JobApplication::find($id)->update($validated);

        return redirect('/applications');
    }

    public function destroy($id)
    {
        JobApplication::find($id)->delete();

        return redirect('/applications');
    }
}
