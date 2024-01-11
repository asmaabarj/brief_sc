<?php
require_once(__DIR__."/../../controllers/ConWiki.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/style.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Wiki™</title>
</head>
<body class="text-gray-800 font-inter">
    
    <div class="fixed left-0 top-0 w-64 h-full bg-gray-100 p-4 z-50 sidebar-menu transition-transform">
        <a href="dashboard.php" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="../../../public/images/wikilogo.png" alt="" class="w-16 h-12 rounded ">
        </a>
        <ul class="space-y-2 font-medium">
            <li>
               <a href="dashboard.php" class=" mt-10 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                     <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                  </svg>
                  <span class="ms-3 ">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="manageCategory.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                     <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Manage Categories</span>
               </a>
            </li>
            <li>
               <a href="manageTag.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Manage Tags</span>
               </a>
            </li>
            <li>
               <a href="manageWikies.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                     <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Manage Wikis</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class=" w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
               </a>
            </li>
           
         </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-black flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Administration</a>
                </li>
                <li class="text-gray-300 mr-2 font-medium">/</li>
                <li class="text-white mr-2 font-medium">Manage Wikis</li>
            </ul>
            
        </div>
        
        


   
   <div class="overflow-x-auto py-8">
  <table class="min-w-[80%] mx-auto mt-10 bg-white font-[sans-serif]">
    <thead class="whitespace-nowrap">
    <h1 class="text-gray-800 font-semibold ml-28 mt-10"> Wikis Table :</h1>

      <tr>
        <th class="px-6 py-4 text-left text-sm font-semibold text-black">
          Wiki Title
        </th>
        
        <th class="px-6 py-4 text-left text-sm font-semibold text-black">
          description
        </th>
       
        <th class="px-6 py-4 text-left text-sm font-semibold text-black">
          Action
        </th>
      </tr>
    </thead>
    <tbody class="whitespace-nowrap">
    <?php
          foreach ($archiver as $archive) :
          ?>
      <tr class="odd:bg-blue-50">
        <td class="px-6 py-3 text-sm">
          <div class="flex items-center cursor-pointer">
            <img src='<?= $archive->__get('wiki_image'); ?>' class="w-9 h-9 rounded-md shrink-0" />
            <div class="ml-4">
              <p class="text-sm text-black"><?= $archive->__get('wiki_title'); ?> </p>
            </div>
          </div>
        </td>
        
        <td class="px-6 py-3 text-sm w-[30vw]"><?= $archive->__get('wiki_summarize'); ?>
        </td>
        
        <td class="px-6 py-3">
          <form action="" method="post">
          <button type="submit" name="archive" class="mr-4 font-bold hover:text-red-300" >
            Archived
          </button>   
          </form>
        </td>
      </tr>
      <?php
          endforeach;
          ?>
    </tbody>
  </table>
   </div>


<div class="overflow-x-auto py-8">
  <table class="min-w-[80%] mx-auto mt-8 bg-white font-[sans-serif]">
    <thead class="whitespace-nowrap">
   <h1 class="text-gray-800 font-semibold ml-28 mt-10"> Archived Wikis Table :</h1>
      <tr>
      

        <th class="px-6 py-4 text-left text-sm font-semibold text-black">
          Wiki Title
        </th>
        
        <th class="px-6 py-4 text-left text-sm font-semibold text-black">
          description
        </th>
       
        <th class="px-6 py-4 text-left text-sm font-semibold text-black">
          Action
        </th>
      </tr>
    </thead>
    <tbody class="whitespace-nowrap">
    <?php
          foreach ($disarchiver as $disarchive) :
          ?>
      <tr class="odd:bg-blue-50">
        <td class="px-6 py-3 text-sm">
          <div class="flex items-center cursor-pointer">
            <img src='<?= $disarchive->__get('wiki_image'); ?>' class="w-9 h-9 rounded-md shrink-0" />
            <div class="ml-4">
              <p class="text-sm text-black"><?= $disarchive->__get('wiki_title'); ?></p>
            </div>
          </div>
        </td>
        
        <td class="px-6 py-3 text-sm w-[30vw]"><?= $disarchive->__get('wiki_summarize'); ?>
        </td>
        
        <td class="px-6 py-3">
        <form action="" method="post">
          <button type="submit" name="unarchive" class="mr-4 font-bold text-gray-500 hover:text-green-300" >
            Disarchived
          </button>
        </form>
        </td>
      </tr>
      <?php
          endforeach;
          ?>
    </tbody>
  </table>
 
</div>
</div> 
</div>
</div>

</body>
</html>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../../public/Js/script.js"></script>
</body>
</html>