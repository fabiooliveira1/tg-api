<?php

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
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function ($route) {
    // Init route for vuex store
    Route::get('init', 'InitController@index');

    //Rota de Contas
    Route::group(['namespace' => 'Bill', 'prefix' => 'bill'], function ($route) {
        $route->get('', 'BillsController@index');
        $route->post('', 'BillsController@create');
        $route->get('{bill}', 'BillsController@show');
        $route->put('{bill}', 'BillsController@update');
        $route->delete('{bill}', 'BillsController@delete');
    });

    //Rota de Contas bancárias
    Route::group(['namespace' => 'AccountBank', 'prefix' => 'accountBank'], function ($route) {
        $route->get('/', 'AccountBanksController@index');
        $route->get('/{accountBank}', 'AccountBanksController@show');
        $route->post('/', 'AccountBanksController@create');
        $route->put('/{accountBank}', 'AccountBanksController@update');
        $route->delete('/{accountBank}', 'AccountBanksController@delete');
    });

    //Rota de Agência bancárias
    Route::group(['namespace' => 'AgencyBank', 'prefix' => 'agencyBank'], function ($route) {
        $route->get('/', 'AgencyBanksController@index');
        $route->get('/{agencyBank}', 'AgencyBanksController@show');
        $route->post('/', 'AgencyBanksController@create');
        $route->put('/{agencyBank}', 'AgencyBanksController@update');
        $route->delete('/{agencyBank}', 'AgencyBanksController@delete');
    });

    //Rota de Anexos
    Route::group(['namespace' => 'Attachment', 'prefix' => 'attachment'], function ($route) {
        $route->get('/', 'AttachmentsController@index');
        $route->get('/{attachment}', 'AttachmentsController@show');
        $route->post('/', 'AttachmentsController@create');
        $route->put('/{attachment}', 'AttachmentsController@update');
        $route->delete('/{attachment}', 'AttachmentsController@delete');
    });

    //Rota de Bancos
    Route::group(['namespace' => 'Bank', 'prefix' => 'bank'], function ($route) {
        $route->get('/', 'BanksController@index');
        $route->get('/{bank}', 'BanksController@show');
        $route->post('/', 'BanksController@create');
        $route->put('/{bank}', 'BanksController@update');
        $route->delete('/{bank}', 'BanksController@delete');
    });

    //Rota de Grupo de contas
    Route::group(['namespace' => 'BillsGroup', 'prefix' => 'billsGroup'], function ($route) {
        $route->get('/', 'BillsGroupsController@index');
        $route->get('/{billsGroup}', 'BillsGroupsController@show');
        $route->post('/', 'BillsGroupsController@create');
        $route->put('/{billsGroup}', 'BillsGroupsController@update');
        $route->delete('/{billsGroup}', 'BillsGroupsController@delete');
    });

    //Rota de Contatos
    Route::group(['namespace' => 'Contacts', 'prefix' => 'contacts'], function ($route) {
        $route->get('/', 'ContactsController@index');
        $route->get('/{contacts}', 'ContactsController@show');
        $route->post('/', 'ContactsController@create');
        $route->put('/{contacts}', 'ContactsController@update');
        $route->delete('/{contacts}', 'ContactsController@delete');
    });

    //Rota de Forma de Pagamento
    Route::group(['namespace' => 'PaymentWay', 'prefix' => 'paymentWay'], function ($route) {
        $route->get('/', 'PaymentWayController@index');
        $route->get('/{paymentWay}', 'PaymentWayController@show');
        $route->post('/', 'PaymentWayController@create');
        $route->put('/{paymentWay}', 'PaymentWayController@update');
        $route->delete('/{paymentWay}', 'PaymentWayController@delete');
    });

    //Rota de Renegociação
    Route::group(['namespace' => 'Renegotiation', 'prefix' => 'renegotiation'], function ($route) {
        $route->get('/', 'RenegotiationController@index');
        $route->get('/{renegotiation}', 'RenegotiationController@show');
        // $route->get('/{renegotiation}', 'EmailController@sendEmail');
        $route->post('/', 'RenegotiationController@create');
        $route->put('/{renegotiation}/end', 'RenegotiationController@end');
        $route->put('/{renegotiation}', 'RenegotiationController@update');
        $route->delete('/{renegotiation}', 'RenegotiationController@delete');
    });

    //Rota de Requeridos
    Route::group(['namespace' => 'Requireds', 'prefix' => 'requireds'], function ($route) {
        $route->get('/', 'RequiresController@index');
        $route->get('/{requireds}', 'RequiresController@show');
        $route->post('/', 'RequiresController@create');
        $route->put('/{requireds}', 'RequiresController@update');
        $route->delete('/{requireds}', 'RequiresController@delete');
    });

    //Rota de Risco
    Route::group(['namespace' => 'Risk', 'prefix' => 'risk'], function ($route) {
        $route->get('/', 'RiskController@index');
        $route->get('/{risk}', 'RiskController@show');
        $route->post('/', 'RiskController@create');
        $route->put('/{risk}', 'RiskController@update');
        $route->delete('/{risk}', 'RiskController@delete');
    });

    //Rota de Simulação
    Route::group(['namespace' => 'Simulation', 'prefix' => 'simulation'], function ($route) {
        $route->get('/', 'SimulationController@index');
        $route->get('/{simulation}', 'SimulationController@show');
        $route->post('/', 'SimulationController@create');
        $route->put('/{simulation}', 'SimulationController@update');
        $route->delete('/{simulation}', 'SimulationController@delete');
    });

    //Rota de Fornecedores
    Route::group(['namespace' => 'Supplier', 'prefix' => 'supplier'], function ($route) {
        $route->get('/', 'SupplierController@index');
        $route->get('/{supplier}', 'SupplierController@show');
        $route->post('/', 'SupplierController@create');
        $route->put('/{supplier}', 'SupplierController@update');
        $route->delete('/{supplier}', 'SupplierController@delete');
    });

    //Rota de Usuários
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function ($route) {
        $route->get('/', 'UserController@index');
        $route->get('/{user}', 'UserController@show');
        $route->post('/', 'UserController@create');
        $route->put('/{user}', 'UserController@update');
        $route->delete('/{user}', 'UserController@delete');
    });
});
