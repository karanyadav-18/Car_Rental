<?php
session_start();
include("../common/connect.php");

if (empty($_SESSION['name']) || empty($_SESSION['id'])) {
    header('Location: ../agent-register.php?message=Please Sign In To Access Dashboard');
    exit;
}

$agent_id = $_SESSION['id'];
$name = $_SESSION['name'];

$totalCars = $carsRented = $totalEarnings = $pendingReturns = 0;

$res1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM cars WHERE agent_id = $agent_id");
if ($res1 && $row = mysqli_fetch_assoc($res1)) $totalCars = $row['total'];

$res2 = mysqli_query($conn, "SELECT COUNT(*) as rented FROM bookings WHERE agent_id = $agent_id AND status = 'rented'");
if ($res2 && $row = mysqli_fetch_assoc($res2)) $carsRented = $row['rented'];

$res3 = mysqli_query($conn, "SELECT SUM(amount) as earnings FROM bookings WHERE agent_id = $agent_id AND status = 'returned'");
if ($res3 && $row = mysqli_fetch_assoc($res3)) $totalEarnings = $row['earnings'] ?? 0;

$res4 = mysqli_query($conn, "SELECT COUNT(*) as pending FROM bookings WHERE agent_id = $agent_id AND status = 'rented'");
if ($res4 && $row = mysqli_fetch_assoc($res4)) $pendingReturns = $row['pending'];

$carsResult = mysqli_query($conn, "SELECT * FROM cars WHERE agent_id = $agent_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agency Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .action-btns .btn {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            font-size: 14px;
        }
        .table td img {
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3" href="#">Car Rental Agency</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3"><span class="nav-link">Hello, <?php echo htmlspecialchars($name); ?></span></li>
                <li class="nav-item"><a class="nav-link" href="../../index.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Summary -->
<div class="container my-4">
    <h2 class="mb-4">Dashboard</h2>
    <div class="row text-center">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm bg-light"><div class="card-body">
                <p class="text-muted mb-1">Total Cars</p><h3><?php echo $totalCars; ?></h3>
            </div></div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm bg-warning text-white"><div class="card-body">
                <p class="mb-1">Cars Rented</p><h3><?php echo $carsRented; ?></h3>
            </div></div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm bg-success text-white"><div class="card-body">
                <p class="mb-1">Total Earnings</p><h3>₹<?php echo number_format($totalEarnings); ?></h3>
            </div></div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm bg-danger text-white"><div class="card-body">
                <p class="mb-1">Pending Returns</p><h3><?php echo $pendingReturns; ?></h3>
            </div></div>
        </div>
    </div>
</div>

<!-- Car List -->
<div class="container">
    <div class="card mb-4">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add More Cars For Rent</h5>
            <div class="d-flex">
                <input id="myInput" type="text" class="form-control me-2" placeholder="Search..">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal2">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No</th>
                        <th>Model</th>
                        <th>Image</th>
                        <th>Number</th>
                        <th>Seats</th>
                        <th>Rent/Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($carsResult)) {
                    echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['model']}</td>
                        <td><img src='../uploads/{$row['image']}' width='60' height='40'></td>
                        <td>{$row['car_number']}</td>
                        <td>{$row['seats']}</td>
                        <td>₹{$row['rent']}</td>
                        <td>
                            <div class='d-flex justify-content-center gap-2 action-btns'>
                                <button class='btn btn-outline-primary btn-sm edit2' id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#modal1'>
                                    <i class='bi bi-pencil'></i> Edit
                                </button>
                                <form action='delete.php' method='post' onsubmit='return confirm(\"Are you sure?\")'>
                                    <input type='hidden' name='delete_id' value='{$row['id']}'>
                                    <button type='submit' class='btn btn-outline-danger btn-sm'>
                                        <i class='bi bi-trash'></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>";
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Car Modal -->
<form action="add_car.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modal2" tabindex="-1">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="agent_id" value="<?php echo $agent_id; ?>">
                <div class="mb-3"><label>Model Name</label><input type="text" name="model" class="form-control" required></div>
                <div class="mb-3"><label>Car Image</label><input type="file" name="filetoupload" class="form-control" required></div>
                <div class="mb-3"><label>Car Number</label><input type="text" name="number_plate" class="form-control" required></div>
                <div class="mb-3"><label>Seats</label><input type="number" name="seats" class="form-control" required></div>
                <div class="mb-3"><label>Rent Per Day</label><input type="number" name="rent" class="form-control" required></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="submit" value="upload">Add</button>
            </div>
        </div></div>
    </div>
</form>

<!-- Edit Modal -->
<form action="update.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modal1" tabindex="-1">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Car Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="info_update">
                <!-- AJAX loaded -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="submit" value="upload">Update</button>
            </div>
        </div></div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.edit2');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const carId = this.id;
            const formData = new FormData();
            formData.append('id2', carId);

            fetch('edit.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('info_update').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>
</body>
</html>
