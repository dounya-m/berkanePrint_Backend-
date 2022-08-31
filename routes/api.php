<?php

// use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FrounisseurController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChildcategorieController;
use App\Http\Controllers\CataloqueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', [App\Http\Controllers\AuthController::class, 'user']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);


//client api
Route::get('get', [ClientsController::class, 'index']);
Route::get('selectname', [ClientsController::class, 'selectname']);
Route::get('todayclient', [ClientsController::class, 'today']);
Route::get('lastclients', [ClientsController::class, 'last']);
Route::get('allclients', [ClientsController::class, 'allclients']);

Route::post('insertclients', [ClientsController::class, 'insrtclients']);
Route::post('updateclient/{id}', [ClientsController::class, 'updateclient']);
Route::post('deleteclient/{id}', [ClientsController::class, 'deleteclient']);
Route::post('oneclient/{id}', [ClientsController::class, 'oneclient']);
Route::post('commandeclient',[ClientsController::class, 'commandeclient']);

// Route::get('searchclient/{client_name}', [ClientsController::class, 'search']);


//fournisseur api
Route::get('getf', [FrounisseurController::class, 'index']);
Route::get('allfrournisseur', [FrounisseurController::class, 'allfrournisseur']);
Route::get('fname', [FrounisseurController::class, 'fname']);
Route::get('todayf', [FrounisseurController::class, 'today']);
Route::get('lastf', [FrounisseurController::class, 'lastf']);

Route::post('addfournisseur', [FrounisseurController::class, 'addfournisseur']);
Route::post('depFournisseur', [FrounisseurController::class, 'depFournisseur']);
Route::post('updatef/{id}', [FrounisseurController::class, 'updatefrournisseur']);
Route::post('deletef/{id}', [FrounisseurController::class, 'deletefournisseur']);



//commande api
Route::get('allcommande', [CommandeController::class, 'allcommande']);
Route::get('cmdN', [CommandeController::class, 'commandenumber']);
Route::get('lastweek', [CommandeController::class, 'lastweek']);
Route::get('todaycmd', [CommandeController::class, 'today']);
Route::get('commandepaye', [CommandeController::class, 'commandepaye']);
Route::get('commandenonpaye', [CommandeController::class, 'commandenonpaye']);

Route::post('addcommande', [CommandeController::class, 'addcommande']);
Route::post('updatecmd/{id_commande}', [CommandeController::class, 'updatecmd']);
Route::post('deletecmd/{id_commande}', [CommandeController::class, 'deletecmd']);
Route::post('clientname', [CommandeController::class, 'clientcmd']);
// Route::post('clname', [CommandeController::class, 'clientname']);
Route::post('depcommande', [CommandeController::class, 'depcommande']);



//depense api
Route::get('getdep', [DepenseController::class, 'index']);
Route::get('alldepense', [DepenseController::class, 'alldepense']);
Route::get('weekdep', [DepenseController::class, 'weekdep']);
Route::get('todaydep', [DepenseController::class, 'todaydep']);
Route::get('depaye', [DepenseController::class, 'deppaye']);
Route::get('depnonpaye', [DepenseController::class, 'depnonpaye']);

Route::post('adddepense', [DepenseController::class, 'adddep']);
Route::post('updatedep/{id_dep}', [DepenseController::class, 'update']);
Route::post('deletedep/{id_dep}', [DepenseController::class, 'destroy']);
Route::post('depensedelete', [DepenseController::class, 'delete']);
Route::post('fournisseurname', [DepenseController::class, 'fourname']);


//Categories api
Route::get('cat', [CategorieController::class, 'index']);
Route::get('allcategory', [CategorieController::class, 'all']);

Route::post('insertcat', [CategorieController::class, 'insertCat']);


//Child categorie Api
Route::get('allchild', [ChildcategorieController::class, 'all']);


Route::post('insertchild', [ChildcategorieController::class, 'insertchild']);


//Categorie api
Route::get('allcatalogue', [CataloqueController::class, 'all']);
Route::get('lastpost', [CataloqueController::class, 'last']);

Route::post('deletpost/{id_catalogue}', [CataloqueController::class, 'delet']);
Route::post('insertcatalogue', [CataloqueController::class, 'insertcat']);





Route::group(['prefix' => 'v1'], function () { Route::get('sendmail', 'MailController@sendmail'); });
