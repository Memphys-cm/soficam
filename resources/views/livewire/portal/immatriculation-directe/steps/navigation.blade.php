{{-- <ul>
    @foreach($steps as $step)
        <li 
            class="{{ $step->isCurrent() ? 'text-success' : '' }}"
            @if ($step->isPrevious())
                wire:click="{{ $step->show() }}"
            @endif
        >{{ $step->label }}</li>
    @endforeach
</ul> --}}

<div class="navbar bg-body-tertiary d-flex justify-content-start">
    @foreach($steps as $step)
    <button class="btn  {{ $step->isCurrent() ? 'btn-success' : 'btn-primary' }} me-2"  
    {{-- @if ($step->isPrevious()) --}}
      wire:click="{{ $step->show() }}"
  {{-- @endif  --}}
  type="button">{{ $step->label }}</button>
  @endforeach
</div>