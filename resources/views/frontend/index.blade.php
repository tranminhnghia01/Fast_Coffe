@extends('frontend.layouts.blocks.app')


@section('content')
@if (session('msg'))
<div class="alert alert-{{session('style')}}">
    {{ session('msg') }}
</div>
@endif
@include('frontend.layouts.blocks.category')

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Sản phẩm bách hóa xanh</h2>
			</div>
		</div>
		<div class="row">
			@include('frontend.layouts.blocks.product')
		</div>
	</div>
</section>

@endsection
