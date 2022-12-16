<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }


    $num=1;    

    $sql = "SELECT * FROM roi ORDER BY id DESC";
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
    <div class="container mx-auto lg:pr-10 lg:px-72 px-2 pt-12">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">ROI history</h2>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:pr-64">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white text-center">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Sl no
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Roi (%)
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
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
                                                <?php echo htmlspecialchars($records['current_roi']) ?> %
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