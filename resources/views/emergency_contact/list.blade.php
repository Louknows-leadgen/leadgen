<span class="btn btn-add more-edit act-more-edit" data-tab="contact" data-person="{{$person_id}}">+ Add Contact</span>
@if(count($contacts))
	@foreach($contacts as $idx => $contact)
		<div class="grp-container" data-id="{{$contact->id}}">
			<div class="contact-content grp-bg">
				<label>Full Name</label>
				<input type="text" value="{{ $contact->full_name }}" disabled>
				<label>Contact Number</label>
				<input type="text" value="{{ $contact->contact_no }}" disabled>
				<label>Relationship</label>
				<input type="text" value="{{ $contact->relationship }}" disabled>
				<div class="col-span-2 grid-col-1">
					<label>Address</label>
					<input type="text" value="{{ $contact->address }}" disabled>
				</div>
			</div>
			<span class="fa fa-edit edit edit-grp-icon" data-tab="contact" data-id="{{$contact->id}}" data-parent="grp-container" title="Edit"></span>
		</div>
	@endforeach
@else
	<p class="no-data empty">No emergency contacts to display</p>
@endif