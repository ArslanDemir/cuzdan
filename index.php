<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<script src="Lib/Js/jquery.js"></script>
<script src="Lib/Js/process.js"></script>
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

	Router::post('/islemler/gider','BudgetController@addExpenses');
	Router::post('/islemler/gelir','BudgetController@addIncomes');
}

Router::dispatch();
?>