<div class="partner-logos border-0 pt-150 xl-pt-120 md-pt-80 sm-pt-40 pb-80 lg-pb-40">
    <div class="partner-slider">
        @foreach( $partners as $partner)
        <div class="item">
            <div class="logo d-flex "><img src="{{ asset('image/partner')}}/{{ $partner->image}}" alt="{{ $partner->name}}"></div>
        </div>
        @endforeach
    </div>
</div>
<!-- /.partner-logos -->