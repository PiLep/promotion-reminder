@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Promotions</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('promotions.create')}}" class="btn btn-primary">Ajouter promotion</a>
    </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Magasin</td>

          <td>Produit</td>


          <td>Réduction</td>
          <td>Expiration</td>

          <td>Utilisée</td>
          <td>Alertes</td>

          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($promotions as $promotion)
        <tr>
            <td>{{$promotion->shop}}</td>
            <td>{{$promotion->product_lib}}</td>
            <td>{{$promotion->discount}}</td>


            <td>{{ $promotion->expiration ? $promotion->expiration->format('d/m/Y') : ''  }}</td>

            <td>{!! $promotion->used ? '<i class="fas fa-check"></i>' : '' !!} </td>
            <td>{!! $promotion->notify_me ? '<i class="fas fa-check"></i>' : '' !!} </td>

            <td>
                <a href="{{ route('promotions.edit',$promotion->id)}}" class="btn btn-primary">Editer</a>
            </td>
            <td>
                <form action="{{ route('promotions.destroy', $promotion->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

<div class="col-sm-12">

    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
  </div>
