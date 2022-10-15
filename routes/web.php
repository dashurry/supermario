<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Carbon\Carbon;
use Carbon\CarbonPeriod;

 Route::get('/invoice',function(){
    $data = 2;
    return view('admin.pages.invoice',compact('data'));
}); 


// Route::get("/order-data",function(){
    
//     $data = \App\Models\Order::find(34);

//     $itemsLists = $data->listOrderItems($data->id);

//     $final_data = array(
//         "orderData" => $data,
//         "items" => $itemsLists,
//     );

//     return json_encode($final_data);


// });

// Main Site
Route::get('/', 'HomePageController@indexPage')->name('index');
Route::get('/store', 'HomePageController@storePage')->name('store');
/* Returning categories products with ajax */
Route::get('/store/category', 'HomePageController@storeCategory')->name('admin.storeCategory');
//Product Likes
Route::post('/like', 'LikeController@productLike');
// Add to Cart
Route::post('/cart', 'CartController@addToCart');
// Refresh Cart
Route::get('/refreshCart', 'CartController@refreshCart');
/* update Cart item Anmerkung */
Route::post('/updateCartItemNote', 'CartController@updateCartItemNote');
/* update Cart item quantity */
Route::post('/updateCartItemQuantity', 'CartController@updateCartItemQuantity');
/* remove item from cart */
Route::post('/removeItemFromCart', 'CartController@removeItemFromCart');
/* Browser IE */
Route::get('/browser-not-supported','HomePageController@browser.notsupported')->name('browser.notsupported');

// Checkout
Route::get('/checkout', 'HomePageController@checkout')->name('store.checkout');
Route::get('/parsePostcode', 'HomePageController@parsePostcode');

/* Validate Checkout */
Route::post('/validate', 'HomePageController@validateCheckout');
/* Submit Order */
Route::post('/submitOrder', 'OrderController@checkExecuteStoreOrder');
/* Thank you Page */
Route::get('/thankyou/{orderId}', 'HomePageController@thankyouPage');

/* Paypal */
Route::post('/paypal', 'OrderController@getPaypal');
Route::get('/paypal-verify/status={status}', 'HomePageController@paypalVerify')->name('paypalVerify');

/* Time Slots */
Route::get('/time-slots', 'HomePageController@timeSlots');

/* Tracking Order */
Route::get('/order-tracking', 'HomePageController@trackingOrder')->name('order.trackingOrder');

Route::post('/order-tracking', 'HomePageController@trackingOrderForm');

// Load more products function
Route::get('/load-more-products', 'HomePageController@loadMoreProducts');

// Change Site Language
Route::get('/switch-language/language={code}', 'HomePageController@switchLanguage')->name('language');

