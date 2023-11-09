<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Danh mục dịch vụ</h2>
				</div>
			</div>
			<div class="col-md-6">
                @foreach ($category_parent as $val )
                    <div class="category-box">
                        <a href="{{ route('home.book.index') }}">
                            <img src="{{ asset('uploads/categories/'.$val->category_image) }}" alt="" />
                            <div class="content">
                                <h3>{{ $val->category_name}}</h3>
                                <p>Shop New Season Clothing</p>
                            </div>
                        </a>
                    </div>
                @endforeach
			</div>
			<div class="col-md-6">
                @foreach ($category as $key=>$val )
                @if ($key == 2)
                    <div class="category-box category-box-2">
                        <a href="{{ route('home.Product.index') }}">
                            <img src="{{ asset('uploads/categories/'.$val->category_image) }}" alt="" style="height: 100%" />
                            <div class="content">
                                <h3>{{ $val->category_name}}</h3>
                                <p>Special Design Comes First</p>
                            </div>
                        </a>
                    </div>
                @endif
                @endforeach
			</div>
		</div>
	</div>
</section>
