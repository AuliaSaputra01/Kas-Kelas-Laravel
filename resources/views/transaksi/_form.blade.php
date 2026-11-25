@csrf
<div class="mb-3">
    <label class="form-label">Anggota (kosongkan jika bukan dari anggota)</label>
    <select name="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror">
        <option value="">-</option>
        @foreach ($anggotas as $a)
            <option value="{{ $a->id }}" @selected(old('anggota_id', $transaksi->anggota_id) == $a->id)>{{ $a->nama }} ({{ $a->npm }})</option>
        @endforeach
    </select>
    @error('anggota_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Jenis</label>
    <select name="jenis" class="form-select @error('jenis') is-invalid @enderror">
        <option value="masuk" @selected(old('jenis', $transaksi->jenis) == 'masuk')>Pemasukan</option>
        <option value="keluar" @selected(old('jenis', $transaksi->jenis) == 'keluar')>Pengeluaran</option>
    </select>
    @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Jumlah (Rp)</label>
    <input type="number" name="jumlah" value="{{ old('jumlah', $transaksi->jumlah) }}" class="form-control @error('jumlah') is-invalid @enderror">
    @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Tanggal</label>
    <input type="date" name="tanggal" value="{{ old('tanggal', optional($transaksi->tanggal)->format('Y-m-d')) }}" class="form-control @error('tanggal') is-invalid @enderror">
    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Keterangan</label>
    <input type="text" name="keterangan" value="{{ old('keterangan', $transaksi->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror">
    @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<button class="btn btn-primary">Simpan</button>
<a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