//Admin Site
// Route::get('/admin', 'AdminPageController@categoryPage');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'pages'], function () {
        // create and store Category to Database 
        Route::get('createCategory', 'AdminPageController@createCategory')->name('admin.createCategory');
        Route::post('createCategory', 'CategoryController@storeCategory')->name('admin.createCategory');

        // display Category List
        Route::get('/categoryList', 'AdminPageController@categoryList')->name('admin.categoryList');

        // edit Category
        Route::get('/edit/categoryID={id}', 'CategoryController@editCategory')->name('admin.editCategory');
        Route::post('/edit', 'CategoryController@updateCategory')->name('admin.submitEdit');

        //delete Category
        Route::get('/delete/id={id}', 'CategoryController@deleteCategory')->name('admin.deleteCategory');
    });

    //Products
    Route::group(['prefix' => 'product'], function ()
    {
        // create Product
        Route::get('createProduct', 'AdminPageController@createProduct')->name('admin.createProduct');
        // store Product to database
        Route::post('createProduct', 'ProductController@storeProduct')->name('admin.createProduct');
        // display Product List
        Route::get('/productList', 'AdminPageController@productList')->name('admin.productList');
         //delete Product
         Route::get('/delete/product_id={id}', 'ProductController@deleteProduct')->name('admin.deleteProduct');
         // edit Product
        Route::get('/edit/product_id={product_id}', 'AdminPageController@editProduct')->name('admin.editProduct');
        Route::post('/edit', 'ProductController@updateProduct')->name('admin.submitProductEdit');
        // edit Product Price
        Route::post('/editProductPrice', 'ProductController@editProductPrice')->name('admin.editProductPrice');
        Route::get('/deleteProductPrice/id={id}', 'ProductController@deleteProductPrice')->name('admin.deleteProductPrice');
        // search Product
        Route::get('/search', 'ProductController@searchProduct')->name('admin.searchProduct');

    });

    // Setting
        Route::get('/setting', 'AdminPageController@setting')->name('admin.setting');
        Route::post('/setting', 'SettingsController@toggleStore')->name('admin.setting');

    // Delivery Area
        Route::get('/delivery', 'AdminPageController@deliveryArea')->name('admin.deliveryArea');

        Route::post('/city', 'DeliveryAreaController@createCity')->name('admin.createCity');
        Route::post('/editCity', 'DeliveryAreaController@editCity')->name('admin.editCity');
        Route::get('/deleteCity/city_id={id}', 'DeliveryAreaController@deleteCity')->name('admin.deleteCity');

        Route::post('/postcode', 'DeliveryAreaController@createPostcode')->name('admin.createPostcode');
        Route::post('/editPostcode', 'DeliveryAreaController@editPostcode')->name('admin.editPostcode');
        Route::get('/deletePostcode/postCodeId={id}', 'DeliveryAreaController@deletePostcode')->name('admin.deletePostcode');

    /* Orders */
        Route::group(['prefix' => 'order'], function ()
        {
            Route::get('/new-order/{type}', 'AdminPageController@newOrder')->name('admin.newOrder');
            Route::get('/order-details/order/{orderId}', 'AdminPageController@orderDetails')->name('admin.orderDetails');
            Route::post('/increse-order-time', 'OrderManagementController@increaseTime')->name('admin.increaseTime');
            Route::get('/cancelOrder/{orderId}', 'OrderManagementController@cancelOrder')->name('admin.cancelOrder');
            Route::get('/processOrder/{orderId}', 'OrderManagementController@processOrder')->name('admin.processOrder');
            Route::get('/processingOrderPage', 'AdminPageController@processingOrderPage')->name('admin.processingOrderPage');
            Route::post('/ship-order', 'OrderManagementController@shipOrder')->name('admin.shipOrder');
            Route::get('/shippingOrderPage', 'AdminPageController@shippingOrderPage')->name('admin.shippingOrderPage');
            Route::get('/completedOrder/{id}', 'OrderManagementController@forceCompleteOrder')->name('admin.forceCompleteOrder');
        });

    /* Delivery */
        Route::group(['prefix' => 'deliveryman'], function ()
        {
            Route::get('/register', 'AdminPageController@deliverymanRegisterPage')->name('admin.deliveryman.register');
            Route::post('/register', 'DeliverymanController@register');

            Route::get('/list', 'AdminPageController@listDeliveryman')->name('admin.deliveryman.list');
            Route::get('/stats/deliveryman={deliverymanid}', 'AdminPageController@DeliverymanStats')->name('admin.deliveryman.stats');
            Route::get('/filter-stats', 'AdminPageController@filterStats')->name('admin.deliveryman.filterStats');
        });

    /* Time */
        Route::get('/timeRange', 'AdminPageController@timeRange')->name('admin.timeRange');
        Route::post('/addTime', 'TimeSlotsController@createTime')->name('admin.createTime');

    /* update order times live */
        Route::get('/update-time-live', 'AdminPageController@timeUpdate')->name('admin.timeUpdate');
    
    /* Cars */
        Route::group(['prefix' => 'cars'], function ()
        {
            /* Car Page */
            Route::get('/car', 'AdminPageController@carPage')->name('admin.carPage');
            Route::post('/car', 'CarController@createCar');

            Route::get('/list-car', 'AdminPageController@carList')->name('admin.carList');
            Route::post('/assign-car', 'CarController@assignCar')->name('admin.assignCar');

            Route::get('/edit-car/{cardId}', 'AdminPageController@editCar')->name('admin.editCar');
            Route::post('/update-car', 'CarController@updateCar')->name('admin.updateCar');

            Route::get('/delete-car/{cardId}', 'CarController@deleteCar')->name('admin.deleteCar');
            Route::get('/unassign-car/{cardId}', 'CarController@unassignCar')->name('admin.unassignCar');
        });
});