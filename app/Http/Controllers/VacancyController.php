<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Application;
class VacancyController extends Controller
{
    public function create()
    {
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'application_deadline' => 'required|date',
            'posted' => 'nullable|boolean',
        ]);

        Vacancy::create($request->all());

        return redirect()->route('vacancies.create')->with('status', 'Vacancy created successfully!');
    }

    public function index()
    {
        $vacancies = Vacancy::all(); // Fetch all vacancies
        return view('vacancies.index', compact('vacancies'));
    }

    public function post(Request $request)
{
    \Log::info('Posting vacancy', ['id' => $request->id]);
    
    $vacancy = Vacancy::find($request->id);
    
    if ($vacancy) {
        $vacancy->posted = true; // Mark it as posted
        
        if ($vacancy->save()) {
            \Log::info('Vacancy posted successfully', ['id' => $vacancy->id]);
            return redirect()->route('vacancies.index')->with('status', 'Vacancy posted successfully!');
        } else {
            \Log::error('Failed to save vacancy', ['id' => $vacancy->id]);
        }
    } else {
        \Log::error('Vacancy not found', ['id' => $request->id]);
    }

    return redirect()->route('vacancies.index')->with('error', 'Failed to post vacancy.');
}

    
    public function index1()
    {
        $vacancies = Vacancy::all(); // Fetch all vacancies
        $currentDate = Carbon::now();
        // Fetch only vacancies where the application deadline is greater than or equal to today
        $vacancies = Vacancy::where('application_deadline', '>=', $currentDate)->get();
        return view('vacancies.index1', compact('vacancies')); // Pass vacancies to the view
    }


    public function showApplicationForm($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('apply', compact('vacancy'));
    }

    public function submitApplication(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|regex:/^[1-9]\d{8}$/',
            'gender' => 'required|in:male,female,other',
            'department' => 'required|string|max:255',
            'qualification' => 'required|in:certeficate,diploma,Bsc,Msc,PhD',
            'disabilities' => 'required|boolean',
            'GPA' => 'required|numeric|between:0,4.00',
            'experience' => 'required|string|max:1000',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // Check if the user has already applied for this vacancy
        $existingApplication = Application::where('email', $request->email)
            ->where('vacancy_id', $id)
            ->first();
    
        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this vacancy.')->withInput();
        }
    
        // Proceed to store the application
        $resumePath = $request->file('resume')->store('resumes');
        $phone = '+251' . ltrim($request->phone, '0'); // Ensure proper formatting
        $disabilities = $request->disabilities == '1' ? 1 : 0;
    
        Application::create([
            'vacancy_id' => $id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $phone,
            'gender' => $request->gender,
            'department' => $request->department,
            'qualification' => $request->qualification,
            'disabilities' => $disabilities,
            'GPA' => $request->GPA,
            'experience' => $request->experience,
            'resume' => $resumePath,
        ]);
    
        return redirect()->route('vacancies.apply', ['id' => $id])->with('status', 'Application submitted successfully!');
    }
}
