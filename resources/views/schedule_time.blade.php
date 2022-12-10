

@forelse ($dentist_schedules as $dentist_schedule)

@if ($appointments->where('dentist_schedule_id', $dentist_schedule->id)->count()==0)
    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="dentist_schedule_id" id="" value="{{ $dentist_schedule->id }}">
        {{ $dentist_schedule->startTime.'-'.$dentist_schedule->endTime }}
      </label>
    </div>
@else
<div class="form-check">
    <label class="form-check-label">
    <input type="radio" class="form-check-input" name="dentist_schedule_id" value="{{ $dentist_schedule->id }}" disabled>
    {{ $dentist_schedule->startTime.'-'.$dentist_schedule->endTime }} <span class="text-danger">Not available</span>
  </label>
</div>
@endif
    
@empty
    <div class="alert alert-warning">
        <span>
            Not available
        </span>
    </div>
@endforelse
