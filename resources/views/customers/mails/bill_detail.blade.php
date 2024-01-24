<div>
    <h2 style="text-align: center; margin-bottom: 12px">Hóa đơn điện tử đơn hàng <b>#{{ $bill->id }}</b></h2>
    <p><b>Người đặt:</b> {{ $bill->user->name}}</p>
    <p><b>Người nhận:</b> {{ $bill->receiver }}</p>
    <p><b>Phương thức thanh toán:</b> {{ $bill->payment_method }}</p>
    <p><b>Tình trạng đơn hàng:</b> {{ $bill->status }}</p>
    <p><b>Tình trạng thanh toán:</b> {{ $bill->payment_status }}</p>
    <p><b>Địa chỉ:</b> {{ $bill->address_receiver }}</p>
    <p><b>Số điện thoại:</b> {{ $bill->phone_receiver }}</p>
    <div style="margin: 4px 12px;">
        <table style="border-spacing: 0px;">
            <tr>
                <th style="padding: 8px">Mặt hàng</th>
                <th style="padding: 8px">Đơn giá</th>
                <th style="padding: 8px">Số lượng</th>
                <th style="padding: 8px">Thành tiền</th>
            </tr>
            @php
                $billItems = $bill->billItems;
            @endphp
            @foreach ( $billItems as $item )
                <tr style="padding: 8px">
                    <td style="padding: 8px">{{ $item->product->name }}</td>
                    <td style="padding: 8px">{{ number_format($item->price_item) }}</td>
                    <td style="padding: 8px">{{ $item->quantity }}</td>
                    <td style="padding: 8px">{{ number_format($item->price_item * $item->quantity) }} VND</td>
                </tr>
            @endforeach
            <tr style="padding: 8px">
                <td colspan="2" style="padding: 8px">
                    Tổng hóa đơn:
                </td>
                <td colspan="2" style="padding: 8px">
                    <h6 style="text-align: right; margin-top: 12px; color: #227FD6">{{ $bill->payment_amount }}</h6>
                </td>
            </tr>
        </table>
    </div>
    <p><b>Ghi chú:</b> {{ $bill->note }}</p>
    <p><b>Thời gian đặt hàng:</b> {{ $bill->created_at }}</p>
    <p><b>Cập nhật lúc:</b> {{ $bill->updated_at }}</p>
</div>
