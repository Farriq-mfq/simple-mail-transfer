$(function() {
	'use strict';

	function getSMTP() {
		$.get('files/getSMPT.php','',function(data) {
			$(".read__smtp span").html(data);
		})
	}
	
	getSMTP()

	$(".add__smtp").on("click",function(e) {
		e.preventDefault();
		$("#form__add__SMTP").toggleClass('hide');
		$(".add__smtp i").toggleClass('btn__close');
	})

	$("#form__SMTP").on('submit',function(e){
		e.preventDefault();
		$.ajax({
			method:'POST',
			url:'files/addSMTP.php',
			data:$(this).serialize(),
			beforeSend:function(){
				$(".btn__sub__smtp").attr('disabled',true);
			},
			success: function(data) {
				$(".btn__sub__smtp").attr('disabled',false);
				$('#form__SMTP')[0].reset();
				$(".respon__alert__smtp").append(`
						<div class='alert alert-success text-center'>Success Add SMTP <i class='fa fa-check'></i></div>
					`)
				getSMTP()
				setTimeout(function() {
					$(".respon__alert__smtp").html('');
				},1000)
			},
			error:function() {
				$(".respon__alert__smtp").append(`
						<div class='alert alert-danger text-center'>Failed Add SMTP <i class='fa fa-close'></i></div>
					`)
			}
		})
	})

    $('.add__recipients').on('click',function(e) {
    	e.preventDefault()
    	$("#form__recipients").toggleClass('hide');
		$(".add__recipients i").toggleClass('btn__close');
    })

    function getRecipients() {
    	$.get('files/getRecipients.php','',function(data) {
			$(".name__set__from").html(data);
		})
    }
    getRecipients()

    $('#form_recipients').on("submit",function(e) {
    	e.preventDefault();
    	$.ajax({
    		method:'POST',
    		data:$(this).serialize(),
    		url:'files/addRecipients.php',
    		beforeSend:function() {
    			$(".btn__sub__recep").attr('disabled',true);
    		},
    		success:function(data) {
    			$(".btn__sub__recep").attr('disabled',false)
    			$(".respon__alert__recep").append(`
					<div class='alert alert-success text-center' style='margin-top:10px'>Success Add Recipients <i class='fa fa-check'></i></div>

    				`)
    			getRecipients()
    			setTimeout(function() {
					$(".respon__alert__recep").html('');
				},1000)
    		},
    		error:function() {
    			$(".respon__alert__recep").append(`
					<div class='alert alert-danger text-center' style='margin-top:10px'>failed Add Recipients <i class='fa fa-close'></i></div>

    				`)
    		}
    	})
    })


    $("#send__").on('submit',function(e) {
    	e.preventDefault();
        const data = $(this).serialize();
        prosess(data)
    })
    function prosess(data) {
        const send =  $.ajax({
            method:'POST',
            data:data,
            url:'files/mailer.php',
            beforeSend:function() {
                $('.btn__send').attr('disabled',true);
                $('.btn__send i').removeClass('fa-send');
                $('.btn__send i').addClass('fa-spinner');
                $('.btn__send i').addClass('loader');
                $('.btn__send').css('width','50%');
                $('.btn__stop').removeClass('hide');
                $('.respon__suc_fail_per').hide();
                $("#mail__list").attr('disabled',true);
                $('.loader__sending').removeClass('hide');

            },
            success:function(data) {
                console.log(data)
                $('.loader__sending').addClass('hide');
                $('.btn__send').css('width','100%');
                $('.btn__stop').addClass('hide');
                $("#mail__list").attr('disabled',false);
                $("#send__")[0].reset();
                $('.btn__send').attr('disabled',false);
                $('.btn__send i').addClass('fa-send');
                $('.btn__send i').removeClass('fa-spinner');
                $('.btn__send i').removeClass('loader');
                const json = JSON.parse(data);
                     const total = json.total/json.total*100;
                     const success = json.success.length/json.total*100;
                     const error = json.error.length/json.total*100;
                     let percentTotal = 0;
                     let percentSuccess = 0;
                     let percentError = 0;
                    var timer = setInterval(function() {
                        percentTotal = percentTotal + total;
                        percentSuccess = success;
                        percentError = error;
                        process_fun(percentTotal,percentSuccess,percentError,timer)
                },1000)

                $('.respon__suc_fail_per').show();

                
            }
        })
        $(".btn__stop").on('click',function(e) {
          e.preventDefault();
          send.abort()
           $('.loader__sending').addClass('hide');
                $('.btn__send').css('width','100%');
                $('.btn__stop').addClass('hide');
                $("#mail__list").attr('disabled',false);
                $("#send__")[0].reset();
                $('.btn__send').attr('disabled',false);
                $('.btn__send i').addClass('fa-send');
                $('.btn__send i').removeClass('fa-spinner');
                $('.btn__send i').removeClass('loader');  
        })
    }

    function process_fun(percentTotal,percentSuccess,percentError,timer) {
    	if (percentTotal == 100) {
    		clearInterval(timer)
    		var pieData = [
			{
				value: percentError,
				color:"#D95459"
			},
			{
				value : percentSuccess,
				color : "#1ABC9C"
			},
			{
				value : percentTotal,
				color : "#3BB2D0"
			}
		
		];
		new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);

    	$("#os-Win-lbl span").html(Math.round(percentSuccess)+'%')
    	$("#os-Mac-lbl span").html(percentTotal+'%')
    	$("#os-Other-lbl span").html(Math.round(percentError)+'%')
    	}
    }

    $(".add__attchment").on('click',function(e) {
        e.preventDefault();
        $("#attachment__col").toggleClass('hide');
        $(".add__attchment i").toggleClass('btn__close');
    })
    $("#attachment").on('submit',function(e) {
        e.preventDefault();
        $('.progress').show();
        const formdata = new FormData();
        const file = $('#attch')[0].files[0];
         formdata.append('attch',file);
         upatt(formdata)    
        
    })
    function upatt(formdata) {
        const up =  $.ajax({
        xhr:function() {
            const xhr = new XMLHttpRequest;
            xhr.upload.addEventListener('progress',function(e) {
                if (e.lengthComputable) {
                    var persen = Math.round((e.loaded/e.total) * 100);
                    $(".progress-bar").css('width',persen+'%');
                    $(".progress-bar").html(persen+'%');

                }
            },false)
            return xhr;
        },
        method:'POST',
        url:'files/attachment.php',
        data:formdata,
        contentType:false,
        processData:false,
        cache:false,
        beforeSend:function() {
            $("#btn__attch").attr('disabled',true)  
            $("#btn__attch__cencel").show()  
        },
        success:function(data) {
            $("#attachment")[0].reset();
            $("#btn__attch__cencel").hide()  
            $("#btn__attch").attr('disabled',false)  
                console.log(data)
            setTimeout(function() {
                $(".progress-bar").html('0%');
                $(".progress-bar").css('width','0%');
                $('.progress').hide();
                getattch()
            },1000)

        }
       })

        $("#btn__attch__cencel").on('click',function (e) {
            e.preventDefault();
            up.abort();
             $("#btn__attch__cencel").hide()  
            $("#btn__attch").attr('disabled',false)
            setTimeout(function() {
                $(".progress-bar").html('0%');
                $(".progress-bar").css('width','0%');
                $('.progress').hide();
            },1000)
        })

    }

    $("#import").on('change',function(e) {
        const reader = new FileReader();
        const file = e.target.files[0];
        const type = e.target.files[0].type;
        if (type == 'text/plain') {
            reader.onload = function (e) {
                $("#message__type").val(e.target.result);
            }
            reader.readAsText(file);
        }else if (type == 'text/html') {
             reader.onload = function (e) {
                $("#message__type").val(e.target.result);
            }
            reader.readAsText(file);
        }else{
            alert('OH SNAP');
        }
    })
    $("#upload_txt").on('change',function(e) {
        const reader = new FileReader();
        const file = e.target.files[0];
        const type = e.target.files[0].type;
        if (type == 'text/plain') {
            reader.onload = function (e) {
                $("#mail__list").val(e.target.result);
                const length = e.target.result.split('\n').length;
                $(".loaded__list").text(length)

            }
            reader.readAsText(file);
        }else{
            alert('OH SNAP');
        }
    })
    $("#btn__preview").on('click',function() {
        $("#preview").html($("#message__type").val());
        $('#preview').toggleClass('hide');
    })
    $(document).on('click','#remove__attch',function() {
        $.get('files/removeattch.php',{key:$(this).data('key')},function(data) {
            getattch()
        })
    })
    function getattch() {
        $.get('files/getattch.php',{},function(data) {
            $("#read__attch").html(data)
        })
    }
    getattch();
   
})