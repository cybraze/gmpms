<div class="mb-2">
  <h6 class="mb-3">Project ID: {{ $project->id }} — {{ $project->work_type ?? '' }}</h6>

  @if($histories->isEmpty())
    <p class="text-muted">No history available</p>
  @else
    <ul class="list-group">
      @foreach($histories as $history)
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <div>
              <strong>Changed By:</strong> {{ $history->user->name ?? 'System' }} <br>
              <strong>Changed At:</strong> {{ $history->changed_at->format('d-M-Y H:i') ?? $history->changed_at }}
            </div>
            <div class="text-end small text-muted">
              #{{ $history->id }}
            </div>
          </div>

          <div class="mt-2">
            <pre class="bg-light p-2 rounded" style="white-space: pre-wrap; word-break:break-word;">
{{ json_encode(json_decode($history->snapshot_json), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}
            </pre>
          </div>
        </li>
      @endforeach
    </ul>
  @endif
</div>