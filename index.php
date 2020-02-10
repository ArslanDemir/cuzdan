<?php
define('ROOTFOLDER', dirname($_SERVER['SCRIPT_NAME']));
define('CDIR', __DIR__.'/Controller');
define('VDIR', __DIR__.'/View');
define('MDIR', __DIR__.'/Model');
define('PDIR', __DIR__.'/Pages');
define('LDIR', __DIR__.'/Lib');
require_once 'autoload.php';
require_once 'router.php';
require_once LDIR.'/db.php';


session_start();

Router::get('/', function(){
	Controller::redirect('login');
});

Router::get('/login','UserController@viewLogin');
Router::post('/login','UserController@login');

Router::get('/register','UserController@viewRegister');
Router::post('/register','UserController@register');

if (isset($_SESSION['login'])) {

	Router::get('/panel','BudgetController@view');


	Router::get('/giderler','BudgetController@getExpenses');
	Router::get('/gelirler','BudgetController@getIncomes');


	Router::get('/giderTurler','BudgetController@getExpensesTypes');
	Router::get('/gelirTurler','BudgetController@getIncomesTypes');

	Router::post('/islemler/gider','BudgetController@addExpenses');
	Router::post('/islemler/gelir','BudgetController@addIncomes');


	Router::post('/islemler/giderTuru','BudgetController@addExpensesType');
	Router::post('/islemler/gelirTuru','BudgetController@addIncomesType');
}

Router::dispatch();
?>