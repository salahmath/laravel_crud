<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::latest()->get(); // Charger les produits en utilisant latest() et get()
    return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données de la requête, y compris l'image
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048', // max:2048 pour limiter à 2 Mo et accepter uniquement les images
        ]);

        // Stocker l'image avec un nom unique dans le dossier "public/images"
        $imageName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/images', $imageName);

        // Créer un nouveau produit avec les données validées
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $imageName; // Enregistrer le nom de l'image dans la base de données

        // Enregistrer le produit dans la base de données
        $product->save();

        // Retourner une réponse JSON indiquant que le produit a été créé avec succès
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('products.edit', ['products' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, Products $product)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'image' => 'nullable|image|max:2048',
         ]);

         // Mettre à jour les champs de base
         $product->name = $request->input('name');
         $product->description = $request->input('description');

         if ($request->hasFile('image')) {
             // Supprimer l'ancienne image si elle existe
             if ($product->image) {
                Storage::delete('public/images/' . $product->image);

             }

             // Stocker la nouvelle image
             $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
             $request->file('image')->storeAs('public/images', $imageName);
             $product->image = $imageName;
         }

         $product->save();

         return redirect()->route('products.index')->with('success', 'Product updated successfully');
     }



    /**
     * Remove the specified resource from storage.
     */    public function destroy(Products $product)
    {
        // Supprimer le produit
        $product->delete();

        // Retourner une réponse JSON indiquant que le produit a été supprimé avec succès
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

}
