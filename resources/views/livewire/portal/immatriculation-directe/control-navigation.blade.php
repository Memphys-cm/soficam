<div class='d-flex justify-content-between mx-2 my-3'>
    <a class="btn btn-secondary" wire:click="previousStep($id)">{{__('Précédent')}}</a>
    <div class="btn btn-primary" wire:click.prevent="submit">
        {{__('Suivant')}}
    </div>
</div>
