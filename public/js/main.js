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


	$(".j_add-item").on("click", function(){
		var ids = [];
		var last_id = 0;
		var wrapper = '';
		var item = '';
		var url = '';
		var type = $(this).data('type');

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


	/*
	 |---------------------------
	 |		Search Functionalities
	 |---------------------------
	*/

	$("#search-applicant").on("input", $.debounce(200,function(){
		var search_text = $(this).val();
		var container = $("tbody");

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


});