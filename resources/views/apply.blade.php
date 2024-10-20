<!DOCTYPE html>
<html lang="en">
<style>
    /* public/css/styles.css */
    html, body {
    overflow: hidden; /* Prevents scrolling */
    height: 100%; /* Ensures full height */
    margin: 0; /* Removes default margin */
}
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    line-height: 1.6;
}

header {
    background: #002147;
    color: #fff;
    padding: 2px 10px;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
 
}

.nav-links {
    list-style: none;
    padding: 0;
    
}

.nav-links li {
    display: inline;
    margin-right: 15px;
}

.nav-links a {
    color: #fff;
    text-decoration: none;
}

.search-form {
    display: flex;
    padding: 20px
}

.search-form input {
    padding: 5px;
    border: none;
    border-radius: 4px;
}

.search-form button {
    padding: 5px 10px;
    background: #ffc107;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}



.container1 h2 {
    font-size: 14px;
    margin: 0;
    text-align:left;
}

.btn {
    padding: 10px 50px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
    margin-left: 200px;
    
} 


.feature-cards {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.feature-card {
    background: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    width: 200px;
    text-align: left;
}

.feature-card i {
    font-size: 2em;
    color: #007bff;
}

footer {
    text-align: center;
    padding: 5px;
    background: #002147;
    color: white;
}
.double-input {
    display: flex; /* Use flexbox for alignment */
    justify-content: space-between; /* Space between the inputs */
    margin-bottom: 15px; /* Space below the group */
}

.input-container {
    flex: 1; /* Allow inputs to grow equally */
    margin-right: 15px; /* Space between input containers */
    marign-top:10px
}

.input-container:last-child {
    margin-right: 0; /* Remove margin for the last input */
}
.error {
    color: #e74c3c; /* Red color for error messages */
    margin-top: 5px; /* Space above error messages */
    font-size: 0.9em; /* Slightly smaller text for errors */
}
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="number"],
input[type="file"],
select {
    width: 100%; /* Full width inputs */
    padding: 3px; /* Padding inside inputs */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 4px; /* Rounded corners */
    box-sizing: border-box; /* Include padding and border in width */
}
.container1 h3 {
    text-align: center;
    color: #333; /* Darker text color */
    margin-bottom: 20px; /* Space below the heading */
    font-size: 11px;
}

.form-group {
    margin-bottom: 5px; /* Space between form groups */
    margin: 18px;
    text-align:left;
}

label {
    display: block; /* Make labels block elements */
    margin-bottom: 0; /* Space below the label */
    font-weight: bold; /* Bold text for labels */
    font-size: 15px;
}
.container1 {
    max-width: 600px; /* Set a maximum width for the form */
    margin: 10px auto; /* Center the container */
    padding: 0;
    background: white; /* White background for the form */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
  
}

.custom-alert {
    color: red; /* Text color */
    /* background-color: green; Background color */
    padding: 2px; /* Padding */
    border-radius: 5px; /* Rounded corners */
    text-align: center; /* Centered text */
    margin-top: 5px; /* Margin */
    
}
    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - wellocme!</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Welcome!</h1>
                <ul class="nav-links">
                    <li><a href="{{ url('/account')}}">Home</a></li>
                    <li><a href="{{ url('/about')}}">About Us</a></li>
                    <li><a href="{{ url('/contact')}}">Contact us</a></li>
                    <li><a href="{{ url('/vacancies') }}">Vaccancy</a></li>
                    <li><a href="{{ url('/account/login1')}}">Login</a></li>
                </ul>
                <form action="{{'https://www.google.com/' }}" method="GET" class="search-form">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <main>

@if (session('error'))
    <div class="custom-alert">{{ session('error') }}</div>
@endif
@if (session('status'))
    <div class="custom-alert">{{ session('status') }}</div>
@endif

          <div class="container1"> 
    <h2 class="h2"> <i class="fas fa-user-check"></i> Apply for Vacancy</h2>
    <form action="{{ route('vacancies.submit', $vacancy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group double-input">
            <div class="input-container">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" placeholder="First_name"name="first_name" required autocomplete="given-name" value="{{ old('first_name', $existingApplication->first_name ?? '') }}">
                @error('first_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" placeholder="middle_name" required autocomplete="additional-name" value="{{ old('middle_name', $existingApplication->middle_name ?? '') }}">
                @error('middle_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group double-input">
            <div class="input-container">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="last_name" required autocomplete="family-name" value="{{ old('last_name', $existingApplication->last_name ?? '') }}">
                @error('last_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autocomplete="email" placeholder="email"value="{{ old('email', $existingApplication->email ?? '') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group double-input">
            <div class="input-container">
                <label for="phone">Phone Number (without +251)</label>
                <input type="tel" name="phone" id="phone" placeholder="925178462" required autocomplete="tel" value="{{ old('phone', $existingApplication->phone ?? '') }}">
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="gender">Gender</label>
                <option value="">Select an option</option> <!-- Placeholder -->
                <select name="gender" id="gender" required>
                    <option value="male" {{ (old('gender', $existingApplication->gender ?? '') == 'male') ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ (old('gender', $existingApplication->gender ?? '') == 'female') ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ (old('gender', $existingApplication->gender ?? '') == 'other') ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group double-input">
            <div class="input-container">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" placeholder="Department"value="{{ old('department', $existingApplication->department ?? '') }}" required autocomplete="organization-title">
                @error('department')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="qualification">Qualification</label>
                <select name="qualification" id="qualification" required>
                  <option value="">Select an option</option> <!-- Placeholder -->
                    <option value="certeficate" {{ (old('qualification', $existingApplication->qualification ?? '') == 'certeficate') ? 'selected' : '' }}>Certificate</option>
                    <option value="diploma" {{ (old('qualification', $existingApplication->qualification ?? '') == 'diploma') ? 'selected' : '' }}>Diploma</option>
                    <option value="Bsc" {{ (old('qualification', $existingApplication->qualification ?? '') == 'Bsc') ? 'selected' : '' }}>BSc</option>
                    <option value="Msc" {{ (old('qualification', $existingApplication->qualification ?? '') == 'Msc') ? 'selected' : '' }}>MSc</option>
                    <option value="PhD" {{ (old('qualification', $existingApplication->qualification ?? '') == 'PhD') ? 'selected' : '' }}>PhD</option>
                </select>
                @error('qualification')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group double-input">
            <div class="input-container">
                <label for="disabilities">Do you have any disabilities?</label>
                <select name="disabilities" id="disabilities" required>
                   <option value="">Select an option</option> <!-- Placeholder -->
                    <option value="1" {{ (old('disabilities', $existingApplication->disabilities ?? '') == '1') ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ (old('disabilities', $existingApplication->disabilities ?? '') == '0') ? 'selected' : '' }}>No</option>
                </select>
                @error('disabilities')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="input-container">
                <label for="GPA">GPA</label>
                <input type="number" id="GPA" name="GPA" step="0.01" value="{{ old('GPA', $existingApplication->GPA ?? '') }}" required autocomplete="off">
                @error('GPA')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group double-input">
            <div class="input-container">
                <label for="experience">Experience</label>
                <input type="text" id="experience" name="experience" value="{{ old('experience', $existingApplication->experience ?? '') }}" required>
                @error('experience')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="resume">Resume (PDF format)</label>
                <input type="file" id="resume" name="resume" accept=".pdf" required>
                @error('resume')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button class="btn" type="submit">Apply</button>
    </form>
</div>


    </main>

    <footer>
        <p>&copy; 2024 learners are winners. All rights reserved.</p>
    </footer>
</body>
</html>



