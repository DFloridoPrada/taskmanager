<?php
    use davidflorido\Lib\SessionManager;
    require_once __DIR__ . '/layout/header.php';    
?>
</head>
<body class="h-full w-full bg-gradient-to-r from-green-400 to-blue-500 mx-auto flex flex-col justify-center">
    <header class="w-full">
        <nav style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);" class="opacity-80">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">TaskMaster</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse text-white">
                    Welcome &nbsp; <?= SessionManager::getSessionVar('username');?> &nbsp; &nbsp; &nbsp;
                    <a href="logout" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Logout</a>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="home" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="tasks" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Tasks</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Contact</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="w-full h-full"> 

        <!-- Contenedor de las tareas -->
        <div id="tasks" class="
            w-2/3
            h-auto
            border-4
            border-white
            mx-auto
            mt-[3%]
            rounded-xl
            px-5
            py-5
            shadow-xl
            flex
            flex-col
            gap-5
        ">
            <?php 
                // Imprimir las tareas
                if($htmlTasks) {
                    echo $htmlTasks;
                }
                else {
                    echo "
                        <p class='text-center text-white'>No tiene ninguna tarea</p>
                    ";
                }
            ?>
        </div>

        </div>
        <!-- Boton para añadir más tareas -->
        <div id="añadir" class="
            fixed
            bottom-[50px]
            right-[50px]
        ">
            <a href="#" id="btnAñadirTarea">
                <i class="
                    fa-solid 
                    fa-pen-to-square 
                    text-7xl 
                    text-white 
                    cursor-pointer
                    hover:text-orange-400
                    ">
                </i>
            </a>
        </div>
        <!-- Ejemplo ventana emergente -->
        <div style="background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(10px);" id="modal" class="
                text-white 
                hidden 
                fixed 
                xl:right-[50px] 
                xl:top-[26rem] 
                top-[15rem] 
                right-[50px] 
                w-[50%] 
                xl:h-[50%] 
                h-[60%] 
                p-4 
                shadow-2xl 
                rounded-lg
            ">
            <!-- Formulario para crear o editar una tarea -->
            <form action="tasks/create" method="post" class="text-white w-full flex flex-col gap-1">
                <p>
                    <label for="title" class="font-bold pl-1">Título de la tarea</label><br>
                    <input type="text" name="title" id="title" placeholder="título de la tarea" class="bg-transparent placeholder:text-gray-300 border-4 rounded border-black w-full py-2 px-2">
                </p>
                <p>
                    <label for="description" class="font-bold pl-1">Descripción de la tarea</label><br>
                    <textarea name="description" id="description" rows="5" cols="30" class="bg-transparent border-4 rounded border-black w-full text-white py-2 px-2"></textarea>   
                </p>
                <p>
                    <label for="state" class="font-bold pl-1">Estado de la tarea</label><br>
                    <select name="state" id="state" class="bg-transparent placeholder:text-gray-300 border-4 rounded border-black w-full py-2 px-2">
                        <option value="pendiente">Pendiente</option>
                        <option value="en_progreso">En progreso</option>
                        <option value="completada">Completada</option>
                        <option value="archivada">Archivada</option>
                    </select>
                </p>
                <p>
                    <label for="completionDate" class="font-bold pl-1">Fecha de finalización</label><br>
                    <input type="date" name="completionDate" id="completionDate" class="bg-transparent border-4 rounded border-black w-full py-2 px-2">   
                </p>
                <div class="flex justify-center h-full">
                    <button type="submit" class="bg-transparent text-white py-1 px-3 rounded">Añadir</button>
                    <button type="button" id="btnCerrarModal" class="bg-transparent text-white py-1 px-3 rounded">Cerrar</button>
                </div>
            </form>
        </div>
    </main>
    <script>
        let btnAñadirTarea = document.querySelector('#btnAñadirTarea');
        let btnCerrarModal = document.querySelector('#btnCerrarModal');
        let modal = document.querySelector('#modal');

        btnAñadirTarea.addEventListener('click', (e) => {
            modal.classList.remove('hidden');
        });

        btnCerrarModal.addEventListener('click', (e) => {
            if(!btnCerrarModal.classList.contains('hidden')) {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
<?php 
    require_once __DIR__ . '/layout/footer.php';    
?>