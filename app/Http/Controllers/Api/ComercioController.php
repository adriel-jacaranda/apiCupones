<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Exception;

class ComercioController extends Controller
{
    /**
     * @group Creación de Comercios ADM
     * 
     * Obtener todos los comercios
     * 
     * Devuelve una lista de todos los comercios registrados.
     * 
     * @authenticated
     * 
     * @response 200 scenario="Éxito" [
     *   {
     *     "id": 1,
     *     "nombre": "Supermercado Central",
     *     "direccion": "Av. Busch 123",
     *     "telefono": "78945612",
     *     "lat": -17.781,
     *     "lng": -63.182,
     *     "categoria_almacen_id": 2,
     *     "activo": true,
     *     "logo": "almacenes/logo1.png"
     *   }
     * ]
     */
    public function index()
    {
        return response()->json(Comercio::all());
    }

    /**
     * @group Creación de Comercios ADM
     * 
     * Obtener todos los comercios (Web)
     * 
     * Similar al método anterior, pensado para vista web o administración.
     * 
     */
    public function indexW()
    {
        return response()->json(Comercio::all());
    }

    /**
     * @group Z Flujo de Redimición de Clientes
     * 
     * Obtener campañas de un almacén
     * 
     * Retorna el almacén junto con sus campañas y cupones asociados.
     * 
     * @urlParam id integer required ID del almacén. Example: 5
     * 
     * @response 200 scenario="Éxito" {
     *   "id": 5,
     *   "nombre": "Tienda NamNam",
     *   "categoria": {"id": 1, "nombre": "Comida"},
     *   "campanias": [
     *      {
     *         "id": 10,
     *         "titulo": "Promo Halloween",
     *         "cupones": [
     *            {"id": 1, "codigo": "HALLO50", "descuento": "50%"}
     *         ]
     *      }
     *   ]
     * }
     */
    public function campaniasDeAlmacen($id)
    {
        $almacen = Comercio::with(['campanias.cupones', 'categoria'])->findOrFail($id);
        return response()->json($almacen);
    }

    /**
     * @group Creación de Comercios ADM
     * 
     * Obtener comercios por categoría
     * 
     * Devuelve una lista de comercios filtrados por su categoría.
     * 
     * @urlParam categoriaId integer required ID de la categoría. Example: 2
     * @authenticated
     */
    public function porCategoria($categoriaId)
    {
        $almacenes = Comercio::where('categoria_almacen_id', $categoriaId)->get();
        return response()->json($almacenes);
    }

    /**
     * @group Creación de Comercios ADM
     * 
     * Mostrar un comercio específico
     * 
     * Obtiene los datos de un comercio a partir de su ID.
     * 
     * @urlParam id integer required ID del comercio. Example: 3
     * @authenticated
     * 
     * @response 200 scenario="Éxito" {
     *   "id": 3,
     *   "nombre": "Farmacia Salud",
     *   "telefono": "77445566",
     *   "activo": true
     * }
     * @response 404 scenario="No encontrado" {"message": "Almacén no encontrado"}
     */
    public function show($id)
    {
        $almacen = Comercio::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }
        return response()->json($almacen);
    }

    /**
     * @group Creación de Comercios ADM
     * 
     * Crear un nuevo comercio
     * 
     * Crea un nuevo registro de comercio.  
     * Soporta subida de imagen (`logo`) y requiere autenticación.
     * 
     * @authenticated
     * 
     * @bodyParam nombre string required Nombre del comercio. Example: "MiniMarket Sol"
     * @bodyParam direccion string Dirección del comercio. Example: "Av. Pando #56"
     * @bodyParam telefono string Teléfono de contacto. Example: "76543210"
     * @bodyParam lat numeric Latitud del comercio. Example: -17.394
     * @bodyParam lng numeric Longitud del comercio. Example: -66.154
     * @bodyParam categoria_almacen_id integer ID de la categoría. Example: 4
     * @bodyParam activo boolean Estado del comercio. Example: true
     
     * 
     * @response 201 scenario="Creado" {
     *   "id": 12,
     *   "nombre": "MiniMarket Sol",
     *   "logo": "almacenes/minimarket_sol.png"
     * }
     * @response 422 scenario="Validación fallida" {"errors": {"nombre": ["El campo nombre es obligatorio."]}}
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'direccion' => 'nullable|string',
                'telefono' => 'nullable|string|max:20',
                'lat' => 'nullable|numeric|between:-90,90',
                'lng' => 'nullable|numeric|between:-180,180',
                'categoria_almacen_id' => 'nullable|exists:categoria_almacen,id',
                'activo' => 'nullable|boolean',
                'logo' => 'nullable|image|max:2048',
            ]);

            $data = $request->except('logo');

            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('almacenes', 'public');
                $data['logo'] = $path;
            }

            $almacen = Comercio::create($data);

            return response()->json($almacen, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear almacén', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Creación de Comercios ADM
     * 
     * Actualizar un comercio existente
     * 
     * Permite modificar los datos de un comercio.
     * 
     * @urlParam id integer required ID del comercio. Example: 10
     * @authenticated
     * 
     * @bodyParam nombre string Nombre del comercio. Example: "Super Sol"
     * @bodyParam direccion string Dirección. Example: "Av. América #123"
     * @bodyParam telefono string Teléfono. Example: "70445566"
     * @bodyParam activo boolean Estado. Example: true
     
     * 
     * @response 200 scenario="Actualizado" {
     *   "id": 10,
     *   "nombre": "Super Sol",
     *   "activo": true
     * }
     * @response 404 {"message": "Almacén no encontrado"}
     */
    public function update(Request $request, $id)
    {
        $almacen = Comercio::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }

        try {
            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'direccion' => 'nullable|string',
                'telefono' => 'nullable|string|max:20',
                'lat' => 'nullable|numeric|between:-90,90',
                'lng' => 'nullable|numeric|between:-180,180',
                'categoria_almacen_id' => 'nullable|exists:categoria_almacen,id',
                'activo' => 'nullable|boolean',
                'logo' => 'nullable|image|max:2048',
            ]);

            $data = $request->except('logo');

            if ($request->hasFile('logo')) {
                if ($almacen->logo && Storage::disk('public')->exists($almacen->logo)) {
                    Storage::disk('public')->delete($almacen->logo);
                }
                $path = $request->file('logo')->store('almacenes', 'public');
                $data['logo'] = $path;
            }

            $almacen->update($data);

            return response()->json($almacen);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar almacén', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Creación de Comercios ADM
     * 
     * Eliminar un comercio
     * 
     * Elimina el comercio indicado por ID y su imagen asociada (si existe).
     * 
     * @urlParam id integer required ID del comercio. Example: 8
     * @authenticated
     * 
     * @response 200 {"message": "Almacén eliminado correctamente"}
     * @response 404 {"message": "Almacén no encontrado"}
     */
    public function destroy($id)
    {
        $almacen = Comercio::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }

        try {
            if ($almacen->logo && Storage::disk('public')->exists($almacen->logo)) {
                Storage::disk('public')->delete($almacen->logo);
            }

            $almacen->delete();
            return response()->json(['message' => 'Almacén eliminado correctamente']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar almacén', 'error' => $e->getMessage()], 500);
        }
    }
}
