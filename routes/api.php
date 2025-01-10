use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;

Route::get('/students/filter', [StudentController::class, 'filter']);
Route::get('/classes/{class}/sections', [ClassController::class, 'getSections']); 