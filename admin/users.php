<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }

    $num=1;    

    $sql = "SELECT * FROM user ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);
    $record = mysqli_fetch_all($res, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <?php include('../includes/header_links.php'); ?>
</head>
<body class="bg-slate-100">
    <?php include('./sidebar.php'); ?>
    <div class="container mx-auto lg:pr-10 lg:pl-64 px-2 pt-12">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">User Management</h2>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Sl no
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        User Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Mobile number
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Referal id
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Sponser id
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        E-Pin
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Package Amount
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Wallet
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Package expiry
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($record): ?>
                                    <?php foreach($record as $records): ?>
                                        <?php
                                            $user_id = $records['id'];
                                            $sql = "SELECT * FROM epin WHERE user_id = '$user_id'";
                                            $query = mysqli_query($conn, $sql);
                                            $data = mysqli_fetch_assoc($query);    
                                        ?>
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?php echo $num++; ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo $records['name']; ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($records['phone_no']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($records['ref_id']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($records['sponser_id']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($data['e_pin']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($data['pack_amount']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($records['wallet']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($records['package_expiry']) ?> left
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a href="./update_user.php?user_id=<?php echo htmlspecialchars($records['id']); ?>">
                                                    <i class="fa-solid fa-pen-to-square text-gray-500 text-md"></i>
                                                </a>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo htmlspecialchars($records['created_at']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- <p>No records found!</p> -->
                                <?php endif; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../includes/footer_links.php'); ?>
</body>
</html>