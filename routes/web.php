<?php


// TEST
Route::get('/test', 'PagesController@test')->name('admin.test');
// Route::get('/test', 'LandingPageController@test')->name('admin.test');

// Admin Route Group [no prefix]
Route::group(['middleware' => ['auth','admin']], function ($router) {
	$router->get('/products', 'PagesController@products')->name('admin.products');
	$router->get('/editProduct/{id}', 'PagesController@editProduct')->name('admin.editProduct');
    $router->post('/postEditProduct/{id}', 'PagesController@postEditProduct')->name('admin.postEditProduct');
    $router->get('/userRoles', 'PagesController@userRoles')->name('admin.userRoles');
    $router->post('/userRoles/{id}', 'PagesController@postUserRoles')->name('admin.postUserRoles');
});
// Admin Routes
Route::get('/accounts', 'PagesController@accounts')->name('admin.accounts');
Route::get('/printInvoiceConfirmed/{id}', 'PagesController@printInvoiceConfirmed')->name('admin.printInvoiceConfirmed');
Route::get('/printPo/{id}', 'PagesController@printPo')->name('admin.printPo');
Route::get('/printInvoice/{id}', 'PagesController@printInvoice')->name('admin.printInvoice');

Route::get('/suppliers', 'PagesController@suppliers')->name('admin.suppliers');
Route::get('/coupons', 'PagesController@coupons')->name('admin.coupons');
Route::get('/purchases', 'PagesController@purchases')->name('admin.purchases');
Route::get('/purchaseView/{id}', 'PagesController@purchaseView')->name('admin.purchaseView');
Route::get('/addPurchase', 'PagesController@addPurchase')->name('admin.addPurchase');
Route::get('/addSale', 'PagesController@addSale')->name('admin.addSale');
Route::get('/categoryEdit/{id}', 'PagesController@categoryEdit')->name('admin.categoryEdit');
Route::post('/categoryEdit/{id}', 'PagesController@categoryEdit')->name('admin.categoryEdit');
Route::post('/orderTrack', 'PagesController@orderTrack')->name('admin.orderTrack');
Route::get('/', 'PagesController@index')->name('dashboard.home');
Route::get('/orders', 'PagesController@orders')->name('admin.orders');
Route::get('/orderView/{id}', 'PagesController@orderView')->name('order.view');
Route::get('/orderEdit/{id}', 'PagesController@orderEdit')->name('admin.orderEdit')->middleware('auth');
Route::get('/brands', 'PagesController@brands')->name('admin.brands');

Route::get('/categories', 'PagesController@categories')->name('admin.categories');
Route::get('/addNewCategory', 'PagesController@addNewCategory')->name('admin.addNewCategory');
Route::post('/addNewCategory', 'PagesController@postAddNewCategory')->name('admin.addNewCategory');
Route::post('/addNewProduct', 'PagesController@postaddNewProduct')->name('admin.addNewProduct');
Route::get('/productsCat', 'PagesController@productsCat')->name('admin.productsCat');
Route::get('/productView/{id}', 'PagesController@productView')->name('admin.productView');
Route::get('/productEdit/{id}', 'PagesController@productEdit')->name('admin.productEdit');
Route::get('/addNewProduct', 'PagesController@addNewProduct')->name('admin.addNewProduct');
Route::get('/createOrder', 'AdminController@createOrder')->name('admin.createOrder');

// Route::get('/editProduct/{id}', 'PagesController@editProduct')->name('admin.editProduct');
// Route::post('/postEditProduct/{id}', 'PagesController@postEditProduct')->name('admin.postEditProduct');

Route::get('/customers', 'PagesController@customers')->name('admin.customers');
Route::get('/customerView/{id}', 'PagesController@customerView')->name('customer.view');
Route::get('/customerEdit/{id}', 'PagesController@customerEdit')->name('customer.edit');
Route::post('/deleteOrder/{id}', 'PagesController@deleteOrder')->name('admin.deleteOrder');
Route::post('/addToOrder/{order_id}', 'PagesController@addToOrder')->name('admin.addToOrder');
Route::get('/removeFromOrder/{order_id}/{product_id}', 'PagesController@removeFromOrder')->name('admin.removeFromOrder');
// Shop Routes
Route::get('/deleteFromWishlist/{del_id}', 'PagesController@deleteFromWishlist')->name('shop.deleteFromWishlist');
Route::get('/shopProductCat/{id}', 'PagesController@shopProductCat')->name('shop.shopProductCat');

// AJAX

Route::get('/sendEmail', 'AjaxController@sendEmail');
Route::get('/addToPurchase', 'AjaxController@addToPurchase');
Route::get('/confirmPurchase', 'AjaxController@confirmPurchase');
Route::get('/getProductPrice', 'AjaxController@getProductPrice');
Route::get('/confirmSale', 'AjaxController@confirmSale');
Route::get('/addToSale', 'AjaxController@addToSale');
Route::get('/createPurchaseCat', 'AjaxController@createPurchaseCat');
Route::get('/chartData', 'AjaxController@chartData');

