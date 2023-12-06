<header class="sticky-top text-bg-dark">
    <nav class="navbar navbar-expand-lg border-bottom navbar-dark" aria-label="Twelfth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/blog-objetos/views">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blog-objetos/crud/">CRUD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blog-objetos/login/logout.php">Logout</a>
            </li>
        </ul>
        <?php if (isset($_SESSION["user"])): ?>
          <div class="mx-5">
            User:
            <b><?= $_SESSION["user"]["name"] ?></b>
          </div>
        <?php endif ?>
        </div>
    </div>
    </nav>        
</header>