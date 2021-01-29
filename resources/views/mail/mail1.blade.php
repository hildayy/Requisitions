@component('mail::message')
# Hello

Kindly review the requistion


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Item</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Cost</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->requisitions as $item)
        <tr>
            <td>1</td>
            <td>{{$item['Item']}}</td>
            <td>{{$item['description']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['cost']}}</td>
            <td class="amount">{{$item['total']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@component('mail::button', ['url' => $url_1])
Reject
@endcomponent

@component('mail::button', ['url' => $url_2])
Approve
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
