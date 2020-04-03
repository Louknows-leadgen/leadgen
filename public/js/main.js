$(document).ready(function(){

	/*
	|---------------------------
	|	Pusher notification
	|---------------------------
	*/

	var pusher = new Pusher('62438edb18210a10439b', {
      cluster: 'ap1',
      forceTLS: true
    });

	var channel = pusher.subscribe('my-channel');
	channel.bind('my-event', function(data) {
		var notif = document.querySelector('.bell');
		if(notif){
			notif.dataset.after = data.count;
			document.querySelector('.bell').classList.remove('bell-notif');
			document.querySelector('.bell').classList.add('bell-notif');
		}

		// var notif = document.querySelector('.bell');
		// notif.dataset.after = data.count;
		// document.querySelector('.bell').classList.add('bell-notif');
	});


	/*
	|---------------------------
	|	Bootstrap initialization
	|---------------------------
	*/

	 $('[data-toggle="tooltip"]').tooltip();


	 /*
	|---------------------------
	|	CKEDITOR initialization
	|   - applied automatically to all textarea with the class = ckeditor 
	|     and id = ckeditor
	|---------------------------
	*/

	//if($("textarea[id='ckeditor']").length)
	//	CKEDITOR.replace('ckeditor');
	


	/*
	|-------------------------------------------------------------------------
    | initialize datefield
    |-------------------------------------------------------------------------
	*/
	

	// callback function
	var date = function(){
		tail.DateTime(".date",{
			dateFormat: 'mm/dd/YYYY',
			timeFormat: false
		});
	};

	var datetime = function(){
		tail.DateTime(".datetime",{
			dateFormat: 'mm/dd/YYYY',
			timeFormat: "GG:ii A",
			timeIncrement: false,
			timeSeconds: false
		});
	};

	// initialize date and datetime
	date();
	datetime();

	// reinitialize dynamic elements for datetime
	var elementToObserve = document.querySelector("body");
	var obsrv_date = new MutationObserver(date);
	var obsrv_datetime = new MutationObserver(datetime);
	obsrv_date.observe(elementToObserve, {subtree: true, childList: true});
	obsrv_datetime.observe(elementToObserve, {subtree: true, childList: true});



	//-------------------------------------------------------------------------


	/*
	|-------------------------------------------------------------------------
    | Validation to application form
    |-------------------------------------------------------------------------
	*/

	$('body').on('blur','.validate:not(.date)',function(){
		var inp = $(this);
		var notif = inp.siblings('span.invalid-feedback');
		var val = inp.val();
		var field_name = inp.attr('name');
		var data = {};
		data[field_name] = val;

		$.ajax({
			url: '/application/validate',
			method: 'GET',
			data: data,
			success: function(data){
				if($.isEmptyObject(data.error)){
                    inp.removeClass('is-invalid');
                    notif.empty();
                }else{
                    inp.addClass('is-invalid');
                    notif.text(data.error);
                }
			}
		});
	});


	$(document).on('change','.validate.date',function(){
		var inp = $(this);
		var notif = inp.siblings('span.invalid-feedback');
		var val = inp.val();
		var field_name = inp.attr('name');
		var data = {};
		data[field_name] = val;

		$.ajax({
			url: '/application/validate',
			method: 'GET',
			data: data,
			success: function(data){
				if($.isEmptyObject(data.error)){
                    inp.removeClass('is-invalid');
                    notif.empty();
                }else{
                    inp.addClass('is-invalid');
                    notif.text(data.error);
                }
			}
		});
	});



	//-------------------------------------------------------------------------


	/*
	 |---------------------------------------------
	 |		Add More Items on the Personal Details
	 |---------------------------------------------
	*/

	$(".j_add-item").on("click", function(){
		var ids = [];
		var last_id = 0;
		var wrapper = '';
		var item = '';
		var url = '';
		var type = $(this).data('type');

		// Controller: PersonsController
		// method: new
		switch(type){
			case 'spouse':
							wrapper = $('.j_spouse-list');
							item = $('.j_spouse-item');
							url = '/person/spouse/new';
							break;
			case 'contact':
							wrapper = $('.j_contact-list');
							item = $('.j_contact-item');
							url = '/person/contact/new';
							break;
			case 'dependent':
							wrapper = $('.j_dependent-list');
							item = $('.j_dependent-item');
							url = '/person/dependent/new';
							break;
			case 'college':
							wrapper = $('.j_college-list');
							item = $('.j_college-item');
							url = '/person/college/new';
							break;
			case 'work':
							wrapper = $('.j_work-list');
							item = $('.j_work-item');
							url = '/person/work/new';
							break;											
		}	

		if(item.length){
	        item.each(function(){
	            ids.push($(this).data("id"));
	        });

	        last_id = Math.max.apply(Math, ids) + 1;
	    }

		$.ajax({
			url: url,
			method: 'GET',
			data: {
				id: last_id
			},
			success: function(result){
				wrapper.append(result);
			}
		});

	});

	$(".box").on("click",".jc_remove", function(){
		var element = $(this).parent();
		element.fadeOut(300,function(){
			element.remove();
		});
	});

	//---------------------------------------------------

	/*
	 |----------------------------------------------------
	 |		Search Functionalities
	 |----------------------------------------------------
	*/

	$("#search-applicant").on("input", $.debounce(200,function(){
		var search_text = $(this).val();
		var status_filter = $("#filter-by-status").val();
		var container = $(".applicant-list");

		$.ajax({
			url: '/applicants/search',
			method: 'GET',
			data: {
				skey: search_text,
				stat_filter: status_filter
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	}));

	$(document).on('change','#filter-by-status',function(){
		var status_filter = $(this).val();
		var search_text = $('#search-applicant').val();
		var container = $(".applicant-list");

		$.ajax({
			url: '/applicants/search',
			method: 'GET',
			data: {
				skey: search_text,
				stat_filter: status_filter
			},
			success: function(result){
				container.empty().append(result);
			}
		});
	});


	$("#search-candidate").on("input", $.debounce(200,function(){
		var search_text = $(this).val();

		var container = $(".candidate-list");

		$.ajax({
			url: '/application/candidates/search',
			method: 'GET',
			data: {
				skey: search_text
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	}));

	$("#search-interview").on("input", $.debounce(200,function(){
		var search_text = $(this).val();

		var container = $(".interview-list");

		$.ajax({
			url: '/interviews/history/search',
			method: 'GET',
			data: {
				skey: search_text
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	}));

	$("#search-offer").on("click", function(){
		var search_text = $('#search-input').val();

		var container = $(".jo-list");

		$.ajax({
			url: '/job-offerings/search',
			method: 'GET',
			data: {
				skey: search_text
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	});

	$('#search-input').on('keypress',function(e){
		if(e.which == 13){
			$("#search-offer").click();
		}
	}).on('blur',function(){
		$("#search-offer").click();
	});


	$(document).on("click","#search-employee-btn", function(){
		var dept_filter = $("#filter-by-department").val();
		var search_text = $("#search-employee").val();
		var scope = $("#search-employee").data('scope');
		var container = $(".employee-list");

		$.ajax({
			url: '/employees/search',
			method: 'GET',
			data: {
				skey: search_text,
				dept_filter: dept_filter,
				scope: scope
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	});

	$(document).on('change','#filter-by-department,#search-employee',function(){
		$("#search-employee-btn").click();
	});

	$(document).on('keypress','#search-employee',function(e){
		if(e.which == '13')
			$("#search-employee-btn").click();
	});


	//-----------------------------------------------------

	$(".dynamic-container").on("submit",".j_fi-submit",function(){
		var button = $(this).find("[name='submit']");
		button.attr('disabled',true);
		button.css({'cursor':'default'});
		button.html("<span class='spinner-border spinner-border-sm'></span> Submitting...");
	});

	$(".dynamic-container").on("click",".j_edit-fin",function(){
		var fin_id = $(this).data("id");
		var container = $(this).parents(".dynamic-container");

		container.load('/final_interviews/'+ fin_id +'/edit',function(){
			CKEDITOR.replace('remarks');
		});

	});

	$(".dynamic-container").on("click",".j_cancel",function(){
		var type = $(this).data("type");
		var id = $(this).data('id');
		var container = $(this).parents(".dynamic-container");
		var url = '';

		switch(type){
			case 'fin-interview':
				url = '/final_interview/'+ id + '/form'; break;
			case 'jo':
				url = '/job_orientation/' + id + '/form'; break;
		}

		container.load(url,function(){
			if($(".dynamic-container:not(.d-none) textarea[name='remarks']").length)
				CKEDITOR.replace('remarks');
		});
	});

	$(".dynamic-container").on('submit','form.update',function(e){
		var form_data = {};
		var url = $(this).attr("action");
		var container = $(this).parent();

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: 'PUT',
			data: form_data,
			success: function(response){
				//container.empty().append(result);
				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[name='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
                }else{
                	container.load(response.url,function(){
                		if($(".dynamic-container:not(.d-none) textarea[name='remarks']").length)
                			CKEDITOR.replace('remarks');
                		
                		var notif = $('.notif-process');
                		notif.show(0,function(){
                			setTimeout(function(){
                				notif.fadeOut(500)
                			},1000);
                		});
                	});
                }
			}
		});
	});


	$('.process').on('click','.process-tab:not(.actv)',function(){
		var cur_actv = $('.actv');
		var selected = $(this);
		var procedure = selected.data('process');

		$("[data-tab]").removeClass('d-none').addClass('d-none');
		$("[data-tab='"+ procedure +"']").removeClass('d-none');


		cur_actv.removeClass('text-primary border-top border-bottom border-left actv')
	        	.addClass('bg-secondary text-light');

		selected.removeClass('bg-secondary text-light')
	        	.addClass('text-primary border-top border-bottom border-left actv');

	});

	$(".dynamic-container").on("click",".edit_jo",function(){
		var jo_id = $(this).data("id");
		var container = $(this).parents(".dynamic-container");

		container.load('/job_orientations/'+ jo_id +'/edit');

	});

	/*
	|---------------------------
	| Resource Details Events
	|---------------------------
	*/

	// navigating on the tabs
	$(".resource-nav").on("click",".nav-tab:not(.active)", function(){
		var tab = $(this).data("tab");

		$(".active").removeClass("active");
		$(this).addClass("active");

		$("[data-tabcontent]").removeClass('d-none').addClass('d-none');
		$("[data-tabcontent='"+ tab +"']").removeClass('d-none');

	});

	$('.grp').on('click','.edit',function(){
		var id = $(this).data('id');
		var tab = $(this).data('tab');
		var container = $(this).parent();
		var url = '';

		switch(tab){
			case 'basic':
				url = '/resource-details/basic/'+ id +'/edit'; break;
			case 'spouse':
				url = '/resource-details/spouse/'+ id +'/edit'; break;
			case 'contact':
				url = '/resource-details/contact/'+ id +'/edit'; break;
			case 'dependent':
				url = '/resource-details/dependent/'+ id +'/edit'; break;
			case 'elementary':
				url = '/resource-details/elementary/'+ id +'/edit'; break;
			case 'high':
				url = '/resource-details/high/'+ id +'/edit'; break;
			case 'college':
				url = '/resource-details/college/'+ id +'/edit'; break;			
			case 'work':
				url = '/resource-details/work/'+ id +'/edit'; break;				
		}

		container.load(url);
	});

	$(".grp").on("click",".j_abort",function(){
		var tab = $(this).data("tab");
		var id = $(this).data('id');
		var parent = '.' + $(this).data('parent');
		var container = $(this).parents(parent);
		var url = '';

		switch(tab){
			case 'basic':
				url = '/resource-details/basic/' + id; break;
			case 'spouse':
				url = '/resource-details/spouse/' + id + '/show'; break;
			case 'contact':
				url = '/resource-details/contact/' + id + '/show'; break;
			case 'dependent':
				url = '/resource-details/dependent/' + id + '/show'; break;
			case 'elementary':
				url = '/resource-details/elementary/' + id + '/show'; break;
			case 'high':
				url = '/resource-details/high/' + id + '/show'; break;
			case 'college':
				url = '/resource-details/college/' + id + '/show'; break;			
			case 'work':
				url = '/resource-details/work/' + id + '/show'; break;			
		}

		$(container).load(url);
	});

	$(".grp").on('submit','form.update',function(e){
		var form_data = {};
		var url = $(this).attr("action");
		var container = $(this).parent();

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: 'PUT',
			data: form_data,
			success: function(response){
				//container.empty().append(result);
				$('.is-invalid').removeClass('is-invalid');
				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[name='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
                }else{
                	container.load(response.url);
                }
			}
		});
	});

	$(".grp").on("click",".new",function(){
		var parent = '.' + $(this).data('parent');
		var container = $(this).parents(parent);
		var tab = $(this).data('tab');
		var id = $(this).data('id');
		var url = '';

		var empty_cntr = $(this).parent().siblings('.empty');

		switch(tab){
			case 'spouse':
				url = '/resource-details/spouse/new'; break;
			case 'contact':
				url = '/resource-details/contact/new'; break;
			case 'dependent':
				url = '/resource-details/dependent/new'; break;
			case 'college':
				url = '/resource-details/college/new'; break;	
			case 'work':
				url = '/resource-details/work/new'; break;		
		}

		$.ajax({
			url: url,
			method: 'GET',
			data: {
				person_id: id
			},
			success: function(response){
				container.append(response);
				empty_cntr.css({'display':'none'});
			}
		});
	});

	$(".grp").on("click",".cancel-new", function(){
		var parent = '.' + $(this).data('parent');
		var container = $(this).parents(parent);

		var empty_cntr = $(this).parents('.grp-item').siblings('.empty');

		container.fadeOut(300,function(){
			container.remove();
			if(!$('.grp:not(.d-none)').find('.grp-item').length)
				empty_cntr.css({'display':''});
		});
	});

	$(".grp").on("click",".delete", function(){
		var parent = '.' + $(this).data('parent');
		var tab = $(this).data('tab');
		var id = $(this).data('id');
		var container = $(this).parents(parent);
		var url = '';

		switch(tab){
			case 'spouse':
				url = '/resource-details/spouse/' + id; break;
			case 'contact':
				url = '/resource-details/contact/' + id; break;
			case 'dependent':
				url = '/resource-details/dependent/' + id; break;
			case 'college':
				url = '/resource-details/college/' + id; break;	
			case 'work':
				url = '/resource-details/work/' + id; break;			
		}

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			url: url,
			method: 'DELETE',
			success: function(){
				container.fadeOut(300,function(){
					container.remove();
				});
			}
		});

	});

	$(".grp").on('submit','form.store',function(e){
		var form_data = {};
		var url = $(this).attr("action");
		var container = $(this).parent();

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: 'POST',
			data: form_data,
			success: function(response){
				//container.empty().append(result);
				$('.is-invalid').removeClass('is-invalid');
				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[name='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
                }else{
                	container.load(response.url);
                }
			}
		});
	});

	/*
	|---------------------------
	| User details update
	|---------------------------
	*/

	$(document).on("click",".edit-email",function(){
		var email_form = $(".email-form");
		
		$(".email-show").removeClass('d-none').addClass('d-none');
		email_form.removeClass('d-none');
		email_form.find('.input-underline').focus();
	});

	$(document).on("click",".cncl-email-update",function(){
		var input_email = $(".input-underline");
		var orig_email_val = $(".email-val").text();
		
		input_email.val(orig_email_val);

		$(".email-show").removeClass('d-none');
		$(".email-form").removeClass('d-none').addClass('d-none');
	});

	$(".email-form").on("submit","form",function(e){
		var email = $(this).find("[name='email']").val();

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
	    	url: '/account/update-email',
	    	method: 'PUT',
	    	data: {
	    		email: email
	    	},
	    	success: function(response){
	    		$(".email-val").text(response);

	    		$(".email-form").removeClass('d-none').addClass('d-none');
	    		$(".email-show").removeClass('d-none');
	    	}
	    });

	});

	$(".acnt-tab").on("click",function(){
		var tab = $(this).data('tab');
		var actv_tabcontent = $('.' + tab);

		$(".actv-acnt-opt").removeClass('actv-acnt-opt');
		$(this).removeClass('actv-acnt-opt').addClass('actv-acnt-opt');

		//.acnt-tabcontent
		$('.acnt-tabcontent').removeClass('d-none').addClass('d-none');
		actv_tabcontent.removeClass('d-none');
	});


	$("form.password-update").on('submit',function(e){
		var form_data = {};
		var url = $(this).attr("action");
		var container = $(this).parent();

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: 'PUT',
			data: form_data,
			success: function(response){
				//container.empty().append(result);
				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[name='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
                }else{
                	$(".invalid-feedback").empty();
                	$(".is-invalid").removeClass('is-invalid');

                	var msg_container = "<div class='alert alert-success alert-dismissible fade show'>"+ response.success +"<span class='close' data-dismiss='alert'>&times;</span></div>"
                	$('.success-msg').empty().append(msg_container);

                	$('.password-update input').val('');
                }
			}
		});
	});


	$('.close-toggle').on("click",function(){
		$('.side-menu').css({'display':'none'});
	});

	$('.toggle-icon').on("click",function(){
		$('.side-menu').css({'display':'block'});
	});

	/*
	 |---------------------------
	 |  Test Calculation
	 |---------------------------
	*/

	$('.dynamic-container').on('input','.typing_test input.test_input',function(){
		var passing_score = 28;
		var score = $(this).val();
		var result_input = $('.typing_test input.test_result');
		

		if(score){
			var result = checkResult(score,passing_score);
			if(result)
				result_input.attr('value','Pass');
			else
				result_input.attr('value','Fail');
		}else{
			result_input.attr('value','');
		}
	});

	$('.dynamic-container').on('input','.comprehension_test input.test_input',function(){
		var passing_score = 5;
		var score = $(this).val();
		var result_input = $('.comprehension_test input.test_result');

		if(score){
			var result = checkResult(score,passing_score);
			if(result)
				result_input.attr('value','Pass');
			else
				result_input.attr('value','Fail');
		}else{
			result_input.attr('value','');
		}
	});

	function checkResult(score,passing_score){
		return score >= passing_score ? true : false;
	}

	//------------------------------


	/*
	|-------------------------------
	|         Remove Interview
	|-------------------------------
	*/
	$(document).on('click','.remove-trigger',function(){
		var id = $(this).data('id');
		$('.bg-notif').fadeIn(200,function(){
			$('.bg-notif .btn-primary').attr('data-id',id);
		});
	});

	$(document).on('click','.bg-notif .btn-secondary',function(){
		$('.bg-notif').fadeOut(200,function(){
			$('.bg-notif .btn-primary').attr('data-id','');
		});
	});

	$(document).on('click','.bg-notif .btn-primary',function(){
		var id = $(this).data('id');
		var page = $(this).data('page');
		var method = '';
		var url = '';
		var data = {};

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		switch(page){
			case 'interview-history':
					method = 'DELETE';
					url = '/interviews/history/' + id;
					break;
			// when tagging applicant to no show in job offer
			case 'job-offering'	:
					method = 'PUT';
					url = '/applicants/' + id;
					data['application_status_id'] = 8 // 8 is for job offer - no show
					break;
			// when tagging applicant to no show in final interview
			case 'candidate-list'	:
					method = 'PUT';
					url = '/final_interviews/' + id + '/no_show';
					break;		
		}


		$.ajax({
			url: url,
			method: method,
			data: data,
			beforeSend: function(){
				$('.bg-notif .btn-primary').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
			},
			success: function(){
				location.reload();
			}
		});
		
	});


	/*
	|-------------------------------
	|         Declined Offer
	|-------------------------------
	*/

	$(document).on('click','.decline-offer-trig',function(){
		var id = $(this).data('id');
		$('.decline-confirm-bg').fadeIn(200,function(){
			$('.decline-confirm-bg .btn-primary').attr('data-id',id);
		});
	});

	$(document).on('click','.decline-confirm-bg .btn-secondary',function(){
		$('.decline-confirm-bg').fadeOut(200,function(){
			$('.decline-confirm-bg .btn-primary').attr('data-id','');
		});
	});

	$(document).on('click','.decline-confirm-bg .btn-primary',function(){
		var id = $(this).data('id');

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
			url: '/applicants/' + id + '/decline_offer',
			method: 'PUT',
			beforeSend: function(){
				$('.decline-confirm-bg .btn-primary').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
			},
			success: function(){
				location.reload();
			}
		});
	});



	//------------------------------

	$(document).on('click','.mark-read',function(e){
		e.preventDefault();

		var notif_id = $(this).data('id');
		var redirect_url = $(this).attr('href');
		var endpoint = '/hiring-staff/notifications/' + notif_id;

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			url: endpoint,
			method: 'DELETE',
			success: function(){
				location.href = redirect_url;
			}
		});
	});


	$(document).on('click','.hit',function(){
		var id = $(this).data('id');

		location.href = '/blacklists/' + id;
	});


	/*
	|------------------------------------------------
	|				Adding New Employee
	|------------------------------------------------*/


	$(document).on('click','.custom-modal',function(){
		$('.modal-list ul>li').css({'display':''});
		$('.modal-search-inp').val('');
		$('.otf-add').find('span.spinner-grow').remove();
		$('.otf-input').val('').removeClass('is-invalid');
	});

	$(document).on('click','.list-item',function(){
		var modal = $(this).parents('.modal');
		var modal_type = $(this).data('modal');
		var input = $("input[data-modal='"+ modal_type +"']");
		var val = $(this).text().trim();

		input.val(val);
		modal.modal('hide');
	});

	$(document).on('click','.modal-search-btn',function(){
		var list_group = $(this).parents('.modal-body').find('.list-group');
		var lists = list_group.children();
		var search_key = $(this).parents('.input-group').find('input').val().toUpperCase().trim();

		var size = lists.length;
		var i;
		for(i = 0; i < size; i++){
			var list_txt = $(lists[i]).text().toUpperCase().trim();
			if(list_txt.search(search_key) >= 0)
				$(lists[i]).css({'display':''});
			else
				$(lists[i]).css({'display':'none'});
		}
	});

	$(document).on('keypress','.modal-search-inp',function(e){
		if(e.which == '13')
			$('.modal-search-btn').click();
	});

	$(document).on('click','.otf-add',function(){
		var add_type = $(this).data('add');
		var modal = $(this).parents('.modal');
		var btn = $(this).find('span');
		var input = $(this).siblings('input'); // input field containing the new item
		var lists = $(this).parents('.modal').find('.list-item');
		var notif = $(this).siblings('.invalid-feedback');
		var url;
		var form_input;
		var data = {};

		// cleanup value
		var val = input.val().trim();
		val = val.charAt(0).toUpperCase() + val.slice(1).toLowerCase();

		switch(add_type){
			case 'cluster':
					url = '/clusters';
					form_input = $("input[data-modal='cluster']");
					data['cluster_name'] = val;
					break;
			case 'contract':
					url = '/contracts';
					form_input = $("input[data-modal='contract']");
					data['contract_name'] = val;
					break;
		}
		

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			url: url,
			method: 'POST',
			data: data,
			beforeSend: function(){
				btn.prepend("<span class='spinner-grow spinner-grow-sm'></span>");
			},
			success: function(response){
				if($.isEmptyObject(response.errors)){
					// insert value to the form input
					form_input.val(val);
					modal.modal('hide');

					// insert the newly added item to the DOM
					var i;
					var el = '<li class="list-group-item list-item" data-modal="'+ add_type +'">'+ val +'</li>';
					var item;
					for(i = 0; i < lists.length; i++){
						if($(lists[i]).text().trim().toUpperCase() < val.toUpperCase()){
							item = lists[i];
						}
					}

					$(el).insertAfter(item);

					input.removeClass('is-invalid');
					notif.empty();
				}else{
					input.addClass('is-invalid');
					var key = Object.keys(response.errors)[0];
					notif.text(response.errors[key]);
					btn.find('span.spinner-grow').remove();
				}
			}
		});
	});


	$(document).on('submit','form.create_employee',function(e){
		var form_data = {};
		var url = $(this).attr("action");

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
	    	url: url,
	    	method: 'post',
	    	data: form_data,
	    	beforeSend: function(){
	    		$('.btn-emp-submit').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
	    	},
	    	complete: function(){
	    		$('.btn-emp-submit').text('Create');
	    	},
	    	success: function(response){
	    		// record successfully added
	    		if($.isEmptyObject(response.errors)){
	    			location.href = '/employees/'+ response.id;
	    		}
	    		// invalid input encountered
	    		else{
	    			$("span[role='alert']").text('');
	    			$("input.is-invalid").removeClass('is-invalid');
	    			for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[id='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
	    		}
	    	}
	    });

	});

	$(document).on('submit','form.update_employee',function(e){
		var form_data = {};
		var url = $(this).attr("action");

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: 'PUT',
			data: form_data,
			beforeSend: function(){
	    		$('.btn-emp-submit').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
	    	},
	    	complete: function(){
	    		$('.btn-emp-submit').text('Update');
	    	},
			success: function(response){
				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[id='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
                }else{
            		var notif = $('.employee-notif');
            		notif.removeClass('d-none');
            		notif.fadeIn(500);
                }
			}
		});
	});


	$(document).on('click','button[data-close]',function(){
		var parent_name = $(this).data('close');
		var parent = $("."+parent_name);
		parent.fadeOut(300,function(){
			parent.addClass('d-none');
		});
	});


	$(document).on('submit','form.employee_forms',function(e){
		var form = $(this);
		var form_type = form.data('form');
		var form_data = {};
		var url = $(this).attr("action");
		var method = $(this).attr('method');

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: method,
			data: form_data,
			beforeSend: function(){
	    		$('.btn-emp-submit').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
	    	},
	    	complete: function(){
	    		$('.btn-emp-submit').text('Update');
	    	},
			success: function(response){
				if(method == 'POST'){
					var id = response.id;
					form.attr('method','PUT');
					switch(form_type){
						case 'government_detail':
							form.attr('action','/government_details/'+ id);
							break
						case 'compensation':
							form.attr('action','/compensations/'+ id);
							break;
					}
					
				}

				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[id='"+ key +"']").addClass('is-invalid');
					        $("span."+ key).empty().append(response.errors[key]);
					    }
					}
                }else{
            		var notif = $('.employee-notif');
            		notif.removeClass('d-none');
            		notif.fadeIn(500);
                }
			}
		});
	});

	$(document).on('change','#position',function(){
		var position = $(this).val();
		var url = '/api/jobs/' + position;

		var dept_name_input = $('#department_name');
		var dept_id_input = $('#department_id');
		
		$.ajax({
			url: url,
			method: 'get',
			success: function(response){
				dept_name_input.val(response.department_name);
				dept_id_input.val(response.department_id);
			}
		});
	});

	$(document).on('click','.hmo-new',function(){
		$(this).hide();
		$('.hide').show();
	});

	$(document).on('click','.hmo-cancel',function(){
		$('.hmo-new').show();
		$('.hide').hide(0,function(){
			$('.hide input').val('');
		});
	});

	$(document).on('submit','.hmo-form',function(e){
		var form_data = {};
		var url = $(this).attr("action");
		var method = $(this).attr("method");

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
	    	url: url,
	    	method: method,
	    	data: form_data,
	    	beforeSend: function(){
	    		$('.dependent_hmo_save').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
	    	},
	    	complete: function(){
	    		$('.dependent_hmo_save').html("Save");
	    	},
	    	success: function(response){
	    		if(!$.isEmptyObject(response.errors)){
	    			$('.notif-box ul').empty();
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[name='"+ key +"']").addClass('is-invalid');
					        $('.notif-box ul').append('<li>' + response.errors[key] + '</li>');
					    	$('.notif-box').removeClass('alert-success d-none')
					                       .addClass('alert-danger');
					    }
					}
                }else{
                	var name = $("input[name='name']").val();
                	var hmo_no = $("input[name='hmo_id']").val();
                	var id = response.id;

                	var row =  `<tr data-id="`+ id +`">
									<td>
										<input type="text" class="form-control form-control-sm border border-0" value="`+ name +`" readonly>
									</td>
									<td class="d-flex align-items-center">
										<input type="text" class="form-control form-control-sm border border-0 mr-2" value="`+ hmo_no +`" readonly>
										<span class="btn btn-danger badge rmv-hmo-trg" data-id="`+ id +`">-</span>
									</td>
								</tr>`;

					$(row).insertBefore($('tr.hide'));
					$('.hmo-cancel').click();
					$('.notif-box ul').empty()
									  .append('<li>' + response.success + '</li>');
					$('.notif-box').removeClass('alert-danger d-none')
					               .addClass('alert-success');
                }
	    	}
	    });

	});


	$(document).on('submit','.update_hmo',function(e){
		var form_data = {};
		var url = $(this).attr("action");
		var method = $(this).attr("method");

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
	    	url: url,
	    	method: method,
	    	data: form_data,
	    	beforeSend: function(){
	    		$('.update_hmo button').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
	    	},
	    	complete: function(){
	    		$('.update_hmo button').html("Submit");
	    	},
	    	success: function(response){
	    		if(!$.isEmptyObject(response.errors)){
	    			$('.notif-box ul').empty();
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        $("input[name='"+ key +"']").addClass('is-invalid');
					        $('.notif-box ul').append('<li>' + response.errors[key] + '</li>');
					    	$('.notif-box').removeClass('alert-success d-none')
					                       .addClass('alert-danger');
					    }
					}
                }else{
					$('.notif-box ul').empty()
									  .append('<li>' + response.success + '</li>');
					$('.notif-box').removeClass('alert-danger d-none')
					               .addClass('alert-success');
                }
	    	}
	    });

	});


	$('a.close').on('click',function(e){
		$('.notif-box').addClass('d-none');
		$('.hmo_input').removeClass('is-invalid');
	});

	$(document).on('click','.rmv-hmo-trg',function(){
		var id = $(this).data('id');
		$('.bg-notif-gen').fadeIn(200,function(){
			$('.bg-notif-gen .btn-primary').attr('data-id',id);
		});
	});

	$(document).on('click','.bg-notif-gen .btn-secondary',function(){
		$('.bg-notif-gen').fadeOut(200);
	});

	$(document).on('click','.rmv-dpndt-hmo',function(){
		var id = $(this).data('id');
		var url = '/hmo/'+ id + '/destroy';

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			url: url,
			method: 'DELETE',
			beforeSend: function(){
				$('.rmv-dpndt-hmo').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
			},
			complete: function(){
				$('.bg-notif-gen').fadeOut(200);
				$('.rmv-dpndt-hmo').text('Yes');
				$("tr[data-id='"+ id +"']").remove();
			},
			success: function(response){
				$('.notif-box ul').empty()
								  .append('<li>' + response.success + '</li>');
				$('.notif-box').removeClass('alert-danger d-none')
					           .addClass('alert-success');
			}
		});

	});

	$('#clear-switch').on('change',function(){
		var $switch = $(this);
		var $clr_dt = $('.clrdt-container');

		if($switch.prop('checked') == true){
			$clr_dt.animate({'height':'60px'});
		}else{
			$clr_dt.animate({'height':'0px'});
			$clr_dt.find('input').val('')
		    					 .attr('data-value','');

		    $clr_dt.find('input').removeClass('is-invalid');
		}
	});

	$(document).on("click",".claim-last-pay",function(){
		var clearance_id = $(this).data('id');
		var url = '/exit-clearances/' + clearance_id + '/claim';

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: 'PUT',
			success: function(){
				location.href = '/exit-clearances';
			}
		});
	});


	$(document).on('submit','form.employee-det-form',function(e){
		var form = $(this);
		var form_data = {};
		var url = form.attr("action");
		var method = form.attr('method');
		var notif = form.find('.inline-notif');

		form.find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
			url: url,
			method: method,
			data: form_data,
			beforeSend: function(){
				$('.employee-det-form button').html("<span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span><span class='spinner-grow spinner-grow-sm'></span>");
			},
			complete: function(){
				$('.employee-det-form button').text('Update');
			},
			success: function(response){
				form.find('input.is-invalid')
					.removeClass('is-invalid');

				if(!$.isEmptyObject(response.errors)){
                    for (var key in response.errors) {
					    if (Object.prototype.hasOwnProperty.call(response.errors, key)) {
					        form.find("input[name='"+ key +"']").addClass('is-invalid');
					        form.find("span."+ key).empty().append(response.errors[key]);
					    }
					}

					notif.removeClass('text-success')
						 .addClass('text-danger')
					     .text(response.alert)
                	     .fadeIn(200,function(){
                			setTimeout(function(){
                				notif.fadeOut(500);
                			},1000);
                		  });
                }else{
                	notif.removeClass('text-danger')
                		 .addClass('text-success')
                		 .text(response.success)
                		 .fadeIn(200,function(){
                			setTimeout(function(){
                				notif.fadeOut(500);
                			},1000);
                		  });
                }
			}
		});
	});

});


