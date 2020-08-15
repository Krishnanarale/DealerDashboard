<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name'] ?></title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/backend/theam/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/backend/theam/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        img#photo {
            max-width: 100px;
            height: 100px;
        }
        img#signature {
            height: 80px;
        }
        .row.printDiv {
            border: 1px solid;
        }
        .bm {
            border-bottom: 1px solid;
        }
        .bt {
            border-top: 1px solid;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row hid">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-primary"><i class="fas fa-download"></i> Pdf</button>
            </div>
        </div>
        <div class="row printDiv mt-4">
            <div class="col-md-12 text-center mb-4 bm">
                <h2><strong>"Nathjal"</strong> Dealership Application</h2>
            </div>
            <div class="col-md-12">
                <label><strong>कोणत्या जिल्हयासाठी/तालुक्यासाठी/एस.टी. डेपोसाठी अर्ज करत आहात? / For which district you are applying?</strong> </label><br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="district" class="required">पूर्ण नाव / Full Name: <?php echo $data['name'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="district" class="required">जिल्हा / District: <?php echo $data['district'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tehsil" class="required">तालुका / Tehsil: <?php echo $data['tehsil'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="depot" class="required">डेपो / Depot: <?php echo $data['depot'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="address" class="required">पत्ता / Address: <?php echo $data['address'] ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email" class="required">ईमेल / Email id: <?php echo $data['email'] ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mobile" class="required">मोबाईल नंबर / Mobile number: <?php echo $data['mobile'] ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="altMobile">पर्यायी नंबर / Alternate number: <?php echo $data['altMobile'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="qualification" class="required">शैक्षणिक पात्रता / Qualification: <?php echo $data['qualification'] ?></label>
                </div>
            </div>
            <div class="col-md-12 bt">
                <label><strong>वितरक होण्यासाठी आवश्यक बाबी / Necessary things to become dealer</strong></label><br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="godown">गोडावून क्षेत्र / Godown Area: <?php echo $data['godown'] ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="staff">अनुभवी कर्मचारी संख्या / Experienced No Of Staff: <?php echo $data['staff'] ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="van">व्हॅन मॉडेल / Van Model: <?php echo $data['van'] ?></label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="experience" class="required">वितरणातील अनुभव व तपशील / Experience in dealership & details: <?php echo $data['experience']." ".$data['dealership']." ".$data['odCategory']." ".$data['brand']." ".$data['yExperience']; ?></label>
                </div>
            </div>
            <div class="col-md-12 bt">
                <label><strong>वितरक होण्यासाठी आवश्यक कागदपत्रांचा तपशील / Necessary documents to become dealer</strong></label><br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pancardNumber" class="required">पॅनकार्ड / PANCARD: <?php echo $data['pancardNumber'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="gstNumber">जी.एस.टी. नंबर / GST: <?php echo $data['gstNumber'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="shopAct">शॉप एक्ट / SHOP ACT: <?php echo $data['shopAct'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="shopAct">तारीख / Date: <?php echo $data['created_at'] ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="adhar" class="required">आधार / ADHAR: <?php echo !empty($data['adhar']) ? 'Yes' : 'No'; ?></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="photo" class="required">फोटो / PHOTO:</label>
                    <img src="<?php echo base_url() . 'uploads/' . $data['photo'] ?>" alt="photo" id="photo">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="signature" class="required">सही / SIGNATURE:</label>
                    <img src="<?php echo base_url() . 'uploads/' . $data['signature'] ?>" alt="signature" id="signature">
                </div>
            </div>
            <div class="col-md-12 bt">
                <div class="form-group">
                    <strong><label>टिप- वितरक निवडण्याचे सर्व अधिकार शेळके बेव्हरेजेस प्रा.लि. कडे राहतील.</label></strong>
                    <strong><label>Note- All rights will be reserve to the shelke beverages pvt ltd for the selection of the dealers.</label></strong>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/backend/theam/vendor/jquery/jquery.min.js"></script>
    <script>
        $(".btn-primary").click(function() {
            $('.hid').hide();
            window.print();
            $('.hid').show();
        });
    </script>
    <script src="<?php echo base_url() ?>assets/backend/theam/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/backend/theam/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/backend/theam/js/sb-admin-2.min.js"></script>
</body>

</html>