<?php

use App\Http\Controllers\absenceController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\DirectorMiddleware;
use App\Http\Middleware\GeneralGuardMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\directorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\UtilisationDuTempsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Contact2Controller;
use App\Http\Controllers\CertificatController;


use App\Http\Controllers\StudentController;



Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/search', [StudentController::class, 'searchByPhoneNumber'])->name('searchByPhoneNumber');



Route::get('/certificats/create', [CertificatController::class, 'create'])->name('certificats.create');
Route::post('/certificats', [CertificatController::class, 'store'])->name('certificats.store');









Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/About', [AccueilController::class, 'index2'])->name('About');
Route::get('/Nouvelles', [NewsController::class, 'index3'])->name('Nouvelles');
Route::get('/Calendriers', [UtilisationDuTempsController::class, 'index4'])->name('Calendriers');
Route::get('/filterB', [UtilisationDuTempsController::class, 'index4'])->name('filterByDepartement');

Route::post('/contact', [ContactController::class, 'submitForm']);
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');





Route::get('/login', [LoginController::class, 'indexLogin'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');





// director dashboard :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

Route::group(['middleware' => ['auth', DirectorMiddleware::class]], function () {

    Route::get('/dashboard/allGeneralGuard', [directorController::class, "index"])->name('general_guard');
    Route::get('/dashboard/addGeneralGuard', [directorController::class, "create"])->name('addGeneralGuard');
    Route::delete('/dashboard/deleteGeneralGuard/{id}', [directorController::class, "destroy"])->name('deleteGeneral_guard');
    Route::get('/dashboard/updateGeneralGuard/{id}/edit', [directorController::class, "edit"])->name('updateGeneral_guard');
    Route::patch('/dashboard/updateGeneralGuard/{id}', [directorController::class, "update"])->name('saveUpdate');
    Route::post('/dashboard/saveGeneralGuard', [directorController::class, "store"])->name('saveGeneralGuard');
    Route::get('/dashboard/filter', [directorController::class, "filter"])->name('filterGeneralGuards');


    Route::delete('/dashboard/deleteMatiere/{id}', [directorController::class, "destroyMatiere"])->name('deleteMatiere');
    Route::get('/dashboard/addMatiere', [directorController::class, "showCreateMatiere"])->name('addMatiere');
    Route::post('/dashboard/addMatiere/', [directorController::class, "saveMatiere"])->name('saveMatiere');
    Route::get('/dashboard/Matieres', [directorController::class, "displayMatieres"])->name('displayMatieres');



    Route::get('/dashboard/departements', [directorController::class, "showDepartements"])->name('showDepartements');
    Route::get('/dashboard/updateDepartement/{id}', [directorController::class, "updateDepartement"])->name('updateDepartement');
    Route::patch('/dashboard/updateDepartement/{id}', [directorController::class, "saveUpdateDepartement"])->name('saveUpdateDepartement');
    Route::get('/dashboard/addDepartement', [directorController::class, "addDepartement"])->name('addDepartement');
    Route::post('/dashboard/addDepartement', [directorController::class, "saveDepartement"])->name('saveDepartement');
    Route::delete('/dashboard/deleteDepartement/{id}', [directorController::class, "destroyDepartement"])->name('deleteDepartement');



    Route::get('/dashboard/professeurs', [directorController::class, "displayTeachers"])->name('displayTeachers');
    Route::get('/dashboard/addTeacher', [directorController::class, "addTeacher"])->name('addTeacher');
    Route::get('/dashboard/updateTeacher/{id}', [directorController::class, "updateTeacher"])->name('updateTeacher');
    Route::patch('/dashboard/updateTeacher/{id}', [directorController::class, "saveUpdate"])->name('saveUpdateTeacher');
    Route::post('/dashboard/addTeacher', [directorController::class, "saveTeacher"])->name('saveTeacher');
    Route::delete('/dashboard/deleteTeacher/{id}', [directorController::class, "destroyTeacher"])->name('deleteTeacher');



    // absence ::::::::::::::::::::::::::::::::::::::::::::

    Route::get('/dashboard/selectAbsence', [absenceController::class, "selectDepartement"])->name('selectDepartement');
    Route::get('/dashboard/weekAbsence', [absenceController::class, "displayAbsence"])->name("showweekAbsence");
    Route::get('/dashboard/download-pdf', [absenceController::class, "downloadPdf"])->name('download.pdf');


    // edit info  ::::::::::::::::::::::::::::::::::
    Route::get('dashboard/info', [LoginController::class, "displayInfo"])->name('displayInfo');
    Route::post('dashboard/saveInfo', [LoginController::class, "saveInfo"])->name('saveInfo');



    //zitouni routes  ::::::::::::::::::::::::::::::::
    Route::get('/certificats/{certificat}', [CertificatController::class, 'show'])->name('certificats.show');
    Route::delete('/certificats/{certificat}', [CertificatController::class, 'destroy'])->name('certificats.destroy');
    Route::get('/certificats', [CertificatController::class, 'index'])->name('certificats.index');
    Route::put('/certificats/{id}/update_statut', [CertificatController::class, 'updateStatut'])->name('update_statuttt');

    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::put('/student/{id}/update_statut', [StudentController::class, 'updateStatut'])->name('update_statut');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    Route::resource('news', NewsController::class);
    Route::resource('utilisations', UtilisationDuTempsController::class);
    Route::get('/utilisations/create', [UtilisationDuTempsController::class, 'create'])->name('utilisations.create');
    Route::get('/filter', [UtilisationDuTempsController::class, 'index'])->name('filterByDepartementInZitouniDash');
    Route::get('/contact', [ContactController::class, 'showForm']);
    Route::delete('/messages/{id}', [ContactController::class, 'deleteMessage']);
    Route::get('/messages', [ContactController::class, 'showMessage']);
    Route::get('/contacts', [Contact2Controller::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}/edit', [Contact2Controller::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [Contact2Controller::class, 'update'])->name('contacts.update');
});


// general guard dashboard ::::::::::::::::::::::::::::::::::::::::::::::::::::::::

Route::group(['middleware' => ['auth', GeneralGuardMiddleware::class]], function () {

    Route::delete('/dashboard/deleteMatiere/{id}', [directorController::class, "destroyMatiere"])->name('deleteMatiere');
    Route::get('/dashboard/addMatiere', [directorController::class, "showCreateMatiere"])->name('addMatiere');
    Route::post('/dashboard/addMatiere/', [directorController::class, "saveMatiere"])->name('saveMatiere');
    Route::get('/dashboard/Matieres', [directorController::class, "displayMatieres"])->name('displayMatieres');



    Route::get('/dashboard/departements', [directorController::class, "showDepartements"])->name('showDepartements');
    Route::get('/dashboard/updateDepartement/{id}', [directorController::class, "updateDepartement"])->name('updateDepartement');
    Route::patch('/dashboard/updateDepartement/{id}', [directorController::class, "saveUpdateDepartement"])->name('saveUpdateDepartement');
    Route::get('/dashboard/addDepartement', [directorController::class, "addDepartement"])->name('addDepartement');
    Route::post('/dashboard/addDepartement', [directorController::class, "saveDepartement"])->name('saveDepartement');
    Route::delete('/dashboard/deleteDepartement/{id}', [directorController::class, "destroyDepartement"])->name('deleteDepartement');



    Route::get('/dashboard/professeurs', [directorController::class, "displayTeachers"])->name('displayTeachers');
    Route::get('/dashboard/addTeacher', [directorController::class, "addTeacher"])->name('addTeacher');
    Route::get('/dashboard/updateTeacher/{id}', [directorController::class, "updateTeacher"])->name('updateTeacher');
    Route::patch('/dashboard/updateTeacher/{id}', [directorController::class, "saveUpdate"])->name('saveUpdateTeacher');
    Route::post('/dashboard/addTeacher', [directorController::class, "saveTeacher"])->name('saveTeacher');
    Route::delete('/dashboard/deleteTeacher/{id}', [directorController::class, "destroyTeacher"])->name('deleteTeacher');


    //absence :::::::::::::::::::::::::::::::::
    Route::get('/dashboard/selectAbsence', [absenceController::class, "selectDepartement"])->name('selectDepartement');
    Route::get('/dashboard/weekAbsence', [absenceController::class, "displayAbsence"])->name("showweekAbsence");
    Route::get('/dashboard/download-pdf', [absenceController::class, "downloadPdf"])->name('download.pdf');

    //profil :::::::::::::::::::::::::::::::::::::
    Route::get('dashboard/info', [LoginController::class, "displayInfo"])->name('displayInfo');
    Route::post('dashboard/saveInfo', [LoginController::class, "saveInfo"])->name('saveInfo');


    //zitouni routes  ::::::::::::::::::::::::::::::::

    Route::get('/certificats/{certificat}', [CertificatController::class, 'show'])->name('certificats.show');
    Route::delete('/certificats/{certificat}', [CertificatController::class, 'destroy'])->name('certificats.destroy');
    Route::get('/certificats', [CertificatController::class, 'index'])->name('certificats.index');
    Route::put('/certificats/{id}/update_statut', [CertificatController::class, 'updateStatut'])->name('update_statuttt');

    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::put('/student/{id}/update_statut', [StudentController::class, 'updateStatut'])->name('update_statut');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');



    Route::resource('news', NewsController::class);
    Route::resource('utilisations', UtilisationDuTempsController::class);
    Route::get('/utilisations/{utilisation}', [UtilisationDuTempsController::class, 'show'])->name('utilisations.show');
    Route::get('/contact', [ContactController::class, 'showForm']);
    Route::delete('/messages/{id}', [ContactController::class, 'deleteMessage']);
    Route::get('/messages', [ContactController::class, 'showMessage']);
    Route::get('/contacts', [Contact2Controller::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}/edit', [Contact2Controller::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [Contact2Controller::class, 'update'])->name('contacts.update');
});


// teacher dashboard :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

Route::group(['middleware' => ['auth', TeacherMiddleware::class]], function () {
    Route::get('/dashboard', [teacherController::class, "teacherDashboard"])->name('teacherDashboard');
    Route::match(['get', 'post'], '/dashboard/absence/', [teacherController::class, "displayAbsence"])->name('displayAbsence');
    Route::post('/dashboard/saveAbsence', [teacherController::class, "create"])->name('saveAbsence');
    Route::get('/dashboard/absence/{id}/edit', [teacherController::class, "editAbsence"])->name('editAbsence');
    Route::put('/dashboard/absence/{id}', [teacherController::class, "updateAbsence"])->name('updateAbsence');
    // edit password
    Route::get('dashboard/profile', [LoginController::class, "displayInfo"])->name('displayProfile');
    Route::post('dashboard/save', [LoginController::class, "saveNew"])->name('saveNew');
});


// director
