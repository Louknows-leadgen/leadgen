<div class="d-flex justify-content-end mb-4">
	<button class="btn btn-success new" data-id="{{$person->id}}" data-tab="contact" data-parent="grp">Add contact</button>
</div>
@if(count($person->emergency_contacts))
	@foreach($person->emergency_contacts as $contact)
		<div class="grp-item mb-4">
			@include('resource_detail._emergency_contact.show_contact')
		</div>
	@endforeach
@else
	<p class="no-data empty">No contacts to display</p>
@endif
