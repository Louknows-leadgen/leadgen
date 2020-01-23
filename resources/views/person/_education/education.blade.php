<div class="box col-md-12 mb-4">
	<h5>Educations</h5>
	<div class="container">
		@include('person._education._elementary')
		@include('person._education._highschool')
		@include('person._education._college')
	</div>
	<div class="row container">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary j_add-item" data-type="college">Add College</button>
		</div>
	</div>
</div>