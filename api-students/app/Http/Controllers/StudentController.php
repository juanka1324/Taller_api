<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Category;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'email' => 'required|email',
            'category_id' => 'required|exists:categories,id', // Valida que el category_id exista en la tabla categories
            // Otras reglas de validación
        ]);
        return response()->json($validatedData, 201);
        
    
        // Crea el estudiante
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $student->load('category'); // Carga la relación con la categoría
        return response()->json($student);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        // Valida la solicitud utilizando el Request personalizado
        $validatedData = $request->validated();
        
        // Valida que el valor de la clave foránea sea un ID existente en la tabla de categorías
        if (!$this->isValidCategoryId($validatedData['category_id'])) {
            return response()->json(['error' => 'Invalid category ID'], 400);
        }

        $student = Student::findOrFail($id);
        $student->update($validatedData);
        
        return response()->json($student);
    }
    private function isValidCategoryId($categoryId)
    {
        // Verifica si el ID de la categoría existe en la tabla de categorías
        return Category::where('id', $categoryId)->exists();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }
}
