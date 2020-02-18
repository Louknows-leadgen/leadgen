<div class="side-menu p-3">
    <div class="row">
        <div class="col-md-12 q-link-border">
            <div>
                <h5 class="text-light">Quick Links</h5>
            </div>
        </div>

        <div class="close-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
    <div class="row mt-4">
        @can('access',2)
            <div class="col-md-12 mb-2">
                <div class="q-link-item">
                    <h5><a href="{{ route('applicants.index') }}">Applicants</a></h5>
                </div>
            </div>
        @endcan

        @can('access',3)
            <div class="col-md-12 mb-2">
                <div class="q-link-item">
                    <h5><a href="{{ route('applications.candidates') }}">Candidates</a></h5>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="q-link-item">
                    <h5><a href="{{ route('history.index') }}">Interview History</a></h5>
                </div>
            </div>
        @endcan
    </div>
</div>