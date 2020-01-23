$(document).ready(function(){

	/*
	|-------------------
    | initialize datefield
    |-------------------
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


	/*
	|-------------------
    | initialize datefield end
    |-------------------
	*/

	$(".add-spouse").on("click", function(){
		var spouse_ids = [];
		var last_id = 0;
		var spouse_wrapper = $('#spouse_wrapper');	

		if($(".spouse_info").length){
	        $(".spouse_info").each(function(){
	            spouse_ids.push($(this).data("id"));
	        });

	        last_id = Math.max.apply(Math, spouse_ids) + 1;
	    }

		$.ajax({
			url: '/spouses/create',
			method: 'GET',
			data: {
				id: last_id
			},
			success: function($result){
				spouse_wrapper.append($result);
			}
		});

	});

	$(".add-contact").on("click", function(){
		var contact_ids = [];
		var last_id = 0;
		var contact_wrapper = $('#emergency_wrapper');	

		if($(".emergency_contact").length){
	        $(".emergency_contact").each(function(){
	            contact_ids.push($(this).data("id"));
	        });

	        last_id = Math.max.apply(Math, contact_ids) + 1;
	    }

		$.ajax({
			url: '/emergency_contacts/create',
			method: 'GET',
			data: {
				id: last_id
			},
			success: function($result){
				contact_wrapper.append($result);
			}
		});

	});

	$(".add-dependent").on("click", function(){
		var dependent_ids = [];
		var last_id = 0;
		var dependent_wrapper = $('#dependent_wrapper');	

		if($(".dependents").length){
	        $(".dependents").each(function(){
	            dependent_ids.push($(this).data("id"));
	        });

	        last_id = Math.max.apply(Math, dependent_ids) + 1;
	    }

		$.ajax({
			url: '/dependents/create',
			method: 'GET',
			data: {
				id: last_id
			},
			success: function($result){
				dependent_wrapper.append($result);
			}
		});

	});

	$(".add-college").on("click", function(){
		var college_ids = [];
		var last_id = 0;
		var college_wrapper = $('#college_wrapper');	

		if($(".colleges").length){
	        $(".colleges").each(function(){
	            college_ids.push($(this).data("id"));
	        });

	        last_id = Math.max.apply(Math, college_ids) + 1;
	    }

		$.ajax({
			url: '/colleges/create',
			method: 'GET',
			data: {
				id: last_id
			},
			success: function($result){
				college_wrapper.append($result);
			}
		});

	});

	$(".add-work").on("click", function(){
		var work_ids = [];
		var last_id = 0;
		var work_wrapper = $('#work_wrapper');	

		if($(".work_exp").length){
	        $(".work_exp").each(function(){
	            work_ids.push($(this).data("id"));
	        });

	        last_id = Math.max.apply(Math, work_ids) + 1;
	    }

		$.ajax({
			url: '/work_experiences/create',
			method: 'GET',
			data: {
				id: last_id
			},
			success: function($result){
				work_wrapper.append($result);
			}
		});

	});

	$(".card").on("click",".remove", function(){
		var element = $(this).parent();
		element.fadeOut(300,function(){
			element.remove();
		});
	});

	// navigating on the tabs
	$(".info-table").on("click",".nav-tab:not(.active)", function(){
		var container = $(".info-content");
		var tab = $(this).data("tab");
		var applicant_id = $(this).data('id');

		$(".active").removeClass("active");
		$(this).addClass("active");

		switch(tab){
			case 'basic':
				container.load('/persons/'+ applicant_id +'/list');
				break;
			case 'spouse':
				container.load('/spouses/'+ applicant_id +'/list');
				break;
			case 'contact':
				container.load('/emergency_contacts/'+ applicant_id +'/list');
				break;
			case 'dependent':
				container.load('/dependents/'+ applicant_id +'/list');
				break;
			case 'education':
				container.load('/educations/'+ applicant_id +'/list');
				break;
			case 'work':
				container.load('/work_experiences/'+ applicant_id +'/list');
				break;
		}

	});

	$(".info-table").on("click",".edit", function(){
		var id = $(this).data('id');
		var tab = $(this).data("tab");

		switch(tab){
			case 'basic':
				var cntnr_name = $(this).data("parent");		
				var container = $("." + cntnr_name);
				container.load('/persons/'+ id +'/edit');
				break;
			case 'spouse':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/spouses/'+ id +'/edit');
				break;
			case 'contact':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/emergency_contacts/'+ id +'/edit');
				break;
			case 'dependent':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/dependents/'+ id +'/edit');
				break;
			case 'education':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/educations/'+ id +'/edit');
				break;
			case 'college':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/colleges/'+ id +'/edit');
				break;
			case 'work':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/work_experiences/'+ id +'/edit');
				break;
		}
	});


	$(".info-table").on("click",".cancel",function(){
		var id = $(this).data("id");
		var tab = $(this).data("tab");

		switch(tab){
			case 'basic':
				var cntnr_name = $(this).data("parent");
				var container = $("." + cntnr_name);
				container.load('/persons/'+ id +'/list');
				break;
			case 'spouse':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/spouses/'+ id);
				break;
			case 'contact':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/emergency_contacts/'+ id);
				break;
			case 'dependent':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/dependents/'+ id);
				break;
			case 'education':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/educations/'+ id);
				break;
			case 'college':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/colleges/'+ id);
				break;	
			case 'work':
				var cntnr_name = $(this).data("parent") + "[data-id='" + id + "']";		
				var container = $("." + cntnr_name);
				container.load('/work_experiences/'+ id);
				break;
		}

	});


	$(".info-table").on("submit","form.update", function(e){
		var tab = $(this).data("tab");
		var cntnr_name = $(this).data("parent");
		var id = $(this).data("id");
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
			data: {
				obj: form_data
			},
			success: function(result){
				var container = '';
				switch(tab){
					case 'basic':
						container = $("." + cntnr_name);
						break;
					default:
						container = $("." + cntnr_name + "[data-id='" + id + "']");
				}
				container.empty().append(result);
			}
		});

	});

	$(".info-table").on("click",".act-more-edit",function(){
		var tab = $(this).data("tab");
		var container = $(this).parent();
		var person_id = $(this).data("person");
		var url = "";
		var no_data = container.children("p.empty");

		switch(tab){
			case "spouse":
				url = "/spouses/more/" + person_id;
				break;
			case "contact":
				url = "/emergency_contacts/more/" + person_id;
				break;
			case "dependent":
				url = "/dependents/more/" + person_id;
				break;
			case "college":
				url = "/colleges/more/" + person_id;
				break;
			case "work":
				url = "/work_experiences/more/" + person_id;
				break;			
		}

		$.get(url, function(result){
			container.append(result);
			no_data.css({"display":"none"});
		});
	});

	$(".info-table").on("click",".act-drop",function(){
		var container = $(this).parents(".new");
		var no_data = container.siblings("p.empty");
		container.fadeOut(300, function(){
			container.remove();
			no_data.css({"display":""});
		});
	});

	$(".info-table").on("submit","form.create", function(e){
		var container = $(this).parent();
		var form_data = {};
		var url = $(this).attr("action");

		e.preventDefault();

		$(this).find('[name]').each(function(){
			form_data[this.name] = this.value;
		});

		
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	
		$.ajax({
			url: url,
			method: 'POST',
			data: {
				obj: form_data
			},
			success: function(result){
				container.empty().append(result);
				var id = container.find('[data-id]').data('id');
				container.attr('data-id',id);
				if(container.siblings("p.empty").length){
					container.siblings("p.empty").remove();
				}
			}
		});

	});

	$(".info-table").on("click",".act-destroy",function(){
		var id = $(this).data("id");
		var parent = "." + $(this).data("parent");
		var cntnr_name = parent + "[data-id='"+ id +"']";
		var container = $(cntnr_name);
		var wrapper = "." + $(this).data("wrapper");
		var tab = $(this).data("tab");
		var url = "";

		switch(tab){
			case "spouses":
				url = "/spouses/" + id;
				break;
			case "emergency contacts":
				url = "/emergency_contacts/" + id;
				break;
			case "dependents":
				url = "/dependents/" + id;
				break;
			case "colleges":
				url = "/colleges/" + id;
				break;
			case "work experiences":
				url = "/work_experiences/" + id;
				break;
		}

		console.log(url);

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			url: url,
			method: "DELETE",
			success: function(){
				container.fadeOut(300, function(){
					container.remove();
					if($(parent).children().length == 0){
						if(tab == 'colleges')
							$(wrapper).append("<p class='col-span-2 empty'><em>No "+ tab +" to display</em></p>");
						else
							$(wrapper).append("<p class='no-data empty'>No "+ tab +" to display</p>");
					}
				});
			}
		});
		
	});

	/*
	 |---------------------------
	 |		Search Functionalities
	 |---------------------------
	*/

	$("#search-applicant").on("input", $.debounce(200,function(){
		var search_text = $(this).val();
		var container = $(".list tbody");

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

		var container = $(".list tbody");

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

	//--------------------------------------------------------------

	$(".process_body").on("click",".edit_fin-intrvw",function(){
		var fin_id = $(this).data("id");
		var container = $(".process_body");

		container.load('/final_interviews/'+ fin_id +'/edit');

	});

	$(".process_body").on("click",".edit_jo",function(){
		var jo_id = $(this).data("id");
		var container = $(".process_body");

		container.load('/job_orientations/'+ jo_id +'/edit');

	});

	$(".process_nav span[data-id]").on("click",function(){
		var id = $(this).data('id');
		var stat = $(this).data('stat');

		window.location.replace("/application/"+id+"/status/"+stat);
	});

});


