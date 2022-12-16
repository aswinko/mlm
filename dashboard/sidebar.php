<?php
    $active_path = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") +  1);
?>

<span class="absolute right-2 lg:hidden text-gray-800 shadow-xl text-4xl top-5 cursor-pointer" onclick="Openbar()">
   <i class="bi bi-filter-left px-2 bg-white rounded-md"></i>
</span>
<div class="sidebar z-50 fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 p-2 w-[250px] overflow-y-auto text-center bg-white shadow h-screen">
   <div class="text-gray-700 text-xl">
      <div class="p-2.5 mt-1 flex items-center rounded-md">
         <img src="../assets/icons/bekartlogo.svg" alt="logo" class="px-2 py-1 rounded-md w-14">
         <h1 class="text-[18px] ml-3 text-xl text-purple-700 font-bold">BEKART</h1>
         <!-- <i class="bi bi-x bg-slate-200 ml-16 text-4xl font-bold cursor-pointer lg:hidden" onclick="Openbar()"></i> -->
      </div>
      <hr class="my-2 text-gray-600">
      <div>

         <a href="./index.php">
            <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer overflow-hidden text-ellipsis whitespace-nowrap rounded-lg hover:text-purple-700 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "index.php" ? 'text-blue-600 bg-purple-100' : '' ?>">
               <!-- <i class="bi bi-house-door-fill"></i> -->
               <img class="w-6" src="../assets/icons/home.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
               <span class="text-[15px] ml-4 text-purple-700 hover:text-purple-900">Dashboard</span>
            </div>
         </a>

         <!-- e-pin dropdown -->
         <div class="relative pt-1" id="sidenavSecEx2">
            <a class="flex items-center text-sm py-4 px-4 h-12 overflow-hidden text-purple-700 text-ellipsis whitespace-nowrap rounded-lg hover:text-purple-900 hover:bg-purple-100 transition duration-300 ease-in-out cursor-pointer <?= $active_path == "e-pin-generate.php" || $active_path == "epin-history.php" ? 'text-purple-700 bg-purple-100' : '' ?>" data-bs-toggle="collapse" data-bs-target="#collapseSidenavSecEx2" aria-expanded="false" aria-controls="collapseSidenavSecEx2">
               <!-- <i class="bi bi-house-door-fill text-xl pr-4"></i> -->
               <!-- <i class="bi bi-key-fill text-xl pr-4"></i> -->
               <img class="w-6" src="../assets/icons/key.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
               <span class="ml-4">E-Pin</span>
               <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
               </svg>
            </a>
            <div class="relative accordion-collapse collapse pt-1" id="collapseSidenavSecEx2" aria-labelledby="sidenavSecEx2" data-bs-parent="#sidenavSecExample">
               <span class="relative">
                  <a href="./e-pin-generate.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-purple-700 text-ellipsis whitespace-nowrap rounded-xl hover:text-purple-700 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "e-pin-generate.php" ? 'text-purple-700 bg-purple-50' : '' ?>">Generate E-Pin</a>
               </span>
               <span class="relative">
                  <a href="./epin-history.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-purple-700 text-ellipsis whitespace-nowrap rounded-xl hover:text-purple-700 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "epin-history.php" ? 'text-purple-700 bg-purple-50' : '' ?>">E-Pin history</a>
               </span>
            </div>
         </div>

         <!-- withdraw dropdown -->
         <div class="relative pt-1" id="sidenavSecEx3">
            <a class="flex items-center p-2.5 text-sm py-4 px-4 h-12 overflow-hidden text-purple-700 text-ellipsis whitespace-nowrap rounded-lg hover:text-purple-800 hover:bg-purple-100 transition duration-300 ease-in-out cursor-pointer <?= $active_path == "withdraw_amount.php" || $active_path == "withdrawal_history.php" ? 'text-purple-700 bg-purple-100' : '' ?>" data-bs-toggle="collapse" data-bs-target="#collapseSidenavSecEx3" aria-expanded="false" aria-controls="collapseSidenavSecEx3">
               <!-- <i class="bi bi-house-door-fill text-xl pr-4"></i> -->
               <!-- <i class="bi bi-piggy-bank-fill text-xl pr-4"></i> -->
               <img class="w-6" src="../assets/icons/sack-dollar.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
               <span class="ml-4">Withdrawal</span>
               <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
               </svg>
            </a>
            <div class="relative accordion-collapse collapse pt-1" id="collapseSidenavSecEx3" aria-labelledby="sidenavSecEx3" data-bs-parent="#sidenavSecExample">
               <span class="relative">
                  <a href="./withdraw_amount.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-purple-700 text-ellipsis whitespace-nowrap rounded-xl hover:text-purple-800 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "withdraw_amount.php" ? 'text-purple-700 bg-purple-50' : '' ?>">Withdraw Amount</a>
               </span>
               <span class="relative">
                  <a href="./withdrawal_history.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-purple-700 text-ellipsis whitespace-nowrap rounded-xl hover:text-purple-800 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "withdrawal_history.php" ? 'text-purple-700 bg-purple-50' : '' ?>">Withdraw History</a>
               </span>
            </div>
         </div>

         <hr class="my-4 text-gray-600">

         <a href="./kyc.php">
            <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer overflow-hidden text-ellipsis whitespace-nowrap rounded-lg hover:text-purple-800 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "kyc.php" ? 'text-purple-800 bg-purple-100' : '' ?>">
               <!-- <i class="bi bi-tools"></i> -->
               <img class="w-6" src="../assets/icons/money-check-edit.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
               <span class="text-[15px] ml-4 text-purple-700">KYC</span>
            </div>
         </a>

         <a href="./referal_link.php">
            <div class="p-2.5 mt-2 flex items-center px-4 rounded-lg cursor-pointer overflow-hidden text-ellipsis whitespace-nowrap hover:text-purple-800 hover:bg-purple-100 transition duration-300 ease-in-out <?= $active_path == "referal_link.php" ? 'text-purple-800 bg-purple-100' : '' ?>">
               <!-- <i class="bi bi-share-fill"></i> -->
               <img class="w-6" src="../assets/icons/share.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
               <span class="text-[15px] ml-4 text-purple-700">Referal Link</span>
            </div>
         </a>

         <hr class="my-4 text-gray-600">

         <a href="../logout.php" class="">
            <div class="p-2.5 mt-3 flex items-center px-4 duration-300 cursor-pointer rounded-lg hover:bg-purple-300 bg-purple-200">
               <img class="w-6" src="../assets/icons/exit.svg" alt="" style="filter: invert(27%) sepia(100%) saturate(3839%) hue-rotate(262deg) brightness(93%) contrast(97%);">
               <span class="text-[15px] ml-4 text-purple-800">Logout</span>
            </div>
         </a>

      </div>
   </div>
</div>