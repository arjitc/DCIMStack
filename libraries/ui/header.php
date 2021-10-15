<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if ($pageTitle) {
            echo "<title>dcimstack - $pageTitle</title>";
        } else {
            echo "<title>dcimstack</title>";
        }
        ?>
        
        <!-- Bootstrap core CSS -->
        <?php
        include realpath(dirname(__FILE__)).'/../css.php';
        ?>

    </head>
    <body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-box-seam"></i> dcimstack</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-card-list"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="datacenters.php"><i class="bi bi-building"></i> Datacenters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="rackspaces.php"><i class="bi bi-hdd-rack"></i> Rackspace</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle dropstart" href="#" id="dropdown01" data-bs-toggle="dropdown"><i class="bi bi-hdd"></i> Devices</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li class="dropdown-header">Server</li>
                        <li><a class="dropdown-item" href="server.php"><i class="bi bi-hdd-rack"></i> Servers</a></li>
                        <li class="dropdown-header">Storage</li>
                        <li><a class="dropdown-item" href="storage.php"><i class="bi bi-hdd"></i> Storage</a></li>
                        <li><a class="dropdown-item" href="raid.php"><i class="bi bi-dice-6"></i> RAID Cards</a></li>
                        <li class="dropdown-header">Power</li>
                        <li><a class="dropdown-item" href="pdu.php"><i class="bi bi-outlet"></i> PDUs</a></li>
                        <li><a class="dropdown-item" href="psu.php"><i class="bi bi-plug"></i> PSUs</a></li>
                        <li class="dropdown-header">Network</li>
                        <li><a class="dropdown-item" href="network.php"><i class="bi bi-diagram-2"></i> Network Routers</a></li>
                        <li><a class="dropdown-item" href="network.php"><i class="bi bi-diagram-3"></i> Network Switches</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropstart" href="#" id="dropdown01" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['user_name']; ?></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li class="dropdown-header">Account</li>
                        <li><a class="dropdown-item" href="account_settings.php"><i class="bi bi-gear"></i> Account Settings</a></li>
                        <li><a class="dropdown-item" href="authlog.php"><i class="bi bi-shield-lock"></i> Authentication Log</a></li>
                        <li class="dropdown-header">Logout</li>
                        <li><a class="dropdown-item" href="index.php?logout"><i class="bi bi-door-open"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active mx-3" href="index.php" tabindex="-1" aria-disabled="true"><i class="bi bi-sliders"></i></a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <!-- Start the container here, end it in footer.php -->
    <div class="container-fluid">