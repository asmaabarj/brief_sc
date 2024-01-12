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

  