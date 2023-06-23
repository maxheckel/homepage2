<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


Route::any('/halo/collectors/{id}/poll', function(){
    echo `<ReceiveMessageResponse xmlns="http://queue.amazonaws.com/doc/2012-11-05/">
    <ReceiveMessageResult>
        <Message>
            <MessageId>e15b23be-b568-414a-8601-658faa4c9f08</MessageId>
            <ReceiptHandle>32aed65d-aa5d-471c-bfb1-8107e527b253</ReceiptHandle>
            <MD5OfBody>794c0eb14afd5868408e25e1ed5173ef</MD5OfBody>
            <Body>
                {"iv":"9acb1e2076e423d3148951c2ecb39fbb","authTag":"84e2c7d254480281caa92bead3dfa533","key":"38fd38b12417544f5abfceb9b98be3b6830af2a96770928daae778080d7b61a0ea46d14c153cfe567f7e5cf2303d72c8f1bc3c33ce4e256176fdbdbf33e8208b6a5da603dc0e9e0a7c80ec85b986e0af3cd7dc2c9172e36d08df6dc6e8071fb4343a0a23ee4f55d40fc72f5f9bc772b965a4b7846ae95fc1d8d843654ec4e767a587576239f5e66c5ec43d5d610703bbeb398e424531748c68433411834815e337d432bf083c780ee87cb6776eb94d8da568810a01fdab540fbc2acfdb66af04a2953ce66d0b7050852a731fc5328004faf1f4a6fe3f6daaf568205c618a4608af103f961504f45fec2f2d79c5f172142e20c2d5bc0f0e796cc57d0a1591ee6f75598d951366e210a9f91b307dba6811e26fb6fb2a9b560c0c61522745c4506f6975628571f3b13a92b7e6f0b01b6c3f54bf4e7b5d458f4ce10641e95067cf10c51d1011c1a1f1b21af7d9e6833ccafca7960eda2f5cd19c205a7c84f565994c5850eaf3e4d560ac16cba93aff67b584c9a6090042152b458ab20288c835fca7bd21a180b56f0184b862be9ecabf0ca88f249dc7aecfbf8e6970b0b7be87a7568fdfc6c8052ef8e1e0ef59133e0cf9ea66c6d43bb99ed331b56dfdf9669a44bd60f6f4f348cd44a623417dede416a9363e39ab8737d496ee637e1bf2dc5c0cf967d871162e3cfd7e5927d24c4c89daa0e6e4d261cf6d9c8fd3b618da4cb02916","message":"f244df9c390fb506ac25"}
            </Body>
        </Message>
    </ReceiveMessageResult>
    <ResponseMetadata>
        <RequestId>dfa2c546-b02b-49c8-a3d4-8d9f5d0f4085</RequestId>
    </ResponseMetadata>
</ReceiveMessageResponse>`;
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/blog',[DashboardController::class, 'blog'])->name('dashboard.blog');
    Route::get('/dashboard/blog/{post}',[BlogController::class, 'edit'])->name('dashboard.blog.edit');
    Route::post('/dashboard/blog/{post}',[BlogController::class, 'update'])->name('dashboard.blog.update');
    Route::delete('/dashboard/blog/{post}',[BlogController::class, 'destroy'])->name('dashboard.blog.destroy');
    Route::get('/dashboard/new-post',[BlogController::class, 'create'])->name('dashboard.blog.new');
    Route::post('/dashboard/new-post',[BlogController::class, 'store'])->name('dashboard.blog.store');


    Route::get('/dashboard/projects',[DashboardController::class, 'projects'])->name('dashboard.projects');
    Route::get('/dashboard/projects/{project}',[ProjectController::class, 'edit'])->name('dashboard.projects.edit');
    Route::post('/dashboard/projects/{project}',[ProjectController::class, 'update'])->name('dashboard.projects.update');
    Route::delete('/dashboard/projects/{project}',[ProjectController::class, 'destroy'])->name('dashboard.projects.destroy');
    Route::get('/dashboard/new-project',[ProjectController::class, 'create'])->name('dashboard.projects.new');
    Route::post('/dashboard/new-project',[ProjectController::class, 'store'])->name('dashboard.projects.store');

    Route::get('/dashboard/images', [ImageController::class, 'index'])->name('dashboard.images');
    Route::post('/dashboard/images', [ImageController::class, 'store'])->name('dashboard.images.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
