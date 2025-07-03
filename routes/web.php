<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SKController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AmalTkAbaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardSKController;
use App\Http\Controllers\RoleRequestController;
use App\Http\Controllers\MenuAisyiyahController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardKajianController;
use App\Http\Controllers\AmalMasjidAlAminController;
use App\Http\Controllers\DashboardSejarahController;
use App\Http\Controllers\MenuMuhammadiyahController;
use App\Http\Controllers\AmalMasjidAlAmienController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPrestasiController;
use App\Http\Controllers\DashboardStrukturController;
use App\Http\Controllers\AmalMasjidAlHikmahController;
use App\Http\Controllers\AmalMasjidAlIkhsanController;
use App\Http\Controllers\DashboardCategoriesController;
use App\Http\Controllers\DashboardInventarisController;
use App\Http\Controllers\DashboardMusyawarahController;
use App\Http\Controllers\AmalMasjidAlKhasanahController;
use App\Http\Controllers\AmalMasjidBaiturohmanController;
use App\Http\Controllers\AmalMasjidSafinatullahController;
use App\Http\Controllers\DashboardBiodataPimpinanController;
use App\Http\Controllers\DashboardPelaksanaanProgramController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\MenuAngkatanMudaController;
use App\Models\BiodataPimpinan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hom', function () {
    return view('dashboard.home');
});

