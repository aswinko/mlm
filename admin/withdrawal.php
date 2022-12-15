<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }


    //get current user
    $num=1;   

    $sql = "SELECT * FROM withdrawal ORDER BY id DESC";
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
    <div class="container mx-auto lg:px-32 lg:pl-72 px-2 pt-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">Withdraw Approval</h2>
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
                                        Withdrawal Amount
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($record): ?>
                                    <?php foreach($record as $records): ?>
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?php echo $num++; ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php 
                                                    //get user name
                                                    $user_id = $records['user_id']; 

                                                    $name_sql = "SELECT * FROM user Where id = '$user_id'";
                                                    $name_res = mysqli_query($conn, $name_sql);
                                                    $name = mysqli_fetch_assoc($name_res);
                                                    echo $name['name'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['withdrawal_amount']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['withdraw_status']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php if($records['withdraw_status'] == 'Success'): ?>
                                                    <i class="fa-solid fa-check"></i>
                                                <?php else: ?>
                                                    <a href="./withdrawal_approve.php?id=<?php echo htmlspecialchars($records['id']); ?>" class="rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white p-2">Approve</a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['withdrawal_date']) ?>
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