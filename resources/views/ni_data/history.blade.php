<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th>Division</th>
                <th>Project</th>
                <th>Station</th>
                <th>Agency</th>
                <th>Section</th>
                <th>Section (KM)</th>
                <th>Proposed NI Month</th>
                <th>For Pre-NI From</th>
                <th>For Pre-NI To</th>
                <th>For NI From</th>
                <th>For NI To</th>
                <th>CRS Inspection</th>
                <th>Commissioned</th>
                <th>ESP</th>
                <th>SIP</th>
                <th>CRS Application</th>
                <th>CRS TDC</th>
                <th>CRS Sanction</th>
                <th>Month No</th>
                <th>NI Status</th>
                <th>Remarks</th>
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
                    <td>{{ $s['project_name'] ?? '-' }}</td>
                    <td>{{ $s['station'] ?? '-' }}</td>
                    <td>{{ $s['agency'] ?? '-' }}</td>
                    <td>{{ $s['section'] ?? '-' }}</td>
                    <td>{{ $s['length_of_section_in_km'] ?? '-' }}</td>
                    <td>{{ !empty($s['proposed_ni_month']) ? \Carbon\Carbon::parse($s['proposed_ni_month'])->format('d-M-Y') : '-' }}</td>
                    <td>{{ !empty($s['for_pre_ni_from']) ? \Carbon\Carbon::parse($s['for_pre_ni_from'])->format('d-M-Y') : '-' }}</td>
                    <td>{{ !empty($s['for_pre_ni_to']) ? \Carbon\Carbon::parse($s['for_pre_ni_to'])->format('d-M-Y') : '-' }}</td>
                    <td>{{ !empty($s['for_ni_from']) ? \Carbon\Carbon::parse($s['for_ni_from'])->format('d-M-Y') : '-' }}</td>
                    <td>{{ !empty($s['for_ni_to']) ? \Carbon\Carbon::parse($s['for_ni_to'])->format('d-M-Y') : '-' }}</td>
                    <td>{{ !empty($s['crs_inspection_date']) ? \Carbon\Carbon::parse($s['crs_inspection_date'])->format('d-M-Y') : '-' }}</td>
                    <td>{{ isset($s['is_commisioned']) && (int)$s['is_commisioned'] === 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $s['esp_status'] ?? '-' }}</td>
                    <td>{{ $s['sip_status'] ?? '-' }}</td>
                    <td>{{ $s['crs_application_status'] ?? '-' }}</td>
                    <td>{{ $s['crs_tdc'] ?? '-' }}</td>
                    <td>{{ $s['crs_sanction_status'] ?? '-' }}</td>
                    <td>{{ $s['month_number'] ?? '-' }}</td>
                    <td>{{ $s['ni_status'] ?? '-' }}</td>
                    <td>{{ $s['remarks'] ?? '-' }}</td>
                    <td>{{ $history->user->name ?? 'System' }}</td>
                    <td>{{ optional($history->changed_at)->format('d-M-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="24" class="text-center text-muted">No history found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>