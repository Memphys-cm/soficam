<div class="row py-3">
    <div class="col-md-3">
        <label for="search">{{__('Search')}}: </label>
        <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
        <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
    </div>
    <div class="col-md-3">
        <label for="orderBy">{{__('Order By')}}: </label>
        <select wire:model="orderBy" id="orderBy" class="form-select">
            <option value="region_id">{{__('Region')}}</option>
            <option value="date_de_delivrance_du_TF">{{__('Delivery Date')}}</option>
            <option value="created_at">{{__('Created Date')}}</option>
        </select>
    </div>

    <div class="col-md-3">
        <label for="direction">{{__('Order direction')}}: </label>
        <select wire:model="orderAsc" id="direction" class="form-select">
            <option value="asc">{{__('Ascending')}}</option>
            <option value="desc">{{__('Descending')}}</option>
        </select>
    </div>

    <div class="col-md-3">
        <label for="perPage">{{__('Items Per Page')}}: </label>
        <select wire:model="perPage" id="perPage" class="form-select">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
        </select>
    </div>
</div>
<div class="card pb-3">
    <div class="table-responsive  text-gray-700">
        <table class="table employee-table table-bordered table-hover align-items-center ">
            <thead>
                <tr>
                    <th class="border-bottom">{{__('Land Title Number')}}</th>
                    <th class="border-bottom">{{__('Delivered Date')}}</th>
                    <th class="border-bottom">{{__('Propriators')}}</th>
                    <th class="border-bottom">{{__('Location')}}</th>
                    <th class="border-bottom">{{__('Limits')}}</th>
                    <th class="border-bottom">{{__('Coordonnees')}}</th>
                    <th class="border-bottom">{{__('Status')}}</th>
                    <th class="border-bottom">{{__('Date created')}}</th>
                    @canany('titre_foncier.update','titre_foncier.delete')
                    <th class="border-bottom">{{__('Action')}}</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse($titrefonciers as $titrefoncier)
                <tr>
                    
                    
                    
                    <td>
                        
                        
                    </td>
                    
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">
                        <div class="text-center text-gray-800 mt-2">
                            <h4 class="fs-4 fw-bold">{{__('Opps nothing here')}} &#128540;</h4>
                            <p>{{__('No Record Found..!')}}</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
            <div>
                {{__('Showing')}} {{$perPage > $titrefonciers_count ? $titrefonciers_count : $perPage  }} {{__('items of')}} {{$titrefonciers_count}}
            </div>
        </div>
    </div>
</div>