
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM Dashboard</title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html, body {
    /* overflow: hidden; Prevents scrolling */
    height: auto; Ensures full height */
    margin: 0; /* Removes default margin */
}
        body {
            background-color: #f8f9fa;
        }
        .sidebar a:hover {
            background-color: #e2e6ea;
        }
        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
        .card {
            transition: transform 0.2s;
        }
        .header {
            background-color: #002147;
            color: black;
            padding: 10px 15px; /* Minimized padding */
            position: fixed;
            width: 100%;
            z-index: 999;
            top: 0; /* Fix header at the top */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .profile-pic {
            width: 50px; /* Width of the container */
            height: 50px; /* Height of the container */
            border-radius: 50%;
            overflow: hidden;
        }
        .profile-pic img {
            width: 100%;
            height: auto;
        }
        .sidebar {
            height: calc(100vh - 60px); /* Adjust height for the header */
            position: fixed;
            left: 0;
            top: 75px; /* Position below the header */
            width: 250px;
            padding-top: 10px;
            z-index: 1000;
            
        }
        .dropdown {
    margin-bottom: 10px;
}

.dropdown-title {
    cursor: pointer;
    font-weight: none;
    padding: 10px;
    border-radius: 5px;
}

.dropdown-content {
    display: none;
    padding-left: 20px;
    background-color: #f9f9f9;
    border-left: 2px solid #ccc;
}

.dropdown-content a {
    display: block;
    margin: 5px 0;
    padding: 8px;
    text-decoration: none;
    color: #007bff;
    border-radius: 5px;
}

.dropdown-content a:hover {
    background-color: #e2e2e2;
}
        .main-content {
            margin-left: 250px; /* Space for the sidebar */
            padding: 20px;
            padding-top: 80px; /* To avoid overlap with the header */
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px; /* Adjust margin for smaller screens */
            }
            .header {
                width: calc(100% - 200px); /* Adjust width for the sidebar */
            }
        }

        .block {
    margin-bottom: 10px; /* Space between blocks */
}

/* Dropdown Title Styles */
.dropdown-title {
    cursor: pointer; /* Pointer cursor for interactivity */
    font-weight: bold; /* Bold text */
    padding: 0px; /* Padding around the title */
    background-color: #e2e2e2; /* Slightly darker background for the title */
    /* border-radius: 5px; Rounded corners */
    display: flex; /* Flexbox for alignment */
    align-items: center; /* Center icon and text vertically */
    /* color:#007bff; */
    color: rgb(10, 90, 280);
    
}

/* Icon Margin */
.dropdown-title i {
    margin-right: 8px; /* Space between icon and text */
    
}

   .h1{

    font-size: 22px;
    color :black ;
   } 
.h3{
    font-size: 16px;
    color :black ;

}

/* Dropdown Content Styles */
.dropdown-content {
    display: none; /* Hidden by default */
    padding-left: 10px; /* Indent for dropdown items */
    background-color: #f9f9f9; /* Background for dropdown content */
    border-left: 2px solid #ccc; /* Left border for emphasis */
    border: 4px solid #ccc; /* Left border for emphasis */
}

/* Link Styles in Dropdown */
.dropdown-content a {
    display: block; /* Block display for links */
    margin: 5px 0; /* Margin between links */
    padding: 8px; /* Padding for links */
    text-decoration: none; /* Remove underline */
    color: #007bff; /* Blue color for links */
    border-radius: 5px; /* Rounded corners for links */
}

/* Link Hover Effect */
.dropdown-content a:hover {
    background-color: #e2e2e2; /* Change background on hover */
}
/* .dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    z-index: 1;
} */

.dropdown-subcontent {
    display: none;
    position: absolute;
    left: 100%; /* Aligns the subcontent to the right of the parent */
    top: 250; /* Aligns it to the top of the parent */
    background-color: white;
    border: 1px solid #ccc;
    z-index: 1;
}
    </style>
