@php
    $timeFound = null;
    foreach ($details as $detailAttendance) {
        if ($detailAttendance->status === $checkType) {
            $timeFound = date('H:i:s', strtotime($detailAttendance->created_at));
            break;
        }
    }
    $badgeType = $timeFound && $timeFound <= \Carbon\Carbon::createFromFormat('H:i:s', $timeLimit)->addMinutes(1)->format('H:i:s')
        ? 'success'
        : 'danger';
@endphp

@if ($timeFound)
    <span class="badge bg-{{ $badgeType }}-subtle text-{{ $badgeType }} py-2 px-3">
        {{ $timeFound }}
    </span>
@else
    <span class="badge bg-secondary-subtle text-secondary py-2 px-3">-</span>
@endif
