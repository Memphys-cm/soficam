@if($sale)
<div class='d-flex justify-content-between align-items-center'>
    <div>
        <span class="fw-bold">{{__('Reference')}} : </span> {{$saleable->etat_cession->reference_etat_cession}} <br>
        <span class="fw-bold">{{__('Type Personne')}} : </span> {{$saleable->etat_cession->type_personne}}
    </div>
    <div>
        <span class="fw-bold">{{__('Type Operation')}} : </span> {{$saleable->etat_cession->type_operation}} <br>
        <span class="fw-bold">{{__('Date Creation')}} : </span> {{$saleable->etat_cession->created_at}}

        <span class="fw-normal">{{$saleable->etat_cession->geometre->first_name ?? '' }} {{$saleable->etat_cession->geometre->last_name ?? ''}}</span>

    </div>

</div>
@endif