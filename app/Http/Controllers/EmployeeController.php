<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departament;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
* @OA\Info(
*             title="Api Ksandra", 
*             version="1.0",
*             description="Rutas para gestion de empleados"
* )
*
* @OA\Server(url="http://127.0.0.1:8000/")
*/
class EmployeeController extends Controller
{
   /**
     * Listado de todos los empleados
     * @OA\Get (
     *     path="/api/employees",
     *     tags={"Employees"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="Aderson Felix"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="pruebas@gmail.com"
     *                     ),
     *                      @OA\Property(
     *                         property="departament_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-02-23T00:09:16.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-02-23T12:33:45.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $employees = Employee::select('employees.*'
        ,'departaments.name as departament')
        ->join('departaments', 'departaments.id', '=', 'employees.departament_id')
        ->paginate(10);
        return response()->json($employees);
    }

    
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required|string|min:1|max:100',
            'email'=> 'required|email|max:80',
            'phone'=> 'required|max:15',
            'departament_id'=> 'required|numeric',
        ];

       $validator = Validator::make($request->input(), $rules);
       if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $employee = new Employee($request->input());
        $employee->save();

        return response()->json([
            'status' => true,
            'mesagge' => 'employee created successfully'
        ], 200);

    }
    

     /**
     * Mostrar la información de un cliente
     * @OA\Get (
     *     path="/api/employees/{id}",
     *     tags={"Employees"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombres", type="string", example="Aderson Felix"),
     *              @OA\Property(property="apellidos", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */
    public function show(Employee $employee)
    {
        return response()->json(['status'=> true, 'data' =>$employee]);
    }


    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'name'=> 'required|string|min:1|max:100',
            'email'=> 'required|email|max:80',
            'phone'=> 'required|max:15',
            'departament_id'=> 'required|numeric',
        ];

       $validator = Validator::make($request->input(), $rules);
       if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $employee->update($request->input());
        $employee->save();

        return response()->json([
            'status' => true,
            'mesagge' => 'employee updated successfully'
        ], 200);
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'status' => true,
            'mesagge' => 'employee deleted successfully'
        ], 200);
    }

    public function empleyeeByDepartament(){
        $employees = Employee::select(DB::raw('count(employees.id) as count, departaments.name'))
        ->rightjoin('departaments','departaments.id', '=', 'employees.departament_id')
        ->groupBy('departaments.name')->get();
        return response()->json($employees);
    }

    public function all(){
        $employees = Employee::select('employees.*', 'departaments.name as departament')
        ->join('departaments','departaments.id', '=', 'employees.departament_id')
        ->get();
        return response()->json($employees);
    }
}
