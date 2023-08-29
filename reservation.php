<?php
$activate = "reservation";
@include('header.php');
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Book a Table</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-5">
		          	<span class="subheading">Book a table</span>
		            <h2 class="mb-4">Make Reservation</h2>
		          </div>
	            <form onsubmit="showMessageBox()" action="#">
	              <div class="row">
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Name</label>
	                    <input id="name" type="text" class="form-control" placeholder="Your Name" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Email</label>
	                    <input id="email" type="text" class="form-control" placeholder="Your Email" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Phone</label>
	                    <input id="sdt" type="text" class="form-control" placeholder="Phone" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Date</label>
	                    <input id="date" type="text" class="form-control" id="book_date" placeholder="Date" required>
	                  </div>
	                </div>
	                <div class="col-md-6">

						
	                  <div class="form-group">
	                    <label for="">Time</label>
	                    <input id="time" type="text" class="form-control" id="book_time" placeholder="Time" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Person</label>
	                    <div class="select-wrap one-third">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="" id="person" class="form-control">
	                        <option value="">Person</option>
	                        <option value="">1</option>
	                        <option value="">2</option>
	                        <option value="">3</option>
	                        <option value="">4+</option>
	                      </select>
	                    </div>
	                  </div>
	                </div>
	                <div class="col-md-12 mt-3">
	                  <div class="form-group">
	                    <button onsubmit="showMessageBox()" type="submit" value="" class="btn btn-primary py-3 px-5">Make a Reservation</button>
	                  </div>
	                </div>
	              </div>
	            </form>
	          </div>
          </div>

		  <script>
				 function showMessageBox() {
    			var message = "Reservation successful!";
    			alert(message);
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('sdt').value = '';
				document.getElementById('time').value ='';
				document.getElementById('date').value = '';
				document.getElementById('person').value = '';
                // var textarea = document.getElementById("address");
                //     textarea.value = "";
                // console.log(document.getElementById('address'));
             
					}
		 </script>
          <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
						<div id="map"></div>
					</div>
        </div>
			</div>
		</section>
		
<?php
@include('footer.php');
?>