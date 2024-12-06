    <?php

    use App\Http\Controllers\MailController;
    use App\Http\Controllers\SiteController;
    use App\Http\Controllers\CartController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [SiteController::class, 'index'])->name('site.index');
    Route::get('about', [SiteController::class, 'about'])->name('site.about');
    Route::get('contact', [SiteController::class, 'contact'])->name('site.contact');
    Route::get('shop', [SiteController::class, 'shop'])->name('site.shop');
    Route::get('blog', [SiteController::class, 'blog'])->name('site.blog');
    Route::get('blogdetail', [SiteController::class, 'blogdetail'])->name('site.blogdetail');
    Route::get('{category}/{slug}', [SiteController::class, 'productDetail'])->name('site.productdetail');
    Route::get('shop/category/{slug}', [SiteController::class, 'showProductsByCategory'])->name('product.category');

    // cart route
Route::get('/cart', [SiteController::class, 'showcart'])->name('site.cart')->middleware(['auth', 'verified']);
Route::post('/addcart/{id?}', [SiteController::class, 'addcart'])->name('cart.add')->middleware(['auth', 'verified']);
Route::put('/cartUpdate/{id?}', [SiteController::class, 'update'])->name('cart.update')->middleware(['auth', 'verified']);
Route::delete('/cartremove/{id}', [SiteController::class, 'destroy'])->name('cart.remove')->middleware(['auth', 'verified']);

//order route  
Route::get('/checkout', [SiteController::class, 'checkout'])->name('checkout')->middleware(['auth', 'verified']);


Route::post('/checkout', [SiteController::class, 'processCheckout'])->name('checkout.process')->middleware(['auth', 'verified']);
Route::post('/checkout/process', [SiteController::class, 'processCheckout'])->name('site.processCheckout')->middleware(['auth', 'verified']);


Route::post('Contactmail', [MailController::class, 'Contactmail'])->name('site.contactmail');
