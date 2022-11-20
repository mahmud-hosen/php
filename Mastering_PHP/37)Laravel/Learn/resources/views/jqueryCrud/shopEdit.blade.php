<form action=" {{ route('shop.update',['id' => $shop_data->id]) }}" method="POST">
  @csrf
            <div class="form-group">
              <label for="shop_owner" class="col-form-label">Shop Owner</label>
              <input type="text" class="form-control" value="{{$shop_data->shop_owner}}" id="shop_owner" name="shop_owner">
            </div>

            <div class="form-group">
              <label for="shop_name" class="col-form-label">Shop Name</label>
              <input type="text" class="form-control" value="{{$shop_data->shop_name}}" id="shop_name" name="shop_name">
            </div>

            <div class="form-group">
              <label for="shop_location" class="col-form-label">Shop Location</label>
              <input type="text" class="form-control" value="{{$shop_data->shop_location}}" id="shop_location" name="shop_location">
            </div>

             <div class="text-right">
               <button type="submit" class="btn btn-primary">Update</button>
           </div>
</form>