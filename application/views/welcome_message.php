<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dealership</title>
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url() ?>assets/backend/theam/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>assets/backend/theam/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() ?>assets/backend/theam/vendor/jquery/jquery.min.js"></script>
        <style>
            .required:after {
                content: " *";
                color: red;
            }
        </style>
    </head>

    <body class="bg-gradient-primary">

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center text-primary">
                            <h3><strong>"Nathjal"</strong> Dealership Application</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="Welcome/addDealer" id="dealerForm" enctype="multipart/form-data" false>
                                        <div class="row">
                                            <div class="col-md-12 col--12">
                                                <label><strong>कोणत्या जिल्हयासाठी/तालुक्यासाठी/एस.टी. डेपोसाठी अर्ज करत आहात? / For which district you are applying?</strong> </label><br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="district" class="required">जिल्हा / District:</label>
                                                    <select name="district" class="form-control" id="district" onchange="getTehsils()" required>
                                                        <option value="">Select District</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tehsil" class="required">तालुका / Tehsil:</label>
                                                    <select name="tehsil" class="form-control" id="tehsil" required>
                                                        <option value="">Select Tehsil</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="depot" class="required">डेपो / Depot:</label>
                                                    <input type="text" class="form-control" placeholder="Enter Depot" id="depot" name="depot" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="required">पूर्ण नाव / Full Name:</label>
                                                    <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="address" class="required">पत्ता / Address:</label>
                                                    <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email" class="required">ईमेल / Email id:</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mobile" class="required">मोबाईल नंबर / Mobile number:</label>
                                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" id="mobile" name="mobile" required pattern="\d*" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="altMobile">पर्यायी नंबर / Alternate number:</label>
                                                    <input type="text" class="form-control" placeholder="Enter Alternate Mobile Number" id="altMobile" name="altMobile" pattern="\d*" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="qualification" class="required">शैक्षणिक पात्रता / Qualification:</label>
                                                    <input type="text" class="form-control" placeholder="Enter Qualification" id="qualification" name="qualification" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                            </div>
                                            <br/>
                                            <div class="col-md-12">
                                                <label><strong>वितरक होण्यासाठी आवश्यक बाबी / Necessary things to become dealer</strong></label><br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="godown" class="required">गोडावून सुविधा / Godown facility:</label><br>
                                                    <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optradio" id="godownRadioNo" value="0" checked onchange="radioChanged()"> No
                                                      </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optradio" id="godownRadioYes" value="1" onchange="radioChanged()"> Yes
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 godownArea">
                                                <div class="form-group">
                                                    <label for="godown" class="required">गोडावून क्षेत्र / Godown Area:</label>
                                                    <input type="number" class="form-control" placeholder="In Square Feet" id="godown" name="godown">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="staff" class="required">अनुभवी कर्मचारी संख्या / Experienced No Of Staff:</label>
                                                    <input type="number" class="form-control" placeholder="Enter Experienced No Of Staff" id="staff" name="staff" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="van" class="required">व्हॅन मॉडेल / Van Model:</label>
                                                    <input type="text" class="form-control" placeholder="Pickup-up,407 etc" id="van" name="van" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dExperience" class="required">वितरणातील अनुभव / Dealership Experience:</label>
                                                    <select class="form-control" id="dExperience" name="experience" onchange="dExpChaged()" required>
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
											</div>
											<div class="col-md-4 exp">
                                                <div class="form-group">
                                                    <label for="dealership" class="required">विक्रेता / Dealership:</label>
                                                    <select name="dealership" class="form-control" id="dealership" onchange="dealershipChanged()">
                                                        <option value="">Select</option>
                                                        <option value="Water">Water</option>
                                                        <option value="Cold Drinks">Cold Drinks</option>
                                                        <option value="Namkin">Namkin</option>
                                                        <option value="Biscuit">Biscuit</option>
                                                        <option value="Chocolate">Chocolate</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
											</div> 	
											<div class="col-md-4 exp odCategory">
												<label for="odCategory" class="required">इतर विक्रेता श्रेणी / Other Dealership Category:</label>
												<input type="text" class="form-control" placeholder="Other Dealership Category" id="odCategory" name="odCategory">
											</div>
											<div class="col-md-4 exp">
												<label for="brand" class="required">ब्रँड / Brand:</label>
												<input type="text" class="form-control" placeholder="Brand" id="brand" name="brand">
											</div>
											<div class="col-md-4 exp">
												<label for="yExperience" class="required">डीलरशिप अनुभव /  Year Of Experience In Dealership:</label>
												<input type="number" class="form-control" placeholder="Year Of Experience In Dealership" id="yExperience" name="yExperience">
											</div>
                                            <br/>
                                            <div class="col-md-12 mt-4">
                                                <label><strong>वितरक होण्यासाठी आवश्यक कागदपत्रांचा तपशील / Necessary documents to become dealer</strong></label><br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pancardNumber" class="required">पॅनकार्ड / PANCARD:</label>
                                                    <select name="pancardNumber" class="form-control" id="pancardNumber" required>
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gstNumber" class="required">जी.एस.टी. नंबर / GST:</label>
                                                    <select name="gstNumber" class="form-control" id="gstNumber" required>
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="shopAct" class="required">शॉप एक्ट / SHOP ACT:</label>
                                                    <select name="shopAct" class="form-control" id="shopAct" required>
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="adhar" class="required">आधार/पॅनकार्ड / ADHAR/PANCARD:(.jpg, .jpeg, .png .pdf 100-900kb)</label>
                                                    <input type="file" class="form-control" id="adhar" name="adhar" data-max-size="900000" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="photo" class="required">फोटो / PHOTO:(.jpg, .jpeg, .png 100-900kb)</label>
                                                    <input type="file" class="form-control" id="photo" name="photo" data-max-size="900000" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="signature" class="required">सही / SIGNATURE:(.jpg, .jpeg, .png 100-900kb)</label>
                                                    <input type="file" class="form-control" id="signature" name="signature" data-max-size="900000" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-check">
                                                    <label class="form-check-label">
                                                      <input class="form-check-input" type="checkbox" id="customCheck"> <strong>I accept terms and condition</strong>
                                                    </label>
                                                  </div>
                                            </div>
                                            <br/>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <strong><label>टिप- वितरक निवडण्याचे सर्व अधिकार शेळके बेव्हरेजेस प्रा.लि. कडे राहतील.</label></strong>
                                                    <strong><label>Note- All rights will be reserve to the shelke beverages pvt ltd for the selection of the dealers.</label></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary" id="btnMain" value="Submit"/>
                                                
                                                <button class="btn btn-primary" id="btnLoad">
                                                  <span class="spinner-border spinner-border-sm"></span>
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url() ?>assets/backend/theam/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>assets/backend/theam/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>assets/backend/theam/js/sb-admin-2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/backend/js/custom.js"></script>
    </body>

    </html>