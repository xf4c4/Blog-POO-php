
<!-- Importamos utilidades comunes -->
<?php require_once __DIR__ . "/../import_index/importsCommons.php"; ?>

<!-- Importamos el header -->
<?php require_once __DIR__ . "./templates/header.php"; ?> 

<!-- Importamos la navbar -->
<?php require_once __DIR__ . "./templates/navbar.php"; ?> 
    
<?php
    // Creamos una variable para que no muestre el carousel en caso de no tener favoritos
    $activeCarousel = false;

    //Obtenemos un array con los id de todos los que estan marcados como favoritos
    $articulosDestacados = $rep->findAllDestacados();
?>

<!-- Si no está establecido el usuario me redireccion al login -->
<?php if (!isset($_SESSION["user"])) header("Location: ../")?>

<!-- Logica para el carousel, si hay 1 o mas artículos muestra el carousel sino no -->
<?php if(sizeof($articulosDestacados) >= 1): ?>

    <div id="layout-carousel" style="width: 100%; ">
        <div id="carouselExample" class="carousel slide bg-dark">
            <br>
            <h1 class="text-center" style="color: white;">Articulos Favoritos</h1>
            <br>
            <div class="carousel-inner">
                <!-- Este bucle se encargará de recorrer, buscar datos y imprimir cada articulo favorito guardado en la base de datos -->
                <?php foreach ($articulosDestacados as $articulo): ?>
                    <!-- Buscamos por el metodo 'findById' para obtener los articulos por id -->
                    <?php $art = $rep->findById($articulo); ?>
                    <!-- La primera preview que imprima va a ser la que se muestra en el carousel de primeras -->
                    <a href="details.php?id=<?= $art->getId() ?>">
                        <div class="<?= $activeCarousel == false ? 'carousel-item active' : 'carousel-item'; ?>">
                            <p class="text-center fs-2" style="color: white;"><?= $art->getTitulo() ?></p>
                            <p class="text-center fs-4" style="color: white;"><?= $art->getContenido() ?></p>
                        </div>
                    </a>
                    <!-- Una vez que imprima la primera preview y cambia la variable a 'true' los siguientes items van a ir detras del primero -->
                    <?php if($activeCarousel == false) $activeCarousel = true;  ?>
            
                <?php endforeach ?>
            </div>
            <br>

            <!-- Si es hay más de un articulo que muestre el sistema de control de botones del carousel sino no-->
            <?php if(sizeof($articulosDestacados) > 1): ?>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            <?php endif ?>

        </div>
    </div>

<?php endif ?>

<!-- Body donde se van a mostrar las card de los articulos  -->
<div class='container'>
    <div class='row gap-4 justify-content-center mt-4'>
        <?php 
            // Accedemos al metodo findAll de la clase RepositorioArticulos para obtener todos los articulos de la base de datos
            $articulos=$rep->findAll();

            // Este bucle imprimirá tantas tarjetas como articulos encuentre en la base de datos
            foreach($articulos as $a){
                echo $a->mostrarCard();
            }
        ?>
    </div>
</div>
    
<!-- Importamos el footer -->
<?php require_once __DIR__ . "./templates/footer.php"; ?>