</head>
<body>
    @csrf
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="d-flex">
        
        <!-- Header -->
        <header class="header">
    <div class="d-flex align-items-center" style="width: 100%;">
        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" onclick="showNotifications()">
                <i class="fas fa-bell me-3"></i> <!-- Add margin right here -->
            </a>
            
            <a href="javascript:void(0);" onclick="showMessages()">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
        
        <div class="mx-auto">
            <div class="input-group" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Search..."  name="search" id="search" aria-label="Search">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <nav class="d-flex align-items-center ms-3">
            <div class="profile-pic" id="profileImage">
            @if(Auth::check() && Auth::user()->profile && Auth::user()->profile->photo)
        <img src="{{ asset('storage/' . Auth::user()->profile->photo) }}" alt="User" style="width: 150px; height: 150px;">
        @else
        <img src="https://via.placeholder.com/150/007bff/ffffff?text=Profile" alt="User">
       @endif
            </div>
            <span class="text-white ms-2">
                {{ session('user_name') }}<br>
                {{ session('user_email') }}
            </span>
            <div class="dropdown ms-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownProfileButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownProfileButton">
                    <li>
                        <a class="dropdown-item" href="{{ url('/account/edit1') }}">Edit Profile</a>
                    </li>
                    <li>
                        <form method="get" action="{{ route('logout') }}" name ="logout" id ="logout">
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar bg-white shadow">
    <div>
   <a href="" class="block p-2 text-gray-700"><i class="fas fa-home"></i> Dashboard</a>
    </div>
    <div class="block p-2 text-gray-700" id="vacancyDropdown">
    <div class="dropdown-title" onclick="toggleDropdown('vacancyDropdownContent')">
        <i class="fas fa-clipboard-list"></i> Manage Vacancies
    </div>
    <div class="dropdown-content" id="vacancyDropdownContent">
        <a href="{{url('/vacancies/create')}}" onclick="closeDropdown()">Post Vacancy</a>
        <a href="update.html" onclick="closeDropdown()">Update Vacancy</a>
        <a href="{{url('/vacancies/index')}}" onclick="closeDropdown()">View Vacancy</a>
    </div>
     </div>
        
     <div class="block p-2 text-gray-700" id="vacancyDropdown">
    <div class="dropdown-title" onclick="toggleDropdown('schedule')">
    <div>
    <div class="timer">
    <i class="far fa-clock"></i> Manage Schedule
    <span id="countdown">100</span> 
    </div>
</div>
    </div>
    <div class="dropdown-content" id="schedule">
        <a href="post.html" onclick="closeDropdown()">Pepare</a>
        <a href="update.html" onclick="closeDropdown()">Aprove</a>
       
    </div>
     </div>
    
     <div class="block p-2 text-gray-700" id="vacancyDropdown">
    <div class="dropdown-title" onclick="toggleDropdown('Aprequest')">
    <i class="fa-regular fa-2x fa-spin">&#xf436;</i> Manage Request
    </div>
    <div class="dropdown-content" id="Aprequest">
        <a href="" onclick="closeDropdown()">Leave</a>
        <a href="" onclick="closeDropdown()">traing</a>
        <a href="" onclick="closeDropdown()">Seminar</a>
        <a href="" onclick="closeDropdown()">Employee Complain</a>
        <a href="" onclick="closeDropdown()">Per Diem</a>
        <a href="" onclick="closeDropdown()">OverTime</a>
        <a href="" onclick="closeDropdown()">Seminar</a>
        <a href="" onclick="closeDropdown()">Exprience letter</a>
    </div>
     </div>
     <div class="block p-2 text-gray-700" id="vacancyDropdown">
    <div class="dropdown-title" onclick="toggleDropdown('ReviewRe')">
        <i class="fa-regular fa-comment-dots fa-2x"></i> Review
    </div>
    <div class="dropdown-content" id="ReviewRe">
        <a href="#" onclick="toggleDropdown('PlanDropdown')">Plan</a>
        <div class="dropdown-subcontent" id="PlanDropdown" style="display:none;">
            <a href="#" onclick="closeDropdown()">Daily</a>
            <a href="#" onclick="closeDropdown()">Weekly</a>
            <a href="#" onclick="closeDropdown()">Monthly</a>
        </div>
        
        <a href="#" onclick="toggleDropdown('ReportDropdown')">Report</a>
        <div class="dropdown-subcontent" id="ReportDropdown" style="display:none;">
            <a href="#" onclick="closeDropdown()">Daily</a>
            <a href="#" onclick="closeDropdown()">Weekly</a>
            <a href="#" onclick="closeDropdown()">Monthly</a>
        </div>
        
        <a href="#" onclick="toggleDropdown('ActivityDropdown')">Activity</a>
        <div class="dropdown-subcontent" id="ActivityDropdown" style="display:none;">
            <a href="#" onclick="closeDropdown()">Daily</a>
            <a href="#" onclick="closeDropdown()">Weekly</a>
            <a href="#" onclick="closeDropdown()">Monthly</a>
        </div>
    </div>
</div>   

            <div>           
                <a href="" class="block p-2 text-gray-700"><i class="fas fa-cog"></i> Settings</a>
            </div>
        </aside>
<script>

function toggleDropdown(contentId) {
    const content = document.getElementById(contentId);
    content.style.display = content.style.display === "block" ? "none" : "block";
}

function closeDropdown() {
    const content = document.getElementById('vacancyDropdownContent');
    content.style.display = "block";
}
function toggleDropdown(contentId) {
    const content = document.getElementById(contentId);
    content.style.display = content.style.display === "block" ? "none" : "block";
}

function closeDropdown() {
    const content = document.getElementById('Aprequest');
    content.style.display = "block";
}
function toggleDropdown(contentId) {
    const content = document.getElementById(contentId);
    content.style.display = content.style.display === "block" ? "none" : "block";
}

