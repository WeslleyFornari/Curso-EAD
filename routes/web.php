<?php

use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\DadosPessoaisController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\PlanoController;
use App\Http\Controllers\Admin\RedeSocialController;
use App\Http\Controllers\Admin\TrilhaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Models\Perfil;
use App\Models\RedeSocial;
use Illuminate\Support\Facades\Route;



Auth::routes();



Route::name('site.')->group(function () {
    Route::get('/', [SiteHomeController::class, 'index'])->name('home');
    Route::get('/cadastro', [SiteHomeController::class, 'cadastro'])->name('cadastro');
});


Route::post('/store', [EmpresaController::class, 'store'])->name('empresa.store');


Route::name('admin.')->prefix('/p')->middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'dash'])->name('dash');

    // Usuario -> Cadastro Completo
    Route::name('usuarios.')->prefix('usuarios')->controller(UsuarioController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        //  Route::get('/new', 'new')->name('new');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::match(['get', 'post'], '/usuarios/status', 'status')->name('status');

        Route::post('/acesso', 'acesso')->name('acesso');
        Route::match(['get', 'post'], '/minhaconta/novasenha/{id}', 'novasenha')->name('novasenha');
    });

    Route::name('empresas.')->prefix('empresas')->controller(EmpresaController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        // Route::get('/new', 'new')->name('new');
        // Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/mudarStatus/{id?}', 'mudarStatus')->name('mudarStatus');
    });


    Route::name('planos.')->prefix('planos')->controller(PlanoController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        // Route::get('/new', 'new')->name('new');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::match(['get', 'post'], '/status', 'status')->name('status');

        Route::post('/order/update', 'updateOrder')->name('update.order');
    });


    Route::name('dados_pessoais.')->prefix('dados_pessoais')->controller(DadosPessoaisController::class)->group(function () {

        Route::post('/avatar', 'avatar')->name('avatar');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });

    Route::name('perfil.')->prefix('perfil')->controller(PerfilController::class)->group(function () {

        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });

    Route::name('redes_sociais.')->prefix('redes_sociais')->controller(RedeSocialController::class)->group(function () {

        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        //  Route::get('/delete/{id}', 'delete')->name('delete');    
    });


    Route::name('media.')->prefix('media')->controller(MediaController::class)->group(function () {
        Route::get('/popUp/{folder?}', 'popUp')->name('popUp');
        Route::post('/list-folder/{folder?}', 'listFiles')->name('list-files');
        Route::post('/newFolder', 'newFolder')->name('newFolder');
        Route::get('/delFolder', 'delFolder')->name('delFolder');
        Route::get('/getFile/{id?}', 'getFile')->name('getFile');
        Route::get('/{folder??}', 'index')->name('index');
        Route::get('/tokenUrl', 'tokenUrl')->name('tokenUrl');
        Route::post('/upload-media', 'moveFile')->name('upload-media');
        Route::post('/delete-media', 'deleteFile')->name('delete-media');
    });





    Route::name('trilhas.')->prefix('trilhas')->controller(TrilhaController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');

        Route::match(['get', 'post'], '/status', 'status')->name('status');
        Route::post('/order/update', 'updateOrder')->name('update.order');
    });


    Route::name('cursos.')->prefix('cursos')->controller(CursoController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::match(['get', 'post'], '/status', 'status')->name('status');


        Route::get('/aula/{id}', 'getAula')->name('getAula');

        Route::post('/order/update', 'updateOrder')->name('update.order');
        Route::get('/{slug}', 'preview')->name('preview');
    });

    Route::get('/oauth/callback', function (Request $request) {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        // Obter o código de autorização da URL
        $authCode = $request->input('code');

        // Trocar o código de autorização por um token de acesso
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Armazenar o token na sessão ou no banco de dados para uso posterior
        session(['google_access_token' => $accessToken]);

        return redirect('/')->with('success', 'Autorização concluída com sucesso!');
    });
});






// Route::name('site.')->prefix('site')->controller(LayoutController::class)->group(function () {
//     Route::get('/{slug}', 'index')->name('index');
// });
