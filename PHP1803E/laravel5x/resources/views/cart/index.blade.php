@extends('layout')
@section('content')
<div class="row mt-5">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th class="text-center">@lang('cartlang.image')</th>
                    <th>@lang('cartlang.product')</th>
                    <th>@lang('cartlang.quantity')</th>
                    <th>@lang('cartlang.price')</th>
                    <th>@lang('cartlang.totalmoney')</th>
                    <th width="5%">@lang('cartlang.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $key => $carts)
                <tr>
                    <td>{{ $carts->id }}</td>
                    <td>
                        <img class="img img-thumbnail" src="{{ URL::to('/').'/uploads/images/'.$carts->options->image}}" alt="" width="120" height="120">
                    </td>
                    <td>{{ $carts->name }}</td>
                    <td>
                        <input type="number" name="qty[]" value="{{ $carts->qty }}" onchange="updateCart('{{ $key }}', this)">
                    </td>
                    <td>{{ $carts->price }}</td>
                    <td>{{ number_format($carts->qty * $carts->price)  }}</td>
                    <td>
                        <a href="{{ route('cart.delete',['id' => $key]) }}" title="xoa" class="btn btn-sm btn-danger">@lang('cartlang.delete')</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Tong Tien</td>
                    <td colspan="2" id ="totalMoney">{{ Cart::subtotal() }}</td>
                </tr>
            </tfoot>
        </table>
        
    </div>
    <div class="col-lg-12">
        <a href="{{ route('product.index') }}" title="" class="btn btn-primary btn-sm">@lang('cartlang.continue')</a>
        <a href="" title="" class="btn btn-success btn-sm ml-3">@lang('cartlang.pay')</a>
        <a href="{{ route('cart.removeall') }}" title="xoa" class="btn btn-danger btn-sm ml-3">@lang('cartlang.deletecart')</a>
    </div> 
    <script type="text/javascript" >
        function updateCart(rowCart,obj){
            //alert(rowCart);
            let qtyPd = $(obj).val().trim();
            //alert(qtyPd);
            if(qtyPd > 0 && qtyPd < 10){
                $.ajax({
                    url: "{{ route('cart.update') }}",
                    type: "POST",
                    data :{
                        rowCart : rowCart,
                        qtyPd : qtyPd
                    },
                    success: function(res){
                        let dt = $.parseJSON(res)
                        $(obj).parent().next().next().html(dt.money);
                        $('#totalMoney').html(dt.totalmoney);
                    }
                });            
            }else{
                alert("kiem tra lai so luong mua");

            }
    }
</script>    
</div>
@endsection