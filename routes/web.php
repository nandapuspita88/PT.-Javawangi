<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\JavaController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BisnisController;
use App\Http\Controllers\AdminAgenController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\JavapediaController;
use App\Http\Controllers\AdminMitraController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RepoController;
use App\Http\Controllers\AdminRepoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\AdminPromoController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AdminSupportController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\SolsController;
use App\Http\Controllers\InsController;
use App\Http\Controllers\InspirasiController;
use App\Http\Controllers\AdminBahanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\RempahController;
use App\Http\Controllers\AdminUserController;







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

//Login dan Register
Route::get('admin', [CustomAuthController::class, 'admin'])->middleware('admin'); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout'); 


//Menu Bisnis
Route::get('/bisnis', [BisnisController::class,'index']);
Route::get('/bisnis/{produk:slug}', [BisnisController::class,'show']);
Route::resource('/admin/bisnis', AdminPostController::class)->middleware('admin');
// Sluggable route
Route::get('admin/bisnis/cekSlug',[AdminPostController::class,'cekSlug']);


//Menu Javapedia
Route::get('/javapedia', [JavaController::class,'index']);
Route::get('/javapedia/{produk:slug}', [JavaController::class,'show']);
Route::resource('/admin/javapedia', JavapediaController::class)->middleware('admin');


//Menu Layanan
Route::get('/layanan', [AgenController::class,'index']);
Route::get('/layanan/list-agen', [AgenController::class,'agen']);
Route::get('/layanan/franchise',[AgenController::class,'franchise']);
Route::get('/layanan/list-agen/{agen:slug}', [AgenController::class,'show']);
Route::get('/layanan/mitra', [MitraController::class,'index']);
Route::post('/layanan/mitra', [MitraController::class,'create']);
Route::resource('/admin/agen', AdminAgenController::class)->middleware('admin');
Route::resource('/admin/mitra', AdminMitraController::class)->middleware('admin');
Route::resource('/admin/franchise', FranchiseController::class)->middleware('admin');





Route::resource('/admin/user', AdminUserController::class)->middleware('admin');
//Shopping Cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//Menu Repository
Route::get('/repository', [RepoController::class,'index']);
Route::get('/repository/{repo:slug}', [RepoController::class,'show']);
Route::resource('/admin/repo', AdminRepoController::class)->middleware('admin');
// Download File Repository
Route::get('/download/{repo:slug}', [AdminRepoController::class,'download']);



Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/promo', [PromoController::class,'index']);
Route::get('/promo/{promo:id}', [PromoController::class,'show']);
Route::resource('/admin/promo', AdminPromoController::class)->middleware('admin');
Route::resource('/admin/banner', AdminBannerController::class)->middleware('admin');
Route::resource('/admin/support', AdminSupportController::class)->middleware('admin');
Route::resource('/admin/galeri', GaleriController::class)->middleware('admin');


//Menu Solusi
Route::resource('/admin/solusi', SolusiController::class)->middleware('admin');
Route::get('/solusi', [SolsController::class,'index']);
Route::get('/solusi/{solusi:id}', [SolsController::class,'show']);



Route::resource('/admin/ins', InsController::class)->middleware('admin');
Route::get('/inspirasi', [InspirasiController::class,'index']);
Route::get('/inspirasi/{ins:id}', [InspirasiController::class,'show']);


Route::resource('/admin/bahan', AdminBahanController::class)->middleware('admin');
Route::get('/bahan', [AdminBahanController::class,'showAll']);
Route::get('/bahan/{bahan:id}', [AdminBahanController::class,'show']);

Route::resource('/admin/news', BeritaController::class)->middleware('admin');
Route::get('/news', [BeritaController::class,'showAll']);
Route::get('/news/{berita:id}', [BeritaController::class,'show']);


Route::resource('/admin/event', EventController::class)->middleware('admin');
Route::get('/event', [EventController::class,'showAll']);
Route::get('/event/{event:id}', [EventController::class,'show']);
Route::post('/event/daftar', [EventController::class,'daftar']);
Route::get('/event/{event:id}/list', [EventController::class,'list']);
Route::get('/galeri', [GaleriController::class,'galeri']);


Route::resource('/admin/rempah', RempahController::class)->middleware('admin');
Route::get('/layanan/rempah', [RempahController::class,'show']);




Route::get('/about', function () {
    return view('page/about',[
    	"title" => "Tentang Kami"
    ]);
});



//Menu Kontak
Route::get('/kontak', function () {
    return view('page/kontak',[
    	"title" => "Kontak"
    ]);
});























