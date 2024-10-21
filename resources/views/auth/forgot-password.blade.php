
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
.hero {
    background: url('your-image-url.jpg') no-repeat center center/cover;
    color: black;
    text-align: auto;
    padding: auto 10px;
    hight: 100%;;
}

 .hero h2 {
    font-size: 12px;
    paddign:10px;
    margin: 0;
    color: red;
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
    justify-content: right;
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
    padding: 2px;
    background: #002147;
    color: white;
}
.feature {
    background: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px 20px;
    width: 250px;
    text-align: left;
    height: 85px;
}
 .alart-status{
    color :red;

}
.alart-error{
color: red;

}
.input-container {
            position: relative;
            margin-bottom: auto;
        }
        .input-container input {
            padding-right: 20px; /* Space for the icon */
            width: 300px;
            box-sizing: border-box;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 30%;
            transform: translateY(-50%);
            cursor: pointer;
            color: gray; /* Change this as needed */
        }
     .toggle-password1 {
            position: absolute;
            right: 1020px;
            top: 54%;
            transform: translateY(-50%);
            cursor: pointer;
            color: gray; /* Change this as needed */
     }
     .text-danger{
      color:red;
      front: size 12px;

     }
 
 
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset!</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Welcome!</h1>
                <ul class="nav-links">
                    <li><a href="{{ url('/account') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                    <li><a href="{{ url('/vacancy ') }}">Vaccancy</a></li>
                    <li><a href="{{ url('/account/login1') }}">Login</a></li>
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
     <div class="feature">
    <h2>Forgot Password</h2>
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
       
            <label for="email">Email:</label>
            <input type="email" name="email" required>
       
        <button type="submit">Send Password Reset Link</button>
    </form>
</div>

        
        </section>

        <section class="features">
        <a href="{{ url('/features') }}" class="btn">Get Started</a>
            <h2>Our Features</h2>
            <div class="feature-cards">
                <div class="feature-card">
                    <i class="fas fa-bolt"></i>
                    <h3>Feature One</h3>
                    <p>Welcome to our Human Resource Management (HRM) platform,</li>
                     where we prioritize the seamless integration of people and processes.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-cogs"></i>
                    <h3>Feature Two</h3>
                    <p>Our innovative solutions empower organizations to optimize workforce management,</li> 
                    enhance employee engagement, and streamline recruitment.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Feature Three</h3>
                    <p>With user-friendly tools and data-driven insights, 
                        we help you cultivate a thriving workplace culture while ensuring compliance and efficiency. </p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield"></i>
                    <h3>Feature Four</h3>
                    <p>Join us on the journey to transform your HR practices and unlock your team's full potential!</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 learners are winners. All rights reserved.</p>
    </footer>
</body>
</html>

