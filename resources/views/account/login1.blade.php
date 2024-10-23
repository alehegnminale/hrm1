
<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
 

 button {   
       background-color: gray   ;   
       width: 50%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        cursor: pointer;  
         display: block;
          margin-left: auto;
          margin-right: auto;
           text-align: center;
           
        
         } 
    
  form {   
        border: 10px solid white;  
        marign: 10px; 
        width: 10px;
        background-color: white; 
        height: 30px; 
        padding: 10px 
    }    

 input[type=text], input[type=password] {   
        width: 300px; 
        margin: 10px 0px;  
        color:black;
        padding: 8px 0px;   
        display: inline-block;   
        border: 1px solid black;   
        box-sizing: border-box; 
       
    
       
    }  
 button:hover {   
        opacity: 0.7; 
        color: ;  
    }   
  .cancelbtn {   
        width: 10;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
    .submitbtn {   
        width: 300px;
        padding: 10px 10px;  
        margin: 10px 0px ;
    padding: 10px 50px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
    /* margin-left: 200px; */
    
         
    }   
     
 /* .container {   
        padding: auto;   
        background-color: white;  
        
       
    }   */
   
    h4{
        width: 20;   
        padding: 10px 0px;  
        margin: 10px 5px auto; 
        color :  blue ;
        text-align:auto;
        height:0;
        font-sizeof:15;
    } 
    h3{
        width: 10;   
        padding: 10px 0px;  
        margin: 12px 5px auto; 
        color :red;
        text-align:auto;
        height: 30px;
        font-size: 14px;
    }
    /* table{
        border: 100px;
        color:red;
    } */
    
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
    padding: 0px 20px;
}

.container {
    display: flex;
    justify-content: space-between;
   /* align-items: left;
   */

   
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
    width: unset;
}

.search-form button {
    padding: 5px 10px;
    background: #ffc107;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  
    
}


.hero {
    /* background: url('your-image-url.jpg') no-repeat center center/cover; */
    color: black;
    text-align: auto;
    padding: auto 10px;
    hight: 100%;;
}

 .h2 {
    font-size: 12px;
    paddign:5px;
    margin: 0;
} 
h2{
    font-size: 20px; 
}

.btn {
    padding: 10px 20px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 4px;
}

.features {
    padding: 0;
    text-align: center;
}

.feature-cards {
    display: flex;
    justify-content: right;
    gap: 20px;
}
.feature-card {
    background: #f8f9fa;
    border: 2px solid #ccc; /* You can choose to keep or remove this */
    border-radius: 8px;
    padding: 20px;
    width: 180px;
    text-align: left;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add this line for shadow */
}


.feature-card i {
    font-size: 2em;
    color: #007bff;
    height: 10px;
}

footer {
    text-align: center;
    padding: 2px;
    background: #002147;
    color: white;
}
.feature {
    background: #f8f9fa; /* Light gray background */
    border: 3px solid #ccc; /* Light gray border */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Padding inside the box */
    width: 300px; /* Fixed width */
    text-align: left; /* Left-aligned text */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
    margin: auto; /* Center the form */
    transition: box-shadow 0.3s; /* Smooth transition on hover */
}

.feature:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
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
     label {
    font-weight: bold;
    /* display: block; */
     margin-bottom: 5px; 
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - welcome!</title>
    <!-- I<link rel="stylesheet" href="{{ asset('css/styles.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>welocme!</h1>
                <ul class="nav-links">
                    <li><a href="{{ url('/account') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About us </a></li>
                    <li><a href="{{ url('/contact') }}">Contact us</a></li>
                    <li><a href="{{ url('/vacancies') }}">Vacancy</a></li>
                    <li><a href="{{ url('/account/login1') }}">Login</a></li>
                </ul>
                <a action="{{ url('/search') }}" method="GET" class="search-form">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="">Search</button>
</a>
            </div>
        </nav>
    </header> 
<body>    

       <div> 
       @if(session()->has("status"))
        <div class="alart  alart-status">
            {{session()->get("status")}}
        @endif 
        @if(session()->has("error"))
        <div class="alart  alart-error">
            {{session()->get("error")}}
        @endif
        <main>
          <section class="hero">
          <section>
            <form class="f1" method="post" action="{{url('/account/signin')}}">  
        @csrf
        @method("post") 
        <div class="feature bg-white shadow">
           <h4 class="h4"> <i class="fas fa-sign-in-alt"></i> Sign in </h4>
          <h3 class="h2">  Enter your email and password to login </h3>
          <div>
            <label>Email </label>   
</div>
<div>
            <input type="text" placeholder="Enter ur email" name="email" > 
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
            </div>
            <div>
            <label>Password </label>  
            <div>

            <input type="password" placeholder="Enter Password" name="password">  
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
          <div>
        <input type="checkbox" name="remember" id="remember">
        <label class ="lab" for="remember">Remember Me</label>
    </div>
            </div>
           <a  href="{{ url('/forgot-password') }}"> Forgot password? </a>   
         
         <div>
            <button type="submit" class="submitbtn">Login</button>   
            <div>
           Don't have An Account?<a href="{{ url('/account/create') }}"> Sign Up </a>   
         </div>
         <div>

</section>
             
            </div>
        </div>   
        
        <section class="features">
        <a href="{{ url('/features') }}" class="btn">Get Started</a>
        
            <h2>Our Features</h2>
            <div class="feature-cards">
                <div class="feature-card">
                    <i class="fas fa-bolt"></i>
                    <h2>Feature One</h2>
                    <p>Welcome to our Human Resource Management (HRM) platform,</li>
                     where we prioritize the seamless integration of people and processes.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-cogs"></i>
                    <h2>Feature Two</h2>
                    <p>Our innovative solutions empower organizations to optimize workforce management,</li> 
                    enhance employee engagement, and streamline recruitment.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h2>Feature Three</h2>
                    <p>With user-friendly tools and data-driven insights, 
                        we help you cultivate a thriving workplace culture while ensuring compliance and efficiency. </p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield"></i>
                    <h2>Feature Four</h2>
                    <p>Join us on the journey to transform your HR practices and unlock your team's full potential!</p>
                </div>
            </div>
        </section>
        </form>
</main>  
<footer>
        <p>&copy; 2024 learners are winners. All rights reserved.</p>
    </footer>
</body>     
</html>  