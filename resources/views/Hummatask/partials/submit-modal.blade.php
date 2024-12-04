<div class="modal fade" id="submit-a-presentation" tabindex="-1" aria-labelledby="submit-a-presentationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('student-offline.project.presentation.save', $project->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="submit-a-presentationLabel">Ajukan Presentasi</h1>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="startDate">
                        <label class="mb-2 mt-1 fs-2" for="">Tanggal Presentasi</label>
                        <input class="form-control" name="planning_date_presentation" type="date"
                            value="{{ old('planning_date_presentation') }}">
                        <input class="form-control" name="project_id" type="hidden" value="{{ $project->id }}">
                        @error('planning_date_presentation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                </div>
            </form>

        </div>
    </div>
</div>
