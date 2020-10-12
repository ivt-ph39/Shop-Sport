<?php



?>
<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        <div class="panel panel-default">
            @foreach($category as $cate)
            @if($cate['parent_id'] == 0)
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportwear">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{ $cate['name']}}
                    </a>
                </h4>
            </div>

            @endif
            @endforeach
            <div id="" class="panel-collapse collapse">
            
                @foreach($category as $cate)
                @if($cate['parent_id'] != 0)
                <div class="panel-body">
                    <ul>
                        <li><a href="#">{{$cate['name']}} </a></li>
                    </ul>
                </div>
                @endif
                @endforeach
            </div>
            
            
        </div>
    </div>
    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            @foreach($brand as $b)
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"> <span class="pull-right">()</span>{{$b['name']}}</a></li>
            </ul>
            @endforeach
        </div>
    </div>
    <!--/brands_products-->

    <!-- <div class="price-range">
						
						<h2>Price Range</h2>
						<div class="well text-center">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
							<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div> -->
</div>