$(document).ready(function(){
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
		var container = $(".applicant-list");

		$.ajax({
			url: '/applicants/search',
			method: 'GET',
			data: {
				skey: search_text
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	}));


	$("#search-candidate").on("input", $.debounce(200,function(){
		var search_text = $(this).val();
		var user_id = $(this).data('user');

		var container = $("tbody");

		$.ajax({
			url: '/application/candidates/search',
			method: 'GET',
			data: {
				skey: search_text,
				id: user_id
			},
			success: function(result){
				container.empty().append(result);
			}
		});

	}));

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

		container.load('/final_interviews/'+ fin_id +'/edit');

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

		container.load(url);
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
                	container.load(response.url);
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
			}
		});
	});

	$(".grp").on("click",".cancel-new", function(){
		var parent = '.' + $(this).data('parent');
		var container = $(this).parents(parent);

		container.fadeOut(300,function(){
			container.remove();
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
	
});