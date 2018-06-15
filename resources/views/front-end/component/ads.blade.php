<div class="admRtop">
    @forelse($ads as $ad)

        <div class="banrAd">
            <img src="{{asset($ad->getAdsPage()->getImage())}}" class="img-responsive image">
            <div class="ad-leftCorn"><i class="fa fa-info-circle" aria-hidden="true"> Ads </i></div>
            <div class="overlay">{!! $ad->getAdsPage()->getAddDetail() !!}</div>
        </div>
    @empty
	<h2>No Ads   Assign</h2>
    @endforelse
</div>

