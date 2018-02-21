$(function(){
	setInterval(function(){
		$('.blink').fadeOut(200,function(){$(this).fadeIn(500)});
	},1500);
});


$(function(){
   $('#pagetop_a a[href^=#]').click(function() {
      var speed = 400; // ミリ秒
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});



$(window).load(function(){
	$('#gmenu,#menuc').click(function() {
		$("#globalnavi,#main").toggle();
		});
});



$(function(e)
{
	$("#dialog").dialog(
	{
		autoOpen: false,
		width: 300,
		title: "必ず下記をご確認下さい。",
		modal:true,
		resizable:false,
		buttons:[
            {
                text: '確認したので閉じる',
                Class:'btn-next',
                click: function() {
                    $('input[name="cok"]').prop('checked', true).trigger('change');
					$(this).dialog('close');
                }
            }
        ]
	});

	$("#dialog_link").click(function(e)
	{
		$("#dialog").dialog("open");
		return false;
	});

});

$(function(e)
{
	$("#howto").dialog(
	{
		autoOpen: false,
		width: 300,
		title: "車両重量の見方",
		modal:true,
		resizable:false,
		buttons: {
			"閉じる": function()
			{
				$(this).dialog("close");
			}
		}
	});

	$(".howto_link").click(function(e)
	{
		$("#howto").dialog("open");
		return false;
	});

});

$(function(e)
{
	$("#howto2").dialog(
	{
		autoOpen: false,
		width: 300,
		title: "車両総重量の見方",
		modal:true,
		resizable:false,
		buttons: {
			"閉じる": function()
			{
				$(this).dialog("close");
			}
		}
	});

	$(".howto_link2").click(function(e)
	{
		$("#howto2").dialog("open");
		return false;
	});

});


$(function() {
	$("[name='tire_preparation_code']").click(function(){
		var num = $("[name='tire_preparation_code']").index(this);
		if(num == 0){
			$("#qt1").css("display", "block");
			$("#qt2").css("display", "none");
		} else if(num == 1){
			$("#qt2").css("display", "block");
			$("#qt1").css("display", "none");
		}
	});
});


$(function() {
	$("[name='car_size_code']").click(function(){
		var num = $("[name='car_size_code']").index(this);
		if(num == 0){
			$("#wgt1").css("display", "block");
			$("#wgt2,#wgt3").css("display", "none");
		} else if(num == 1 || num == 2){
			$("#wgt2").css("display", "block");
			$("#wgt1,#wgt3").css("display", "none");
		} else if(num == 3 || num == 4){
			$("#wgt3").css("display", "block");
			$("#wgt2,#wgt1").css("display", "none");
		}
	});
});


$(function () {
  $('select[name=ins_loc]').change(function() {
    if ($(this).val() != '') {
      window.location.href = $(this).val();
    }
  });
 });




$(window).load(function(){
	$('#ques #ans1_y').click(function() {
		$("#q2-1").show("slow");
		$(".reload").show();
		$("#ans1_n").hide();
	})
	$('#ques #ans1_n').click(function() {
		$("#q2-2").show("slow");
		$(".reload").show();
		$("#ans1_y").hide();
	})

	$('#ques #ans2_1y').click(function() {
		$("#q3-1").show("slow");
		$("#ans2_1n").hide();
	})
	$('#ques #ans2_1n').click(function() {
		$("#q3-2").show("slow");
		$("#ans2_1y").hide();
	})
	$('#ques #ans2_2y').click(function() {
		$("#q3-3").show("slow");
		$("#ans2_2n").hide();
	})
	$('#ques #ans2_2n').click(function() {
		$("#q3-4").show("slow");
		$("#ans2_2y").hide();
	})

	$('#ques #ans3_1y').click(function() {
		$("#as1,#ans").show("slow");
		$("#ans3_1n").hide();
	})
	$('#ques #ans3_1n').click(function() {
		$("#as2,#ans").show("slow");
		$("#ans3_1y").hide();
	})
	$('#ques #ans3_2y').click(function() {
		$("#as3,#ans").show("slow");
		$("#ans3_2n").hide();
	})
	$('#ques #ans3_2n').click(function() {
		$("#as4,#ans").show("slow");
		$("#ans3_2y").hide();
	})
	$('#ques #ans3_3y').click(function() {
		$("#as5,#ans").show("slow");
		$("#ans3_3n").hide();
	})
	$('#ques #ans3_3n').click(function() {
		$("#as6,#ans").show("slow");
		$("#ans3_3y").hide();
	})
	$('#ques #ans3_4y').click(function() {
		$("#as7,ans").show("slow");
		$("#ans3_4n").hide();
	})
	$('#ques #ans3_4n').click(function() {
		$("#as8,ans").show("slow");
		$("#ans3_4y").hide();
	})

});


$(function() {
  $('#tabs').tabs({ heightStyle: 'content' });
});


$(document).ready(function(){
	$('.bt_car').click(function() {
		if ($(this).hasClass("arrow")) {
            $(this).children().text("+");
            $(this).removeClass("arrow");
        } else {
            $(this).children().text("-");
            $(this).addClass("arrow");
        }
		$(this).next().slideToggle();
	}).next().hide();
});


$(document).ready(function(){
	$('.prefec').click(function() {
		if ($(this).hasClass("arrow")) {
            $(this).children().text("+");
            $(this).removeClass("arrow");
        } else {
            $(this).children().text("-");
            $(this).addClass("arrow");
        }
		$(this).next("ul").slideToggle();
	}).next().hide();
});


$(document).ready(function(){
	setInterval(function(){
		$('#error').fadeOut(200,function(){$(this).fadeIn(200)});
	},2000);
});