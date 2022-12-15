<?php 
    session_start();
    include('../config/db_connect.php');
    include_once('../config/functions.php');


    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true ){
        

        $name = $phone_no = '';
        $errors = array('name' => '', 'phone_no' => '');


        $get_sponser_id = null;
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];

            $sql = "SELECT * FROM user WHERE id = '$user_id'";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            $name = $data['name'];
            $phone_no = $data['phone_no'];
        }else {
            header("Location: users.php");
        }
        
    
        if (isset($_POST['update'])){

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
    
            if(array_filter($errors)){
    
            }else {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);

                //signup function call
                update_user($name, $phone_no, $user_id);
            }
        }
    }else {
        header("Location: index.php"); 
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- component -->
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

</head>
<body class="bg-slate-50">

    <div class="flex flex-col items-center justify-center mt-2 mb-4">
        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
            <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Update users</div>
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

                    <div class="flex w-full">
                        <button type="submit" name="update" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Update</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //for dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>