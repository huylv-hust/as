$(function(){
	setInterval(function(){
		$('.blink').fadeOut(200,function(){$(this).fadeIn(500)});
	},1500);
});



$(function(e)
{
	$("#dialog").dialog(
	{
		autoOpen: false,
		width: 800,
		title: "ご予約の前に必ず下記をご確認下さい。",
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
		width: 575,
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
		width: 575,
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
			$("#qt1").show("slow");
			$("#qt2").css("display", "none");
		} else if(num == 1){
			$("#qt2").show("slow");
			$("#qt1").css("display", "none");
		}
	});
});


$(function() {
	$("[name='car_size_code']").click(function(){
		var num = $("[name='car_size_code']").index(this);
		if(num == 0){
			$("#wgt1").show("slow");
			$("#wgt2,#wgt3").css("display", "none");
		} else if(num == 1 || num == 2){
			$("#wgt2").show("slow");
			$("#wgt1,#wgt3").css("display", "none");
		} else if(num == 3 || num == 4){
			$("#wgt3").show("slow");
			$("#wgt2,#wgt1").css("display", "none");
		}
	});
});


// global navigation

$(function() {
	$("#globalnavi li").hover(function() {
		$(this).children("#inner").css("display", "block");
		$(this).children("a").css("background", "#C0F7FF");
	}, function() {
		$(this).children("#inner").css("display", "none");
		$(this).children("a").css("background", "none");
	});
});




$(function() {
	$("#globalnavi li").hover(function() {
		sethover = setTimeout(function(){
			$("#bgb").fadeIn("slow");
		},500);
	}, function() {
		$("#bgb").css("display", "none");
		clearTimeout(sethover);
	});
});


$(function()
{
	$(window).scroll(function()
	{
		if ($(this).scrollTop() > 94) {
			$('#globalnavi').css({"position":"fixed","top":"0px"});
			$('#globalnavi ul li #inner').css({"top":"60px"});
			$('#bgb').css({"top":"0px"});
		} else {
			$('#globalnavi').css("position","static");
			$('#globalnavi ul li #inner').css({"top":"150px"});
			$('#bgb').css({"top":"150px"});
		}
	});

});




$(function() {
    $('input[type=checkbox],input[type=radio]').change(
        function() {
            $('input').closest('label').css("background-color","#fff");
            $(':checked').closest('label').css("background-color","#ADE6F7");
        }
    ).trigger('change');
});


$(document).ready(function(){
	setInterval(function(){
		$('#error,#resform #bta p').fadeOut(200,function(){$(this).fadeIn(200)});
	},2000);
});


$(window).load(function(){
	$('.prefec').click(function() {
		$(this).next("ul").slideToggle();
		}).next().hide();
});


$(window).load(function(){
	$('#ques #ans1_y').click(function() {
		$("#q2-1").show("slow");
		$(".reload").show();
		$("#ans1_n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans1_n').click(function() {
		$("#q2-2").show("slow");
		$(".reload").show();
		$("#ans1_y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})

	$('#ques #ans2_1y').click(function() {
		$("#q3-1").show("slow");
		$("#ans2_1n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans2_1n').click(function() {
		$("#q3-2").show("slow");
		$("#ans2_1y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans2_2y').click(function() {
		$("#q3-3").show("slow");
		$("#ans2_2n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans2_2n').click(function() {
		$("#q3-4").show("slow");
		$("#ans2_2y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})

	$('#ques #ans3_1y').click(function() {
		$("#as1,#ans").show("slow");
		$("#ans3_1n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_1n').click(function() {
		$("#as2,#ans").show("slow");
		$("#ans3_1y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_2y').click(function() {
		$("#as3,#ans").show("slow");
		$("#ans3_2n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_2n').click(function() {
		$("#as4,#ans").show("slow");
		$("#ans3_2y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_3y').click(function() {
		$("#as5,#ans").show("slow");
		$("#ans3_3n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_3n').click(function() {
		$("#as6,#ans").show("slow");
		$("#ans3_3y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_4y').click(function() {
		$("#as7,ans").show("slow");
		$("#ans3_4n").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})
	$('#ques #ans3_4n').click(function() {
		$("#as8,ans").show("slow");
		$("#ans3_4y").hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	})

});


$(function() {
  $('#tabs').tabs({ heightStyle: 'content' });
});





$(function() {
  var ts = $('#mainte #tabs');
  ts.tabs();

  $('#Map area').click(function(e) {
    ts.tabs('option', 'active', $(this).data('key'));
  });
});



$(function() {

    $('#jpgmap').mapster({
		singleSelect:true,
		altImageFill: true,
		altImageStroke: false,
		altImageOpacity: 0.7,
		render_highlight:{ altImage : '../assets/img/common/map2.jpg' },
		mapKey:'region'
	});

});