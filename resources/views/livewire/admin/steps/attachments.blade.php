<x-card title="Attachments">
    <div class="row g-3">
        <!-- Government ID Information Card -->
        <div class="col-lg-8">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <h6 class="card-title mb-0">Government Issued ID</h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <x-forms.input label="Government ID Type" model="government_id_type" name="government_id"
                            placeholder="Enter government ID type" :required="false" readonly
                            class="form-control-lg"></x-forms.input>
                    </div>
                    <div class="mb-3">
                        <x-forms.input label="Date/Place of Issuance" model="date_of_issuance"
                            name="government_id" placeholder="Enter date and place of issuance" :required="false"
                            readonly class="form-control-lg"></x-forms.input>
                    </div>
                    <div class="mb-3">
                        <x-forms.input label="ID/License/Passport Number" model="government_id_no" name="government_id"
                            placeholder="Enter ID number" :required="false" readonly
                            class="form-control-lg"></x-forms.input>
                    </div>
                </div>
            </div>
        </div>

        <!-- Government ID Photo Card -->
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <h6 class="card-title mb-0">Government ID Photo</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $govt_id_extension = pathinfo(Storage::url($government_id_photo), PATHINFO_EXTENSION);
                        $is_govt_id_pdf = strtolower($govt_id_extension) === 'pdf';
                    @endphp

                    @if ($is_govt_id_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($government_id_photo) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($government_id_photo) }}"
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($government_id_photo) }}" alt="Government ID Photo"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLWltYWdlIiB2aWV3Qm94PSIwIDAgMTYgMTYiPjxwYXRoIGQ9Ik02LjAwMiA1LjVhMS41IDEuNSAwIDEgMS0zIDAgMS41IDEuNSAwIDAgMSAzIDB6Ii8+PHBhdGggZD0iTTIuMDAyIDFhMiAyIDAgMCAwLTIgMnYxMGEyIDIgMCAwIDAgMiAyaDEyYTIgMiAwIDAgMCAyLTJWM2EyIDIgMCAwIDAtMi0yaC0xMnptMTIgMWExIDEgMCAwIDEgMSAxdjYuNWwtMy43NzctMi4xNjVjLS4xOTItLjExLS40NC0uMTEtLjYzIDBsLTIuODMgMS42MzUtMy43NzQtMi4yNTktLjgxLS40ODZMMSAxMi4yNVYzYTEgMSAwIDAgMSAxLTFoMTJ6Ii8+PC9zdmc+'; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>

        <!-- Passport Photo Card -->
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <h6 class="card-title mb-0">Passport Photo</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $passport_extension = pathinfo(Storage::url($passport_photo), PATHINFO_EXTENSION);
                        $is_passport_pdf = strtolower($passport_extension) === 'pdf';
                    @endphp

                    @if ($is_passport_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($passport_photo) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($passport_photo) }}" download
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($passport_photo) }}" alt="Passport Photo"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLWltYWdlIiB2aWV3Qm94PSIwIDAgMTYgMTYiPjxwYXRoIGQ9Ik02LjAwMiA1LjVhMS41IDEuNSAwIDEgMS0zIDAgMS41IDEuNSAwIDAgMSAzIDB6Ii8+PHBhdGggZD0iTTIuMDAyIDFhMiAyIDAgMCAwLTIgMnYxMGEyIDIgMCAwIDAgMiAyaDEyYTIgMiAwIDAgMCAyLTJWM2EyIDIgMCAwIDAtMi0yaC0xMnptMTIgMWExIDEgMCAwIDEgMSAxdjYuNWwtMy43NzctMi4xNjVjLS4xOTItLjExLS40NC0uMTEtLjYzIDBsLTIuODMgMS42MzUtMy43NzQtMi4yNTktLjgxLS40ODZMMSAxMi4yNVYzYTEgMSAwIDAgMSAxLTFoMTJ6Ii8+PC9zdmc+'; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Thumbmark Card -->
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <h6 class="card-title mb-0">Right Thumbmark</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $thumbmark_extension = pathinfo(Storage::url($right_thumbmark_photo), PATHINFO_EXTENSION);
                        $is_thumbmark_pdf = strtolower($thumbmark_extension) === 'pdf';
                    @endphp

                    @if ($is_thumbmark_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($right_thumbmark_photo) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($right_thumbmark_photo) }}" download
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($right_thumbmark_photo) }}" alt="Right Thumbmark"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLWZpbmdlcnByaW50IiB2aWV3Qm94PSIwIDAgMTYgMTYiPjxwYXRoIGQ9Ik04LjA2IDYuNWEuNS41IDAgMCAxIC40Mi41OGwtLjIyIDEuOTJhMSAxIDAgMCAxIC45Ny45M2MuMDQuMS4wOC4yLjA5LjMuMDMuMi4wNS40MS4wNS42My0uMTYgMS4xLS45NyAxLjg3LTEuNyAyLjM0LS4xOC4xLS4zNi4xOS0uNTUuMjlhLjIuMiAwIDAgMCAwIC4zNmMuMTcuMTAuNDUuMDcuNjMtLjAyczE0LjQtMTEuODktMTQuOTgtMTEuOTJjLS42MSAwLS45NC42Ni0uNjYgMS4zMy40MSAxIDEuNjIgMS40MiAyLjY4IDEuNDIuMDUgMCAuMSAwIC4xNS0uMDEuNjMtLjA1IDEuMDUuMDUgMS4xMy4yLjEuMTguMDYuNS4wNC42OWEuNS41IDAgMCAxLS45OC0uMiAxLjUgMS41IDAgMCAwLS43Ny0xLjA4IDEuMzMgMS4zMyAwIDAgMC0uOTEtLjE4LjY3LjY3IDAgMCAxLS45LS42NmMwLS4zOC4xLS42Ny4yNS0uOTMuMjMtLjQuNTktLjcxIDEuMDQtLjkwLjgtMS43NiAyLjItMi44NCAzLjgtMi44NCAxLjU4IDAgMy4wMy45NSAzLjc4IDIuMjguMi4zNi4zMi43Ny4zNiAxLjIuMDQuNDEtLjAzLjg2LS4xNiAxLjMxWm00LjkxIDEuMDNhLjUuNSAwIDAgMSAuNy4yOGwuMDYuMTNjLjEuMjIuMDUuNDgtMS44NiAxLjcxLS4zIDAtLjYtLjI5LS45NS0uNGEuNS41IDAgMCAxIC4xNS0uOTljMC4xLjA0LjIuMDcuMy4wOC4yNC4wMi41NiAwIC43Ni0uMS4zNi0uMTguNjMtLjQ2Ljc0LS44MVoiLz48cGF0aCBkPSJNNy44OCA3LjlMNy41NSA5LjgyYS41LjUgMCAwIDEtLjk5LS4wOWwuMDktMS4wN2MuMDMtLjMzIDAtLjU3LS4zMy0uNjFhLjUuNSAwIDAgMSAuMTItLjk5Yy4zOCAwIC43OC4zMy43OCAxLjM0IDAgLjMtLjA0LjU3LS4xIDEuMDMtLjE2IDEuMjgtLjI4IDEuNTMtLjk1IDEuODdhLjUuNSAwIDAgMS0uMDYuOSAyIDIgMCAwIDAgMS4yMS0xIC41LjUgMCAwIDEgLjk5LjA3Yy0uMDYuMzctLjE2LjY2LS4yOS45MS0uMjUuNDMtLjY0Ljc2LTEuMTMuOTgtMS4zNS42My0yLjU0LjYyLTMuNTQtLjAyYTQgNCAwIDAgMS0yLjE2LTMuMy41LjUgMCAwIDEgLjk5LS4wOGMwIC44LS4yNiAxLjQ4LS44IDEuOTdhLjUuNSAwIDAgMS0uODEuMDVBMy4wMyAzLjAzIDAgMCAwIDMgMTMuNzJhLjUuNSAwIDAgMS0uODMuNTVjLS42Mi0uOTQtLjIzLTEuNzYtLjE2LTIgLjItLjUxLjYtMS4wMyAxLjEtMS4zOGExLjUgMS41IDAgMCAxIDEuMjYtLjE3Yy4yNi4wNi41LjIuNjcuNC4xOS4yNS4yNy41My4yNy44MnYuNjlhLjUuNSAwIDAgMS0xIDBjMC0uMzUtLjA3LS41OC0uMTQtLjc4YS41LjUgMCAwIDAtLjUtLjIzLjkuOTkgMCAwIDAtLjY4LjQ2Yy0uMTYuMjctLjIyLjY1LS4xNCAxLjE1LjEuNjIuMzkgMS4wOS44MyAxLjQyQTMgMyAwIDAgMCA1IDEyLjVjMC0uNS4xNS0uOTMuMzgtMS4yNi4yNS0uMzYuNjYtLjYzIDEuMTItLjcyLjIyLS4wNC4zMi0uMS40Ny0uMmEuNS41IDAgMCAxIC4xMi45M2MtLjIuMTMtLjM0LjItLjcuMjYtLjMuMDUtLjU0LjE3LS43LjM3cy0uMTkuMzUtLjE5LjY1Yy4wLjE0LjA0LjI3LjEuNC4wOS4xNS4yLjI2LjMzLjM0YTIuNSAyLjUgMCAwIDAgMS45Ny4wM2MuMjQtLjEzLjQ2LS4zLjY0LS41M2EuNjYuNjYgMCAwIDAgLjE4IC40Yy4yLjIyLjMzLjM0LjcyLjRhLjUuNSAwIDAgMSAuMTguOTQgMS45NyAxLjk3IDAgMCAxLTEuMS0uMzNjLS4wNy4wOS0uMTUuMTgtLjIzLjI1LS4yLjE4LS40Mi4zMy0uNjYuNDdhMy4wOSAzLjA5IDAgMCAxLTEuOS4yNi41LjUgMCAwIDEtLjA4LS45M2MuMzUtLjA4Ljc0LS4yIDEuMS0uMzYuMi0uMS40LS4yMi41Ny0uMzRzLjMyLS4yOC40Ni0uNDcuMjUtLjQ0LjMtLjc0Vi43LjgyYzAtLjU3LS4xLS45OS0uMzgtMS4yNy0uMjgtLjI2LS43LS4zNy0xLjE4LS4yNy0uNDIuMDgtLjguMzYtMSAuODItLjE3LjQxLS4xMy45My4xOCAxLjQ1YS41LjUgMCAwIDEtLjgzLjU3Yy0uNDEtLjY3LS41NC0xLjQzLS4yNi0yLjEyLjMxLS43Ni45My0xLjI5IDEuNzEtMS40NWExLjk3IDEuOTcgMCAwIDEgMS43OC40M2MuMzQuMzEuNTYuN1QgNC44Ljk0WiIvPjwvc3ZnPg=='; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>

        <!-- Signature Card -->
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <h6 class="card-title mb-0">Signature</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $signature_extension = pathinfo(Storage::url($signature_photo), PATHINFO_EXTENSION);
                        $is_signature_pdf = strtolower($signature_extension) === 'pdf';
                    @endphp

                    @if ($is_signature_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($signature_photo) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($signature_photo) }}" download
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($signature_photo) }}" alt="Signature"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLXBlbi0iIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0ibTE1LjUwMiAxLjk0LTEzLjYzIDEzLjU0Ni4wMS4wMDJsLTMuODQgMS43OTIgMS43OS0zLjgxIDEzLjU2LTEzLjUxLjA4Mi4xMDMuMDAzLS4wMDcuMzA3LjMwOC0uMDA3LjAwMnptLTEzLjk4IDEyLjc2OS45ODUtLjk4NyA3LjgzLTcuOSAxLjY3My0xLjY4IDEuMDQtMS4wMjguNDYuNDYtMS4zNDQgMS4zNDEtLjguLzgtMy41NyAzLjU2Mi00LjgwNyA0Ljc5My0uOTg2Ljk4NS4wMjguMDI4LTEuNTE1IDEuNDg2LTIuNDQgMS4yMzUgMS4yMzYtMi40NzggMS4zNzItMS4zOTJ6TTMuMTggMTMuMDkzbDEuMTcxIDEuMTcxLTEuNTg4LjMuNDE3LTEuNDd6bTcuODgtMTAuMDhhLjUuNSAwIDAgMCAwLS43MDdzLS4wNjQtLjA0LS4wOC0uMDdsMy4yLTIuNzMuNjQ0LjY0NC0yLjczIDMuMmMtLjAzLS4wMi0uMDY0LS4wMzItLjA3LS4wOTRhLjUuNSAwIDAgMC0uOTY0LjA1NnptMi4wMTgtMS4xOGMtLjIxMi0uMjAyLS40Ny0uMzU1LS43MTYtLjQ3TC4xMDIgMTQuMjc4YTEgMSAwIDAgMCAwIDF2LjAzNmExIDEgMCAwIDAgLjEuMzZsLTEgMS45NCAzLjItMSA0LjktLjUuMTU3LS4yNi40Ni0uNjggMTMuMzIzLTEzLjQzOGMuMzEtLjMxLjY3NS0uMzk4IDEuMDE3LS4zOTYuMzMuMDAyLjUzNi4xMTcuNzgzLjM3LjMyLjMyLjM2Ni43Ni4yNjYgMS4xNjNsMi4wMjgtMS43OThBMyAzIDAgMCAwIDE0LjA3NyAwYTMgMyAwIDAgMC0xLjQ5MyAxMy4wNTZ6LTYuNTA0LTcuOS4wMzItLjAzNi4wMDMuMDA3ek05LjkgOC40NTMuMTU2IDE0LjE4N2ExIDEgMCAwIDAtLjA1NC4xbDUuMjktLjIzN2ExIDEgMCAwIDAgLjA5LS4wNDRsMTAuNDM0LTkuMDU2YTIuMDIgMi4wMiAwIDAgMC0uNTEuNTFMNi40IDEwLjQxYTEgMSAwIDAgMC0uMDkyLjA1NGwtNi4yNS4yODJjLjAzLS4wMTQuMDYyLS4wMjUuMDktLjA0NkwxMi45IDIuMDEyYTEgMSAwIDAgMCAuMDkyLS4wNTRsLjEwNS0uMDQ4YTIgMiAwIDAgMC0uMDkzLjA1NHYuMDAyeiIvPjwvc3ZnPg=='; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <h6 class="card-title mb-0">OTR</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $signature_extension = pathinfo(Storage::url($otr_photo), PATHINFO_EXTENSION);
                        $is_signature_pdf = strtolower($signature_extension) === 'pdf';
                    @endphp

                    @if ($is_signature_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($otr_photo) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($otr_photo) }}" download
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($otr_photo) }}" alt="Signature"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLXBlbi0iIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0ibTE1LjUwMiAxLjk0LTEzLjYzIDEzLjU0Ni4wMS4wMDJsLTMuODQgMS43OTIgMS43OS0zLjgxIDEzLjU2LTEzLjUxLjA4Mi4xMDMuMDAzLS4wMDcuMzA3LjMwOC0uMDA3LjAwMnptLTEzLjk4IDEyLjc2OS45ODUtLjk4NyA3LjgzLTcuOSAxLjY3My0xLjY4IDEuMDQtMS4wMjguNDYuNDYtMS4zNDQgMS4zNDEtLjguLzgtMy41NyAzLjU2Mi00LjgwNyA0Ljc5My0uOTg2Ljk4NS4wMjguMDI4LTEuNTE1IDEuNDg2LTIuNDQgMS4yMzUgMS4yMzYtMi40NzggMS4zNzItMS4zOTJ6TTMuMTggMTMuMDkzbDEuMTcxIDEuMTcxLTEuNTg4LjMuNDE3LTEuNDd6bTcuODgtMTAuMDhhLjUuNSAwIDAgMCAwLS43MDdzLS4wNjQtLjA0LS4wOC0uMDdsMy4yLTIuNzMuNjQ0LjY0NC0yLjczIDMuMmMtLjAzLS4wMi0uMDY0LS4wMzItLjA3LS4wOTRhLjUuNSAwIDAgMC0uOTY0LjA1NnptMi4wMTgtMS4xOGMtLjIxMi0uMjAyLS40Ny0uMzU1LS43MTYtLjQ3TC4xMDIgMTQuMjc4YTEgMSAwIDAgMCAwIDF2LjAzNmExIDEgMCAwIDAgLjEuMzZsLTEgMS45NCAzLjItMSA0LjktLjUuMTU3LS4yNi40Ni0uNjggMTMuMzIzLTEzLjQzOGMuMzEtLjMxLjY3NS0uMzk4IDEuMDE3LS4zOTYuMzMuMDAyLjUzNi4xMTcuNzgzLjM3LjMyLjMyLjM2Ni43Ni4yNjYgMS4xNjNsMi4wMjgtMS43OThBMyAzIDAgMCAwIDE0LjA3NyAwYTMgMyAwIDAgMC0xLjQ5MyAxMy4wNTZ6LTYuNTA0LTcuOS4wMzItLjAzNi4wMDMuMDA3ek05LjkgOC40NTMuMTU2IDE0LjE4N2ExIDEgMCAwIDAtLjA1NC4xbDUuMjktLjIzN2ExIDEgMCAwIDAgLjA5LS4wNDRsMTAuNDM0LTkuMDU2YTIuMDIgMi4wMiAwIDAgMC0uNTEuNTFMNi40IDEwLjQxYTEgMSAwIDAgMC0uMDkyLjA1NGwtNi4yNS4yODJjLjAzLS4wMTQuMDYyLS4wMjUuMDktLjA0NkwxMi45IDIuMDEyYTEgMSAwIDAgMCAuMDkyLS4wNTRsLjEwNS0uMDQ4YTIgMiAwIDAgMC0uMDkzLjA1NHYuMDAyeiIvPjwvc3ZnPg=='; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="card-title mb-0">Diploma</h6>
                        @if (empty($diploma_photo))
                            <span class="badge bg-danger">Not Provided</span>
                        @endif
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $signature_extension = pathinfo(Storage::url($diploma_photo), PATHINFO_EXTENSION);
                        $is_signature_pdf = strtolower($signature_extension) === 'pdf';
                    @endphp

                    @if ($is_signature_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($diploma_photo) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($diploma_photo) }}" download
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($diploma_photo) }}" alt="Signature"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLXBlbi0iIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0ibTE1LjUwMiAxLjk0LTEzLjYzIDEzLjU0Ni4wMS4wMDJsLTMuODQgMS43OTIgMS43OS0zLjgxIDEzLjU2LTEzLjUxLjA4Mi4xMDMuMDAzLS4wMDcuMzA3LjMwOC0uMDA3LjAwMnptLTEzLjk4IDEyLjc2OS45ODUtLjk4NyA3LjgzLTcuOSAxLjY3My0xLjY4IDEuMDQtMS4wMjguNDYuNDYtMS4zNDQgMS4zNDEtLjguLzgtMy41NyAzLjU2Mi00LjgwNyA0Ljc5My0uOTg2Ljk4NS4wMjguMDI4LTEuNTE1IDEuNDg2LTIuNDQgMS4yMzUgMS4yMzYtMi40NzggMS4zNzItMS4zOTJ6TTMuMTggMTMuMDkzbDEuMTcxIDEuMTcxLTEuNTg4LjMuNDE3LTEuNDd6bTcuODgtMTAuMDhhLjUuNSAwIDAgMCAwLS43MDdzLS4wNjQtLjA0LS4wOC0uMDdsMy4yLTIuNzMuNjQ0LjY0NC0yLjczIDMuMmMtLjAzLS4wMi0uMDY0LS4wMzItLjA3LS4wOTRhLjUuNSAwIDAgMC0uOTY0LjA1NnptMi4wMTgtMS4xOGMtLjIxMi0uMjAyLS40Ny0uMzU1LS43MTYtLjQ3TC4xMDIgMTQuMjc4YTEgMSAwIDAgMCAwIDF2LjAzNmExIDEgMCAwIDAgLjEuMzZsLTEgMS45NCAzLjItMSA0LjktLjUuMTU3LS4yNi40Ni0uNjggMTMuMzIzLTEzLjQzOGMuMzEtLjMxLjY3NS0uMzk4IDEuMDE3LS4zOTYuMzMuMDAyLjUzNi4xMTcuNzgzLjM3LjMyLjMyLjM2Ni43Ni4yNjYgMS4xNjNsMi4wMjgtMS43OThBMyAzIDAgMCAwIDE0LjA3NyAwYTMgMyAwIDAgMC0xLjQ5MyAxMy4wNTZ6LTYuNTA0LTcuOS4wMzItLjAzNi4wMDMuMDA3ek05LjkgOC40NTMuMTU2IDE0LjE4N2ExIDEgMCAwIDAtLjA1NC4xbDUuMjktLjIzN2ExIDEgMCAwIDAgLjA5LS4wNDRsMTAuNDM0LTkuMDU2YTIuMDIgMi4wMiAwIDAgMC0uNTEuNTFMNi40IDEwLjQxYTEgMSAwIDAgMC0uMDkyLjA1NGwtNi4yNS4yODJjLjAzLS4wMTQuMDYyLS4wMjUuMDktLjA0NkwxMi45IDIuMDEyYTEgMSAwIDAgMCAuMDkyLS4wNTRsLjEwNS0uMDQ4YTIgMiAwIDAgMC0uMDkzLjA1NHYuMDAyeiIvPjwvc3ZnPg=='; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header py-3 border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="card-title mb-0">Employement Certificate</h6>
                        @if (empty($employement_certificate))
                            <span class="badge bg-danger">Not Provided</span>
                        @endif
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center p-4">
                    @php
                        $signature_extension = pathinfo(Storage::url($employement_certificate), PATHINFO_EXTENSION);
                        $is_signature_pdf = strtolower($signature_extension) === 'pdf';
                    @endphp

                    @if ($is_signature_pdf)
                        <div class="text-center w-100">
                            <div class="pdf-icon mb-3">
                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <a href="{{ Storage::url($employement_certificate) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> View PDF
                            </a>
                            <a href="{{ Storage::url($employement_certificate) }}" download
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <img src="{{ Storage::url($employement_certificate) }}" alt="Signature"
                            class="img-fluid border rounded"
                            style="max-width: 100%; max-height: 220px; object-fit: contain;"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2NjYyIgY2xhc3M9ImJpIGJpLXBlbi0iIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0ibTE1LjUwMiAxLjk0LTEzLjYzIDEzLjU0Ni4wMS4wMDJsLTMuODQgMS43OTIgMS43OS0zLjgxIDEzLjU2LTEzLjUxLjA4Mi4xMDMuMDAzLS4wMDcuMzA3LjMwOC0uMDA3LjAwMnptLTEzLjk4IDEyLjc2OS45ODUtLjk4NyA3LjgzLTcuOSAxLjY3My0xLjY4IDEuMDQtMS4wMjguNDYuNDYtMS4zNDQgMS4zNDEtLjguLzgtMy41NyAzLjU2Mi00LjgwNyA0Ljc5My0uOTg2Ljk4NS4wMjguMDI4LTEuNTE1IDEuNDg2LTIuNDQgMS4yMzUgMS4yMzYtMi40NzggMS4zNzItMS4zOTJ6TTMuMTggMTMuMDkzbDEuMTcxIDEuMTcxLTEuNTg4LjMuNDE3LTEuNDd6bTcuODgtMTAuMDhhLjUuNSAwIDAgMCAwLS43MDdzLS4wNjQtLjA0LS4wOC0uMDdsMy4yLTIuNzMuNjQ0LjY0NC0yLjczIDMuMmMtLjAzLS4wMi0uMDY0LS4wMzItLjA3LS4wOTRhLjUuNSAwIDAgMC0uOTY0LjA1NnptMi4wMTgtMS4xOGMtLjIxMi0uMjAyLS40Ny0uMzU1LS43MTYtLjQ3TC4xMDIgMTQuMjc4YTEgMSAwIDAgMCAwIDF2LjAzNmExIDEgMCAwIDAgLjEuMzZsLTEgMS45NCAzLjItMSA0LjktLjUuMTU3LS4yNi40Ni0uNjggMTMuMzIzLTEzLjQzOGMuMzEtLjMxLjY3NS0uMzk4IDEuMDE3LS4zOTYuMzMuMDAyLjUzNi4xMTcuNzgzLjM3LjMyLjMyLjM2Ni43Ni4yNjYgMS4xNjNsMi4wMjgtMS43OThBMyAzIDAgMCAwIDE0LjA3NyAwYTMgMyAwIDAgMC0xLjQ5MyAxMy4wNTZ6LTYuNTA0LTcuOS4wMzItLjAzNi4wMDMuMDA3ek05LjkgOC40NTMuMTU2IDE0LjE4N2ExIDEgMCAwIDAtLjA1NC4xbDUuMjktLjIzN2ExIDEgMCAwIDAgLjA5LS4wNDRsMTAuNDM0LTkuMDU2YTIuMDIgMi4wMiAwIDAgMC0uNTEuNTFMNi40IDEwLjQxYTEgMSAwIDAgMC0uMDkyLjA1NGwtNi4yNS4yODJjLjAzLS4wMTQuMDYyLS4wMjUuMDktLjA0NkwxMi45IDIuMDEyYTEgMSAwIDAgMCAuMDkyLS4wNTRsLjEwNS0uMDQ4YTIgMiAwIDAgMC0uMDkzLjA1NHYuMDAyeiIvPjwvc3ZnPg=='; this.className='img-fluid border rounded bg-light p-4'; this.style='max-width: 100%; height: 150px; object-fit: contain;';">
                    @endif
                </div>
            </div>
        </div>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'attachments',
    ])
</x-card>
