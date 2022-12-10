@foreach ($medicalRecords as $medicalRecord)
    <option value="{{ $medicalRecord->id }}">{{ $medicalRecord->service->name }}</option>
@endforeach
