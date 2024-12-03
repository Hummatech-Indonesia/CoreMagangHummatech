<div class="tab-pane" id="todo-revisions" role="tabpanel">
    <table class="table mb-0 align-middle text-nowrap ">
        <thead>
            <tr>
                <th class="ps-0">No</th>
                <th>Revisi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="text-black">
            @if ($todo_revisions->presentation?->revision && $todo_revisions->presentation->revision->isNotEmpty())
                @foreach ($todo_revisions->presentation->revision as $revision)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $revision->revision }}</td>
                        <td>
                            <span @class([
                                'bg-label-danger px-2 py-1 rounded-pill' =>
                                    $revision->status == \App\Enum\RevisionStatusEnum::Todo->value,
                                'bg-label-warning px-2 text-sm py-1 rounded-pill' =>
                                    $revision->status == \App\Enum\RevisionStatusEnum::InProgress->value,
                                'bg-label-primary px-2 py-1 rounded-pill' =>
                                    $revision->status == \App\Enum\RevisionStatusEnum::Completed->value,
                            ])>
                                {{ ucwords($revision->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                alt="No Data" height="120px" />
                            <h3 class="text-center">Data Masih Kosong</h3>
                        </div>
                    </td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
