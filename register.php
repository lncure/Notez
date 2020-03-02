<?php
//include config file
require_once "config.php";

//THIS IS A REGISTER FILE, WHERE WE "REGISTER" AN USER
//WE CREATE USERS HERE
//THEY ARE CREATED AND BIRTHED IN OUR BINARY BOWELS.

//All these things are to empty out our variables to empty strings
//this is done by saying that the variable called 'confirm password'
//is equal to an empty string, then 'password' and then 'username'.
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

///////////////////////////////////////////////////////////////////////////////////
//validation of username
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //the code checks to see if the username input is empty,
    //and if so. it will return with: "Please enter a username".
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";

        //Now the code has reached an else statement
    }else{
        
        //If the username input ISN'T empty
        //it will select the id from 'users' in our sql database where username is equal to ?.
        //select
        $sql = "SELECT id FROM users WHERE username = ?";

        //The code is preparing for the sql statement to be executed
        //our 'stmt' represents a prepared statement.
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //the username gets trimmed from spaces
            $param_username = trim($_POST["username"]);

            //If the mysqli_stmt has been executed
            if(mysqli_stmt_execute($stmt)){
                //then the username will be stored
                mysqli_stmt_store_result($stmt);

                //BUT
                //if the username is already taken
                //it will return with 'username already taken'
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                }else{
                    //if it is NOT taken, it will post it to the database
                    $username = trim($_POST["username"]);
                }
            }else{
                //if all else fails, pray.
                echo "Something went wrong, try again later."
            }
            //The statement is closed so that the next statement is
            //ready to be run.
            mysqli_stmt_close($stmt);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

        // Validate password
        //if the password input field is empty, trim it.
    if(empty(trim($_POST["password"]))){
        //If nothing is entered into the field, return the string 'enter password'.
            $password_err = "Please enter a password.";
            //This line of code takes the password and checks if it has atleast 6 characters.
        } elseif(strlen(trim($_POST["password"])) < 6){
            //If it don't have the 6 characters, it will respond with 'atleast 6 characters'.
            $password_err = "Password must have atleast 6 characters.";
        } else{
            //If it does have the characters, then just trim it, and post it.
            $password = trim($_POST["password"]);
        }
        //////////////////////////////////////////////////////////////////
        //CONFIRM PASSWORD
        //If the 'confirm password' input is empty
        //trim it.
        if(empty(trim($_POST["confirm_password"]))){
            //If you don't confirm the password and go on like the ifant you are.
            //It will respond with 'Please confirm password'
            $confirm_password_err = "Please confirm password.";     
        } else{
            //But if you DO confirm password by entering your password
            //in the 'confirm password' input, then trim it.
            $confirm_password = trim($_POST["confirm_password"]);
            //If it is empty, and password isn't matching with
            //the previous password, return 'Password did not match'
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }
        
        ///////////////////////////////////////////////////////////////////////////////
        // Check input errors
        //This line of code checks ALL of our error messages througout our registration
        //If ANY of them are empty, it will redirect them to the nex line of code.
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
            //insert
            //Here we insert ALL of our data that has been entered, into the database
            //We not have another user.
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
             
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
                
                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        // Close connection
        mysqli_close($link);
    }
}