Route::get('/',[PostController::class, 'index'])->middleware('record.visitor');
// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
// halaman postBy
//route mengarah ke category
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('dashboardPost/posts/postBy',[
//         'title'=> "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts'=> $category->posts->load('user','category')//penggunaan load untuk mengatasi N+1 problem
//     ]);
// });
//menampilkan data berdasarkan author
// Route::get('/authors/{author:username}',function(User $author){
//     return view('dashboardPost/posts/postBy',[
//         'title'=>"Post by Author : $author->name",
//         'active' =>'authors',
//         'posts'=> $author->posts->load('author','category')//penggunaan load untuk mengatasi N+1 problem
//     ]);
// });

// Route::get('posts/view/pdf/{post:slug}', [PostController::class, 'viewPdf']);

Route::get('/contact-us', function () {
    return view('dashboardPost/contact-us',[
        'title'=>'',
    ]);
});

Route::get('/categories/{category:slug}', [PostController::class, 'postByCategory']);
Route::get('authors/{author:username}', [PostController::class, 'postByAuthor']);
Route::get('/search', [PostController::class, 'search']);

Route::get('/kabar', [PostController::class, 'postByKabar']);


//Login Controller
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login')
    ->middleware('guest');//middleware digunakan untuk hanya user guest yang bisa akses
    Route::Post('/login', 'authenticate');

    Route::Post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function (){
    
    Route::get('/register', 'index')
    ->middleware('guest');
    Route::post('/register','store');
});


// Lingkup
Route::get('/view/muhammadiyah',[MenuMuhammadiyahController::class, 'index']);
Route::get('/musyawarah/muhammadiyah',[MenuMuhammadiyahController::class, 'showMusyawarah']);
Route::get('/musyawarah/muhammadiyah/{slug}',[MenuMuhammadiyahController::class, 'detailMusyawarah']);
Route::get('/struktur/muhammadiyah',[MenuMuhammadiyahController::class, 'showStruktur']);
Route::get('/sk/muhammadiyah/{slug}',[MenuMuhammadiyahController::class, 'showSK']);
Route::get('/kajian/muhammadiyah/{slug}',[MenuMuhammadiyahController::class, 'showKajian']);
Route::get('/pelaksana/muhammadiyah/{slug}',[MenuMuhammadiyahController::class, 'showPelaksana']);
Route::get('/inventaris/muhammadiyah',[MenuMuhammadiyahController::class, 'showInventaris']);
Route::get('/inventaris/muhammadiyah/{slug}',[MenuMuhammadiyahController::class, 'detailInventaris']);


Route::get('/view/aisyiyah',[MenuAisyiyahController::class, 'index']);
Route::get('/musyawarah/aisyiyah',[MenuAisyiyahController::class, 'showMusyawarah']);
Route::get('/musyawarah/aisyiyah/{slug}',[MenuAisyiyahController::class, 'detailMusyawarah']);
Route::get('/struktur/aisyiyah',[MenuAisyiyahController::class, 'showStruktur']);
Route::get('/sk/aisyiyah/{slug}',[MenuAisyiyahController::class, 'showSK']);
Route::get('/kajian/aisyiyah/{slug}',[MenuAisyiyahController::class, 'showKajian']);
Route::get('/pelaksana/aisyiyah/{slug}',[MenuAisyiyahController::class, 'showPelaksana']);
Route::get('/inventaris/aisyiyah',[MenuAisyiyahController::class, 'showInventaris']);
Route::get('/inventaris/aisyiyah/{slug}',[MenuAisyiyahController::class, 'detailInventaris']);


Route::get('/view/angkatanMuda',[MenuAngkatanMudaController::class, 'index']);
Route::get('/musyawarah/angkatanMuda',[MenuAngkatanMudaController::class, 'showMusyawarah']);
Route::get('/musyawarah/angkatanMuda/{slug}',[MenuAngkatanMudaController::class, 'detailMusyawarah']);
Route::get('/pemudaMuhammadiyah/angkatanMuda',[MenuAngkatanMudaController::class, 'showPemuda']);
Route::get('/nasyiatulAisyiyah/angkatanMuda',[MenuAngkatanMudaController::class, 'showPemuda']);
Route::get('/syiar/angkatanMuda',[MenuAngkatanMudaController::class, 'showSyiar']);
Route::get('/syiar/angkatanMuda/{slug}',[MenuAngkatanMudaController::class, 'detailSyiar']);
Route::get('/baksos/angkatanMuda',[MenuAngkatanMudaController::class, 'showBaksos']);
Route::get('/baksos/angkatanMuda/{slug}',[MenuAngkatanMudaController::class, 'detailBaksos']);


Route::get('kategori/kajian',[KajianController::class, 'index']);
Route::get('kajian/{kajian:slug}', [KajianController::class, 'show']);
Route::get('authors/kajian/{author:username}', [KajianController::class, 'postByAuthor']);
Route::get('speaker/kajian/{kajian:speaker}', [KajianController::class, 'postBySpeaker']);
Route::get('/kategori/{slug}', [KajianController::class, 'postByCategory']);
// Route::get('/kajian/search', [KajianController::class, 'search']);

// Amal Usaha
// Route::get('/amal/tkAba',[AmalTkAbaController::class, 'index']);
Route::get('/amal/tkAba',[AmalTkAbaController::class, 'sejarah']);
Route::get('/sejarah/tkAba',[AmalTkAbaController::class, 'sejarah']);
Route::get('/prestasi/tkAba',[AmalTkAbaController::class, 'prestasi']);
Route::get('/prestasi/tkAba/{slug}',[AmalTkAbaController::class, 'detailPrestasi']);

// Route::get('/amal/masjidAlAmien',[AmalMasjidAlAmienController::class, 'index']);
Route::get('/amal/masjidAlAmien',[AmalMasjidAlAmienController::class, 'showSejarah']);
Route::get('/sejarah/masjidAlAmien',[AmalMasjidAlAmienController::class, 'showSejarah']);
Route::get('/sk/masjidAlAmien',[AmalMasjidAlAmienController::class, 'showSK']);
Route::get('/struktur/masjidAlAmien',[AmalMasjidAlAmienController::class, 'showStruktur']);
Route::get('/kajian/masjidAlAmien/{slug}',[AmalMasjidAlAmienController::class, 'showKajian']);


Route::get('/amal/masjidSafinatullah',[AmalMasjidSafinatullahController::class, 'index']);
Route::get('/sejarah/masjidSafinatullah',[AmalMasjidSafinatullahController::class, 'showSejarah']);
Route::get('/sk/masjidSafinatullah',[AmalMasjidSafinatullahController::class, 'showSK']);
Route::get('/struktur/masjidSafinatullah',[AmalMasjidSafinatullahController::class, 'showStruktur']);
Route::get('/kajian/masjidSafinatullah/{slug}',[AmalMasjidSafinatullahController::class, 'showKajian']);


// Route::get('/amal/masjidBaiturohman',[AmalMasjidBaiturohmanController::class, 'index']);
Route::get('/amal/masjidBaiturohman',[AmalMasjidBaiturohmanController::class, 'showSejarah']);
Route::get('/sejarah/masjidBaiturohman',[AmalMasjidBaiturohmanController::class, 'showSejarah']);
Route::get('/sk/masjidBaiturohman',[AmalMasjidBaiturohmanController::class, 'showSK']);
Route::get('/struktur/masjidBaiturohman',[AmalMasjidBaiturohmanController::class, 'showStruktur']);
Route::get('/kajian/masjidBaiturohman/{slug}',[AmalMasjidBaiturohmanController::class, 'showKajian']);

Route::get('{sejarah:slug}', [SejarahController::class, 'show']);

// Route::get('/amal/masjidAlIkhsan',[AmalMasjidAlIkhsanController::class, 'index']);
Route::get('/amal/masjidAlIkhsan',[AmalMasjidAlIkhsanController::class, 'showSejarah ']);
Route::get('/sejarah/masjidAlIkhsan',[AmalMasjidAlIkhsanController::class, 'showSejarah']);
Route::get('/sk/masjidAlIkhsan',[AmalMasjidAlIkhsanController::class, 'showSK']);
Route::get('/struktur/masjidAlIkhsan',[AmalMasjidAlIkhsanController::class, 'showStruktur']);
Route::get('/kajian/masjidAlIkhsan/{slug}',[AmalMasjidAlIkhsanController::class, 'showKajian']);


// Route::get('/amal/masjidAlKhasanah',[AmalMasjidAlKhasanahController::class, 'index']);
Route::get('/amal/musholaAlKhasanah',[AmalMasjidAlKhasanahController::class, 'showSejarah']);
Route::get('/sejarah/musholaAlKhasanah',[AmalMasjidAlKhasanahController::class, 'showSejarah']);
Route::get('/sk/musholaAlKhasanah',[AmalMasjidAlKhasanahController::class, 'showSK']);
Route::get('/struktur/musholaAlKhasanah',[AmalMasjidAlKhasanahController::class, 'showStruktur']);
Route::get('/kajian/musholaAlKhasanah/{slug}',[AmalMasjidAlKhasanahController::class, 'showKajian']);


// Route::get('/amal/masjidAlHikmah',[AmalMasjidAlHikmahController::class, 'index']);
Route::get('/amal/musholaAlHikmah',[AmalMasjidAlHikmahController::class, 'showSejarah']);
Route::get('/sejarah/musholaAlHikmah',[AmalMasjidAlHikmahController::class, 'showSejarah']);
Route::get('/sk/musholaAlHikmah',[AmalMasjidAlHikmahController::class, 'showSK']);
Route::get('/struktur/musholaAlHikmah',[AmalMasjidAlHikmahController::class, 'showStruktur']);
Route::get('/kajian/musholaAlHikmah/{slug}',[AmalMasjidAlHikmahController::class, 'showKajian']);


// Dashboard
// Route::middleware(['auth', 'role:Author'])->group(function () {
//     Route::get('/dashboard',[DashboardController::class, 'index']);
// });
Route::get('/dashboard/home',[DashboardController::class, 'index'])
->middleware('auth');
Route::get('/api/visitor-stats', [DashboardController::class, 'getVisitorStats']);


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class,'checkSlug']);
    Route::resource('/dashboard/posts', DashboardPostController::class);
});
Route::get('/post/search', [DashboardPostController::class, 'search']);
// Route slug otomatis
// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class,'checkSlug'])
// ->middleware('auth');
// Route::resource('/dashboard/posts', DashboardPostController::class)
// ->middleware('auth');

