@extends('frontend.homepage.layout')

@section('content')
<div id="prd-catalogue" class="page-body">
    <x-breadcrumb :breadcrumb="$breadcrumb" />
     <div class="uk-container uk-container-center">
     	<div class="prd-catalogue-wrapper">
     		<div class="uk-grid uk-grid-large">
     			<div class="uk-width-large-1-4">
     				@include('frontend.component.sidebar')
     			</div>
     			<div class="uk-width-large-3-4">
     				<div class="prd-catalogue">
     					<div class="prd-catalogue_description">
     						<div class="wayup">
                                <h1>{{ $productCatalogue->name }}</h1>
                            </div>
     						<div class="description">
     							{!! $productCatalogue->description !!}
     						</div>
     					</div>
     					
                        @if (!is_null($products))
                        <ul class="uk-list uk-clearfix uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4">
                            @foreach ($products as $keyPost => $valPost)
                            @php
                                $title = $valPost->languages->first()->pivot->name;
                                $image = $valPost->image;
                                $href  = write_url($valPost->languages->first()->pivot->canonical);
                                $description = cutnchar(strip_tags($valPost->languages->first()->pivot->description), 100);
                                $price = getPrice($valPost);
                            @endphp

                                <li class="mb10">
                                <div class="product-item">
                                    <a href="{{ $href }}" class="image img-cover img-zoomin">
                                    <img src="{{ $image }}" alt="{{ $title }}">
                                    </a>
                                    <div class="info">
                                        <h3 class="title" title="{{ $title }}">
                                            <a href="{{ $href }}" title="{{ $title }}">{{ $title }}</a>
                                        </h3>
                                        <div class="description">{!! $description !!}</div>
                                    </div>
                                </div>
                                </li>
                            @endforeach
                        </ul>
                            

                        @endif
                        <div class="uk-flex uk-flex-center">
                            @include('frontend.component.pagination', ['model' => $products])
                        </div>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>
</div>

@endsection