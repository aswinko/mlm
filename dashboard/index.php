<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['user'])){
        header("Location: ../login.php"); 
    }


    //get current user
    $user_res = get_user();
    $user_row = mysqli_fetch_assoc($user_res);
    $ref_income = $user_row['ref_income'];
    $level_income = $user_row['level_income'];
    $todays_roi = $user_row['todays_roi'];
    $total_roi = $user_row['total_roi'];
    $ref_id = $user_row['ref_id'];
    $package_expiry = $user_row['package_expiry'];
    $wallet_amount = $user_row['wallet'];

    $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
    $query = mysqli_query($conn, $sql);
    $no_of_refer = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include('../includes/header_links.php'); ?>

</head>
<body class="bg-slate-100">
    <?php include('./sidebar.php'); ?>


    <section class="container mx-auto lg:pl-72 px-6 mb-8">
        <h2 class="pt-10 text-2xl font-bold">Dashboard</h2>
        <div class="card grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 gap-4 justify-evenly">
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                        <!-- <i class="fa-solid fa-wallet text-purple-800 text-4xl"></i> -->
                        <img class="w-10" src="../assets/icons/wallet.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-500 leading-tight font-medium text-m text-base">Wallet</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <svg fill="#A855F7" class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 
                            32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 
                            314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 
                            96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                        </svg>
                        <p class="text-purple-800 text-3xl mb-4 ml-1 mt-2"><?php echo $wallet_amount; ?></p>
                    </div>
                </div>
            </div>
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                    <img class="w-10" src="../assets/icons/money-check.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-800 leading-tight font-medium text-m text-base">Level Income</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <svg fill="#A855F7  " class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 
                            32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 
                            314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 
                            96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                        </svg>
                        
                        <p class="text-purple-800 text-3xl mb-4 ml-1 mt-2"><?php echo $level_income; ?></p>
                    </div>
                </div>
            </div>
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                    <img class="w-10" src="../assets/icons/money-bill-wave.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-800 leading-tight font-medium text-m text-base">Referral Income</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <svg fill="#A855F7  " class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 
                            32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 
                            314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 
                            96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                        </svg>
                        <p class="text-purple-800 text-3xl mb-4 ml-1 mt-2"><?php echo $ref_income; ?></p>
                    </div>
                </div>
            </div>
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                    <img class="w-10" src="../assets/icons/share.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-800 leading-tight font-medium text-m text-base">No of Referral</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <!-- <i class="fa-solid fa-indian-rupee-sign text-purple-800 text-4xl"></i> -->
                        
                        <p class="text-3xl mb-4 ml-1 text-purple-800"><?php echo $no_of_refer; ?></p>
                    </div>
                </div>
            </div>

            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                        <img class="w-10" src="../assets/icons/bank.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-800 leading-tight font-medium text-m text-base">Today's ROI </p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <svg fill="#A855F7  " class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 
                            32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 
                            314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 
                            96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                        </svg>
                        <p class="text-purple-800 text-3xl mb-4 ml-1 mt-2"><?php echo $todays_roi; ?></p>
                    </div>
                </div>
            </div>

            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                    <img class="w-10" src="../assets/icons/piggy-bank.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-800 leading-tight font-medium text-m text-base">Total ROI</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <svg fill="#A855F7  " class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 
                            32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 
                            314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 
                            96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                        </svg>
                        <p class="text-purple-800 text-3xl mb-4 ml-1 mt-2"><?php echo $total_roi; ?></p>
                    </div>
                </div>
            </div>

            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-xl shadow-lg bg-purple-100 max-w-sm py-10">
                    <div class="left columns-1">
                    <img class="w-10" src="../assets/icons/time-past.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
                        <p class="text-purple-800 leading-tight font-medium text-m text-base">Remaining Days</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <p class="text-purple-800 text-3xl mb-4 ml-1"><?php echo $package_expiry; ?></p>
                    </div>
                </div>
            </div>
        </div>

        
    </section>

    <?php include('../includes/footer_links.php'); ?>
</body>
</html>