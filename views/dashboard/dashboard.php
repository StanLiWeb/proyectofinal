<?php
session_start(); // Inicia la sesión para poder acceder a las variables de sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: ../auth/login/login.php'); // Redirige al login si no hay sesión activa
    exit();
}
$username = $_SESSION['usuario']; // Obtén el nombre de usuario de la sesión
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="font-sans">
<div class="bg-gray-300 flex">
    <!-- Barra lateral Izquierda -->
    <nav class="bg-gray-600 text-white p-4 shadow-md w-1/5">
      <h3 class="text-xl font-bold text-center mb-6">Admin Panel</h3>
      <a href="#" class="block p-2 rounded-md hover:bg-sky-700"><i class="fas fa-tachometer-alt pr-2"></i>Dashboard</a>
      <a href="usuarios.html" class="block p-2 rounded-md hover:bg-sky-700"><i class="fa-solid fa-users pr-2"></i>Usuarios</a>
      <a href="reportes.html" class="block p-2 rounded-md hover:bg-sky-700"><i
          class="fa-solid fa-arrow-trend-up pr-2"></i>Reportes</a>
      <a href="configuracion.html" class="block p-2 rounded-md hover:bg-sky-700"><i class="fa-solid fa-gear pr-2"></i>Configuración</a>
      <a href="../auth//login/logout.php" class="block p-2 rounded-md hover:bg-sky-700"><i class="fa-solid fa-right-from-bracket pr-2"></i>Cerrar Sesión</a>

    </nav>

    <!-- Contenido principal de dashboard -->
    <div class="p-4 w-full">
      <header class="place-content-between flex mb-4 bg-gray-500 text-white p-4 border-solid border-2 border-gray-300 rounded-md">
        <div class="">
          <!-- Mostrar nombre de usuario -->
        <h4 class="text-2xl">Bienvenido, <?php echo htmlspecialchars($username); ?></h4> 
          <p class="text-white">Ultima sesión: 18 de septiembre, 2024</p>
        </div>
        <div class="p-3"><i class="fa-solid fa-user fa-2x cursor-pointer"></i></div>
      </header>
      <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="bg-blue-500 text-white p-4 border-solid border-2 border-gray-300 rounded-md">
          <strong>Usuarios Activos</strong> <br>
          <span>150</span>
        </div>
        <div class="bg-green-600 text-white p-4 border-solid border-2 border-gray-300 rounded-md">
          <strong>Nuevas Ventas</strong> <br>
          <span>150</span>
        </div>
        <div class="bg-yellow-400 text-white p-4 border-solid border-2 border-gray-300 rounded-md">
          <strong>Tareas Pendientes</strong> <br>
          <span>150</span>
        </div>
      </div>

      <div class="bg-gray-500 text-white border-solid border-2 border-gray-300 rounded-md mb-4">
        <h3 class="bg-gray-600 text-white border-b-2 font-bold rounded-t-md p-2">Línea de Tiempo</h3>
        <ul class="list-disc pl-5 m-3">
          <li>18/09/2024: Inicio de sesión del usuario Juan Perez</li>
          <li>18/09/2024: Inicio de sesión del usuario Juan Perez</li>
          <li>18/09/2024: Inicio de sesión del usuario Juan Perez</li>
        </ul>
      </div>

      <div class="bg-gray-500 text-white border-solid border-2 border-gray-300 mb-4 rounded-md">
        <h3 class="bg-gray-600 text-white border-b-2 font-bold rounded-t-md p-2 ">Formulario de Contacto</h3>
        <div class="p-4">
          <label for="nombre" class="block mt-2">Nombre</label>
          <input name="nombre" type=" text" placeholder="Tu nombre" class="bg-gray-600 placeholder:white rounded-md border p-2 w-full" />
          <label for="correo" class="block mt-2">Tu correo electrónico</label>
          <input name="correo" type=" text" placeholder="Tu correo electrónico" class="bg-gray-600 placeholder:white rounded-md border p-2 w-full" />
          <label for="mensaje" class="block mt-2">Mensaje</label>
          <textarea name="mensaje" placeholder="Tu mensaje" class="bg-gray-600 placeholder-white rounded-md border p-2 w-full"></textarea>
          <button type="submit" class="bg-blue-500 rounded-md text-white px-7 py-2 mt-2">Enviar</button>
        </div>
      </div>

      <div class="bg-gray-500 text-white border-solid border-2 border-gray-300 mb-4 rounded-md">
        <h3 class="bg-gray-600 text-white border-b-2 font-bold rounded-t-md p-2">Ultimas transacciones</h3>
        <div class="m-4">
          <table class="w-full">
            <thead>
              <tr class="border-b border-slate-300">
                <th class="p-2">ID</th>
                <th class="p-2">Cliente</th>
                <th class="p-2">Monto</th>
                <th class="p-2">Fecha</th>
                <th class="p-2">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-slate-300">
                <td class="p-2">1</td>
                <td class="p-2">Juan Pérez</td>
                <td class="p-2">$120.00</td>
                <td class="p-2">18/09/2024</td>
                <td class="p-2">Completado</td>
              </tr>
              <tr class="border-b border-slate-300">
                <td class="p-2">2</td>
                <td class="p-2">Ana Martínez</td>
                <td class="p-2">$340.00</td>
                <td class="p-2">17/09/2024</td>
                <td class="p-2">Completado</td>
              </tr>
              <tr class="border-b border-slate-300">
                <td class="p-2">3</td>
                <td class="p-2">Carlos Ruiz</td>
                <td class="p-2">$75.00</td>
                <td class="p-2">16/09/2024</td>
                <td class="p-2">Pendiente</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="bg-gray-500 text-white border-solid border-2 border-gray-300 mb-4 rounded-md">
        <h3 class="bg-gray-600 text-white border-b-2 font-bold rounded-t-md p-2">Ultimas compras</h3>
        <div class="m-4">
          <table class="w-full">
            <tbody>
              <tr>
                <td class="border p-2">compra 1</td>
                <td class="border p-2">S/120.00</td>
                <td class="border p-2">16/09/2024</td>
              </tr>
              <tr>
                <td class="border p-2">compra 1</td>
                <td class="border p-2">S/120.00</td>
                <td class="border p-2">16/09/2024</td>
              </tr>
              <tr>
                <td class="border p-2">compra 1</td>
                <td class="border p-2">S/120.00</td>
                <td class="border p-2">16/09/2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="flex gap-x-4">
        <div class="bg-gray-500 text-white border-solid border-2 border-gray-300 mb-4 rounded-md w-1/2">
          <h3 class="bg-gray-600 text-white border-b-2 font-bold rounded-t-md p-2">Ultimas compras</h3>
          <div class="m-4">
            <table class="w-full">
              <tbody>
                <tr>
                  <td class="border p-2">compra 1</td>
                  <td class="border p-2">S/120.00</td>
                  <td class="border p-2">16/09/2024</td>
                </tr>
                <tr>
                  <td class="border p-2">compra 1</td>
                  <td class="border p-2">S/120.00</td>
                  <td class="border p-2">16/09/2024</td>
                </tr>
                <tr>
                  <td class="border p-2">compra 1</td>
                  <td class="border p-2">S/120.00</td>
                  <td class="border p-2">16/09/2024</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="bg-gray-500 text-white border-solid border-2 border-gray-300 mb-4 rounded-md w-1/2">
          <h3 class="bg-gray-600 text-white border-b-2 font-bold rounded-t-md p-2">Ultimos usuarios logeados</h3>
          <div class="m-4">
            <table class="w-full">
              <tbody>
                <tr class="border-b border-slate-300">
                  <td class="p-2">Usuario:</td>
                  <td class="p-2">Juna Perez</td>
                  <td class="p-2">16/09/2024</td>
                </tr>
                <tr class="border-b border-slate-300">
                  <td class="p-2">Usuario</td>
                  <td class="p-2">Ana Martinez</td>
                  <td class="p-2">16/09/2024</td>
                </tr>
                <tr class="border-b border-slate-300">
                  <td class="p-2">Usuario</td>
                  <td class="p-2">Laura Gomez</td>
                  <td class="p-2">16/09/2024</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <footer class="bg-gray-800 text-white text-center py-4">
    @2024 Admin Panel. Todos los derechos reservados
  </footer>

</body>

</html>