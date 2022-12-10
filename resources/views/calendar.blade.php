@extends('layout.app')
@section('title', 'Schedule')
@push('styles')
    <style>
        .fc-event-time{
            color: '#fff' !important;
        }
    </style>
@endpush
@section('body')


    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                
                <div class="card-body">
                    <div class="calendar" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script> 
    document.addEventListener('DOMContentLoaded', function () {
        
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            events: @json($events),
            eventTextColor:'#fff',
            eventBackgroundColor:'#ddd',
            slotMinTime: '7:00:00',
            slotMaxTime: '16:00:00',
        });
        calendar.render();
    });
</script>
@endpush