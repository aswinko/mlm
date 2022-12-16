<?php 
    session_start();
    
    include('./config/db_connect.php');
    include_once('./config/functions.php');

    

    if(isset($_SESSION['user']) && $_SESSION['user'] == true ){
        header("Location: dashboard/index.php"); 
    }else {
        
        if (isset($_POST['login'])){
            $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            // $remember = mysqli_real_escape_string($conn, $_POST['remember']);
    
            //check remeber has value or not
            // if(isset($_POST['remember'])){
            //     setcookie('uname', $username, time() + 60*60*24*10, "/");
            //     setcookie('upass', $password, time() + 60*60*24*10, "/"); 
            // } else {
    
            // }
            //login function call
            user_login($phone_no, $password);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../assets/icons/bekartlogo.svg" type="image/svg+xml">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- component -->
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
</head>
<body class="bg-slate-50">

    <?php include('./includes/navbar.php'); ?>

    <div class="flex flex-col items-center justify-center mt-12">
        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
            <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-600">Login To Your Account</div>
            <div class="mt-10">
                <form action="" method="post">
                    <div class="flex flex-col mb-6">
                        <label for="phone_no" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Mobile number:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <!-- <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg> -->
                                <img class="w-6" src="./assets/icons/phone-call.svg" alt="" style="filter: invert(72%) sepia(9%) saturate(361%) hue-rotate(179deg) brightness(90%) contrast(86%);">
                            </div>

                            <input id="phone_no" type="text" name="phone_no" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-purple-400" placeholder="Mobile number" required/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>

                            <input id="password" type="password" name="password" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-purple-400" placeholder="Password" required/>
                        </div>
                    </div>

                    <div class="flex items-center mb-6 -mt-4">
                        <div class="flex ml-auto">
                            <a href="#" class="inline-flex text-xs sm:text-sm text-purple-500 hover:text-purple-600">Forgot Your Password?</a>
                        </div>
                    </div>

                    <div class="flex w-full">
                        <button type="submit" name="login" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-purple-500 hover:bg-purple-600 rounded py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Login</span>
                            <span>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center items-center mt-6">
                <a href="./register.php" class="inline-flex items-center font-bold text-purple-500 hover:text-purple-600 text-xs text-center">
                    <span>
                        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </span>
                    <span class="ml-2">You don't have an account?</span>
                </a>
            </div>
        </div>
    </div>
    <!-- //for dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>