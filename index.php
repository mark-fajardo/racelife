<!DOCTYPE html>
<html>
    <head>
        <script src="jquery.js"></script>
        <script src="script.js"></script>
        <style>
            body {font-family: 'Segoe UI';}

            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }

            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            .tab button:hover {
                background-color: #ddd;
            }

            .tab button.active {
                background-color: #ccc;
            }

            .tabcontent {
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }

            .item-name {
                text-align: left;
            }

            .desc-container {
                display: none;
                background-color: white;
                height: 300px;
                width: 300px;
                position: absolute;
                overflow-y: auto;
                overflow-x: hidden; 
                text-align: left;
            }

            #header {
                margin: auto;
                text-align: center;
            }

            .form {
                margin: auto;
                background-color: white;
                width: 500px;
                border: 1px solid #ccc;
                border-color: lightgrey;
                padding: 80px 0;
                border-radius: 4px;
            }

            .form-input {
                border: 1px solid #ccc;
                border-color: lightgrey;
                border-radius: 4px;
                padding: 5px;
                margin: 5px;
                font-size: 15px;
            }

            .form-button {
                border: none;
                border-radius: 4px;
                padding: 10px 20px;
                margin: 5px;
                background-color: #4CAF50;
                color: white;
                font-size: 15px;
            }
        </style>
    </head>
    <body style="background-color: #F5F5F5">
        <div id="log-in-sign-up-form" style="display: none; text-align: center; margin: 180px auto;">
            <div id="login-form" class="form">
                <h2>Login</h3>
                <input type="text" id="username-login" placeholder="Username" class="form-input"> <br>
                <input type="password" id="password-login" placeholder="Password" class="form-input"> <br>
                <div class="error-container">
                    <span class="error-msg" style="color: red"></span>
                </div> <br>
                <input type="submit" value="Log in" onclick="loginUser()" class="form-button"> <br> <br> <br>
                <span><a href="#" onclick="$('.error-msg').html('');$('#login-form').slideUp();$('#signup-form').slideDown()">Sign up</a> for a new account?</span>
            </div>

            <div id="signup-form" class="form" style="display: none">
                <h2>Sign up</h3>
                <input type="text" id="name-signup" placeholder="Name" class="form-input"> <br>
                <input type="text" id="username-signup" placeholder="Username" class="form-input"> <br>
                <input type="password" id="password-signup" placeholder="Password" class="form-input"> <br>
                <div class="error-container">
                    <span class="error-msg" style="color: red"></span>
                </div> <br>
                <input type="submit" value="Sign up" onclick="registerUser()" class="form-button"> <br> <br> <br>
                <span>Already have an account? Log in <a href="#" onclick="$('.error-msg').html('');$('#signup-form').slideUp();$('#login-form').slideDown();">here</a>.</span>
            </div>  
        </div>

        <div id="shop-body" style="display: none;">
            <div id="header">
                <h2>Racelife</h2>
            </div>
            <div class="tab">
                <button class="tablinks active" onclick="openCategory(event, 'shirts-container')">T-Shirts and Long sleeves</button>
                <button class="tablinks" onclick="openCategory(event, 'shorts-container')">Shorts and Pants</button>
                <button class="tablinks" onclick="openCategory(event, 'shoes-container')">Shoes and Slides</button>
                <button class="tablinks" onclick="openCategory(event, 'cart-container')">Cart</button>
                <button class="tablinks" onclick="logoutUser()" style="float: right">Logout</button>
                <button class="tablinks" style="float: right" id="username-display"></button>
            </div>
            <div id="items-display" style="text-align: center;"></div>
            <div id="cart-body">
                <div id="cart-container" class="tabcontent" style="text-align: center"></div>
            </div>
        </div>
    </body>
</html>