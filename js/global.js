var ingress = {
	lang : $('body').attr('language'),
	pflichtfelder : ['flevel','fnick','fname','farea','fmail'],
	pflichtfelder2:['fname_invite','fmail_invite','ftime_invite'],
	nav : ['info','approval','imprint'],
	init : function() {
		//language
		if($.cookie('lang'))
			ingress.lang = $.cookie('lang');
	
		// intro animation
		ingress.intro_anim();

		$('#errorbox .button').click(function(e){
			e.preventDefault();
			$('#errorbox').fadeOut(500);
		});

		$('#approval').on('click','button.submit', function(e) {
			e.preventDefault();
			var postdata = {};
			var error = 0;
			var errormail = 0;
			var errorlevel = 0;
			
			if($("#fmail").val().match(/[a-z]|[A-Z]|@/)){
				if(!ingress.validateEmail($("#fmail").val())) errormail = 1;
			}

			if($("#flevel").val() == '–'){
				errorlevel = 1;
			}else{
				postdata['flevel'] = $("#flevel").val();
			}

			$('#approval input').each(function(){
				if($.inArray($(this).attr('id'),ingress.pflichtfelder) > -1 && $(this).val() == ''){
					error = 1;
					$(this).attr('class', 'error');
				}else{
					$(this).attr('class', '');
				}
				postdata[$(this).attr('name')] = $(this).val();
			});

			$('#approval input[type="checkbox"]').each(function(){
				if($(this).attr('checked')){
					postdata[$(this).attr('name')] = '(x)';
				}else{
					postdata[$(this).attr('name')] = '';
				}
			});

			postdata['flang'] = ingress.lang;
			postdata['fcode'] = 'VER-' + postdata['fnick'].toUpperCase().substr(0,3) + '-' + Math.random().toString(36).substr(2,8);
			postdata['fcomment'] = 'via approval site';

			if(error == 0 && errormail == 0 && errorlevel == 0) {
				$.post('?post',postdata, function(data) {
					//on success
					$('#form_intro').hide();
					$('#form_inner').hide();
					$('#logo').hide();
					$('#approval').attr('class','success');
					$('#approval input').each(function(){$(this).val('');});
					$('#errorbox').hide();
					$('div.success').fadeIn();
					$('#ver_code').html(postdata['fcode']);
				});
			} else {
				if(error == 1){
					$('#error').show();
				}else{
					$('#error').hide();
				}

				if(errorlevel == 1){
					$('#errorlevel').show();
					$('#flevel').attr('class', 'error');
				}else{
					$('#errorlevel').hide();
					$('#flevel').attr('class', '');
				}

				if(errormail == 1){
					$('#errormail').show();
					$('#fmail').attr('class', 'error');
				}else{
					$('#errormail').hide();
				}

				$('#errorbox').fadeIn(500);
			}
		});
		$("#invite").on(
			"click", "button.submit",
			function(e){
				e.preventDefault();
				var errorMail = false;
				var result = {};
				var errors = 0;
				if($("#fmail_invite").val().match(/[a-z]|[A-Z]|@/)) {
					if(!ingress.validateEmail($("#fmail_invite").val())) {
						errorMail = true;
					}
				}
				$("#invite input").each(function(){
					if($.inArray( $(this).attr("id"),ingress.pflichtfelder2) > -1 && $(this).val() == ""){
						errors++;
						$(this).attr("class","error");
					} else {
						$(this).attr("class","");
					}
					result[$(this).attr("name")]=$(this).val();
				});

				if(!errorMail && errors == 0){
					$.post("?postinvite",result,function(e){
						$("#form_intro_invite").hide();
						$("#form_inner_invite").hide();
						$("#logo_invite").hide();
						$("#invite").attr("class","success");
						$("#invite input").each(function(){
							$(this).val("");
						});
						$("#errorbox_invite").hide();
						$("#invite div.success").fadeIn();
					})
				} else {
					if(errors>0){
						$("#error_invite").show()
					}else{
						$("#error_invite").hide()
					}
					if(errorMail == true){
						$("#errormail_invite").show();
						$("#fmail_invite").attr("class","error");
					}else{
						$("#errormail_invite").hide();
					}
					$("#errorbox_invite").fadeIn(500);
				}
			});
	},
	validateEmail : function(email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test( email );
	},
	changeLang : function(lang) {
		$.cookie('lang', lang, { expires: 365 });
		$('#wrapper_out').fadeOut(500);
		location.reload(true);

		// setTimeout(function(){
		// 	$.ajax({
		// 		type: "GET",
		// 		url: "../lang/" + lang + ".xml",
		// 		dataType: "xml",
		// 		success: ingress.parseXml
		// 	});
		// },500);
		// $('#wrapper_out').fadeIn(1000);
	},
	intro_anim : function() {
		if(window.location.hash != ''){
			var h = window.location.hash.replace('#', '');
			if($.inArray(h,ingress.nav) > -1){			
				$('#nav a.active').removeClass('active');
				$('#nav a.'+ h).addClass('active');
				$('#info').hide();
				$('#' + h).show();
			}
		}
		setTimeout(function(){
			$('#wrapper_out').fadeIn(700);
			$('#header').fadeIn(700);
			$('#footer').fadeIn(700);
			$('#inner').fadeIn(700);
			if(h == 'imprint')
				$('#' + h).show();
				// $('#' + h).show().tinyscrollbar_update();

		},200);
	},
	toggle_content : function() {
		var h = window.location.hash.replace('#', '');
		if($.inArray(h,ingress.nav) > -1){
			$('#nav a.active').removeClass('active');
			$('#nav a.'+ h).addClass('active');
			$('#inner').fadeToggle(500);
			setTimeout(function(){
				$('#inner > div').hide();
				$('#' + h).show().tinyscrollbar_update();
			},500);
			$('#inner').fadeToggle(500);
		}
	}
};

$(document).ready(function(){
	$(window).load( function() {
		ingress.init();
	});
	$(window).on('hashchange', function() {
		ingress.toggle_content();
	});
});