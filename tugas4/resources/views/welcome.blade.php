<x-layout title="Home">
    <x-table>
        @foreach ($logs as $log)
            <tr>
                <td style="padding: 5px 15px;">{{ $log->id }}</td>
                <td style="padding: 5px 15px;">{{ $log->tipe }}</td>
                <td style="padding: 5px 15px;">{{ $log->nominal }}</td>
                <td style="padding: 5px 15px;">{{ $log->tanggal }}</td>
            </tr>
        @endforeach

    </x-table>
</x-layout>
