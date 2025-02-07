<?php 
    require_once __DIR__ . '/layout/header.php';    
?>
</head>
<body class="h-screen bg-gradient-to-r from-green-400 to-blue-500 mx-auto flex items-center">
    <div class="container md:mx-auto sm:mx-auto mx-2 md:w-1/4 sm:w-1/2">
<<<<<<< HEAD
        <form class="text-white">
=======
        <form class="text-white" method="POST">
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
            <p class="mb-4 text-white">Please login to your account</p>

            <!--Username input-->
            <div class="relative mb-4 flex flex-col">
                <label
                for="exampleFormControlInput1"
                class=""
                >Username
                </label>
                <input
                type="text"
                class="placeholder:text-white placeholder:text-opacity-70 bg-transparent border-2 border-white-500 border-opacity-70 rounded px-1 focus:border-pink-800"
<<<<<<< HEAD
=======
                name="username"
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
                id="exampleFormControlInput1"
                placeholder="Username" />
            </div>
    
            <!--Password input-->
            <div class="relative mb-4 flex flex-col">
                <label
                for="exampleFormControlInput11"
                class=""
                >Password
                </label>
                <input
                type="password"
                class="placeholder:text-white placeholder:text-opacity-70 bg-transparent border-2 border-white-500 border-opacity-70 rounded px-1 focus:border-pink-800"
<<<<<<< HEAD
=======
                name="password"
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
                id="exampleFormControlInput11"
                placeholder="Password" />
            </div>

            <div>
                <label class="inline-flex items-center mb-5 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all peer-checked:bg-orange-600"></div>
                    <span class="ms-3 text-sm font-medium text-white text-opacity-70">Remember me</span>
                </label>
            </div>
    
            <!--Submit button-->
            <div class="mb-12 pb-1 pt-1 text-center">
                <button
                class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:shadow-dark-2 focus:shadow-dark-2 focus:outline-none focus:ring-0 active:shadow-dark-2 dark:shadow-black/30"
<<<<<<< HEAD
                type="button"
=======
                type="submit"
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
                data-twe-ripple-init
                data-twe-ripple-color="light"
                style="
                    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
                ">
                Log in
                </button>
    
                <!--Forgot password link-->
                <a href="#!" class="text-white cursor-pointer">Forgot password?</a>
            </div>
    
            <!--Register button-->
            <div class="flex items-center justify-between pb-6">
                <p class="mb-0 me-2 text-white cursor-pointer">Don't have an account?</p>
                <button
                type="button"
                class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:bg-pink-800 hover:bg-danger-50/50 hover:text-danger-600 focus:bg-danger-600 focus:bg-danger-50/50 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700"
                data-twe-ripple-init
                data-twe-ripple-color="light">
                Register
                </button>
            </div>
        </form>
    </div>
<?php 
    require_once __DIR__ . '/layout/footer.php';    
?>