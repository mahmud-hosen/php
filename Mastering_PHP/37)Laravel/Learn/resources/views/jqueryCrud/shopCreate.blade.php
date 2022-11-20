<form action=" {{ route('shop.store') }}" method="POST">
  @csrf
            <div class="form-group">
              <label for="shop_owner" class="col-form-label">Shop Owner</label>
              <input type="text" class="form-control" id="shop_owner" name="shop_owner">
            </div>

            <div class="form-group">
              <label for="shop_name" class="col-form-label">Shop Name</label>
              <input type="text" class="form-control" id="shop_name" name="shop_name">
            </div>

            <div class="form-group">
              <label for="shop_location" class="col-form-label">Shop Location</label>
              <input type="text" class="form-control" id="shop_location" name="shop_location">
            </div>

             <div class="text-right">
               <button type="submit" class="btn btn-primary">Create</button>
           </div>
</form>