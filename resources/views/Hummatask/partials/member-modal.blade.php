<div class="modal fade" id="member-modal-{{ $revision->id }}" aria-labelledby="memberLabel" aria-hidden="true"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form
                action="{{ route('siswa-offline.project.presentation.revision.member', ['project' => $project->id, 'presentation' => $presentation->id, 'projectRevision' => $revision->id]) }}"
                method="POST">
                @csrf
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="memberLabel">Edit Member yang Mengerjakan Revisi</h5>
                </div>
                <div class="modal-body">
                    <select class="form-control selectMembers" id="select-{{ $revision->id }}" name="member_ids[]" style="width: 100%;" multiple>
                        @foreach ($projectMember as $member)
                            <option value="{{ $member->members->id }}" {{ in_array($member->members->id, $revision->assignedStudent->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $member->members->name }}</option>
                        @endforeach
                    </select>
                    <div class="d-flex justify-content-center mt-4 gap-4">
                        <button class="btn btn-light-warning text-warning btn-sm" data-bs-dismiss="modal" type="button"
                            aria-label="Close">Batalkan</button>
                        <button class="btn btn-light-primary text-primary btn-sm" type="submit">Submit</button>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>
