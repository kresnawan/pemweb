<x-layout title="Home" header="Semua data">
    <x-table>
        @foreach ($logs as $log)
            <tr>
                @foreach ($log as $item)
                    <td style="padding: 5px 15px; border: 1px solid;">{{ $item }}</td>
                @endforeach
            </tr>
        @endforeach

    </x-table>
</x-layout>
