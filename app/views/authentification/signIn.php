<?php
session_start();
unset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <div class="font-[sans-serif] text-[#333]">
        <div class="grid lg:grid-cols-2 gap-4 bg-gradient-to-r from-black to-gray-700 sm:p-8 p-4 h-[420px]">
            <div>
                <a href=""><img src="../../../public/images/logologo.png" alt="logo" class='w-40' />
                </a>
                <div class="max-w-lg mt-16 px-6 max-lg:hidden">
                    <h3 class="text-3xl font-bold text-white">Sign in</h3>
                    <p class="text-sm mt-4 text-white">Embark on a seamless journey as you sign in to your account. Unlock a realm of opportunities and possibilities that await you.</p>
                </div>
            </div >
            <div class="bg-white md:mt-16 my-4 rounded-xl sm:px-6 px-4 py-8 max-w-md w-full h-max shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] max-lg:mx-auto">
            <form action="../../controllers/ConUser.php" method="post" type="submit" class="max-w-4xl mx-auto bg-white shadow-[0_2px_18px_-3px_rgba(6,81,237,0.4)] sm:p-8 p-4 rounded-md">
                    <div class="mb-10">
                        <h3 class="text-3xl font-extrabold">Sign in</h3>
                    </div>

                    <div>
                        <label class="text-sm mb-2 block">Email</label>
                        <div class="relative flex items-center">
                            <input id="emailLogin" name="email" type="email" required class="w-full text-sm border  px-4 py-3 border border-solid rounded-md outline-none
                            " placeholder="Enter Email" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" required class="w-full text-sm border  px-4 py-3 border border-solid rounded-md outline-none" placeholder="Enter password" />
                            
                        </div>
                    </div>

                    <div class="mt-10">
                        <button name="login" type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-black hover:bg-gray-700 focus:outline-none">
                            Log in
                        </button>
                    </div>
                    <p class="text-sm mt-6 text-center">Don't have an account ?<a href="signUp.php" class="text-gray-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register here</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="../../../public/Js/regexSignIn.js"></script>

</body>

</html>