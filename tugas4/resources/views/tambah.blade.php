<x-layout title="Add" header="Tambah data">

    <form action="/tambah" method="post">
        <div class="section is-first-section">
            <div>Jenis transaksi</div>
            <select name="tipe" id="" class="slct">
                <option value="">-- Jenis transaksi --</option>
                <option value="in">Pemasukan</option>
                <option value="out">Pengeluaran</option>
            </select>
        </div>
        <div class="section">
            <div>Nominal</div>
            <input type="number" name="nominal">
        </div>
        <div class="section">
            <input type="submit" class="btn" value="Tambahkan">
            @session('result')
                <div class="alert-txt is-failed">
                    Input tidak boleh kosong!
                </div>
            @endsession
        </div>
    </form>
</x-layout>
