<!DOCTYPE html>
<html>

<head>
    <title>Soal 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Hasil Fungsi 1</h2>
                <div class="mb-3">
                    <form action="/soal4" method="get">
                        <div class="mb-3">
                            <label for="jumlahBilangan" class="form-label">Jumlah Bilangan</label>
                            <input type="number" class="form-control" id="jumlahBilangan" name="jumlahBilangan" value="{{$jumlahBilangan}}">
                        </div>
                        <div class="mb-3">
                            <label for="jumlahKelompok" class="form-label">Jumlah Kelompok</label>
                            <input type="number" class="form-control" id="jumlahKelompok" name="jumlahKelompok" value="{{$jumlahKelompok}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @foreach ($evenNumbers as $group)
                        <span class="badge bg-secondary">[{{ implode(',', $group) }}]</span>
                    @endforeach
                </div>
                <h2 class="card-title">Hasil Fungsi 2</h2>
                <form action="/soal4" method="get">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="jumlahBilangan" name="jumlahBilangan" value="{{$jumlahBilangan}}">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="jumlahKelompok" name="jumlahKelompok" value="{{$jumlahKelompok}}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahKelompok" class="form-label">Jumlah Baris</label>
                        <input type="number" class="form-control" id="jumlahBaris" name="jumlahBaris" value="{{$jumlahBaris}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div>
                    @foreach ($pattern as $line)
                        <p>{{ $line }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
