<div class="mb-2">
  <h6 class="mb-3">
    Obub ID: {{ $obubData->id }} — {{ $obubData->work_type ?? '' }}
  </h6>

  @if($histories->isEmpty())
    <p class="text-muted">No history available</p>
  @else
    <div class="table-responsive">
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Division</th>
            <th>LC No</th>
            <th>Local Name</th>
            <th>State</th>
            <th>District</th>
            <th>TVU Date</th>
            <th>Block Sec (KM)</th>
            <th>Work Type</th>
            <th>Target RUB</th>
            <th>Changed By</th>
            <th>Changed At</th>
          </tr>
        </thead>
        <tbody>
          @foreach($histories as $history)
            @php $snapshot = $history->snapshot_array; @endphp
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $snapshot['division'] ?? '-' }}</td>
              <td>{{ $snapshot['lc_no'] ?? '-' }}</td>
              <td>{{ $snapshot['local_name'] ?? '-' }}</td>
              <td>{{ $snapshot['state'] ?? '-' }}</td>
              <td>{{ $snapshot['district'] ?? '-' }}</td>
              <td>{{ $snapshot['tvu_date'] ?? '-' }}</td>
              <td>{{ $snapshot['block_sec_km'] ?? '-' }}</td>
              <td>{{ $snapshot['work_type'] ?? '-' }}</td>
              <td>{{ $snapshot['target_rub'] ?? '-' }}</td>
              <td>{{ $history->user->name ?? 'System' }}</td>
              <td>{{ \Carbon\Carbon::parse($history->changed_at)->format('d-M-Y H:i') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>