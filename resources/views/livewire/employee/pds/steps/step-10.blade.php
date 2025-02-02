<div class="card card-body mb-2">
    <div class="d-flex flex-column gap-3">

        {{-- Passport Photo --}}
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <div class="card-title mb-0">
                    <span class="small text-muted">Passport Photo</span>
                    <ul class="mb-0" style="font-size: 0.8rem;">
                        <li>ID picture taken within the last 6 months</li>
                        <li>Dimensions: 4.5 cm x 3.5 cm (passport size)</li>
                        <li>Computer-generated or photocopied pictures are not acceptable</li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <x-forms.input label="Upload Passport Photo" name="passport_pic" type="file" class="form-control-file"></x-forms.input>
            </div>
        </div>

        {{-- Right Thumbmark --}}
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <div class="card-title mb-0">
                    <span class="small text-muted">Right Thumbmark Photo</span>
                </div>
            </div>
            <div class="card-body">
                <x-forms.input label="Upload Right Thumbmark Photo" name="right_thumb_pic" type="file" class="form-control-file"></x-forms.input>
            </div>
        </div>

        {{-- Government Identification --}}
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <div class="card-title mb-0">
                    <span class="small text-muted">Government Issued ID <small>(i.e. Passport, GSIS, SSS, PRC, Driver's License, etc.)</small></span>
                </div>
            </div>
            <div class="card-body d-flex flex-column gap-2">
                <x-forms.select label="Type" name="government_id_type">
                    <option value="">Select an ID Type</option>
                    <option value="ssS">SSS (Social Security System)</option>
                    <option value="gsis">GSIS (Government Service Insurance System)</option>
                    <option value="philhealth">PhilHealth</option>
                    <option value="postal">Postal ID</option>
                    <option value="driver_license">Driver's License</option>
                    <option value="passport">Passport</option>
                    <option value="voters">Voter's ID</option>
                    <option value="prc">PRC (Professional Regulation Commission)</option>
                    <option value="taxpayer">Taxpayer's ID (TIN)</option>
                </x-forms.select>

                <x-forms.input label="ID/License/Passport No:" name="government_id_number"></x-forms.input>

                <x-forms.input label="Upload ID (Front)" name="government_id_pic_front" type="file" class="form-control-file"></x-forms.input>

                <x-forms.input label="Upload ID (Back)" name="government_id_pic_back" type="file" class="form-control-file"></x-forms.input>
            </div>
        </div>

        {{-- Signature --}}
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <div class="card-title mb-0">
                    <span class="small text-muted">Signature</span>
                </div>
            </div>
            <div class="card-body">
                <x-forms.input label="Upload Signature" name="signature" type="file" class="form-control-file"></x-forms.input>
            </div>
        </div>
    </div>
</div>
