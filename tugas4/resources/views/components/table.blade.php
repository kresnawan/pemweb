<table style="border-collapse: collapse;">
    <?php $columns = ["No", "Jenis Pengeluaran", "Nominal", "Tanggal"] ?>
    <tr>
        @foreach ($columns as $column)
            <th style="padding: 10px 15px; border: 1px solid;">{{$column}}</th>
        @endforeach
    </tr>
    {{ $slot }}
</table>
