@forelse ($visitor as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->ip_address }}</td>
        <td>{{ Str::limit($data->user_agent, 40) }}</td>
        <td>{{ $data->url }}</td>
        <td>{{ \Carbon\Carbon::parse($data->visited_at)->translatedFormat('d F Y H:i') }}</td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center text-muted">Tidak ada data pengunjung.</td>
    </tr>
@endforelse