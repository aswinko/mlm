<?php 
    session_start();
    include('./config/db_connect.php');
    include_once('./config/functions.php');


    if(isset($_SESSION['user']) && $_SESSION['user'] == true ){
        header("Location: index.php"); 
    }else {

        //get sponser_id through get method
        $get_sponser_id = null;
        if(isset($_GET['ref_id'])){
            $get_sponser_id = $_GET['ref_id'];
            // echo $sponser_id;
        }
        

        $name = $password = $phone_no = '';
        $errors = array('name' => '', 'password' => '', 'phone_no' => '');
    
        if (isset($_POST['register'])){

            if(empty($_POST['name'])){
                $errors['name'] = 'Name is required.';
            }else {
                $name = $_POST['name'];
                if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                    $errors['name'] = 'Name must be letters.';
                }
            }

            if(empty($_POST['phone_no'])){
                $errors['phone_no'] = 'Mobile number is required.';
            }else {
                $phone_no = $_POST['phone_no'];
                if(!preg_match('/^[0-9]{10}+$/', $phone_no)){
                    $errors['phone_no'] = 'Mobile number must be 10 digits.';
                }
            }
    
    
            if(empty($_POST['password'])){
                $errors['password'] = 'Password is required.';
            }else {
                $password = $_POST['password'];
                if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $password)){
                    $errors['password'] = 'Password contain atleast eight characters, one letter, one number and one special character.';
                }
            }
    
            // if(empty($_POST['email'])){
            //     $errors['email'] = 'Email is required.';
            // }else {
            //     $email = $_POST['email'];
            //     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //         $errors['email'] = 'Email must be a valid email address.';
            //     }
            // }
    
            if(array_filter($errors)){
    
            }else {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
                // $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $ref_id = str_replace(' ', '', $name) . uniqid();
                
                $sponser_id = mysqli_real_escape_string($conn, $_POST['sponser_id']);
                $ref_income = 0.0;
                //signup function call
                user_signup($name, $phone_no, $password, $ref_id, $sponser_id, $ref_income);
            }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- component -->
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

</head>
<body class="bg-slate-50">
   
    <?php include('./includes/navbar.php'); ?>

    <div class="flex flex-col items-center justify-center mt-2 mb-4">
        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
            <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Register Your Account</div>
            <div class="mt-10">
                <form action="" method="POST">
                    <div class="flex flex-col mb-6">
                        <label for="name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Name:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>

                            <input id="name" type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Name" required/>
                        </div>
                        <div class="text-rose-700 text-xs"><?php echo $errors['name']; ?></div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="phone_no" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Mobile number:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="phone_no" type="text" name="phone_no" value="<?php echo htmlspecialchars($phone_no); ?>" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Mobile number" required/>
                        </div>
                        <div class="text-rose-700 text-xs"><?php echo $errors['phone_no']; ?></div>
                    </div>
                    <!-- <div class="flex flex-col mb-6">
                        <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">E-Mail Address:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>

                            <input id="email" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="E-Mail Address" required/>
                        </div>
                        <div class="text-rose-700 text-xs"><?php echo $errors['email']; ?></div>
                    </div> -->
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

                            <input id="password" type="password" name="password" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Password" required/>
                        </div>
                        <div class="text-rose-700 text-xs"><?php echo $errors['password']; ?></div>
                    </div>

                    <!-- <div class="flex items-center mb-6 -mt-4">
                        <div class="flex ml-auto">
                            <a href="#" class="inline-flex text-xs sm:text-sm text-blue-500 hover:text-blue-700">Forgot Your Password?</a>
                        </div>
                    </div> -->
                    <div class="flex flex-col mb-6">
                        <label for="sponser_id" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Referral Code: <span>(optional)</span></label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            </div>

                            <input id="sponser_id" value="<?php echo $get_sponser_id; ?>" type="text" name="sponser_id" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Referral Code"/>
                        </div>
                        <div class="text-rose-700 text-xs"><?php if(isset($_SESSION['invalid_ref_id']) && $_SESSION['invalid_ref_id'] != '') {echo $_SESSION['invalid_ref_id']; unset($_SESSION['invalid_ref_id']);} ?></div>
                    </div>

                    <div class="flex w-full">
                        <button type="submit" name="register" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Register</span>
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
            <a href="./login.php" class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                <span>
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                </span>
                <span class="ml-2">Already have an account?</span>
            </a>
            </div>
        </div>
    </div>
    <!-- //for dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>