function closeDropdown() {
    const content = document.getElementById('schedule');
}
function toggleDropdown(contentId) {
    const content = document.getElementById(contentId);
    content.style.display = content.style.display === "block" ? "none" : "block";
}
function closeDropdown() {
    const content = document.getElementById('ReviewRe');
}

function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
}

function closeDropdown() {
    const subContents = document.querySelectorAll('.dropdown-subcontent');
    subContents.forEach(subContent => {
        subContent.style.display = 'none';
    });
}
</script>

<script>
    let timeRemaining = 100; // Countdown start time in seconds
    const countdownElement = document.getElementById('countdown');

    const countdown = setInterval(() => {
        if (timeRemaining <= 0) {
            clearInterval(countdown);
            countdownElement.textContent = "";
        } else {
            countdownElement.textContent = timeRemaining;
            timeRemaining--;
        }
    }, 1000);
</script>

        <!-- Main Content -->
        <main class="main-content">
    <div class="container">
        <h1 class="h1"><i class="fas fa-briefcase"></i> List of Vacancies</h1>
        @if(session()->has('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif 
        <div class="vacancy-list">
            <div id="vacancies-container">
                @foreach($vacancies as $vacancy)
                <div class="vacancy-card" id="vacancy-{{ $vacancy->id }}">
                    <h3 class="h3"><i class="fas fa-id-badge"></i> Vacancy ID: {{ $vacancy->id }}</h3>
                    <p><strong>Job Title:</strong> {{ $vacancy->job_title }}</p>
                    
                    <div class="vacancy-details" id="details-{{ $vacancy->id }}">
                        <p><strong>Job Description:</strong> {{ $vacancy->job_description }}</p>
                        <p><strong>Company Name:</strong> {{ $vacancy->company_name }}</p>
                        <p><strong>Location:</strong> {{ $vacancy->location }}</p>
                        <p><strong>Salary Range:</strong> {{ $vacancy->salary_range }}</p>
                        <p><strong>Application Deadline:</strong> {{ $vacancy->application_deadline }}</p>
                    </div>

                    <form action="{{ route('vacancies.post') }}" method="POST" onsubmit="return postVacancy(event, {{ $vacancy->id }})">
                        @csrf
                        <input type="hidden" name="id" value="{{ $vacancy->id }}">
                        <span class="label label-success" style="margin-right: 10px;"><strong>Status of the Vacancy:</strong> </span>
                        @if($vacancy->posted)
                            <button type="button" class="btn btn-primary" style="display:none;">Post</button>
                            <span class="posted-message" id="posted-message-{{ $vacancy->id }}" style="display:inline;">Vacancy Posted</span>
                        @else
                            <button type="submit" class="btn btn-primary" id="post-btn-{{ $vacancy->id }}">Post</button>
                            <span class="posted-message" id="posted-message-{{ $vacancy->id }}" style="display:none;">Vacancy Posted</span>
                        @endif
                    </form>
                </div>
                @endforeach
            </div>

            <button id="toggle-btn" class="btn bg-green btn-primary" onclick="toggleVacancies()">Less</button>
            <p id="no-more-message" style="display:none;">No more vacancies available.</p>
        </div>
    </div>

    <script>
        let detailsVisible = true;

        function toggleVacancies() {
            const toggleButton = document.getElementById('toggle-btn');
            const details = document.querySelectorAll('.vacancy-details');

            detailsVisible = !detailsVisible;

            if (detailsVisible) {
                details.forEach(detail => detail.style.display = 'block');
                toggleButton.textContent = 'Less';
            } else {
                details.forEach(detail => detail.style.display = 'none');
                toggleButton.textContent = 'More Detail of the vacancies';
            }
        }

        function postVacancy(event, vacancyId) {
            event.preventDefault(); // Prevent default form submission

            const form = event.target;
            const formData = new FormData(form);

            // Hide the post button and show the posted message
            document.getElementById('post-btn-' + vacancyId).style.display = 'none';
            document.getElementById('posted-message-' + vacancyId).style.display = 'inline';

            // Send AJAX request to post the vacancy
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is sent
                }
            })
            .then(response => {
                if (response.ok) {
                    console.log('Vacancy posted successfully.');
                } else {
                    console.error('Error posting vacancy.');
                }
            })
            .catch(error => {
                console.error('Network error:', error);
            });

            return false; // Prevent normal form submission
        }

        // On page load, all details will be visible
        window.onload = function() {
            const details = document.querySelectorAll('.vacancy-details');
            details.forEach(detail => detail.style.display = 'block');
        };
    </script>

    <style>
        .vacancy-list {
            display: flex;
            flex-direction: column;
            gap: 20px; 
            color: black;
            width: 1075px;
        }

        .vacancy-card {
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .vacancy-details {
            margin-top: 10px;
        }
    </style>
</main>

    </div>
</body>
</html>

