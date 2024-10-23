<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException; 
use Illuminate\foundation\Auth\Passwords\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Events\PasswordReset; // Import the PasswordReset event
use Illuminate\foundation\Auth\Passwords\SendsPasswordResetEmails;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Account as Authenticatable;
use Illuminate\Support\Facades\Log;
// use App\Http\Controllers\AccountController;

//   use App\Http\Controllers\AboutController;
//   use App\Http\Controllers\ContactController;
//   use App\Http\Controllers\PasswordController;
//   use App\Http\Controllers\ProfileController;
//   use App\Http\Controllers\VacancyController;
class AccountController extends Controller
{
 // use SendsPasswordResetEmails, ResetsPasswords;
    
    public function home()  {
        return view ('account.home');
    }
   
  
    public function create(){
       return view ('account.create');
    }
  public function index()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('account.login1')->with('error', 'You must be logged in to view this page.');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Return the dashboard view with user data
        return view('account.index', compact('user'));
    }
    
  
    public function register(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:255|regex:/^[\p{L}\s\.\'-]+$/u',
        'email' => 'required|email|unique:accounts,email',
        'password' => 'required|string|min:8|confirmed',
    ]);
      
         $data = new Account();
         $data ->name=$request->input("name");
         $data ->email=$request->input ("email");
        $data->password = Hash::make($request->input('password'));
        $data->remember_token = Str::random(60);
       if($data->save())
    {
    return redirect(route('account.login1'))->with('status',"Succesfully create account");
    }
    {
        return redirect(route('account.create'))->with('error',"Not Succesfully created ur Account");
       }
     }
      public function login1(){
        return view('account.login1');
      }
       
      public function signin(Request $request)
      {
        $this->validate($request, [
          'email' => 'required|email|exists:accounts,email', // Ensure email exists in the database
          'password' => 'required|string', // Password is required
      ]);
        $remember = $request->has('remember');
        $credentials = $request->only('email', 'password');
         
        if (Auth::attempt($credentials,$remember)) 
        {
          $request->session()->put('user_name', Auth::user()->name);
          $request->session()->put('user_email', Auth::user()->email);
      return redirect()->route('account.index')->with('status', "Successfully logged in");
      }
  
      // // If authentication fails, redirect back with error
      else{
        // Debugging: Log credentials
    \Log::info('Login attempt failed', [
      'credentials' => $credentials,
  ]);
        return back()->withErrors([
          'email' => 'Invalid email or password.',
      ])->withInput($request->only('email'));
      //return redirect()->route('account.login1')->with('error', "Invalid email or password");
     }
      
  
      }
      public function show($id)
{
    $user = Account::findOrFail($id);
    return view('your-view-name', compact('user'));
}
protected function authenticated(Request $request, $user)
{
    // Optionally set a flash message for debugging or feedback
    $request->session()->flash('logged_in', true);
}

      public function request(Request $request)
    {
        // Your logic for handling the password reset request
        // For example, you could redirect to the forgot password page
        return view('auth.forgot-password');
    }
  
      public function email(Request $request)
      {
          $request->validate(['email' => 'required|email|exists:accounts,email']);
  
          $status = Password::sendResetLink($request->only('email'));
  
          return $status === Password::RESET_LINK_SENT
                      ? back()->with('status', __($status))
                      : back()->withErrors(['email' => __($status)]);
      }
  
      public function reset(Request $request, $token)
      {
          return view('auth.reset-password', ['token' => $token]);
      }
    
      public function update(Request $request)
      {
          $request->validate([
          'email' => 'required|email|exists:accounts,email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required',
          ]);
         
          $status = Password::reset(
              $request->only('email', 'password', 'password_confirmation', 'token'),
              function ($user) use ($request) {
                  $user->forceFill([
                      'password' => bcrypt($request->password),
                      'remember_token' => Str::random(60),
                  ])->save();
  
                  event(new PasswordReset($user));
              }
          );
          Log::info('Password reset status:', ['status' => $status]);
          return $status === Password::PASSWORD_RESET
                      ? redirect()->route('account.login1')->with('status', __($status))
                      : back()->withErrors(['email' => __($status)]);
      }
      public function getAuthIdentifierName()
    {
        return 'email'; // or 'id' based on your authentication identifier
    }

    public function getAuthPassword()
    {
        return $this->password; // Ensure this returns the hashed password
    }
    public function logout()
    {
        Auth::logout();

        // Redirect to a desired location after logout
        return redirect('/account')->with('status', 'Successfully logged out!');
    }

    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/account/login1')->with('status', 'Successfully logged out!');
    // }
    
   }
