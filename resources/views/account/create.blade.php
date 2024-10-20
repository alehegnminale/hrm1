<!DOCTYPE html>
<html lang="en">
<head>
   

    <style>
      html, body {
    overflow: hidden; /* Prevents scrolling */
    height: 100%; /* Ensures full height */
    margin: 0; /* Removes default margin */
}  
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #ffffffff;  
}  

button {   
       background-color: gray   ;   
       width: 100%;  
        color: white;   
        padding: 15px;   
        margin: 10px 0px;   
        cursor: pointer;  
         display: block;
          margin-left: auto;
          margin-right: auto;
           text-align: center;
           height: inherit;
        
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
        width: 100%;   
        margin: 8px 0;  
        padding: 5px 20px;   
        display: inline-block;   
        border: 0.5px solid gray;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.5;
        text-align: center;         
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
/*      
 .container {   
        padding: 25px;   
        background-color: light; 
        margin: 10 center; 
        justify-content: left;
        display:left;
       
    }    */
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    line-height: 1.6;
}

header {
    background: #002147;
    color: #fff;
    padding: 0px 5px;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: left;

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
    size: 10px;
    
}

.hero {
    background: url('your-image-url.jpg') no-repeat center center/cover;
    color: black;
    text-align: center;
    padding: 0px 0px;
    margin:1000;

}

.text-danger{
    color:red;
    font-size:10px;
}
 .hero h2 {
    font-size: 16px;
    margin: 0;
    text-align:left;
} 

.btn {
    padding: 5px 20px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 4px;
} 

.features {
    padding: 2px;
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
    padding: 5px;
    background: #002147;
    color: white;
}
h4{
    font-size: 14px;
    color:red;

}
.feature {
    background: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    width: 300px;
    text-align: left;
}
.input-container {
            position: relative;
            margin-bottom: auto;
        }
        .input-container input {
            padding-right: 5px; /* Space for the icon */
            width: 100%;
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
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            color: gray; /* Change this as needed */
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
</style>  

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - wellocme!</title>
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
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/contact') }}">Contact us </a></li>
                    <li><a href="{{ url('/vacancies') }}">Vaccancy</a></li>
                    <li><a href="{{ url('/account/login1')}}">Login</a></li>
                </ul>
                <a action="{{ url('/search') }}" method="GET" class="search-form">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="submit">Search</button>
</a>
            </div>
        </nav>
    </header>
    <div>
       
</div>
<div  >

 <form  method="post" action="{{route ('account.register')}}">  
        @csrf
       @method("post")
      
        <div class="container">  
        @if(session()->has("status"))
</div>
        <div class="alart  alart-status">
            {{session()->get("status")}}
        @endif 
        @if(session()->has("error"))
        </div>
        <div class="alart  alart-error">
            {{session()->get("error")}}
        @endif 
</div>
         <div class="feature">
         <h4 > Create Account</h4>
            <label>Name </label>   
            <input type="text" placeholder="Enter ur name" name="name" required> 
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
       @endif
            <label>Email </label>   
            <input type="text" placeholder="email" name="email" required value="{{ old('email') }}">  
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
            <div class="input-container">
            <label>Password  </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
         <div class="input-container">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" placeholder="password_confirmation" name="password_confirmation"  required>
            @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
             @endif
            <button type="submit" class="submitbtn">Submit</button>   
            <div>
           Do have An Account?<a href="{{ url('/account/login1') }}"> Sign in </a>   
         </div>
     
    </form>   
    
</div>
</div>
<main>
    

        <section class="hero">
            
     
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
                
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 learners are winners. All rights reserved.</p>
    </footer>
</body>
</html>