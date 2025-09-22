<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th>Division</th>
                <th>Section</th>
                <th>Target (RKM)</th>
                <th>Completed (RKM)</th>
                <th>Balance (RKM)</th>
                <th>Target Year</th>
                <th>ESP</th>
                <th>SIP</th>
                <th>RCC</th>
                <th>SWR</th>
                <th>Interface</th>
                <th>App Logic</th>
                <th>FAT</th>
                <th>SAT</th>
                <th>Tender</th>
                <th>Indoor (%)</th>
                <th>Outdoor (%)</th>
                <th>GM Sanction</th>
                <th>TDC Target</th>
                <th>Changed By</th>
                <th>Changed At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $index => $history)
                @php
                    $s = $history->snapshot_array ?? [];
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $s['division'] ?? '-' }}</td>
                    <td>{{ $s['section'] ?? '-' }}</td>
                    <td>{{ $s['target_rkm'] ?? 0 }}</td>
                    <td>{{ $s['completed_rkm'] ?? 0 }}</td>
                    <td>{{ $s['balance_rkm'] ?? 0 }}</td>
                    <td>{{ $s['target_year'] ?? '-' }}</td>
                    <td>{{ $s['esp_status'] ?? 0 }}</td>
                    <td>{{ $s['sip_status'] ?? 0 }}</td>
                    <td>{{ $s['rcc_status'] ?? 0 }}</td>
                    <td>{{ $s['swr_status'] ?? 0 }}</td>
                    <td>{{ $s['interface_status'] ?? 0 }}</td>
                    <td>{{ $s['app_logic_status'] ?? 0 }}</td>
                    <td>{{ $s['fat_status'] ?? 0 }}</td>
                    <td>{{ $s['sat_status'] ?? 0 }}</td>
                    <td>{{ $s['tender_status'] ?? 0 }}</td>
                    <td>{{ $s['indoor_progress_pct'] ?? 0 }}%</td>
                    <td>{{ $s['outdoor_progress_pct'] ?? 0 }}%</td>
                    <td>{{ $s['gm_sanction_status'] ?? 0 }}</td>
                    <td>{{ $s['tdc_target'] ?? '-' }}</td>
                    <td>{{ $history->user->name ?? 'System' }}</td>
                    <td>{{ \Carbon\Carbon::parse($history->changed_at)->format('d-M-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="22" class="text-center text-muted">No history found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>