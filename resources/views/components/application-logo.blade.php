@if (!Settings('company_logo') == '')
<img src="{{ url("storage/".Settings('company_logo')) }}" width="190em" height="80em">
@else
<img src="{{ url("storage/uploads/default-logo.png") }}" width="190em" height="80em">
@endif
