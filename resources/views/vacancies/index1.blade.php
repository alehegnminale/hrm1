<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Welcome!</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General styles */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            /* line-height: 1.6; */
            background-color: #f4f7fa;
        }

        header {
       background: #002147;
        color: #fff;
       padding: 0px 20px;
}

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow: hidden; /* Prevent overflow */
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
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ffc107;
        }

        .search-form {
            display: flex;
        }

        .search-form input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5px;
        }

        .search-form button {
            padding: 5px 10px;
            background: #ffc107;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-form button:hover {
            background: #e0a800;
        }

        .hero {
            color: black;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #e9ecef;
            border-radius: 8px;
        }

        .hero h2 {
            font-size: 24px;
            margin: 0;
        }

        .vacancy-list {
            margin-top: 5px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #002147;
            color: white;
            position: relative;
            margin-top: 125px; 
            /* width: 100%; */
        }

.vacancy-card {
    padding: 15px;
    border-radius: 10px;
    background-color: #fff;
    margin: 20px 0;
    margin-left:100px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
    overflow: hidden; /* Prevent overflow */
    width: 1000px;
}

.vacancy-description {
    display: none; /* Initially hidden */
    margin-top: 10px;
    padding: 10px;
    border-top: 2px solid #007bff;
    width: 100%; Ensure full width
    box-sizing: border-box; Include padding in width
    overflow: hidden; /* Prevent overflow */
}

/* Ensure the overall layout prevents scrolling */
.vacancy-list {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}


        .vacancy-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .vacancy-card p {
            margin: 5px 0;
        }

   .btn {
    display: block; 
    margin: 20px auto; /* Center the button */
    padding: 10px 20px; /* Add padding */
    background-color: #007bff; /* Primary color */
    color: white; /* Text color */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor */
    transition: background 0.3s, transform 0.2s; /* Smooth transitions */
}

.btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
    transform: scale(1.05); /* Slightly enlarge on hover */
}

.btn:focus {
    outline: none; /* Remove outline */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add focus shadow */
}

        .submitbtn {   
            /* width: 100%; */
            padding: 10px;
            margin: 10px 0;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
            display: block; /* Make the button a block element */
           margin: 0 auto; /* Center the button */
           text-align: center; /* Center text inside the button */
        width: 150px; /* Set a fixed width for consistency */
        }
   

        .submitbtn:hover {
            background: #218838;
        }

        .vacancy-card {
        padding: 15px;
        border-radius: 10px;
        background-color: #fff;
        margin: 20px auto; /* Center the card */
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s;
        overflow: hidden; /* Prevent overflow */
        max-width: 90%; /* Set a maximum width */
    }

    .vacancy-description {
        display: none; /* Initially hidden */
        margin-top: 10px;
        list-style: 1.5;
        padding: 10px;
        border-top: 2px solid #007bff;
        width: 100%; /* Ensure full width */
        box-sizing: border-box; /* Include padding in width */
        margin-bottom: 15px; /* Space between description and button */
        line-height: 1.6;
    }

    .vacancy-list {
        overflow-x: hidden; /* Prevent horizontal scrolling */
    }

    body {
        overflow-x: hidden; /* Prevent horizontal scrolling */
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Welcome!</h1>
                <ul class="nav-links">
                    <li><a href="{{ url('/account')}}">Home</a></li>
                    <li><a href="{{ url('/about')}}">About Us</a></li>
                    <li><a href="{{ url('/contact')}}">Contact Us</a></li>
                    <li><a href="{{ url('/vacancies') }}">Vacancies</a></li>
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
    <section class="features">
    <div class="container1">
        @if(session()->has('status'))
            <div class="custom-alert">{{ session('status') }}</div>
        @endif 

        @if($vacancies->isEmpty())
            <p>No vacancies available at the moment. Visit Us Everyday!</p>
        @else
            <div class="vacancy-list">
                @foreach($vacancies as $vacancy)
                    @if($vacancy->posted)
                        <div class="vacancy-card">
                            <p><strong>Job Title:</strong> {{ $vacancy->job_title }}</p>
                            <p><strong>Company Name:</strong> {{ $vacancy->company_name }}</p>

                            <div class="vacancy-description" id="description-{{ $vacancy->id }}" style="display: none;">
                                <p><strong>Location:</strong> {{ $vacancy->location }}</p>
                                <p><strong>Salary Range:</strong> {{ $vacancy->salary_range }}</p>
                                <p><strong>Application Deadline:</strong> {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('d M Y') }}</p>
                                <p><strong>Job Description:</strong> {{ $vacancy->job_description }}</p>
                                <a href="{{ route('vacancies.apply', $vacancy->id) }}" class="submitbtn">Apply</a>
                            </div>
                            <button class="btn toggle-btn" onclick="toggleDetails({{ $vacancy->id }})">More Detail of the vacancy</button>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>
    </main>

    <script>
    function toggleDetails(vacancyId) {
    const description = document.getElementById('description-' + vacancyId);
    const toggleButton = document.querySelector(`.toggle-btn[onclick="toggleDetails(${vacancyId})"]`);

    if (description.style.display === "none" || description.style.display === "") {
        description.style.display = "block"; // Show the description
        toggleButton.textContent = "Less"; // Change button text to "Less"
    } else {
        description.style.display = "none"; // Hide the description
        toggleButton.textContent = "More Detail of the vacancy"; // Change button text to "More Detail of the vacancy"
    }
}
</script>

    <footer>
        <p>&copy; 2024 Learners Are Winners. All rights reserved.</p>
    </footer>
</body>
</html>
