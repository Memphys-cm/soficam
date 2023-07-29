<div>
    <x-form-items.form wire:submit="store">
        <div class="d-flex flex-column scroll-y">
            <!--begin::Input group-->
            <div class="fv-row mb-3 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="form-label mb-2">
                    <span class="required">{{__('Role name')}}</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-solid" placeholder="Enter a role name" wire:model="name" value="Admin">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->
            <!--begin::Permissions-->
            <div class="fv-row mb-3">
                <!--begin::Label-->
                <label class="form-label mb-2">{{__('Role Permissions')}}</label>
                <!--end::Label-->
                <!--begin::Table wrapper-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <div class="table align-middle table-row-dashed gy-3">
                        <!--begin::Table body-->
                        <div class="text-gray-600 ">
                            <!--begin::Table row-->
                            <div class="d-flex border-bottom border-1">
                                <div class="text-gray-800 w-25"> {{__('Administrator Access')}}</div>
                                <div>
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid me-9">
                                        <input class="form-check-input" type="checkbox" wire:model="makeAdmin">
                                        <span class="form-check-label" for="select_all_roles">{{__('Grant All Permissions')}}</span>
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                            </div>
                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Users & Service Features Permissions')}}</div>
                            <div class="d-flex border-top border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Users')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllUserPermissions">
                                            <span class="form-check-label">{{__('All')}}</span>
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
                                            <span class="form-check-label">{{__('All')}}</span>
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
                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Location Features Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Regions')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllRegionPermissions">
                                            <span class="form-check-label">{{__('All')}}</span>
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
                                <div class="text-gray-800 w-25">{{__('Divisions')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllDivisionPermissions">
                                            <span class="form-check-label">{{__('All')}}</span>
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
                                <div class="text-gray-800 w-25">{{__('Sub Division')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllSubDivisionPermissions">
                                            <span class="form-check-label">{{__('All')}}</span>
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
                            <div class="text-gray-800 w-100 mt-3 fs-0 fw-bold">{{__('Roles & AuditLogs Features Permissions')}}</div>
                            <div class="d-flex border-bottom border-1">
                                <!--begin::Label-->
                                <div class="text-gray-800 w-25">{{__('Roles')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllRolePermissions">
                                            <span class="form-check-label">{{__('All')}}</span>
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
                                <div class="text-gray-800 w-25">{{__('AuditLogs')}}</div>
                                <div>
                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-3 me-lg-20">
                                            <input class="form-check-input" type="checkbox" value="" wire:model="selectAllAuditLogPermissions">
                                            <span class="form-check-label">{{__('All')}}</span>
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
            <button type="button" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600  btn-sm ms-auto mx-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-sm " wire:loading.attr="disabled">{{ __('Save') }}</button>
        </div>
    </x-form-items.form>
</div>