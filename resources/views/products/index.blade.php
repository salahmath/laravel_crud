@extends('products.layout')
@section('content')

<a href="{{ route('products.create') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Primary</button></a>

<table class="table table-dark table-striped">
<thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($products as $item)
<tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->description }}</td>
    <td>
    @if ($item->image)
        <img src="{{ asset('storage/images/' . $item->image) }}" alt="Product Image" style="max-width: 100px;">
    @else
        <span>Aucune image disponible</span>
    @endif
</td>
    <td>
        <!-- Boutons pour les actions comme la modification, l'affichage et la suppression -->
        <form action="{{ route('products.destroy', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>

        <a href="{{ route('products.show', $item->id) }}" class="btn btn-primary">Voir</a>
        <a href="{{ route('products.edit', $item->id) }}" class="btn btn-primary">modifier</a>

    </td>
</tr>
@endforeach

  </tbody>
</table>
@endsection
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
