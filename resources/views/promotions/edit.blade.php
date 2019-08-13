@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update promotion</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('promotions.update', $promotion->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="shop">Magasin</label>
                <input type="text" class="form-control" name="shop" value='{{ $promotion->shop }}' />
            </div>

            <div class="form-code">
                    <label for="product_lib">Produit</label>
                    <input type="text" class="form-control" name="product_lib" value='{{ $promotion->product_lib }}' />
                </div>

            <div class="form-group">
              <label for="discount">Réduction</label>
              <input type="number" class="form-control" name="discount" min="0" step="0.01" value='{{ $promotion->discount }}'/>
          </div>


            <div class="form-group">
              <label for="number_products_needed">Nombre de produit à acheter</label>
              <input type="number" class="form-control" name="number_products_needed" value='{{ $promotion->number_products_needed }}'/>
          </div>

          <div class="form-group">
              <label for="minimum_basket_price">Montant minimum d'achat</label>
              <input type="number" class="form-control" name="minimum_basket_price" value='{{ $promotion->minimum_basket_price }}'/>
          </div>

          <div class="form-group">
              <label for="expiration">Date d'expiration</label>
              <input type="date" class="form-control" name="expiration" value={{ $promotion->expiration }}/>
          </div>


          <div class="form-group">
                <label for="used">Utilisé</label>
                <input type="checkbox" class="form-control" name="used" {{ $promotion->used ? 'checked' : '' }} />
            </div>

            <div class="form-group">
                    <label for="notify_me">Alerte</label>
                    <input type="checkbox" class="form-control" name="notify_me" {{ $promotion->notify_me ? 'checked' : '' }} />
                </div>




            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
