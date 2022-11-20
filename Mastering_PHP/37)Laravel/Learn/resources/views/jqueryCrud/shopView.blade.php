 
 @extends('jqueryCrud.home')
 @section('content')


<a href="javascript:;" type="button" class="btn btn-primary " onclick="showAjaxModal('{{ route('shop.create') }}', '{{ 'Create Shop' }}')">Shop Create</a>
  <h2>Shop Table Data</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Shop Owner</th>
        <th>Shop Name</th>
        <th>Location</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($shop_data as $data)
      <tr>
        <td>{{ $data->shop_owner }}</td>
        <td>{{ $data->shop_name }}</td>
        <td>{{ $data->shop_location }}</td>
        <td>
          <div>
            <a type="button" class="btn btn-primary " href="{{ route('shop.delete', ['id' => $data->id]) }}"><i class="bi bi-x-lg"></i>Delete </a> 
            <a href="javascript:;" type="button" class="btn btn-primary " onclick="showAjaxModal('{{ route('shop.edit',['id' => $data->id]) }}', '{{ 'Create Edit' }}')">Edit</a>

          </div>
        </td>
        

      </tr>
      @endforeach
      
    </tbody>
  </table>

  @endsection