// Route slug otomatis
Route::get('/dashboard/categories/checkSlug', [DashboardCategoriesController::class,'checkSlug'])
->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoriesController::class)
->middleware('auth');
Route::controller(DashboardCategoriesController::class)->group(function(){
    // Rute untuk memperbarui item
    Route::put('dashboard/categories/{id}', 'update')->name('items.update');  
    // Rute untuk menghapus item
    Route::delete('dashboard/categories/{id}', 'destroy')->name('items.destroy');
})->middleware('auth');
Route::get('/category/search', [DashboardCategoriesController::class, 'search']);


Route::controller(DashboardUserController::class)->group(function(){
    Route::get('dashboard/user','index' );
    // Rute untuk memperbarui item
    Route::put('dashboard/user/{user}', 'update')->name('users.update');  
    // Rute untuk menghapus item
    Route::delete('dashboard/user/{user}', 'destroy')->name('users.destroy');
})->middleware('auth');
Route::get('user/search', [DashboardUserController::class, 'search']);
Route::get('/dashboard/exportUsers', [DashboardUserController::class, 'export']);


Route::post('/request-role', [RoleRequestController::class, 'store'])->name('requestRole')
->middleware('auth');
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/role-requests', [RoleRequestController::class, 'index'])->name('admin.roleRequests');
    Route::patch('/admin/role-requests/{roleRequest}', [RoleRequestController::class, 'update'])->name('admin.updateRequest');
});


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/sejarah/checkSlug', [DashboardSejarahController::class,'checkSlug']);
    Route::resource('/dashboard/sejarah', DashboardSejarahController::class);
});
Route::get('sejarah/search', [DashboardSejarahController::class, 'search']);


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/kajian/checkSlug', [DashboardKajianController::class,'checkSlug']);
    Route::resource('/dashboard/kajian', DashboardKajianController::class);
});
Route::get('/download/{filename}', [DashboardKajianController::class, 'download'])->name('document.download');
Route::get('/dashboard/kajian', [DashboardKajianController::class, 'search']);
Route::get('/kajians/search', [DashboardKajianController::class, 'search']);

