@extends('frontend.layouts.master')

@section('content')

        <!--============================
        CATEGORIE PAGE START
    ==============================-->
    <section id="wsus__product_page" class="wsus__category_pages">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <form>
                                <div class="wsus__product_topbar wsus__category_topbar">
                                    <div class="wsus__topbar_select">
                                        <select class="select_2" name="state">
                                            <option>select category</option>
                                            <option>men's</option>
                                            <option>wemen's</option>
                                            <option>kid's</option>
                                            <option>electronics</option>
                                            <option>electrick</option>
                                        </select>
                                    </div>
                                    <div class="wsus__topbar_select">
                                        <select class="select_2" name="state">
                                            <option>default shorting</option>
                                            <option>short by rating</option>
                                            <option>short by latest</option>
                                            <option>low to high </option>
                                            <option>high to low</option>
                                        </select>
                                    </div>
                                    <button class="common_btn" type="submit">filter product</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item wsus__before">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">fashion </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(17 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                                    <p class="wsus__price">$159 <del>$200</del></p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item wsus__before">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/pro9.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/pro9_9.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">fashion </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(120 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">men's fashion sholder bag</a>
                                    <p class="wsus__price">$159 <del>$200</del></p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item wsus__after wsus__before">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/pro2.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/pro2_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">fashion </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(72 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">men's casual shoes</a>
                                    <p class="wsus__price">$159 <del>$200</del></p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/headphone_1.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/headphone_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">Electronics </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(120 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">man casual fashion cap</a>
                                    <p class="wsus__price">$115</p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/tab_1.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/tab_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">Electronics </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(120 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">man casual fashion cap</a>
                                    <p class="wsus__price">$159</p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item wsus__before">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/mobile_1.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/mobile_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">Electronics </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(120 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">man casual fashion cap</a>
                                    <p class="wsus__price">$189 <del>$199</del></p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/pro8.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/pro8_8.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">fashion </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(10 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">weman's fashion one pcs</a>
                                    <p class="wsus__price">$99</p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item wsus__after">
                                <a class="wsus__pro_link" href="product_details.html">
                                    <img src="images/kids_1.jpg" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="images/kids_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">fashion </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(41 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">kid's fashion party dress</a>
                                    <p class="wsus__price">$110</p>
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <section id="pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CATEGORIE PAGE END
    ==============================-->
    
@endsection