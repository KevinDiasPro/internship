<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
        </li>
        <?php
        if (isset($_SESSION['authentificated'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php
        }
        ?>

      </ul>
    </div>
  </div>
</nav>