<?php
namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile; // Assuming a one-to-one relationship
        return view('account.edit1', compact('profile'));
    }

    public function update(Request $request)
{
   
     
//dd($request->all());
    // Check if user is authenticated
    if (!Auth::check()) {
        return redirect()->route('/account/login1');
    }

    $request->validate([
        'first_name' => 'required|string|max:255',
        'middle_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string|in:male,female,other',
        'martial_status' => 'required|string|in:single,married,divorced,widowed',
        'age' => 'required|integer|min:0',
        'phone_number' => 'required|string|regex:/^[1-9]\d{8}$/',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find or create the profile
    $profile = Auth::user()->profile ?? new Profile();

    // Handle photo upload
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $profile->photo = $path; // Set photo path here
    }

    // Always sanitize and update fields
    $profile->account_id = Auth::id();
    $profile->first_name = $request->first_name;
    $profile->middle_name = $request->middle_name;
    $profile->last_name = $request->last_name;
    $profile->email=$request->email;
    $profile->gender = $request->gender;
    $profile->martial_status = $request->martial_status;
    $profile->age = $request->age;
    $profile->phone_number = '+251' . ltrim($request->phone_number, '0');   // Ensure proper formatting
    
   if($profile->save()){
    return redirect(route('account.index'))->with('status', "Successfully updated your Profile.");
}
return redirect(route('account.edit1'))->with('error',"not updated ur profile");
}

}