Route::post('/ajaxRemoveOneFromCart', 'AjaxController@ajaxRemoveOneFromCart');
Route::post('/ajaxDeleteFromCart', 'AjaxController@ajaxDeleteFromCart');
Route::post('/ajaxAddToCart', 'AjaxController@ajaxAddToCart');
Route::post('/shippingInfo', 'AjaxController@shippingInfo');
Route::post('/ajaxRequest','AjaxController@ajaxRequest');
Route::post('/couponValue',   'AjaxController@couponValue');
Route::post('/shippingMethod',   'AjaxController@shippingMethod');
Route::post('/shopProductsByCat',   'AjaxController@shopProductsByCat');
Route::post('/shopProductsByBrand', 'AjaxController@shopProductsByBrand');
Route::post('/shopProductsSorted',  'AjaxController@shopProductsSorted');
Route::get('/customerDetails/{id}', 'AjaxController@customerDetails');
Route::post('/createOrderCat',   	'AjaxController@createOrderCat');
Route::post('/addToCartProduct/{id}',   	'AjaxController@addToCartProduct');
Route::post('/ajaxPlaceOrder',   	'AjaxController@ajaxPlaceOrder');
# Shop
Route::get('/shopHome', 'PagesController@shopHome')->name('shop.shopHome');
Route::get('/shopProducts', 'PagesController@shopProducts')->name('shop.shopProducts');
Route::post('/shopProducts', 'PagesController@shopProducts')->name('shop.shopProducts');
Route::get('/shopProductView/{id}', 'PagesController@shopProductView')->name('shop.shopProductView');
Route::get('/shopCategories', 'PagesController@shopCategories')->name('shop.shopCategories');

Route::get('/shopCat', 'PagesController@shopCat')->name('admin.shopCat');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about')->name('shop.about');
Route::get('/contact', 'PagesController@contact')->name('shop.contact');
Route::get('/shop', 'PagesController@shop')->name('shop.products');
Route::get('/cart', 'CartController@index')->name('shop.cart');
Route::get('/shopCart', 'CartController@shopCart')->name('shop.shopCart');
Route::get('/shopCheckout', 'CartController@shopCheckout')->name('shop.shopCheckout');
Route::get('/about', 'PagesController@about')->name('shop.about');

Route::get('/shopShipInfo', 'CartController@shopShipInfo')->name('shop.shopShipInfo');
Route::post('/shopShipInfo', 'CartController@shopShipInfo')->name('shop.shopShipInfo');

Route::get('/shopShipMethod', 'CartController@shopShipMethod')->name('shop.shopShipMethod');
Route::get('/shopPayMethod', 'CartController@shopPayMethod')->name('shop.shopPayMethod');
Route::post('/postShipMethod', 'CartController@postShipMethod')->name('shop.postShipMethod');
Route::get('/shopCheckoutCoupon', 'CartController@shopCheckoutCoupon')->name('shop.shopCheckoutCoupon');
Route::post('/cart/{id}', 
	'CartController@getAddToCart')->name('cart.getAddToCart');
Route::get('/updateCart/{id}', 
	'CartController@updateCart')->name('cart.updateCart');
Route::get('/cart/{id}', 
	'CartController@removeFromCart')->name('cart.removeFromCart');
Route::get('/deleteFromCart/{id}', 
	'CartController@deleteFromCart')->name('cart.deleteFromCart');
Route::get('/clearCart', 
	'CartController@clearCart')->name('shop.clearCart');
Route::get('/checkout', 
	'CartController@getCheckout')->name('shop.checkout');
Route::post('/checkout', 
	'CartController@postCheckout')->name('shop.checkout');
Route::get('/paymentSuccess', 
	'CartController@paymentSuccess')->name('shop.paymentSuccess');
// Shop Login
Route::get('/shopLogin', 'PagesController@shopLogin')->name('shop.shopLogin');
//Shop User Account
Route::get('/myOrders', 'PagesController@myOrders')->name('user.myOrders');
Route::get('/myWishlist', 'PagesController@myWishlist')->name('user.myWishlist')->middleware('auth');
Route::get('/shopAddToWishlist/{add_id}', 'PagesController@shopAddToWishlist')->name('shop.shopAddToWishlist')->middleware('auth');

// User Authentication Route
Route::get('/signin', 'UserController@getSignin')->name('user.signin');
Route::post('/signin', 'UserController@postSignin')->name('user.signin');
Route::get('/signup', 'UserController@getSignup')->name('user.signup');
Route::post('/signup', 'UserController@postSignup')->name('user.signup');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/profile', ['uses'=>'UserController@profile', 
						'as'=>'user.profile', 
						'middleware'=>'auth']);

Auth::routes();

// Route::get('/', 'HomeController@index')->name('dashboard.home');

Route::get('/emptydashboard', 'PagesController@emptydashboard');
