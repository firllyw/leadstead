<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::where('user_id', auth()->user()->id)->get();
        return view('pages.app.job.list', [
            'title' => 'Job Postings',
            'jobs' => $jobPostings,
        ]);
    }

    public function create()
    {
        return view('pages.app.job.form', [
            'title' => 'Create Job Posting',
            'action' => route('jobs.store'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'skills' => 'nullable',
        ]);

        // merge request with user_id
        $request->merge(['user_id' => auth()->user()->id]);
        try {
            $job = new JobPosting();
            $job->title = $request->title;
            $job->description = $request->description;
            $job->skills = $request->skills;
            $job->user_id = $request->user_id;

            $job->save();
            return redirect()->route('jobs')->with('success', 'Job posting created successfully.');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(JobPosting $jobPosting)
    {
        return view('core.jobs.show', compact('jobPosting'));
    }

    public function edit(JobPosting $jobPosting)
    {
        return view('core.jobs.edit', compact('jobPosting'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'skills' => 'nullable',
            ]);
            $jobPosting = JobPosting::find($id);
            $jobPosting->update($request->all());
            return redirect()->route('pages.app.job.list')->with('success', 'Job posting updated successfully.');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->route('pages.app.job.list')->with('error', 'Job posting failed to update.');
        }
    }

    public function deactivate($id)
    {
        try {
            $jobPosting = JobPosting::find($id);
            $jobPosting->delete();
            return redirect()->route('pages.app.job.list')->with('success', 'Job posting deactivated successfully.');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->route('pages.app.job.list')->with('error', 'Job posting failed to deactivate.');
        }
    }
}
