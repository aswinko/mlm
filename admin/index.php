<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }

    $sql = "SELECT * FROM user";
    $res = mysqli_query($conn, $sql);
    $record = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <?php include('../includes/header_links.php'); ?>
    </head>
    <body>
        <?php include('./sidebar.php'); ?>


        <section class="container mx-auto lg:pl-72 px-6 mb-8">
            <h2 class="pt-10 text-2xl font-bold">Dashboard</h2>
            <div class="card grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-4 justify-evenly">
                <div class="columns-1 w-[100%] mt-5">
                    <div class="grid grid-cols-2 gap-1 block p-6 rounded-lg shadow-lg bg-white max-w-sm py-10">
                        <div class="left columns-1">
                            <i class="fa-solid fa-user text-gray-500 text-4xl"></i>
                            <p class="text-gray-500 leading-tight font-medium text-m text-base">Users</p>
                        </div>
                        <div class="columns-1 right flex flex-row justify-end">
                            <p class="text-gray-500 text-3xl mb-4 ml-1"><?php echo $record; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('../includes/footer_links.php'); ?>
    </body>
</html>