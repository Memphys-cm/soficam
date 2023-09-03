<div>
    <x-form-items.form wire:submit="store">
        <div class="d-flex flex-column scroll-y">
            <!--begin::Input group-->
            <div class="fv-row mb-3 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="form-label mb-2">
                    <span class="required">{{__('Nom Rôle')}}</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-solid" placeholder="Entrer le nom du rôle" wire:model="name" value="Admin">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->
            <!--begin::Permissions-->
            <div class="fv-row mb-3">
                <!--begin::Label-->
                <label class="form-label mb-2">{{__('Permissions du rôle')}}</label>
                <!--end::Label-->
                <!--begin::Table wrapper-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <div class="table align-middle table-row-dashed gy-3">
                        <!--begin::Table body-->
                        <div class="text-gray-600 ">
                            <!--begin::Table row-->
                            <div class="d-flex border-bottom border-1">
                                <div class="text-gray-800 w-25"> {{__('Accès administrateur')}}</div>
                                <div>
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid me-9">
                                        <input class="form-check-input" type="checkbox" wire:model="makeAdmin">
                                        <span class="form-check-label" for="select_all_roles">{{__('Accorder toutes les autorisations')}}</span>
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                            </div>



                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Titre Foncier, Lotissement, Charges, Immobilier et Tax Fonciers Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Titre Foncier')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllTitreFoncierPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($TitreFoncierPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedTitreFoncierPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Lotissement')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllLotissementPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($LotissementPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedLotissementPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Charges sur Titre Foncier')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllChargesPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($ChargesPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedChargesPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Immobilier')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllImmobilierPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($ImmobilierPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedImmobilierPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Tax Foncier')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllTaxFoncierPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($TaxFoncierPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedTaxFoncierPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Immatriculation Direct Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Immatriculation Direct')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllImmaDirectPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($ImmaDirectPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedImmaDirectPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>

                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Sales and Payments Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Ventes et Paiements')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllSalesPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($SalesPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedSalesPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>

                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Permissions des utilisateurs et des éléments de service')}}</div>
                            <div class="d-flex border-bottom">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Utilisateurs')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllUserPermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($UserPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedUserPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-top border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Services')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllServicePermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($ServicePermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedServicePermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-top border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Cabinets')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllCabinetPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($CabinetPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedCabinetPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-top border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Membres du Cabinet')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllMembreCabinetPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($MembreCabinetPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedMembreCabinetPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Operations Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Operation Generale')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllGenOpsPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($GenOpsPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedGenOpsPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Mutation Totale')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllMutationTotalePermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($MutationTotalePermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedMutationTotalePermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Morcellement')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllMorcellementPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($MorcellementPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedMorcellementPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Retrait Indivision')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllRetraitPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($RetraitPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedRetraitPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Etat Cession')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllEtatCessionPermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($EtatCessionPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedEtatCessionPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Certificate Propriete')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllCertificateProprietePermissions">
                                            <span class="form-check-label">{{__('Tout')}}</span>
                                        </label>
                                        @foreach($CertificateProprietePermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedCertificateProprietePermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>


                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Localisation Caractéristiques Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Régions')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllRegionPermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($RegionPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedRegionPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Départements')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllDivisionPermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($DivisionPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedDivisionPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Arrondissements')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllSubDivisionPermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($SubDivisionPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedSubDivisionPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Rôles et journaux d\'audit Fonctionnalités Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Rôles')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllRolePermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($RolePermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedRolePermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Journal d\'audit')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllAuditLogPermissions">
                                            <span class="form-check-label">{{__('Tous')}}</span>
                                        </label>
                                        @foreach($AuditLogPermissions as $key => $value)
                                        <label class="form-check  form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" wire:model="selectedAuditLogPermissions" value="{{$value}}">
                                            <span class="form-check-label">{{__($key)}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Table body-->
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Table wrapper-->
            </div>
            <!--end::Permissions-->
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600  btn-sm ms-auto mx-3" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-sm " wire:loading.attr="disabled">{{ __('Enregistrer') }}</button>
        </div>
    </x-form-items.form>
</div>