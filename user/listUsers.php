<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php'); ?>
    <script src="table.js" defer></script>
    <title>list des utilisateurs</title>
</head>
<body>
<?php require_once('../__tiers/verifSession.php') ?>
<?php require_once('../__tiers/header.php') ?>
    <div class="premiere mt-5">
        <div class="container-fluid contenu">
            <main>
                <h2 class="ms-5 text-azra9">List des utilisateurs :</h2>
                <div class="row justify-content-center mt-5">    
                    <div class="col-11">
                        <div class="card mb-4">
                            <div class="card-header header-table ">
                                <i class="fas fa-table me-1"></i>
                                User table
                                <input class="form-control w-25 float-end input-table" type="text" id="searchInput" placeholder="Search...">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="mytable">
                                        <thead>
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <label for="rowsPerPageSelect" class="me-2">Rows per page:</label>
                                        <select class="form-select" id="rowsPerPageSelect">
                                            <option value="10" selected>10</option>
                                            <option value="5">5</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center text-azra9">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination mb-0">
                                                <li class="page-item">
                                                    <a class="page-link text-azra9" href="#" id="prevBtn" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item text-azra9">
                                                    <a class="page-link text-azra9" href="#" id="nextBtn" aria-label="Next">
                                                        <span aria-hidden="true" class="text-azra9">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <div class="mx-2 text-azra9">
                                            Page <span id="currentPage"></span> of <span id="numPages"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php require_once('../__tiers/footer.php') ?>
</body>
</html>