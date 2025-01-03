📋 Aplicación CRUD de Productos

Este proyecto es una aplicación de gestión de productos desarrollada con Symfony, un potente framework PHP. Los usuarios pueden crear, leer, actualizar y eliminar productos de manera eficiente, todo desde una interfaz web moderna y amigable. ¡Gestión de productos simplificada al alcance de tu mano!

✨ Funcionalidades:

➕ Agregar Productos: Los usuarios pueden añadir nuevos productos mediante un formulario interactivo.

✏️ Editar Productos: Permite modificar los detalles de un producto existente.

✔️ Ver Productos: Muestra una lista de todos los productos disponibles con detalles como nombre, descripción y tamaño.

❌ Eliminar Productos: Cada producto tiene una opción para ser eliminado de la lista.

⚙️ Funciones Principales

nuevoProducto() ➕ Añade un nuevo producto a la base de datos y actualiza la lista de productos.
editarProducto() ✏️ Permite editar los detalles de un producto existente.
verProducto() ✔️ Muestra la información detallada de un producto seleccionado.
eliminarProducto() ❌ Elimina un producto de la base de datos y actualiza la lista.

📄 Instrucciones de Uso

Clona el repositorio o descarga el código.
Configura tu base de datos en el archivo .env.
Ejecuta las migraciones para crear las tablas necesarias.
Inicia el servidor de Symfony y accede a la aplicación en tu navegador.
Usa el formulario para agregar nuevos productos, editar o eliminar productos existentes.

📂 Estructura de Archivos

src/Controller/ProductoController.php 📄: Controlador que maneja la lógica de los productos.
src/Form/ProductoType.php 🎨: Definición del formulario para agregar y editar productos.
templates/producto/index.html.twig 🚀: Vista principal que muestra la lista de productos.
templates/producto/nuevo.html.twig 📄: Vista para agregar nuevos productos.
templates/producto/unProducto.html.twig 📄: Vista para mostrar los detalles de un producto específico.

💻 Tecnologías

PHP 🧱
Symfony 🎨
MySQL 📜

🚀 Mejoras Futuras 💬 Agregar autenticación: Implementar un sistema de usuarios para gestionar el acceso a la aplicación.

🎨 Mejorar diseño visual: Añadir estilos y animaciones para una experiencia de usuario más atractiva.

🤖 Funcionalidad de búsqueda avanzada: Permitir a los usuarios buscar productos utilizando múltiples criterios.

🙌 Créditos Desarrollado por Lernik Gasparyan, Aiub Raissuni y Miguel Angel.