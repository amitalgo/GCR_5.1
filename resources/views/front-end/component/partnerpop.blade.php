<div class="col-md-3">
	<img src="{{asset($partner->getLogo())}}" class="img-responsive" alt="abc">
</div>
<div class="col-md-9">
	<h3>{{$partner->getTitle()}}</h3>
	<p>{!! $partner->getDescription() !!}</p>
</div>