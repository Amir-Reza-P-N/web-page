<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserStubController extends Controller
{
    // in-memory store (for demonstration; resets on each request)
    private static array $store = [
        ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
        ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
    ];

    public function index(): JsonResponse
    {
        return response()->json(array_values(self::$store));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        $id = count(self::$store) ? max(array_column(self::$store,'id')) + 1 : 1;
        $entry = ['id' => $id] + $data;
        self::$store[$id] = $entry;
        return response()->json($entry, 201);
    }

    public function show($id): JsonResponse
    {
        foreach (self::$store as $item) {
            if ($item['id'] == $id) return response()->json($item);
        }
        return response()->json(['message'=>'Not Found'],404);
    }

    public function update(Request $request, $id): JsonResponse
    {
        foreach (self::$store as $key => $item) {
            if ($item['id'] == $id) {
                $data = $request->validate([
                    'name' => 'sometimes|required|string',
                    'email' => 'sometimes|required|email',
                ]);
                $updated = array_merge($item, $data);
                self::$store[$key] = $updated;
                return response()->json($updated);
            }
        }
        return response()->json(['message'=>'Not Found'],404);
    }

    public function destroy($id): JsonResponse
    {
        foreach (self::$store as $key => $item) {
            if ($item['id'] == $id) {
                unset(self::$store[$key]);
                return response()->json(null,204);
            }
        }
        return response()->json(['message'=>'Not Found'],404);
    }
}
