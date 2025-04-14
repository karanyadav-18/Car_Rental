<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

include("header.php");

session_start();

if (empty($_SESSION['name'])) {
    header('location:../agent-register.php?message=Please Sign In To Enter In Your Dashboard');
}
?>

<div class="card mt-1">
    <div class="card-header bg-dark">
        <div class="row">
            <div class="col-lg-9 col-sm-6">
                <h3 class="text-white h-font">Dashboard</h3>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card no-gutters">
                <div class="text-center mt-3">
                    <h4>Add More Cars</h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="bg-success text-white text-center p-2 icon">
                            <i class="bi bi-car-front-fill" style="font-size:50px"></i>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-center p-2 icon">
                            <h1>
                                <?php
                                $id = $_SESSION['id'];
                                $sql = "SELECT * FROM cars WHERE agent_id = $id";
                                $query = $conn->query($sql);
                                echo "$query->num_rows" . " Cars";
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
