<!doctype html>
<html lang="fr">
  <head>
	<title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <style>

      @import url('https://fonts.googleapis.com/css?family=Poppins');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body{
          background-image: url('../aerpo.pngs');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            }

	</style>
</head>
	<body>
		<header>
			<?php include('../headerC.php'); ?>
			  </header>  
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h1 class="heading-section" style="font-weight: bold;">AEROPRICE SUPPORT CONTACT</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row mb-5">
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-map-marker"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Adresse:</span> 33 Boulevard du port , Cergy</p>
				          </div>
			          </div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-phone"></span>
			        		</div>
			        		<div class="text">
				            <p><span>numéro de téléphone:</span> <a href="tel://1234567920"> 0123456789</a></p>
				          </div>
			          </div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-paper-plane"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Email:</span> <a href="mailto:info@yoursite.com">aeropricesupport@gmail.com</a></p>
				          </div>
			          </div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-globe"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Site Web</span> <a href="https://aeroprice.alwaysdata.net/temp/">aeroprice.alwaysdata.net</a></p>
				          </div>
			          </div>
							</div>
						</div>
						<div class="row no-gutters">
							<div class="col-md-6">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Contactez-nous en remplissant les champs de ce formulaire par vos informations  </h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Votre message a bel et bien été envoyé , nous vous remercions de votre confiance.
				      		</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Nom</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Adresse mail</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
				
											<div class="col-md-12">
												<div class="form-group">
													<label for="category">Catégorie:</label>
													<select class="form-control" id="category" name="category">
														<option value="reclamation">Réclamation</option>
														<option value="amelioration">Demande d'amélioration</option>
														<option value="demande_info">Demande d'information</option>
														<option value="support_technique">Assistance technique</option>
														<option value="feedback">Feedback/Commentaires</option>
														<option value="other">Autre</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Objet</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Envoyer le message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6">
								<div id="mapid" style="height: 500px;"></div>
							</div>
						</div>
					</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('mapid').setView([49.0361, 2.0634], 13); // Coordonnées de 33 Boulevard du Port, Cergy

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        // Ajout d'un marqueur
        var marker = L.marker([49.0361, 2.0634]).addTo(mymap);
        marker.bindPopup("<b>Siège AEROPRICE</b><br>33 Boulevard du Port, Cergy").openPopup();
    </script>

	</body>
</html>