// awal belum
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/sk/checkSlug', [DashboardSKController::class,'checkSlug']);
    Route::resource('/dashboard/sk', DashboardSKController::class);
});
Route::get('/sk/search', [DashboardSKController::class, 'search']);


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/struktur/checkSlug', [DashboardStrukturController::class,'checkSlug']);
    Route::resource('/dashboard/struktur', DashboardStrukturController::class);
});
Route::get('/download-image/{filename}', [DashboardStrukturController::class, 'download'])->name('image.download');
Route::get('/struktur/search', [DashboardStrukturController::class, 'search']);


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/biodataPimpinan/checkSlug', [DashboardbiodataPimpinanController::class,'checkSlug']);
    Route::resource('/dashboard/biodataPimpinan', DashboardBiodataPimpinanController::class);
});
Route::get('/biodataPimpinan/search', [DashboardBiodataPimpinanController::class, 'search']);
// AKhir yaa

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/inventaris/checkSlug', [DashboardInventarisController::class,'checkSlug']);
    Route::resource('/dashboard/inventaris', DashboardInventarisController::class);
});
Route::get('/inventaris/search', [DashboardInventarisController::class, 'search']);


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/pelaksanaanProgram/checkSlug', [DashboardPelaksanaanProgramController::class,'checkSlug']);
    Route::resource('/dashboard/pelaksanaanProgram', DashboardPelaksanaanProgramController::class);
});
Route::get('/pelaksanaProgram/search', [DashboardPelaksanaanProgramController::class, 'search']);


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard/musyawarah/checkSlug', [DashboardMusyawarahController::class,'checkSlug']);
    Route::resource('/dashboard/musyawarah', DashboardMusyawarahController::class);
});
Route::get('/musyawarah/search', [DashboardMusyawarahController::class, 'search']);