<?php
use Illuminate\Foundation\Validation\ValidatesRequests;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('logout', function () {
    auth::logout();
    return view('home');
});
Auth::routes();
//Route::group(['middleware' => 'web'], function() {

    Route::get('/', function () {
       
    return view('home');
});
Route::get('/home', function () {
    return view('home2');
});

Route::get('/conducteur', function () {
    return view('conducteur');
});

Route::get('/trajets', 'trajetController@chercher_tout' );


Route::get('/recherche/{ou}', function ($ou) {
    Storage::put('depart', $ou);
   
    return redirect('/recherche');
});

Route::get('/recherche', 'trajetController@chercher_villes' );

Route::get('/trajet', function () {
    return view('offre');
});

Route::get('/trajet/{id}', function ($id) {
  Storage::put('id', $id);
    return redirect('trajet');
});
Route::get('/nouveau', function () {
    return view('new');
})->middleware('auth');
Route::get('/modification/{id}', function ($id) {
    Storage::put('trajet_id', $id);
    return redirect('modification');
})->middleware('auth');

Route::get('/modification', function () {
    if (Storage::get('modifier_offre_first')==0) {
   Storage::put('modifier_offre_first', 1);//1 :acces premier , 0 page non de la modification , 2: acces erreur
       
    }
    return view('modifier_offre');

})->middleware('auth');



Route::get('/verifier', 'UserController@email_verifier' );
Route::get('/show', 'UserController@show' );

Route::get('/profil', function () {
   
    return view('profil');
})->middleware('auth');
Route::get('/profil_content', function () {
   
    return view('profil_content');
});
Route::get('/save', 'trajetController@valider' );
Route::get('/research', 'trajetController@research' );
Route::resource('Modifier_description', 'UserController' );
Route::resource('Modifier_pdp', 'UserController' );
Route::resource('Modifier_identité', 'UserController' );

 //   });


/*
Route::get('/trajets/casablanca-fes', function () {
    return view('villes/casa-fes');
});
Route::get('/trajets/fes-marrakesh', function () {
    return view('villes/fes-kesh');
});
Route::get('/trajets/marrakesh-rabat', function () {
    return view('villes/kesh-rabat');
});
Route::get('/trajets/rabat-casablanca', function () {
    return view('villes/rabat-casa');
});
Route::get('/trajets/fes-tanger', function () {
    return view('villes/fes-tanger');
});
Route::get('/trajets/tanger-hoceima', function () {
    return view('villes/tanger-hoceima');
});
Route::get('/trajets/fes-nador', function () {
    return view('villes/fes-nador');
});
Route::get('/trajets/fes-meknes', function () {
    return view('villes/fes-meknes');
});
*/


//Route::POST('register', 'Auth\RegisterController@create' );
Route::get('/home', 'HomeController@index')->name('home');
