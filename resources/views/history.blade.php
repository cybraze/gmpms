<div class="mb-2">
  <h6 class="mb-3">
    Project ID: {{ $project->id }} — {{ $project->work_type ?? '' }}
  </h6>

  @if($histories->isEmpty())
    <p class="text-muted">No history available</p>
  @else
    <div class="table-responsive">
      <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th>#</th>
      <th>Station</th>
      <th>Plan Head</th>
      <th>Agency</th>
      <th>Work Type</th>
      <th>Indoor Progress</th>
      <th>Outdoor Progress</th>
      <th>Changed By</th>
      <th>Changed At</th>
    </tr>
  </thead>
  <tbody>
    @foreach($histories as $history)
      @php $snapshot = $history->snapshot_array; @endphp
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ $snapshot['station'] ?? '-' }}</td>
        <td>{{ $snapshot['plan_head'] ?? '-' }}</td>
        <td>{{ $snapshot['agency'] ?? '-' }}</td>
        <td>{{ $snapshot['work_type'] ?? '-' }}</td>
        <td>{{ $snapshot['indoor_progress_pct'] ?? '-' }}%</td>
        <td>{{ $snapshot['outdoor_progress_pct'] ?? '-' }}%</td>
        <td>{{ $history->user->name ?? 'System' }}</td>
        <td>{{ $history->changed_at->format('d-M-Y H:i') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
    </div>
  @endif
</div>