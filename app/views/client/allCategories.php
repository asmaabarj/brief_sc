<?php
require_once(__DIR__ . "/../../controllers/ContCategory.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki™</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<header class=' py-2 px-2 sm:px-10  min-h-[70px]'>
    <div class='flex justify-between items-center gap-x-4  '>
      <a href="index.php"><img src="../../../public/images/wikilogo.png" alt="logo" class='w-20 h-12' />
      </a>  
      <div class=" flex justify-between gap-4">
        <ul class='lg:!flex lg:flex-auto '> 
          <li class=' lg:items-center ml-auto '>
            <a href='' class='lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px]'>sign in</a>
          </li>
        </ul>
      <div class="border-l border-[#333] h-6 max-lg:hidden "></div>   
        <a href='' class='flex items-center ml-auto lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px] mr-6 '>sign up</a>
   </div>
  </header>
  <div class="bg-white font-[sans-serif] p-4">
      <div class="max-w-6xl max-md:max-w-lg mx-auto">
        <div>
          <h2 class="text-3xl font-extrabold text-[#333] inline-block">Categories</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
        <?php
          foreach ($resultCat as $CATEGORIE) :
          ?>
        
          <div class="flex max-lg:flex-col bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] hover:scale-105 transition-all duration-300">
            <img src="<?= $CATEGORIE->__get('category_image'); ?>" alt="Blog Post 1" class="lg:w-2/5 min-h-[250px] h-full object-cover" />
            <div class="p-6 lg:w-3/5">
              <h3 class="text-xl font-bold text-[#333]"><?= $CATEGORIE->__get('category_name'); ?></h3>
              <p class="text-sm mt-4"><?= $CATEGORIE->__get('category_desc'); ?></p>
              <a href="javascript:void(0);" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
            </div>
          </div>
          <?php
          endforeach;
          ?> 

        </div>
      </div>
    </div>
</body>
</html>