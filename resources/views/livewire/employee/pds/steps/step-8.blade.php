{{-- Entry Container --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        {{-- Skills --}}
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0 text-primary">Skills</h6>
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-plus"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="align-middle"><x-forms.input name="skill_1"></x-forms.input></td>
                            <td class="text-center text-lg-start align-middle">
                                <button type="button" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- Hobbies --}}
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0 text-primary">Hobbies</h6>
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-plus"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="align-middle"><x-forms.input name="hobby_1"></x-forms.input></td>
                            <td class="text-center text-lg-start align-middle">
                                <button type="button" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- Organizations --}}
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0 text-primary">Organizations</h6>
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-plus"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="align-middle"><x-forms.input name="organization_1"></x-forms.input></td>
                            <td class="text-center text-lg-start align-middle">
                                <button type="button" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </div>


</div>
