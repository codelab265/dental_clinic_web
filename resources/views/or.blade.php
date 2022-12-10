@foreach ($officialReceipts as $officialReceipt)
    <option value="{{ $officialReceipt->id }}">{{ $officialReceipt->OR_number }}</option>
@endforeach
