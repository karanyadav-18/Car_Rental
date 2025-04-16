<?php
include('inc/header.php');
?>
<?php
include('inc/connect.php');
?>

<div class="my-5 px4">
    <h2 class="fw-bold h-font text-center">
        AVAILABLE CARS
    </h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 px-4">
            <?php
            $sql = "SELECT * FROM cars";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card mb-3 border-0 shadow" style="padding: 10px;">

                <div class="row g-0 p-2 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-2">
                            <?php echo $row['model']; ?>
                        </h5>
                        <div class="features mb-2">
                            <h6 class="mb-1" style="font-size: 14px;">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                <?php echo $row['seats']; ?> Seater
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Diesel
                            </span>
                        </div>
                        <div class="facilities mb-2">
                            <h6 class="mb-1" style="font-size: 14px;">Vehicle Number</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                <?php echo $row['car_number']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                        <h6 class="mb-3" style="font-size: 16px;">
                            <?php echo $row['rent']; ?>/day
                        </h6>
                        <?php if ($_SESSION['name']) {
                                    $name = $_SESSION['name'];
                                    $sqla = "SELECT name from customer WHERE name = '$name'";
                                    $cat = mysqli_query($conn, $sqla);
                                    if ($cat) {
                                        while ($rows = mysqli_fetch_assoc($cat)) {
                                            echo "<button id=" . $row['id'] . " class='btn lead btn-sm btn-outline-dark shadow-none'>Rent Car</button>";
                                        }
                                    }
                                } else {
                                    echo "<a data-bs-toggle='modal' data-bs-target='#LoginModal' class='btn  btn-sm btn-outline-dark shadow-none'>Book Now</a>";
                                } ?>
                    </div>
                </div>

            </div>
            <?php }
                echo "<br>";
            } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="book" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center" id="rentCarButton"><i class="bi bi-person-lines-fill fs-3 me-2"></i>Rent
                    A Car</h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/booking.php" method="post">
                    <div class="container-fluid">
                        <div class="info">
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" name="submit" class="btn btn-dark shadow-none">Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('inc/footer.php');
?>

<script>
$(document).on('click', '.lead', function() {
    var id = $(this).attr('id');
    $.ajax({
        url: "modal.php",
        type: "post",
        data: {
            id: id
        },
        success: function(data) {
            $(".info").html(data);
            $("#book").modal('show');
        }
    });
});
</script>
