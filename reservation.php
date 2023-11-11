<?php
ob_start();
$activate = "reservation";
@include('inc/header.php');
?>
<?php
if (!isset($_GET['menuid']) || $_GET['menuid'] == NULL) {
	echo "<script>window.location = 'error.php'</script>";
} else {
	$id = $_GET['menuid'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
	$insert_cart = $ct->insert_cart($_POST, $id);
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Book a Table</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-0">
        <!-- <div class="row d-flex no-gutters"> -->
        <div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last" style="right: auto;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7906871911864!2d105.78347907475415!3d10.03412409007305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a1bbe2da77%3A0x780e866b3e9801a6!2sKing%20BBQ%20Buffet%20Sense%20City%20C%E1%BA%A7n%20Th%C6%A1!5e0!3m2!1svi!2s!4v1695120112261!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
            
     <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
                <div class="py-md-5">
                    <div class="heading-section ftco-animate mb-5">
                        <span class="subheading">Book a table</span>
                        <h2 class="mb-4">Make Reservation</h2>
                    </div>

                    <form onsubmit="showMessageBox()" action="" method="post">
                        <div class="row">
                            <?php
							if (isset($insert_cart)) {
								echo $insert_cart;
							}
							?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="PDH_TENKH" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input id="email" type="text" name="PDH_EMAILKH" class="form-control"
                                        placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input id="sdt" type="text" name="PDH_SDTKH" class="form-control"
                                        placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input id="date" type="date" name="PDH_NGAYLAP" class="form-control" id="book_date"
                                        placeholder="Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time</label>
                                    <input id="time" type="time" name="PDH_TG" class="form-control" id="book_time"
                                        placeholder="Time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Person</label>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select id="person" name="PDH_SONGUOI" class="form-control"
                                            placeholder="Chọn số người">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">5</option>
                                            <option value="4">10+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Combo menu</label>
                                    <?php
									$menu = $mn->show_menuname($id);
									if (isset($menu)) {
										while ($result = $menu->fetch_assoc()) {
											echo '<input id="menu" type="text" name="MN_TEN" class="form-control" value="' . $result['MN_TEN'] . '" >';
										}
									}
									?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Quality</label>
                                    <input id="number" type="number" name="PDH_SLMENU" class="form-control"
                                        placeholder="" min="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Notice</label>
                                    <textarea id="note" type="text" name="PDH_GHICHU" class="form-control"
                                        placeholder="Notice..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Make a
                                        Reservation</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

           
        <!-- </div> -->
    </div>
    
</section>

<?php
@include('inc/footer.php');
?>