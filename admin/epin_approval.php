<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }

    $num=1;    

    $sql = "SELECT * FROM epin ORDER BY id DESC";
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
    <div class="container mx-auto lg:px-32 lg:pl-72 px-2 pt-12">
        <div class="flex flex-col">
            <h2 class="text-xl font-semibold text-gray-700 mb-6">E-PIN Approval</h2>
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
                                        Package Amount
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Transcation img
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
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        E-Pin
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
                                            <?php echo htmlspecialchars($records['pack_amount']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 whitespace-nowrap">
                                                <div class="">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                        <img class="w-16" src="./transcation_images/<?php echo htmlspecialchars($records['transcation_img']); ?>" alt="">
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['status']); ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php if($records['status'] == 'Approved'): ?>
                                                    <i class="fa-solid fa-check"></i>
                                                    <!-- <p>Completed</p> -->
                                                <?php else: ?>
                                                    <a href="./epin_approve.php?id=<?php echo htmlspecialchars($records['id']); ?>&user_id=<?php echo htmlspecialchars($records['user_id']) ?>" class="rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white p-2">Approve</a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['created_at']) ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php $records['e_pin'] != null ? print $records['e_pin'] : print 'nil'; ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                                                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                    <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                        <button type="button" class="btn-close box-content w-6 h-6 p-1 text-gray-800 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark text-xl"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body relative p-4">
                                                        <img class="w-full" src="./transcation_images/<?php echo htmlspecialchars($records['transcation_img']); ?>" alt="">
                                                    </div>
                                                    <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                        <!-- <button type="button"
                                                        class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                        </button> -->
                                                        <a href="./transcation_images/<?php echo htmlspecialchars($records['transcation_img']); ?>" download="transaction-image">
                                                            <button type="button"
                                                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                            Download Image
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    

                                    <!-- <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
                                            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                                                Modal title
                                                </h5>
                                                <button type="button"
                                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body relative p-4">
                                                <p>This is some placeholder content to show a vertically centered modal. We've added some extra copy here to show how vertically centering the modal works when combined with scrollable modals. We also use some repeated line breaks to quickly extend the height of the content, thereby triggering the scrolling. When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.</p>
                                            <br><br><br><br><br><br><br><br><br><br>
                                            <p>Just like that.</p>
                                            </div>
                                            <div
                                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                <button type="button"
                                                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                data-bs-dismiss="modal">
                                                Close
                                                </button>
                                                <button type="button"
                                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                Save changes
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                    </div> -->
                                <?php else: ?>
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