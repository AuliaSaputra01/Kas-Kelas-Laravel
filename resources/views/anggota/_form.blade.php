@csrf
<div class="mb-3">
    <label class="form-label">NPM</label>
    <input type="text" name="npm" value="{{ old('npm', $anggota->npm) }}" class="form-control @error('npm') is-invalid @enderror">
    @error('npm') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">No. HP (opsional)</label>
    <input type="text" name="no_hp" value="{{ old('no_hp', $anggota->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror">
    @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<button class="btn btn-primary">Simpan</button>
<a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
