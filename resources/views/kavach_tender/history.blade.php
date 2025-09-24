<div class="table-responsive">
    <table class="table table-bordered table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Section</th>
                <th>Item</th>
                <th>Project</th>
                <th>Status</th>
                <th>NIT Date</th>
                <th>Tender Opening Date</th>
                <th>LOA Date</th>
                <th>Remarks</th>
                <th>Changed By</th>
                <th>Changed At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $index => $history)
                @php
                    $snapshot = $history->snapshot_array ?? [];
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $snapshot['section'] ?? '-' }}</td>
                    <td>{{ $snapshot['item'] ?? '-' }}</td>
                    <td>{{ $snapshot['project'] ?? '-' }}</td>
                    <td>{{ $snapshot['tender_status'] ?? '-' }}</td>
                    <td>{{ $snapshot['nit_date'] ?? '-' }}</td>
                    <td>{{ $snapshot['tender_opening_date'] ?? '-' }}</td>
                    <td>{{ $snapshot['loa_date'] ?? '-' }}</td>
                    <td>{{ $snapshot['remarks'] ?? '-' }}</td>
                    <td>{{ $history->changed_by ? \App\Models\User::find($history->changed_by)->name : 'System' }}</td>
                    <td>{{ \Carbon\Carbon::parse($history->changed_at)->format('d-M-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center text-muted">No history available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>