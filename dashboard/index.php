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
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <i class="fa-solid fa-wallet text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">Wallet</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <i class="fa-solid fa-indian-rupee-sign text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $wallet_amount; ?></p>
                    </div>
                </div>
            </div>
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <!-- <i class="fa-solid fa-wallet text-gray-500 text-4xl"></i> -->
                        <i class="fa-solid fa-money-check text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">Level Income</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <i class="fa-solid fa-indian-rupee-sign text-gray-500 text-4xl"></i>
                        
                        <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $level_income; ?></p>
                    </div>
                </div>
            </div>
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <!-- <i class="fa-solid fa-wallet text-gray-500 text-4xl"></i> -->
                        <i class="fa-solid fa-money-bill-wave text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">Referral Income</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <i class="fa-solid fa-indian-rupee-sign text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $ref_income; ?></p>
                    </div>
                </div>
            </div>
            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <!-- <i class="fa-solid fa-wallet text-gray-500 text-4xl"></i> -->
                        <i class="fa-solid fa-share-nodes text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">No of Referral</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <!-- <i class="fa-solid fa-indian-rupee-sign text-gray-500 text-4xl"></i> -->
                        
                        <p class="text-3xl mb-4 ml-1 text-gray-500"><?php echo $no_of_refer; ?></p>
                    </div>
                </div>
            </div>

            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <i class="fas fa-university text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">Today's ROI </p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <i class="fa-solid fa-indian-rupee-sign text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $todays_roi; ?></p>
                    </div>
                </div>
            </div>

            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <i class="fas fa-piggy-bank text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">Total ROI</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <i class="fa-solid fa-indian-rupee-sign text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $total_roi; ?></p>
                    </div>
                </div>
            </div>

            <div class="columns-1 w-[100%] mt-5">
                <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                    <div class="left columns-1">
                        <i class="far fa-clock text-gray-500 text-4xl"></i>
                        <p class="text-gray-500 leading-tight font-medium text-m text-base">Remaining Days</p>
                    </div>
                    <div class="columns-1 right flex flex-row justify-end">
                        <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $package_expiry; ?></p>
                    </div>
                </div>
            </div>
        </div>

        
    </section>

    <?php include('../includes/footer_links.php'); ?>
</body>
</html>