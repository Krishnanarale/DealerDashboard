<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Dealers Applications</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Dealers Applications</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url() ?>Admin/DealersController/updateDealer" id="dealerForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <label><strong>कोणत्या जिल्हयासाठी/तालुक्यासाठी/एस.टी. डेपोसाठी अर्ज करत आहात? / For which district you are applying?</strong> </label><br>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="district" class="required">जिल्हा / District:</label>
                                <select name="district" class="form-control" id="district" onchange="getTehsils()" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tehsil" class="required">तालुका / Tehsil:</label>
                                <select name="tehsil" class="form-control" id="tehsil" required>
                                    <option value="">Select Tehsil</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="depot" class="required">डेपो / Depot:</label>
                                <input type="text" class="form-control" placeholder="Enter Depot" id="depot" name="depot" required>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="name" class="required">पूर्ण नाव / Full Name:</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address" class="required">पत्ता / Address:</label>
                                <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile" class="required">मोबाईल नंबर / Mobile number:</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile Number" id="mobile" name="mobile" required pattern="\d*" maxlength="10">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="altMobile">पर्यायी नंबर / Alternate number:</label>
                                <input type="text" class="form-control" placeholder="Enter Alternate Mobile Number" id="altMobile" name="altMobile" pattern="\d*" maxlength="10">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email" class="required">ईमेल / Email id:</label>
                                <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="qualification" class="required">शैक्षणिक पात्रता / Qualification:</label>
                                <input type="text" class="form-control" placeholder="Enter Qualification" id="qualification" name="qualification" required>
                            </div>
                        </div>
                        <label><strong>वितरक होण्यासाठी आवश्यक बाबी / Necessary things to become dealer</strong></label><br>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="godown" class="required">गोडावून क्षेत्र / Godown Area:</label>
                                <input type="text" class="form-control" placeholder="Enter Godown Area" id="godown" name="godown" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="staff" class="required">अनुभवी कर्मचारी संख्या / Experienced No Of Staff:</label>
                                <input type="number" class="form-control" placeholder="Enter Staff Count" id="staff" name="staff" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="van" class="required">व्हॅन मॉडेल / Van Model:</label>
                                <input type="text" class="form-control" placeholder="Enter Van Details" id="van" name="van" required>
                            </div>
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label for="experience" class="required">वितरणातील अनुभव व तपशील / Experience in dealership & details:</label>
                            <textarea name="experience" id="experience" cols="30" rows="5" class="form-control" placeholder="Ennter Experience in dealership & details" required></textarea>
                        </div> -->
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="dExperience" class="required">वितरणातील अनुभव / Dealership Experience:</label>
                                <select class="form-control" id="dExperience" name="experience" onchange="dExpChaged()" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dealership">विक्रेता / Dealership:</label>
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
                        <div class="form-group col-md-4 exp odCategory">
                            <label for="odCategory">इतर विक्रेता श्रेणी / Other Dealership Category:</label>
                            <input type="text" class="form-control" placeholder="Other Dealership Category" id="odCategory" name="odCategory">
                        </div>
                        </div>
                        <div class="row col-md-12">
                        <div class="form-group col-md-4 exp">
                            <label for="brand">ब्रँड / Brand:</label>
                            <input type="text" class="form-control" placeholder="Brand" id="brand" name="brand">
                        </div>
                        <div class="form-group col-md-4 exp">
                            <label for="yExperience">डीलरशिप अनुभव / Year Of Experience In Dealership:</label>
                            <input type="number" class="form-control" placeholder="Year Of Experience In Dealership" id="yExperience" name="yExperience">
                        </div>
                        </div>
                        <label><strong>वितरक होण्यासाठी आवश्यक कागदपत्रांचा तपशील / Necessary documents to become dealer</strong></label><br>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">

                                <label for="pancardNumber" class="required">पॅनकार्ड / PANCARD:</label>
                                <select name="pancardNumber" class="form-control" id="pancardNumber" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gstNumber" class="required">जी.एस.टी. नंबर / GST NUMBER:</label>
                                <select name="gstNumber" class="form-control" id="gstNumber" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="shopAct" class="required">शॉप एक्ट / SHOP ACT:</label>
                                <select name="shopAct" class="form-control" id="shopAct" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="adhar">आधार/पॅनकार्ड / ADHAR/PANCARD: ( Update नको असल्यास रिक्त सोडा )</label>
                                <input type="file" class="form-control" id="adhar" name="adhar">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="photo">फोटो / PHOTO: ( Update नको असल्यास रिक्त सोडा )</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="signature">सही / SIGNATURE: ( Update नको असल्यास रिक्त सोडा )</label>
                                <input type="file" class="form-control" id="signature" name="signature">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong><label>टिप- वितरक निवडण्याचे सर्व अधिकार शेळके बेव्हरेजेस प्रा.लि. कडे राहतील.</label></strong>
                            <strong><label>Note- All rights will be reserve to the shelke beverages pvt ltd for the selection of the dealers.</label></strong>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnMain">Submit</button>
                        <button class="btn btn-primary" id="btnLoad" style="display: none;">
                            <span class="spinner-border spinner-border-sm"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $("#dealers").addClass('active');
        getDistricts();

        const toggleButton = () => {
            $('#btnLoad').show();
            $('#btnMain').prop('disabled', true);
            $('#btnMain').hide();
        }

        $('#dealerForm').submit(() => {
            event.preventDefault();
            let url = $('#dealerForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: new FormData($('#dealerForm')[0]),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: toggleButton,
                success: (res) => {
                    if (res.status === 'success') {
                        alert('Your Application Submitted Successfully, Thank you!');
                        window.location.href = "<?php echo base_url('dealers') ?>";
                    } else {
                        console.log(res);
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            });
        })
    });

    function getDistricts() {
        const state = 22;
        const url = '<?php echo base_url() ?>ResourcesController/getDistricts';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                state_id: state
            },
            success: (res) => {
                if (res.status === 'success') {
                    let districts;
                    res.data.forEach((item, index) => {
                        districts += `<option value="${item.id}">${item.name}</option>`;
                    });
                    $('#district').append(districts);
                    getTehsils();
                } else {
                    console.log(res);
                }
            },
            error: (err) => {
                console.log(err);
            }
        });
    }

    function getTehsils() {
        const city = +$('#district').val();
        const url = '<?php echo base_url() ?>ResourcesController/getTehsils';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                city_id: city
            },
            success: (res) => {
                if (res.status === 'success') {
                    let tehsils;
                    res.data.forEach((item, index) => {
                        tehsils += `<option value="${item.id}">${item.name}</option>`;
                    });
                    $('#tehsil').append(tehsils);
                    getDealer();
                } else {
                    console.log(res);
                }
            },
            error: (err) => {
                console.log(err);
            }
        });
    }

    function getDealer() {
        const id = +'<?php echo $id ?>';
        const url = '<?php echo base_url() ?>Admin/DealersController/getDealer';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: (res) => {
                if (res.status === 'success') {
                    let data = res.data[0];
                    $('#id').val(data.id);
                    $('#district').val(data.district);
                    $('#tehsil').val(data.tehsil);
                    $('#depot').val(data.depot);
                    $('#name').val(data.name);
                    $('#address').val(data.address);
                    $('#mobile').val(data.mobile);
                    $('#altMobile').val(data.altMobile);
                    $('#email').val(data.email);
                    $('#qualification').val(data.qualification);
                    $('#godown').val(data.godown);
                    $('#staff').val(data.staff);
                    $('#dExperience').val(data.experience);
                    $('#dealership').val(data.dealership);
                    $('#odCategory').val(data.odCategory);
                    $('#brand').val(data.brand);
                    $('#yExperience').val(data.yExperience);
                    $('#van').val(data.van);
                    $('#pancardNumber').val(data.pancardNumber);
                    $('#gstNumber').val(data.gstNumber);
                    $('#shopAct').val(data.shopAct);
                } else {
                    console.log(res);
                }
            },
            error: (err) => {
                console.log(err);
            }
        });
    }
</script>