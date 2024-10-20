








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
        padding: 0 0; /* Adjust padding for a smaller header */
        font-size: 14px; /* Decrease font size */
    }

    .container1 {
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
        color: white;
        text-decoration: none;
    }

    .search-form {
        display: flex;
        padding: 20px;
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

    .hero {
        background: url('your-image-url.jpg') no-repeat center center/cover;
        color: black;
        text-align: center;
        padding: auto 20px;
    }

    .hero h2 {
        font-size: 16px;
        margin: 0;
        text-align: left;
         text-align:center; 
         padding: 5px;
    }
    /* .hero p {
        font-size: 14px;
        margin: 0;
        text-align: left;
    } */
    .hero p {
    font-size: 14px;       /* Font size for readability */
    margin: 0 0;       /* Add vertical spacing between paragraphs */
    text-align: left;      /* Align text to the left */
    /* line-height: 1.5;      Improve readability with line height */
    color: #333;           /* Slightly darker color for better contrast */
    max-width: 700px;      /* Limit width for better line length */
    margin-left: auto;     /* Center the text block in its container */
    margin-right: auto;    /* Center the text block in its container */
    padding: 5px;         /* Add padding for a comfortable reading space */
}

    .btn {
        padding: 10px 20px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .features {
        padding: 0px;
        text-align: center;
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

    .container {
        display: flex;
        height: calc(88% - 60px); /* Adjusting for header height */
        font: size 12px;
    }

    .sidebar {
        width: 250px;
        background: #f4f4f4;
        padding: 10px;
        font-size: 16px;
        box-shadow: 5px 0 5px rgba(0,0,0,0.1);
    }

    .content {
        flex: 1;
        padding: 20px;
        overflow-y: auto; /* Allows scrolling within the content area */
    }

    textarea {
    height: 100px; /* Fixed height for textarea */
}
.form1 {
    display: flex; /* Use flexbox for form layout */
    flex-direction: column; /*Stack elements vertically */
    /* margin-top: 8px; Space above the form */
}
label {
    margin-bottom: 0; /* Space between label and input */
    font-weight: bold; /* Bold labels */
}
input[type="text"],
input[type="email"],
.message {
     padding: 10px; /*Inner padding */
    border: 1px solid #ccc; Light border */
    border-radius: 4px; Rounded corners */
    margin-bottom: 15px; Space below each input */
    font-size: 14px; Font size for input */
    resize: none; /* Prevent resizing of textarea */
}

button {
    padding: 8px 15px; /* Padding for button */
    background: #007bff; /* Button background color */
    color: white; /* Text color */
    border: none; /* Remove border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Button text size */
}

button:hover {
    background: #0056b3; /* Darker shade on hover */
}
.success-message {
    color: red; /* Set text color to red */
    font-weight: bold; /* Make the text bold */
    margin: 50px 0; /* Add some margin for spacing */
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Welcome!</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="container1">
                <h1>Welcome!</h1>
                <ul class="nav-links">
                    <li><a href="{{ url('/account')}}">Home</a></li>
                    <li><a href="{{ url('/about')}}">About Us</a></li>
                    <li><a href="{{ url('/contact')}}">Contact us</a></li>
                    <li><a href="{{ url('/vacancies')}}">Vacancy</a></li>
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
    <section class="hero">
        <div class="container">
    <div class="sidebar">
    <p><strong><em>Contact us...</em></strong></p>
    <p>
                <i class="fas fa-envelope"></i> Email: Hrm1@gmail.com
            </p>
            <p>
                <i class="fas fa-phone"></i> Phone: +251912345678
            </p>
            <p>
                <i class="fas fa-globe"></i> Website: <a href="https://hrm.edu.et/" target="_blank">https://hrm.edu.et/</a>
            </p>
 @if (session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

<form class="form1"action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" placeholder="type ur name..."name="name" id="name" required>
    @error('name')
        <small>{{ $message }}</small>
    @enderror
    <br>

    <label for="email">Email:</label>
    <input type="email" placeholder="type ur email.."name="email" id="email" required>
    @error('email')
        <small>{{ $message }}</small>
    @enderror
    <br>

    <label for="message">Message:</label>
    <textarea name="message" placeholder="type ur message here!"id="message" required></textarea>
    @error('message')
        <small>{{ $message }}</small>
    @enderror
    <br>

    <button type="submit">Send Message</button>
</form>
            </div>
            <div class="content">
            <section class="features">
            <a href="{{ url('/features') }}" class="btn">Get Started</a>
            <h1>Our Features</h1>
            <div class="feature-cards">
                <div class="feature-card">
                    <i class="fas fa-bolt"></i>
                    <h3>Feature One</h3>
                    <p>Welcome to our Human Resource Management (HRM) platform, where we prioritize the seamless integration of people and processes.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-cogs"></i>
                    <h3>Feature Two</h3>
                    <p>Our innovative solutions empower organizations to optimize workforce management, enhance employee engagement, and streamline recruitment.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Feature Three</h3>
                    <p>With user-friendly tools and data-driven insights, we help you cultivate a thriving workplace culture while ensuring compliance and efficiency.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield"></i>
                    <h3>Feature Four</h3>
                    <p>Join us on the journey to transform your HR practices and unlock your team's full potential!</p>
                </div>
            </div>
        </section>
            </div>
        </div>

        
    </main>

    <footer>
        <p>&copy; 2024 learners are winners. All rights reserved.</p>
    </footer>
</body>
</html>
