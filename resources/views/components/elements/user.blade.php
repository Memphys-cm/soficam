@if($attributes['options'] instanceof \Illuminate\Database\Eloquent\Collection)

@foreach($attributes['options'] as $key=>$option)
<a href="#" class="d-flex align-items-center {{!$loop->last ? 'border-bottom' : ''}} py-1">
    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2"><span class="text-white">{{$option->initials}}</span></div>
    <div class="d-block">
        <span class="fw-bolder ">{{ucwords($option->name)}}</span>
        <div class="small text-gray">
            
            <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg> {{$option->primary_phone_number}} | {{$option->secondary_phone_number}}
        </div>
    </div>
</a>
@endforeach
@else
<a href="#" class="d-flex align-items-center py-1">
    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2"><span class="text-white">{{$options->initials}}</span></div>
    <div class="d-block">
        <span class="fw-bolder ">{{ucwords($options->name)}}</span>
        <div class="small text-gray">
            
            <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg> {{$options->primary_phone_number}} | {{$options->secondary_phone_number}}
        </div>
    </div>
</a>
@endif