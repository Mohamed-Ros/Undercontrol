@extends('layouts.app')

@section('title', 'Under Control - ' . $course->name)

@section('content')
    @include('sections.preloader')

    @include('partials.navbar-course')

    <header class="header-home" id="home">
      <div class="container-fluid">
        <div class="row main-header">
          <div class="col-md-8 quat-header order-2 order-md-1">
            <div class="title">
              <h1>{{ $course->name }}</h1>

              <div class="price">
                @php
                  $location = \Location::get(request()->ip());

                  $country = $location ? $location->countryName : (config('app.env') === 'local' ? 'Egypt' : 'United States');

                  $price = $course->price_usd;
                  $symbol = '$';
                  if ($country === 'Egypt') {
                    $price = $course->price_egp;
                    $symbol = 'جنيه';
                  } elseif ($country === 'Oman') {
                    $price = $course->price_omr;
                    $symbol = 'ريال عماني';
                  }
                @endphp
                <p class="new-price">{{ $price }} <span>{{ $symbol }}</span></p>
              </div>
            </div>

            <p class="mt-3">{!! $course->detailed_description !!}</p>

            <div class="d-flex justify-content-center">
              <a href="#" class="btn-subscripe">سجل الآن</a>
            </div>
          </div>

          <div class="col-md-4 header-img order-1 order-md-2">
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" class="w-100" />
          </div>
        </div>
      </div>
    </header>

@endsection
