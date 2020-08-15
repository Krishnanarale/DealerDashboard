$(document).ready( (e) => {
    $('#btnLoad').hide();
    $('.exp').hide();
    $('#btnMain').prop('disabled', true);
    getDistricts();
    $(".godownArea").hide();

    $('#customCheck').click(function(){
        if($(this).prop("checked") == true){
            $('#btnMain').prop('disabled', false);
        }
        else if($(this).prop("checked") == false){
            $('#btnMain').prop('disabled', true);
        }
    });

    $('#mobile').change( () => {
        if($('#mobile').val().length !== 10) {
            alert('Check Mobile Number!');
        }
    });
    $('#altMobile').change( () => {
        if($('#altMobile').val().length !== 10) {
            alert('Check Alt Mobile Number!');
        }
    });
    $('#email').change( () => {
        if(!IsEmail($('#email').val())) {
            alert('Check Email!');
        }
    });

    
    const toggleButton = () => {
        $('#btnLoad').show();
        $('#btnMain').prop('disabled', true);
        $('#btnMain').hide();
    }

    $('#dealerForm').on('submit', (e) => {
        e.preventDefault();
        let url = $('#dealerForm').attr('action');
        const adhar = $('#adhar').val().split('.').pop().toLowerCase();
        const photo = $('#photo').val().split('.').pop().toLowerCase();
        const signature = $('#signature').val().split('.').pop().toLowerCase();
        let fileSize = true;
        $('input[type=file][data-max-size]').each(function(){
            if(typeof this.files[0] !== 'undefined'){
                var maxSize = parseInt($(this).attr('data-max-size'),10),
                size = this.files[0].size;
                if(maxSize > size){
                    
                } else {
                    fileSize = false;
                }
            }
        });
        if($.inArray(adhar, ['jpg','jpeg','png','pdf']) == -1) {
            alert('Adhar Only .jpg, .jpeg, .png, .pdf allowed!');
        } else if($.inArray(photo, ['jpg','jpeg','png']) == -1){
            alert('Photo Only .jpg, .jpeg, .png allowed!');
        } else if($.inArray(signature, ['jpg','jpeg','png']) == -1){
            alert('Signature Only .jpg, .jpeg, .png allowed!');
        } else if(!fileSize){
            alert('Check files size (100kb - 900kb)!');
        } else {
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
                    if(res.status === 'success') {
                        alert('Your Application Submitted Successfully, Thank you!');
                        window.location.reload();
                    } else {
                        alert(res.errors);
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            });
        }
    });
});

function getDistricts() {
    const state = 22;
    const url = 'ResourcesController/getDistricts';
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: { state_id : state},
        success: (res) => {
            if(res.status === 'success') {
                let districts;
                res.data.forEach( (item, index) => {
                    districts += `<option value="${item.id}">${item.name}</option>`;
                });
                $('#district').append(districts);
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
    const url = 'ResourcesController/getTehsils';
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: { city_id : city},
        success: (res) => {
            if(res.status === 'success') {
                let tehsils;
                res.data.forEach( (item, index) => {
                    tehsils += `<option value="${item.id}">${item.name}</option>`;
                });
                $('#tehsil').html(tehsils);
            } else {
                console.log(res);
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}

function radioChanged() {
	if ($("#godownRadioYes").prop("checked")) {
		$(".godownArea").show();
		$("#godown").prop('required',true);
	} else if ($("#godownRadioNo").prop("checked")) {
        $(".godownArea").hide();
		$("#godown").prop('required',false);
	}
}

function dExpChaged() {
    if ($('#dExperience').val() == 'Yes') {
        $('.exp').show();
        $("#dealership,#brand,#yExperience").prop('required',true);
        $('.odCategory').hide();
    } else {
        $('.exp').hide();
        $("#dealership,#brand,#yExperience").prop('required',false);
    }
}

function dealershipChanged() {
    if ($('#dealership').val() == 'Other') {
        $('.odCategory').show();
        $('.odCategory').prop('required',true);
    } else {
        $('.odCategory').hide();
        $('.odCategory').prop('required',false);
    }
}