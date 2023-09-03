 <div wire:ignore.self class="modal side-layout-modal fade" id="importCompaniesModal" tabindex="-1" aria-labelledby="importCompaniesModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <div class="p-3 p-lg-4">
                     <div class="mb-4 mt-md-0">
                         <h1 class="mb-0 h4">{{__('Importer :nom',['nom'=>__('Entreprise')])}}</h1>
                         <p>{{__('Importer nouveau :nom à partir d\'un fichier Excel',['nom'=>__('Entreprise')])}}</p>
                     </div>
                     <x-form-items.form wire:submit="import" class="form-modal">
                         <p>{{__('Etapes à suivre pour importer un nouveau :nom',['nom'=>__('Entreprise')])}}</p>
                         <div class='mb-4'>
                             <ol>
                                 <li>{{__('Télécharger l\'exemple de modèle d\'importation :nom modèle d\'importation',['nom'=>__('Entreprise')])}} <a href="{{asset('templates/import_companies.xlsx')}}">{{__('Modèle')}}</a></li>
                                 <li>{{__('Remplir le modèle avec votre :nom donnée',['name'=>__('Entreprises')])}}</li>
                                 <li>{{__('Télécharger le modèle rempli en utilisant le formulaire ci-dessous et cliquez sur le bouton d\'importation pour l\'importer.')}}</li>
                             </ol>
                         </div>
                         <div class="mb-4">
                             <label for="company_file" class="form-label">{{__('Sélectionner fichier')}}</label>
                             <input wire:model="company_file" class="form-control @error('company_file') is-invalid @enderror" type="file" name="company_file" id="formFile" required="">
                             @error('company_file')
                             <div class="invalid-feedback">{{$message}}</div>
                             @enderror
                         </div>
                         <div class="d-flex justify-content-end">
                             <button class="btn btn-gray-200 text-gray-600 ms-auto mx-3" type="button" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                             <button class=" btn btn-secondary" type="submit" wire:click.prevent="import" {{empty($company_file) ? "disabled" : '' }}>{{__('Importer')}}</button>
                         </div>
                     </x-form-items.form>
                 </div>
             </div>
         </div>
     </div>
 </div>